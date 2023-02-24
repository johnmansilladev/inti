<?php

namespace App\Http\Livewire\Frontend\Checkouts;

use Cart;
use App\Models\Order;
use Livewire\Component;
use App\Mail\OrderCreate;
use App\Models\Configuration;
use App\Models\Promotion;
use Illuminate\Validation\Rule;
use App\Models\StockKeepingUnit;
use App\Rules\ContactInfoValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CheckoutController extends Component
{
    public $first_name;
    public $last_name;
    public $contact_medium='whatsapp';
    public $type_contact='number';
    public $contact_info;
    public $phone;
    public $phone_country;
    public $email;
    // public $confirm_email;
    public $privacy_policies = false;
    public $validPhone = false;

    public $cartItems=[];
    public $totalQuantity = 0;
    public $subtotal = 0; // el subtotal sin incluir las promociones. 
    public $total = 0; // el total incluido las promociones y cupones aplicados.

    public $auth = false;

    protected function rules()
    {
        return [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'contact_medium' => ['required',Rule::in(['whatsapp','email','facebook','skype','telegram','wechat'])],
            'contact_info' => ['required','min:3',new ContactInfoValidator($this->type_contact,$this->validPhone)],
            'email' => 'required|email',
            'privacy_policies' => 'accepted'
        ];
    }

    protected $messages = [
        'first_name.required' => 'El campo nombres es requerido.',
        'first_name.min' => 'El nombre debe tener al menos 3 caracteres.',
        'last_name.required' => 'El campo apellidos es requerido.',
        'last_name.min' => 'El apellido debe tener al menos 3 caracteres.',
        'contact_medium.required' => 'El campo medio de contacto es requerido.',
        'contact_info.required' => 'El campo información de contacto es requerido.',
        'contact_info.min' => 'La información del contacto debe tener al menos 3 caracteres.',
        'contact_info.in' => 'El medio de contacto seleccionado no es válido.',
        'email.required' => 'El campo email es requerido.',
        'privacy_policies.accepted' => 'Debe aceptar las políticas de privacidad de datos.'
    ];

    public function mount()
    {

        $this->cartList();

        if (!$this->cartItems->count()) {
            return redirect()->route('home');
        }

        if (Auth::check()) {
            $this->auth = true;
            $this->first_name = auth()->user()->firstname;
            $this->last_name = auth()->user()->lastname;
            $this->email = auth()->user()->email; 
        } else {
            $this->auth = false;
        }

        $this->dispatchBrowserEvent('telDOMChanged');

    }

    public function store()
    {
        $validatedData = $this->validate();

        $nro_order = IdGenerator::generate([
            'table' => 'orders',
            'field' => 'nro_order',
            'length' => 13,
            'prefix' => 'ID-'.date('ym')
        ]);

        $inputs = [
            'nro_order' => $nro_order,
            'contact_name' => $validatedData['first_name'] .' '.$validatedData['last_name'],
            'contact_medium' => $validatedData['contact_medium'],
            'contact_information' => $validatedData['contact_info'],
            'email' => $validatedData['email'], 
        ]; 

        if (Auth::check()) {
            $inputs = array_merge($inputs,['user_id' => auth()->user()->id]);
        }

        $order = Order::create($inputs);

        foreach ($this->cartItems as $item) {

            $sku = StockKeepingUnit::find($item['options']['sku_id']);

            if ($sku->active) {

                $services = $sku->services()->active()->get();
                $coupons = [];
                $promotions = [];

                if($services->count() > 0) {
                   $service = $services->find($item['options']['service_id']);
                    if($service) {

                        $price_base = $service->basePrice();
                        $dcto = 0;
                        $price_sale = $price_base;

                        $addItem = [
                            'product_name' => $sku->product->name.' - '.$sku->name,
                            'stock_keeping_unit_id' => $sku->id,
                            'service_id' => $service->id,
                            'currency' => Configuration::where('key','sale_currency')->first()->value,
                            'qty' =>  $item['qty'],
                            'price_base' => floatval($price_base),
                            'metadata' => []
                        ];

                        if($sku->hasPromotionsService($service->id)) {
                            $promotion = $sku->discountedPriceService($service->id);
                            switch ($promotion->type_promotion) {
                                case Promotion::PERCENTAGE:
                                    $dcto = round($promotion->discount_rate);
                                    $price_sale = round($price_base - (($price_base * $dcto) / 100),1);
                                    break;
                                case Promotion::FIXED_AMOUNT:
                                    $price_sale = round($price_base - $promotion->discount_rate,1);
                                    break;
                                default:
                                    break;
                            }
                            array_push($promotions,$promotion->toArray());
                        }  

                        $addItem['dcto']= $dcto;
                        $addItem['price_sale'] = $price_sale;
                    }
                }

                $addItem['metadata'] = json_encode([
                    'coupons' => $coupons,
                    'promotions' => $promotions
                ]);
                 
                if (isset($sku->internal_id)) {
                    $addItem['internal_id'] =  $sku->internal_id;
                }
                
            }

            $order->orderDetails()->create($addItem);
        }

        Cart::instance('cart')->destroy();   
        
        
        //Envia correo electrónico
        $mail = new OrderCreate($order);
        $email_ecom = Configuration::where('key','email_contact')->first()->value;
        // Mail::to('contacto@intidiesel.pe')->send($mail);
        // Mail::to('contacto@intidiesel.pe')->queue($mail);
        Mail::to($order->email)
            ->bcc($email_ecom)
            ->queue($mail);

        $this->sendWhatsAppMessageOrder($order);

        return redirect()->route('order.show',$order->nro_order)
                        ->with("message", "Su orden ha sido registrada exitosamente, en breve nuestro equipo de atencion al cliente se comunicará con usted.");
    }

    public function setAuth() 
    {
        $this->auth = true;
        $this->dispatchBrowserEvent('telDOMChanged');
    }

    public function cartList()
    {
        $this->cartItems = Cart::instance('cart')->content();
        $this->totalQuantity = Cart::instance('cart')->content()->count();
        $this->subtotal = Cart::instance('cart')->subtotal();
        $this->total = Cart::instance('cart')->subtotal();
    }

    public function updatingContactMedium($value) 
    {
        switch ($value) {
            case 'skype':
            case 'telegram':
            case 'whatsapp':
            case 'wechat':
                $this->type_contact='number';
                $this->phone='';
                $this->phone_country='';
                $this->contact_info='';
                $this->dispatchBrowserEvent('telDOMChanged');
                break;

            case 'facebook':
            case 'email':
                $this->type_contact='text';
                $this->contact_info='';
                break;
            default:
                $this->type_contact='text';
                $this->contact_info='';
                break;
        }

        $this->emit('reset-Input-phone');
    }

    public function sendWhatsAppMessageOrder(Order $order)
    {
        $number = "51930825355"; // numero de celular

        $message = "Hola, quiero comprar el artículo (s) a continuación: %0A";
        $message .= "*Orden:* $order->nro_order %0A%0A%0A"; 
        $message .= "*Datos de Contacto* %0A";
        $message .= "*Nombre de Contacto: $order->contact_name %0A";
        $message .= "*Email: $order->email%0A";
        $message .= "*Medio de Contacto: $order->contact_medium - $order->contact_information %0A%0A";

        $total = 0;

        foreach ($order->orderDetails as $item) {

            $message .= "*".strtoupper($item->stockKeepingUnit->product->name)."*%0A";
            $message .= "*Versión:* ".strtoupper($item->stockKeepingUnit->name)."%0A";
            $message .= "*Servicio:* ".strtoupper($item->service->name)."%0A";
            $message .= "*Cantidad:* $item->qty%0A";

            if ($item->dcto > 0) {
                $message .= "*Precio Normal:* S/. ".number_format($item->price_base,2)." %0A";
                $message .= "*Precio Oferta:* S/. ".number_format($item->price_sale,2)." %0A";
            } else {
                $message .= "*Precio:* S/. ".number_format($item->price_sale,2)." %0A";
            }

            $message .= "*Url:* ".route('product.index',['product'=>$item->stockKeepingUnit->product->slug,'version'=>$item->stockKeepingUnit->slug])."%0A%0A";

            $total += $item->price_sale * $item->qty;
        }

        $message .= "*Precio Total:*%0A";
        $message .= "S/. ".number_format($total,2);
        
        $url = 'https://api.whatsapp.com/send?phone=' . $number . '&text=' . $message;

        $this->emit('reset-Input-phone');
        $this->emit('openWhatsApp',$url);
    }

    public function render()
    {
        $this->cartList();
        return view('livewire.frontend.checkouts.checkout');
    }
}

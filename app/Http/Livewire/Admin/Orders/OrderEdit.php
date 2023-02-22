<?php

namespace App\Http\Livewire\Admin\Orders;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Country;
use App\Models\Payment;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class OrderEdit extends Component
{
    public $order;
    public $countries = [];

    public $payment_method;
    public $payment_issuerName;
    public $payment_email;
    public $payment_country = 172; //Perú
    public $payment_amount;
    public $payment_transactionCode;

    public $payment_vissuerName = false;
    public $payment_vemail = false;
    public $payment_vcountry = false;
    public $payment_vamount = false;
    public $payment_vtransactionCode = false;

    protected $validationAttributes = [
        'payment_method' => 'método de pago',
        'payment_issuerName' => 'nombre',
        'payment_email' => 'correo electrónico',
        'payment_country' => 'país',
        'payment_amount' => 'monto',
        'payment_transactionCode' => 'código'
    ];


    public function mount(Order $order)
    {
        $this->order = $order;

        if ($this->order->payment) {
            $this->payment_method = $this->order->payment->method;
            $this->payment_issuerName = $this->order->payment->issuer_name;
            $this->payment_email = $this->order->payment->email;
            $this->payment_country = $this->order->payment->country_id; 
            $this->payment_amount = $this->order->payment->amount; 
            $this->payment_transactionCode = $this->order->payment->transaction_code; 

            $this->updatedPaymentMethod();
        }

        Carbon::setLocale('es');

        $this->countries = Country::all();
    }

    public function advanceState()
    {
        if ($this->order->status == Order::PENDING) {

            if ($this->order->payment) {
                $order = Order::findOrFail($this->order->id);
                $order->status = Order::PAID;
                $order->save();
                $this->order->refresh();
            } else {
                $this->emit('show-alert','Agregue detalle de pago','warning');
                return;
            }
        } else {
            return;
        }
    }
    

    public function savePaymentData()
    {
        $validatedRules = [
        'payment_method' => ['required',Rule::in(['western union','moneygram','paypal','transferencia bancaria','yape','plin'])],
        ];

        if ($this->payment_vissuerName) {
            $validatedRules['payment_issuerName'] = 'required|max:150';
        }

        if ($this->payment_vemail) {
            $validatedRules['payment_email'] = 'required|email';
        }

        if ($this->payment_vcountry) {
            $validatedRules['payment_country'] = ['required','numeric',Rule::exists('countries', 'id')];
        }

        if ($this->payment_vamount) {
            $validatedRules['payment_amount'] = 'required|numeric';
        }

        if ($this->payment_vtransactionCode) {
            $validatedRules['payment_transactionCode'] = 'required';
        }

        $validatedData = $this->validate($validatedRules);

        $validatedInput = [
            'method' => $validatedData['payment_method'],
        ];

        if ($this->payment_vissuerName) {
            $validatedInput['issuer_name'] =  $validatedData['payment_issuerName'];
        }

        if ($this->payment_vemail) {
            $validatedInput['email'] =  $validatedData['payment_email'];
        }

        if ($this->payment_vcountry) {
            $validatedInput['country_id'] = $validatedData['payment_country'];
        }

        if ($this->payment_vamount) {
            $validatedInput['amount'] = $validatedData['payment_amount'];
        }

        if ($this->payment_vtransactionCode) {
            $validatedInput['transaction_code'] = $validatedData['payment_transactionCode'];
        }

        $validatedInput['user_id'] = Auth::user()->id;

        $payment = Payment::updateOrCreate(
            ['id' => $this->order->payment_id],
            $validatedInput
        );

        // Actualizar el campo payment_id en la tabla orders
        $order = Order::findOrFail($this->order->id);
        $order['payment_id'] = $payment->id;
        $order->save();

        $this->resetForm();

        $this->order->refresh();
        $this->mount($this->order);

        $this->emit('show-alert','Pago registrado','success');

    }

    public function cancelledOrder()
    {
        if ($this->order->status == Order::PENDING || $this->order->status == Order::PAID ) {
            $order = Order::findOrFail($this->order->id);
            $order->status = Order::CANCELLED;
            $order->save();
            $this->order->refresh();
        } else {
            return;
        } 
    }

    public function updatedPaymentMethod()
    {
        switch ($this->payment_method) {
            case 'western union':
            case 'moneygram':
                $this->payment_vissuerName = true;
                $this->payment_vemail = false;
                $this->payment_vcountry = true;
                $this->payment_vamount = true;
                $this->payment_vtransactionCode = true;
                break;
            case 'paypal':
                $this->payment_vissuerName = true;
                $this->payment_vemail = true;
                $this->payment_vcountry = false;
                $this->payment_vamount = true;
                $this->payment_vtransactionCode = false;
                break;
            case 'transferencia bancaria':
            case 'yape':
            case 'plin':
                $this->payment_vissuerName = true;
                $this->payment_vemail = false;
                $this->payment_vcountry = false;
                $this->payment_vamount = true;
                $this->payment_vtransactionCode = true;
                break;
            default:
                $this->payment_vissuerName = false;
                $this->payment_vemail = false;
                $this->payment_vcountry = false;
                $this->payment_vamount = false;
                $this->payment_vtransactionCode = false;
                break;
        }

        $this->resetValidation();
    }

    private function resetForm()
    {
        $this->reset([
            'payment_method',
            'payment_issuerName',
            'payment_email',
            'payment_country',
            'payment_amount',
            'payment_transactionCode',
            'payment_vissuerName',
            'payment_vemail',
            'payment_vcountry',
            'payment_vamount',
            'payment_vtransactionCode',
        ]);

    }

    public function render()
    {
        return view('livewire.admin.orders.order-edit')->layout('layouts.admin');
    }
}

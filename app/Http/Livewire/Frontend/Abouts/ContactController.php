<?php

namespace App\Http\Livewire\Frontend\Abouts;

use App\Models\Contact;
use App\Models\Country;
use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Rules\ContactInfoValidator;

class ContactController extends Component
{
    public $name;
    public $subject;
    public $email;
    public $contact_medium='whatsapp';
    public $type_contact='number';
    public $contact_info;
    public $phone;
    public $contact_message;
    public $privacy_policies = false;
    public $validPhone = false;
    public $success_message;
 
    protected function rules(){
        return [
            'name' => 'required|min:3',
            'subject' => 'required|min:5',
            'contact_medium' => ['required',Rule::in(['whatsapp','email','facebook','skype','telegram','wechat'])],
            'contact_info' => ['required','min:3',new ContactInfoValidator($this->type_contact,$this->validPhone)],
            'email' => 'required|email',
            'contact_message' => 'required|min:3|max:500',
            'privacy_policies' => 'accepted'
        ];
    }

    protected $message = [
        'name.required' => 'El campo nombre es requerido',
        'name.min' => 'El nombre debe tener al menos 3 caracteres',
        'subject.required' => 'El campo asunto es requerido',
        'subject.min' => 'El asunto debe tener al menos 5 caracteres',
        'contact_medium.required' => 'El campo medio de contacto es requerido',
        'contact_info.required' => 'El campo información de contacto es requerido',
        'email.required' => 'El campo correo electrónico es requerido',
        'contact_message.required' => 'El campo mensaje es requerido',
        'contact_message.min' => 'El mensaje debe tener al menos 3 caracteres',
        'contact_message.max' => 'El mensaje debe tener maximo 500 caracteres',
        'privacy_policies.accepted' => 'Debe aceptar la politica de privacidad de datos'
    ];

    protected $validationAttributes = [
        'name' => 'nombre',
        'subject' => 'asunto',
        'contact_medium' => 'medio de contacto',
        'contact_info' => 'info de contacto',
        'email' => 'correo electrónico',
        'contact_message' => 'mensaje',
        'privacy_policies' => 'las políticas de privacidad'
    ];



    public function store() 
    {

        $this->validate();

        Contact::create([
            'name' => $this->name,
            'subject' => $this->subject,
            'contact_medium' => $this->contact_medium,
            'contact_info' => $this->contact_info,
            'email' => $this->email,
            'message' => $this->contact_message,
        ]);

        $this->resetForm();

        //enviar email

        $this->emit('show-alert','Registrado exitosamente','success');

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
                // $this->phone_country='';
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

    private function resetForm()
    {
        $this->name = '';
        $this->subject = '';
        $this->phone = '';
        $this->contact_medium='whatsapp';
        $this->contact_info = '';
        $this->type_contact='number';
        $this->email = '';
        $this->contact_message = '';
        $this->privacy_policies = false;

        $this->emit('reset-Input-phone');

        $this->dispatchBrowserEvent('telDOMChanged');
    }

    public function render()
    {
        return view('livewire.frontend.abouts.contact-us');

    }
}

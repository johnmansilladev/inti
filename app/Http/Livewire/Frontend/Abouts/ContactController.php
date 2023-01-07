<?php

namespace App\Http\Livewire\Frontend\Abouts;

use App\Models\Contact;
use App\Models\Country;
use Livewire\Component;

class ContactController extends Component
{
    public $name;
    public $subject;
    public $email;
    public $phoneCode='51';
    public $phone;
    public $contactMessage;
    public $politics=false;
    public $success_message;

    protected $rules = [
        'name' => 'required|min:3',
        'subject' => 'required|min:5',
        'phone' => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
        'email' => 'required|email',
        'contactMessage' => 'required|min:3|max:500',
        'politics' => 'accepted'
    ];

    protected $message = [
        'name.required' => 'El campo nombre es requerido',
        'name.min' => 'El nombre debe tener al menos 3 caracteres',
        'subject.required' => 'El campo asunto es requerido',
        'subject.min' => 'El asunto debe tener al menos 5 caracteres',
        'phone.required' => 'El campo nro de teléfono es requerido',
        'email.required' => 'El campo correo electrónico es requerido',
        'contactMessage.required' => 'El campo mensaje es requerido',
        'contactMessage.min' => 'El mensaje debe tener al menos 3 caracteres',
        'contactMessage.max' => 'El mensaje debe tener maximo 500 caracteres',
        'politics.accepted' => 'Debe aceptar la politica de privacidad de datos'
    ];

    public function store() 
    {

        $this->validate();

        Contact::create([
            'name' => $this->name,
            'subject' => $this->subject,
            'phone' => $this->phone,
            'email' => $this->email,
            'message' => $this->contactMessage,
        ]);

        $this->resetForm();

        // enviar email pendiente

        $this->success_message = 'Hemos recibido correctamente su mensaje y en breve nos pondremos en contacto con usted!';

    }

    private function resetForm()
    {
        $this->name = '';
        $this->subject = '';
        $this->phoneCode = '51';
        $this->phone = '';
        $this->email = '';
        $this->contactMessage = '';
    }

    public function render()
    {
        $countries = Country::all();

        return view('livewire.frontend.abouts.contact-us',[
            'countries' => $countries
        ]);

    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Subscription as subscribe;
use Livewire\Component;

class Subscription extends Component
{

    public $name;
    public $email;
    public $terms_policy=false;
    public $terms_conditions=false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:subscriptions',
        'terms_policy' => 'accepted',
        'terms_conditions' => 'accepted'
    ];

    protected $messages = [
        'name.required' => 'El nombre es requerido.',
        'name.min' => 'El nombre debe tener al menos 3 caracteres.',
        'email.required' => 'El email es requerido.',
        'email.email' => 'El email debe ser una dirección válida.',
        'email.unique' => 'El email ya suscrito',
        'terms_policy' => 'Debe aceptar la política de protección de datos.',
        'terms_conditions' => 'Debe aceptar los terminos y condiciones.'
    ];


    public function subscribe() 
    {
        $this->validate();
        
        subscribe::create([
            'email' => $this->email,
            'data' => [
                'name' => $this->name
            ]
        ]);

        $this->resetForm();

        // session()->flash('success_message', '¡Suscripción Exitosa!');

    }

    public function resetForm() 
    {
        $this->name = '';
        $this->email = '';
        $this->terms_policy = false;
        $this->terms_conditions = false;
    }

    public function render()
    {
        return view('livewire.subscription');
    }
}

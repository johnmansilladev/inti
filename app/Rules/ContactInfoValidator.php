<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ContactInfoValidator implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    protected $validPhone;
    protected $type_contact;

    public function __construct($type_contact,$validPhone)
    {
        $this->type_contact = $type_contact;
        $this->validPhone = $validPhone;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->type_contact == 'number') {
            return $this->validPhone;
        } else {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El nro de teléfono es inválido';
    }
}

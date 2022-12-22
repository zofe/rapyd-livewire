<?php

namespace Zofe\Rapyd\Traits;

use Livewire\Livewire;
use Zofe\Rapyd\Http\Livewire\FormRequest;

trait WithFormRequest
{
    public function validateResolved()
    {
        // Avoid validation on resolution if it's a Livewire request
        if (Livewire::isDefinitelyLivewireRequest()) {
            return false;
        }

        return parent::validateResolved();
    }

    public function validate($rules = null, $messages = [], $attributes = [])
    {
        if (is_a($rules, FormRequest::class)) {
            return parent::validate($rules->rules(), $rules->messages(), $rules->attributes());
        }

        return parent::validate($rules, $messages, $attributes);
    }
}

<?php

namespace Zofe\Rapyd\Traits;

use Livewire\Livewire;

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
}

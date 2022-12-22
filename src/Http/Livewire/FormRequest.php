<?php

namespace Zofe\Rapyd\Http\Livewire;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;
use Zofe\Rapyd\Traits\WithFormRequest;

class FormRequest extends BaseFormRequest
{
    use WithFormRequest;
}

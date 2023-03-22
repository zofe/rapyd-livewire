<?php

namespace Zofe\Rapyd\Traits;

trait ShortId
{
    public function getShortIdAttribute()
    {
        return strtoupper(substr($this->id, 0, 8));
    }
}

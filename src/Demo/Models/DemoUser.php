<?php

namespace Zofe\Rapyd\Demo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoUser extends Model
{
    use HasFactory;
    public $table = 'rapyd_demo_users';
}
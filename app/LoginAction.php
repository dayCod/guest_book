<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginAction extends Model
{
     protected $table = 'users';
     protected $guarded = []; 
}
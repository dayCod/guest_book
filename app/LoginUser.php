<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticableContract;

class LoginUser extends Model implements AuthenticableContract
{
	use Authenticatable;
    protected $table = 'table_admin';
    protected $guarded = [];
}
 
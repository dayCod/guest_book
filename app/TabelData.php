<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticableContract;

class TabelData extends Model implements AuthenticableContract

{
    use Authenticatable;
    protected $table = 'user';
    protected $fillable = ['nama','instansi_asal','menemui','keperluan','waktu'];
}


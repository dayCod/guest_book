<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticableContract;

class TabelPegawai extends Model implements AuthenticableContract

{
    use Authenticatable;
    protected $table = 'tabel_pegawai';
    protected $guarded = [];

    // public function pegawai()
    // {
    // 	return $this->belongsTo('App\UserNew');
    // }
}
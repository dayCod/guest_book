<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNew extends Model
{
    protected $table = 'user_news';
    protected $guarded = [];
    

    public function detailpegawai()
    {
    	return $this->hasOne('App\TabelPegawai','id','menemui','nama');
    }
    // public function usernew()
    // {
    	// return $this->hasOne('App\TabelPegawai');
    // }
}

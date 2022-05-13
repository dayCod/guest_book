<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class karyawanController extends Controller
{
    public function index_karyawan()
    {
    	return view('pegawai.index_karyawan');
    }
}

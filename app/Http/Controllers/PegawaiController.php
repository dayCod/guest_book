<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TabelPegawai; 
use App\UserNew;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\m_responsekeys(conn, identifier)
     */
    public function index()
    {
        $jumlah = TabelPegawai::count(); 
        $today = UserNew::whereDate('created_at', today())->count();
        $batas = UserNew::paginate('10');
        // dd($today);
        // dd(TabelPegawai::all());
       return view('admin.input_admin.index_pegawai',['pegawai'=>TabelPegawai::all() ,'today'=>$today ,'jumlah'=>$jumlah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.input_admin.create_pegawai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TabelPegawai::create([
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'divisi'=>$request->divisi,
            'email'=>$request->email,
        ]);
    return redirect()->route('pegawai_new.index')->withMessage('Data Berhasil Disimpan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TabelPegawai $tabelPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($tabelPegawai)
    {
        return view('admin.input_admin.edit_pegawai',['edit'=>TabelPegawai::where(['id'=>$tabelPegawai])->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tabelPegawai)
    {
        TabelPegawai::find($tabelPegawai)->update($request->except('_method','_token'));
        return redirect()->route('pegawai_new.index')->withMessage('Data Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($tabelPegawai)
    {
        TabelPegawai::find($tabelPegawai)->delete();
        return redirect()->route('pegawai_new.index')->withMessage('Data Berhasil Dihapus!');
    }
}

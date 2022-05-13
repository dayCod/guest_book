<?php

namespace App\Http\Controllers;

use App\UserNew;
use App\TabelPegawai;
use Illuminate\Http\Request;
use Mail;

class UserNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totpeng = UserNew::count();
        $paginate = UserNew::paginate(10);
        $data = UserNew::all();
        // dd($data);
        // dd($paginate);
        return view('admin.input_admin.index',['totpeng'=>$totpeng,'data'=>$data]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.input_admin.create',['buat'=>TabelPegawai::all()]);
    }

public function val_mail($email, $pesan)
{
    Mail::send('kirimpesan',['pesan'=>$pesan],function($message) use($email){
        $message->to($email)->subject('Info PT.PMLI');
        $message->from('alayarahman07@gmail.com');
    });
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    // $valKaryawan = TabelPegawai::select('email','nama_p')->where('id',$request->menemui)->first();
    // $this->val_mail($valKaryawan->email, " Hai ".$valKaryawan->nama_p. " Ada Yang Ingin Bertemu Dengan Anda, dari instansi ".$request->instansi_asal. " Atas Nama ".$request->nama);

        UserNew::create([
            'nama'=>$request->nama,
            'instansi_asal'=>$request->instansi_asal,
            'menemui'=>$request->menemui,
            'keperluan'=>$request->keperluan,
            'waktu'=>$request->waktu,
        ]);

        return redirect()->route('user_new.index')->withMessage('Data Tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserNew  $userNew
     * @return \Illuminate\Http\Response
     */
    public function show(UserNew $userNew)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserNew  $userNew
     * @return \Illuminate\Http\Response
     */
    public function edit($userNew)
    {
        return view('admin.input_admin.edit',[
            'edit'=>UserNew::where(['id'=>$userNew])->first(),
            'pegawai'=>TabelPegawai::all()
        ]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserNew  $userNew
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userNew)
    {
        UserNew::find($userNew)->update($request->except('_method','_token'));
        return redirect()->route('user_new.index')->withMessage('Data Diupdate!');
    }

    /**
 * Remove the specified resource from storage.
     *
     * @param  \App\UserNew  $userNew
     * @return \Illuminate\Http\Response
     */
    public function destroy($userNew)
    {
        UserNew::find($userNew)->delete();
        return redirect()->route('user_new.index')->withMessage('Data Berhasil Dihapus');
    }
}

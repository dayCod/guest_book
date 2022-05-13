<?php
 
namespace App\Http\Controllers;

use App\Charts\MonthlyVisitor;
use Illuminate\Http\Request;
use App\LoginUser;
use App\UserNew;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use App\TabelData;
use App\TabelPegawai;
use DB;
use Mail;
use Carbon\Carbon;
use Validator;

class LoginController extends Controller
{
    public function index(){
    	return view('login_admin');
    }

    public function index_register(){
    	return view('register_admin');
    }

    public function register_action(Request $request){

       $this->validate($request ,[
        'username'=> 'required|max:255',
        'password'=> 'required|max:12',
       ]);
        
       LoginUser::create([
    		'username' => $request->username,
    		'password' => Hash::make($request->password)
    	]);

    	return redirect('login_admin')->withMessage('Data Successfully Upload!');
    }

    public function login_action(Request $request){
    	$auth = Auth('web_admin')->attempt([
    		'username' => $request->username,
    		'password' => $request->password
    	]);
    	if ($auth) {
    		return redirect('dashboard_admin')->withMessage('Berhasil Login Sebagai Administrator!');
    	}else
    	{
    		return redirect('login_admin')->with('error','Username/Password Salah');
    	}
    	
    }

    public function logout_user(){
        session::flush();
        return redirect('login_admin');
    }

    public function input_user(Request $request)
    {
        // dd($value);
        $validator = Validator::make($request->all(), [
            'nama'=> 'required|string:255',
            'instansi_asal' => 'required',
            'keperluan' => 'required',
        ]);
        // $deklar = DB::table('user_news')->select('nama')->where('menemui','3')->first();
            // dd($deklar); 
        return view('user.input_pegawai',['data'=>TabelPegawai::all()]);
    }

    public function mail($email, $text)
    {
        Mail::send('sendmail',['text'=>$text],function($message) use($email){
            $message->to($email)->subject('Info PT PMLI');
            $message->from('alayarahman07@gmail.com');
        });      

    }

    public function input_action(Request $request){
        // Aktifkan Ketika Ingin Send Email
        // $karyawan = TabelPegawai::select('email','nama_p')->where('id',$request->menemui)->first();
        // $this->mail($karyawan->email, "Hai, ".$karyawan->nama_p." ada yang ingin bertemu dengan anda, dari instansi ".$request->instansi_asal." atas nama ".$request->name);
        $data1 = UserNew::create([
            'nama'=>$request->nama,
            'instansi_asal'=>$request->instansi_asal,
            'menemui'=>$request->menemui,
            'keperluan'=>$request->keperluan,
            'waktu'=>$request->waktu,
        ]);
           return back()->withMessage('Data Tersimpan');
    }

    public function add_data(Request $request)
    {
        $add = TabelPegawai::create([
            'nama_p'=>$request->nama_p,
        ]);
        // dd($add);
        return redirect('input_pegawai',['add'=>$add])->withMessage('Data Added');
    }
    public function profile(){
        return view('admin.profile');
    }

    public function index_pegawai()
    {
        return view('admin.input_admin.index_pegawai');
    }
}
    
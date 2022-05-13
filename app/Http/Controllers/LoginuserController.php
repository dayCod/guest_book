 <?php 

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\UserProvider;
use App\Charts\userChart;
use Illuminate\Http\Request;
use App\LoginAction;
use App\UserNew;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use App\TabelData;
use App\TabelPegawai;
use App\User;
use DB;
class LoginuserController extends Controller
{
    public function index_user()
    {
        return view('login_user');
    }

    public function user_pegawai()
    {        
        // dd($orders);
        // $karyawan = TabelPegawai::select('id')->where('id',$request->menemui)->first();
        $pagination = DB::table('tabel_pegawai')->paginate(10);
        $getData = DB::table('user_news')->join('tabel_pegawai','tabel_pegawai.id','=','user_news.menemui')
        ->select('user_news.nama','user_news.instansi_asal','user_news.menemui','user_news.keperluan','user_news.waktu','tabel_pegawai.id')->where('tabel_pegawai.id',Auth()->user()->id)->get();
        // dd();
        return view('user.index_user',['getData'=>$getData,'data'=>UserNew::all()]);
    }

    public function register_user()
    {
        return view('register_user');
    }
   public function registeruser_action(Request $request){
        $request->validate([
            'username'=> 'required|max:255',
            'password'=> 'required|max:12,'
        ]);
        LoginAction::create([
            'username'=>$request->username,
            'password'=>Hash::make($request->password)
        ]);

        return redirect('login_user')->withMessage('Data Successfully Upload!');
    }

    public function loginuser_action(Request $request){
        $data = User::where('username', $request->username)->first();
        if(empty($data))
        {
            return redirect('login_user')->with('error','Username/Password Salah');
        }else{
            $auth = Auth::attempt([
                'username' => $request->username,
                'password' => $request->password
            ]);

            if ($auth) {
                return redirect('dashboard_user')->withMessage('Berhasil Login Sebagai User!');
            }else
            {
                return redirect('login_user')->with('error','Username/Password Salah');
            }
        }        
    }
    public function logout()
    {
        session()->flash('status','Task Was Sucessfull');
        return view('login_user');
    }

}
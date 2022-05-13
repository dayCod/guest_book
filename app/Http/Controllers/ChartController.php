<?php

namespace App\Http\Controllers;

use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Charts\MonthlyVisitor;
use App\Charts\TodayVisit;
use App\UserNew;
use DB;

class ChartController extends Controller
{
    public function dashboard()
    {
    // buat pilih created_at
    /*$date = UserNew::select('created_at');*/
    $dataDate = UserNew::select('created_at', DB::raw('MONTH('created_at') as month'))
    ->groupBy('month')
    ->get();
    
    $date = collect([]); 
    $today = collect([]); 
    foreach ($dataDate as $val) {
    	$today->push(UserNew::whereMonth('created_at', $val['month'])->count());
    	$date->push(date('M-Y', strtotime($val['created_at'])));
    }
    	// CONF
    	// buat chart di App\Charts\MonthlyVisiotr MonthlyVisitor
    	$chart = new MonthlyVisitor;
    	$chart->title('Monthly Visitor');
    	$chart->labels($date);
    	$chart->dataset('Monthly Visitor' ,'line' ,$today);

        // $orders = DB::table('user_news')->select('menemui')
                // ->orderBy('id','asc')
                // ->groupBy('menemui')
                // ->get();
        // dd($orders);
    // FOR DATA MENEMUI
         $valpegawai = DB::table('user_news')
                 ->join('tabel_pegawai','tabel_pegawai.id','=','user_news.menemui')
                 ->select('tabel_pegawai.nama','menemui', DB::raw('count(*) as total'))
                 ->groupBy('menemui')
                 ->orderBy('total','desc')
                 ->limit(5)
                 ->get();
                // dd($valpegawai);   
    	return view('dashboard_admin_new',['valpegawai'=>$valpegawai,'chart'=>$chart, 'list'=>UserNew::all() ,'date'=>$dataDate]);
    }   
}

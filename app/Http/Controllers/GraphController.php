<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\TodayView;
use App\UserNew;
use App\TabelPegawai;
use DB;

class GraphController extends Controller
{
	 public function dashboard_user()
    {
    $dataDate = UserNew::select('created_at', DB::raw('MONTH(created_at) month'))
    ->groupBy('month')
    ->get();
    // dd($dataDate);
    $date = collect([]); 
    $today = collect([]); 
    foreach ($dataDate as $val) {
        $today->push(UserNew::whereMonth('created_at', $val['month'])->where('menemui',Auth()->user()->id)->count());
        $date->push(date('M', strtotime($val['created_at'])));
    }

    // $today_visit = UserNew::whereDate('created_at', today())->count();
        $chart = new TodayView;
    	$chart->title('Today Visit');
    	$chart->labels($date);
    	$chart->dataset('Today Visit','line' ,$today)->color('#53d0c4'); 
    	// dd($today_visit);
        return view('dashboard_user',['chart'=>$chart]);
    }
}

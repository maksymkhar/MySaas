<?php

namespace App\Http\Controllers;

use App\SaleReportsDaily;
use Illuminate\Http\Request;

use App\Http\Requests;

class ReportsController extends Controller
{
    public function dailySales()
    {
        $daily = SaleReportsDaily::all();

//        $days = array();
//        $totals = array();
//
//        foreach ($daily as $day) {
//            array_push($days, $day->day);
//            array_push($totals, $day->totals);
//        }

        $days = $daily->pluck('day');
        $totals = $daily->pluck('total');

        return view('reports.daily_sales', compact('days', 'totals'));
    }
}

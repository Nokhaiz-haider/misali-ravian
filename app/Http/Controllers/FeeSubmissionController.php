<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeSubmissionController extends Controller
{
    public function show_form(){
        return view('dashboard-pages/fee-submit');
    }

    public function show_fee(Request $request){
        $reg_id = $request->input("std_reg_id");
        $data = DB::table('new_registers')->where('std_reg_id',$reg_id)->get();
        return view('dashboard-pages/fee-submit')->with('data',$data);
    }

    public function submit_fee(Request $request){
        return $request;
    }
}

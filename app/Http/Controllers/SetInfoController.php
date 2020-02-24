<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\StudentFee;
use Carbon\Carbon;

class SetInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show_individual(){
        return view('dashboard-pages/set_individual_fee');
    }

    public function set_individual(Request $request){
        $reg_id = $request->input('search');
        $user = DB::table('student_fees')->where('std_reg_id',$reg_id)->get();
        return view('dashboard-pages/set_individual_fee')->with('fee',$user);
        
    }

   
}

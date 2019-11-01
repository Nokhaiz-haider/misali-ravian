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
        // $user = DB::table('new_registers')->select('std_class')->where('std_reg_id',$reg_id)->get();
        // $class_fee = DB::table('define_fees')->where('class_name',$user[0]->std_class)->get();
        // #return $class_fee;
        // 
        // echo"<pre>";
        // print_r($class_fee);
        // echo"</pre>";
    }

    // public function update_std_fee(Request $request, $std_reg_id){
        
    //     $now = Carbon::now();
    //     $month = $now->month;
    //     $year = $now->year;

    //     $fee = ['Admission Fee','Tution Fee','Exam Fee Annual','Hostel Fee','Special Facility Fee','Promotion Charges','Security(Refundable)','Van Fee(3918)','Van Fee(ND 495)','Van Fee(JGA 5535)','Board Registration','Medical Charges','Board Examination Fee'];
    //     for ($i=0; $i < sizeof($fee); $i++) { 
    //         $post = StudentFee::find($std_reg_id);
    //         $post->std_reg_id = $std_reg_id;
    //         $post->std_class = $post->std_class;
    //         $post->fee_month = $month;
    //         $post->fee_year = $year;
    //         $post->fee_type = $fee[$i];
    //         $post->fee_amount = $request->input('fee_amount_'.$i);
    //         // $post->fee_month = $request->input('fee_month');
    //         // $post->fee_year = $request->input('fee_year');
    
    //         $post->save();
    //         # code...
    //     }
    //     // for ($i=0; $i < count($post); $i++) { 
    //     //     # code...
    //     // }
    //     return "Hello";
    //     // foreach($std_fee as $data){
    //     //     $fee = new StudentFee();
    //     //     $fee->std_reg_id = $post->std_reg_id;
    //     //     $fee->std_class = $data->class_name;
    //     //     $fee->fee_month = $now->month;
    //     //     $fee->fee_year = $now->year;
    //     //     $fee->fee_type = $data->fee_type;
    //     //     $fee->fee_amount = $data->fee_amount;
    //     //     $fee->save();
    //     // }
    // }   

}

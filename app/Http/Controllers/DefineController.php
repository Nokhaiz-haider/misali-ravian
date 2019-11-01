<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\CreateSession;
use App\Model\DefineFee;
use App\Model\DefineSection;
use Session;

class DefineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_session(){
        return view('dashboard-pages/create-session');
    }
    
    // public function show_fee(){
    //     return view('dashboard-pages/define-fee');
    // }
    
    public function show_section(){
        return view('dashboard-pages/define-section');
    }

    public function create_session(Request $request){
        
        $from = $request->input('session_from');
        $to = $request->input('session_to');

        $sesison_count = DB::table('create_sessions')
                        ->where('session_from', $from)
                        ->where('session_to', $to)
                        ->count();

        if(!count($sesison_count)>0)
        {
            Session::flash('session_already', 'Sesison('.$from.' - '.$to.') is Already Present!');
            return redirect('home/define/session');
        }
        else
        {
            $post = new CreateSession();
            $post->session_from = $from;
            $post->session_to = $to;
            $post->combines_string = $from.'-'.$to;
            $post->save();
            Session::flash('session_submit', 'Sesison('.$from.' - '.$to.') is Created!');
            return redirect('home/define/session');
        }

    }

    public function define_fee(Request $request){
        $fee = ['Admission Fee','Tution Fee','Exam Fee Annual','Hostel Fee','Special Facility Fee','Promotion Charges','Security(Refundable)','Van Fee(3918)','Van Fee(ND 495)','Van Fee(JGA 5535)','Board Registration','Medical Charges','Board Examination Fee'];
        for ($i=0; $i < sizeof($fee); $i++) { 
            $post = new DefineFee();
            $fee_type = 
            $post->class_name = $request->input('class_name');
            $post->fee_type = $fee[$i];
            $post->fee_amount = $request->input('fee_amount_'.$i);
            $post->fee_month = $request->input('fee_month');
            $post->fee_year = $request->input('fee_year');
    
            $post->save();
            # code...
        }

        Session::flash('define_fee', 'Fee has been Defined!'); 

        return redirect('home/define/fee');
    }   

    public function define_section(Request $request){

        $post = new DefineSection;

        $class_name = $request->input('class');
        $section_name = $request->input('section_name');

        $post->class_name = $class_name;
        $post->section_name = $section_name;

        $post->save();

        Session::flash('define_section', 'Section has been Defined!'); 

        return redirect('home/define/section');

    }

    
}

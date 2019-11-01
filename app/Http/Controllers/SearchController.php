<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_name(){
        return view('dashboard-pages/search_name');
    }

    public function search_name(Request $request){

        $fetch = $request->input('search');

        $user = DB::table('new_registers')->where('std_name',$fetch)->orWhere('std_reg_id', $fetch)->get();

        if(count($user)>0){
            return view("dashboard-pages/search_name")->with('data',$user);
        }else{
            Session::flash('data_not', 'Record is not Found'); 
            return view("dashboard-pages/search_name");
        }

    }

    public function show_session(){
        $session = DB::table('create_sessions')->get();
        return view('dashboard-pages/search_sess')->with('sess',$session);
    }

    public function search_session(Request $request){
        $fetch = $request->input('std_session');
        $session = DB::table('create_sessions')->orderBy('combines_string','DESC')->get();
        $user = DB::table('new_registers')->where('session',$fetch)->get();
        if(count($user)>0){
            return view('dashboard-pages/search_sess')->with([
                'data'=>$user,
                'sess'=>$session
            ]);
            // echo"FOund";
        }else{
            Session::flash('data_not_found', 'Record Not Found!');
            return view('dashboard-pages/search_sess')->with([
                'sess'=>$session
            ]);;
            // echo"Not FOund";
        }
        
    }

    public function show_class(){
        return view('dashboard-pages/search_class');
    }

    public function search_class(Request $request){
        $class = $request->input('std_class');
        $section = $request->input('std_section');
        
        $user = DB::table('new_registers')->where('std_class',$class)->where('std_section', $section)->get();
        if(!count($user)<1){
            return view('dashboard-pages/search_class')->with('data',$user);
        }else{
            Session::flash('not_found', 'Record Not Found!');
            return redirect()->route('search_class');
        }
    }

    public function show_history(){
        return view('dashboard-pages/get_fee_history');
    }

    public function get_history(Request $request){
        $reg = $request->input('std_reg_id');
        $class = $request->input('class');
        $month = $request->input('fee_month');
        $user = DB::table('student_fee_histories')->where('std_reg_id',$reg)->get();
        if (count($user)>0) {
            
            if($class=='All' && $month=='All'){
                $user = DB::table('student_fee_histories')->where('std_reg_id',$reg)->get();
                return view('dashboard-pages/get_fee_history')->with('data',$user);
            }elseif($class=='All'){
                $user = DB::table('student_fee_histories')->where(['std_reg_id'=>$reg,'fee_submonth'=>$month])->get();
                return view('dashboard-pages/get_fee_history')->with('data',$user);
            }elseif($month=='All'){
                $user = DB::table('student_fee_histories')->where(['std_reg_id'=>$reg,'std_class'=>$class])->get();
                return view('dashboard-pages/get_fee_history')->with('data',$user);
            }else{
                $user = DB::table('student_fee_histories')
                            ->where([
                                'std_reg_id'=>$reg,
                                'std_class'=>$class,
                                'fee_submonth'=>$month
                            ])->get();
                return view('dashboard-pages/get_fee_history')->with('data',$user);
            }
        
        }else{
            Session::flash('not_found', 'Record Not Found!');
            return view('dashboard-pages/get_fee_history')->with('data',$user);
        }
        
    }

}

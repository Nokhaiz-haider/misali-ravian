<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\NewRegister;
use App\Model\CreateSession;
use App\Model\StudentFee;
use App\Model\DefineFee;
use App\Model\StudentClassHistory;
use Illuminate\Support\Facades\DB;

class NewRegController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $session = CreateSession::get();
        $last_id = DB::table('new_registers')->latest('id')->first();
        if(empty($last_id)){
            $last_id = 0; 
            return view('dashboard-pages/new-reg')->with([
                'data'=>$session,
                'new_reg_id'=>$last_id
            ]);
        }else{
            return view('dashboard-pages/new-reg')->with([
                'data'=>$session,
                'new_id'=>$last_id
            ]);

        }
       
        // $new_id = $last_id;
        // dd($last_id->std_reg_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $reg_id = $request->input('std_regid');
        $now = Carbon::now();
        $post = new NewRegister();
        $post->std_reg_id = $reg_id;
        $post->std_name = $request->input('std_name');
        $post->std_father_name = $request->input('std_fname');
        $post->std_religion = $request->input('std_religion');
        $post->std_dob = $request->input('std_dob');
        $post->std_gender = $request->input('std_gender');
        $post->std_mobile = $request->input('std_mobile');
        $post->std_telephone = $request->input('std_telephone');
        $post->std_address = $request->input('std_address');
        $post->std_nic = $request->input('std_nic');
        $post->std_father_nic = $request->input('std_father_nic');
        $post->std_campus = $request->input('std_campus');
        $post->std_hostel = $request->input('std_hostel');
        $post->std_transport = $request->input('std_transport');
        $post->std_fee_conce = $request->input('std_fee_conce');
        $post->std_medium = $request->input('std_medium');
        $post->std_class = $request->input('std_class');
        $post->std_section = $request->input('std_section');
        $post->session = $request->input('std_session');
        $post->std_course = $request->input('std_course');
        $post->std_issue_date = $request->input('issue_date');
        $post->std_due_date = $request->input('due_date');
        $post->std_admission_status = $request->input('std_admission_status');
        $post->prev_inst_name = $request->input('prev_inst_name');
        $post->prev_inst_leave = $request->input('prev_inst_leave');
        $post->class_left = $request->input('class_left');
        $post->remarks = $request->input('remarks');
        
        $std_fee = DefineFee::where('class_name',$post->std_class)->get();

        foreach($std_fee as $data){
            
            $fee = new StudentFee();
            $fee->std_reg_id = $post->std_reg_id;
            $fee->std_class = $data->class_name;
            $fee->fee_month = $now->month;
            $fee->fee_year = $now->year;
            $fee->fee_type = $data->fee_type;
            $fee->fee_amount = $data->fee_amount;
            $fee->save();
        }

        $class = new StudentClassHistory();
        $class->std_reg_id = $post->std_reg_id;
        $class->current_class = $post->std_class;
        $class->current_year = $now->year;
        $class->save();

        

        if($post->save()){
            Session::flash('register_ok', 'New Registration has been Created!');
        }
        // $current_status = "true";
        // $user = DB::table('student_fees')->where('std_reg_id',$reg_id)->get();
        // return view('dashboard-pages/set_individual_fee')->with([
        //     'fee'=>$user,
        //     'status'=>$current_status
        // ]);
        return redirect()->route('new-register.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = NewRegister::where('id',$id)->get();
        return view('dashboard-pages/update-reg')->with('data',$session);
        #return $session;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = NewRegister::find($id);

        $post->std_reg_id = $request->input('std_regid');
        $post->std_name = $request->input('std_name');
        $post->std_father_name = $request->input('std_fname');
        $post->std_religion = $request->input('std_religion');
        $post->std_dob = $request->input('std_dob');
        $post->std_gender = $request->input('std_gender');
        $post->std_mobile = $request->input('std_mobile');
        $post->std_telephone = $request->input('std_telephone');
        $post->std_address = $request->input('std_address');
        $post->std_nic = $request->input('std_nic');
        $post->std_father_nic = $request->input('std_father_nic');
        $post->std_campus = $request->input('std_campus');
        $post->std_hostel = $request->input('std_hostel');
        $post->std_transport = $request->input('std_transport');
        $post->std_fee_conce = $request->input('std_fee_conce');
        $post->std_medium = $request->input('std_medium');
        $post->std_course = $request->input('std_course');
        $post->std_issue_date = $request->input('issue_date');
        $post->std_due_date = $request->input('due_date');
        $post->std_admission_status = $request->input('std_admission_status');
        $post->prev_inst_name = $request->input('prev_inst_name');
        $post->prev_inst_leave = $request->input('prev_inst_leave');
        $post->class_left = $request->input('class_left');
        $post->remarks = $request->input('remarks');

        if($post->save()){
            Session::flash('update_ok', 'Registration has been Updated!');
        }


        return redirect()->route('new-register.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_id = NewRegister::where('id', $id)->delete();
        Session::flash('delete_ok', 'Record has been Deleted');
        return redirect()->route('search_name');
    }
}

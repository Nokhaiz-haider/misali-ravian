<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\DefineFee;
use App\Model\StudentFee;
use App\Model\TotalFeeClasswise;
use Session;
use Carbon\Carbon;

class FeeController extends Controller
{
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
        
        return view('dashboard-pages/define-fee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = $request->input('class_name');
        $data = DefineFee::where('class_name',$class)->count();
        
        if($data){
            $delete_id = DefineFee::where('class_name', $class)->delete();
        }

        $total_fee_calculated = 0;

        $fee = ['Admission Fee','Tution Fee','Exam Fee Annual','Hostel Fee','Special Facility Fee','Promotion Charges','Security(Refundable)','Prospectus Fee','Transport Fee','Board Registration','Medical Charges','Board Examination Fee'];
        for ($i=0; $i < sizeof($fee); $i++) { 
            $post = new DefineFee();
            
            $post->class_name = $request->input('class_name');
            $post->fee_type = $fee[$i];
            $post->fee_amount = $request->input('fee_amount_'.$i);
            $post->fee_month = $request->input('fee_month');
            $post->fee_year = $request->input('fee_year');
            
            $total_fee_calculated += $request->input('fee_amount_'.$i);

            $post->save();
            # code...
        }

        $total = new TotalFeeClasswise();
        $total->class_name = $class;
        $total->fee_month = $request->input('fee_month');
        $total->total_fee_amount = $total_fee_calculated;
        $total->save();

        Session::flash('define_fee', 'Fee has been Defined!'); 
        return redirect('home/fee/create');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $std_reg_id)
    {
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;
        $data = StudentFee::where('std_reg_id',$std_reg_id)->get();
        $fee = ['Admission Fee','Tution Fee','Exam Fee Annual','Hostel Fee','Special Facility Fee','Promotion Charges','Security(Refundable)','Transport Fee','Board Registration','Medical Charges','Board Examination Fee'];
        for ($i=0; $i < sizeof($fee); $i++) { 
            $post = StudentFee::find($data[$i]->id);
            $post->std_reg_id = $data[$i]->std_reg_id;
            $post->std_class = $data[$i]->std_class;
            $post->fee_month = $month;
            $post->fee_year = $year;
            $post->fee_type = $fee[$i];
            $post->fee_amount = $request->input('amount_'.$i);
            $post->save();
        }
        return redirect('home/set/individual-fee');
        // for ($i=0; $i < sizeof($fee); $i++) { 
        //     echo $request->input('amount_'.$i)."<br>";
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

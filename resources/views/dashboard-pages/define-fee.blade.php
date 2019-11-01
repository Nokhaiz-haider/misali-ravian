@extends('dashboard-inc.header')
@section('title','Define Fee | MIS')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Define Fees
        
      </h1>
      @if (Session::has('define_fee'))
      <div class="row">
      <div class="col-md-6" style="margin-top:10px;">
        <div style="margin-bottom: auto;" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> {{Session::get('define_fee')}}
        </div>
      </div>
    </div>
      @endif
      {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">defina</a></li>
        <li class="active">General Elements</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Select Fee Type <small>And Enter Fee Amount</small></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form role="form" method="POST" action="{{route('fee.store')}}">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="well" style="height:auto;">
                  <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Select Class</label>
                            <select class="form-control" required name="class_name">
                                <option selected disabled>Select Class</option>
                                <option value="P.G">P.G</option>
                                <option value="Nursery">Nursery</option>
                                <option value="Prep">Prep</option>
                                <option value="1">Class - 1st</option>
                                <option value="2">Class - 2nd</option>
                                <option value="3">Class - 3th</option>
                                <option value="4">Class - 4th</option>
                                <option value="5">Class - 5th</option>
                                <option value="6">Class - 6th</option>
                                <option value="7">Class - 7th</option>
                                <option value="8">Class - 8th</option>
                                <option value=9>Class - 9th</option>
                                <option value="10">Class - 10th</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label>Enter Fee Month</label>
                              <select class="form-control" required name="fee_month" style="width: 100%;">
                                <option value="All" selected>For All Months</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                              </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Enter Fee Year</label>
                            <input type="number" required name="fee_year" placeholder="Enter Fee Year" class="form-control">
                        </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                    
                 
                    <div class="table-responsive">
                     
                             <table style="width: unset;margin-left: auto;margin-right: auto;table-layout: auto;border-width: thick;border-radius: 10px;border: outset;" id="search_table" class="table table-bordered table-hover">
                                 <thead>
                                 <tr style="border-bottom: groove;border-top: groove;background: #5da9c5;">
                                 <th>Serial No#</th>
                                 <th>Fee Type</th>
                                 <th>Amount</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                    <?php $sr=1;
                                          $fee = ['Admission Fee','Tution Fee','Exam Fee Annual','Hostel Fee','Special Facility Fee','Promotion Charges','Security(Refundable)','Van Fee(3918)','Van Fee(ND 495)','Van Fee(JGA 5535)','Board Registration','Medical Charges','Board Examination Fee'];
                                    ?>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                        <tr>
                                            <td>{{$sr}}</td>
                                            <td>{{$fee[$i]}}</td>
                                            <td><input type="text" required class="form-control" name="fee_amount_{{$i}}"></td>
                                        </tr>
                                        <?php $sr++; ?>
                                        @endfor
                                         {{-- @foreach ($fee as $data)
                                             <tr>
                                                 <td>1</td>
                                                 <td>{{$data->fee_type}}</td>
                                                 <td><input type="text" class="form-control" value="{{$data->fee_amount}}" name="{{$data->fee_amount}}"></td>
                                             </tr>
                                         @endforeach --}}
                                     
                                 </tbody>
                             </table>
                             
                         
                     </div>

                </div>   
                     
                      
                
                {{-- <div class="form-group">
                  <label for="exampleInputPassword1">Enter Fee Amount</label>
                  <input type="number" name="fee_amount" required class="form-control" id="exampleInputPassword1" placeholder="Enter Session's End Year">
                </div>
                --}}
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <div style="text-align:center;">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
      </form>
          </div>

        </div>
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
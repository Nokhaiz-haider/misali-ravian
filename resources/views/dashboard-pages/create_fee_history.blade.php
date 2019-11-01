@extends('dashboard-inc.header')
@section('title','Create Fee History | MIS')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Student Fee History
        
      </h1>
      @if (Session::has('history_ok'))
      <div class="row">
      <div class="col-md-6" style="margin-top:10px;">
        <div style="margin-bottom: auto;" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> {{Session::get('history_ok')}}
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
              <h3 class="box-title">Enter Student Reg-ID <small>And Set Fee Record</small></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form role="form" method="POST" action="{{route('history.store')}}">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="row">
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label>Enter Student Reg - ID</label>
                                    <input type="text" required name="std_reg_id" placeholder="Enter Registration ID" class="form-control">
                                </div>
                            </div>
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
                              <option selected disabled>Select Month</option>
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
                </div>
                <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Enter Fee Year</label>
                          <input type="number" required name="fee_year" placeholder="Enter Fee Year" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Enter Fee Amount</label>
                          <input type="number" required name="fee_amount" placeholder="Enter Fee Amount" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label>Fee Submission Date</label>
                          <input type="date" required name="fee_subdate"  class="form-control">
                      </div>
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
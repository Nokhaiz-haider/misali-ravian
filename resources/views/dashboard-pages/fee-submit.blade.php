@extends('dashboard-inc.header')
@section('title','Submit Fee | Dashboard')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Submit Student Fee  
            <small>By Searching Him/Her</small>
          </h1>
          @if (Session::has('not_found'))
                    <div class="row">
                        <div class="col-md-6" style="margin-top:10px;">
                        <div style="margin-bottom: auto;" class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Sorry!</strong> {{Session::get('not_found')}}
                        </div>
                        </div>
                    </div>
                @endif
        </section>
        
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    
                    <div style="height: auto;width:auto;" class="well">
                        <form action="{{route('submit_fee')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Enter Student's Admission ID</label>
                                    <input type="text" class="form-control" value="<?php if(isset($_POST['std_reg_id'])){echo $_POST['std_reg_id'];}else{ echo''; } ?>" name="std_reg_id" placeholder="Enter Admission-ID">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div style="text-align:center;" class="col-md-4">
                                <input type="submit"  name="submit" value="Find Out" class="btn btn-primary">
                            </div>        
                        </div>
                        </form>
                    </div>
                </div>

              
                    
                <!-- /.box-header -->
                    <div style="margin-top: -25px;" class="box-body">
                        <div class="table-responsive">    
                            <table style="table-layout: fixed;border-width: thick;border-radius: 10px;border: outset;" id="search_table" class="table table-bordered table-hover">
                                <thead>
                                <tr style="border-bottom: groove;border-top: groove;background: #ec9732;">
                                <th style="text-align:center;">Name</th>
                                <th style="text-align:center;">Month</th>
                                <th style="text-align:center;">Class</th>
                                <th style="text-align:center;">Total Amount</th>
                                <th style="text-align:center;">Concesssion</th>
                                <th style="text-align:center;">Amount Recieved</th>
                                <th style="text-align:center;">Pending Amount</th>
                                <th style="text-align:center;">Amount Left(if any)</th>
                                <th style="text-align:center;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($data))
                                        @foreach ($data as $std)
                                          <form action="{{route("submit")}}" method="get">
                                            <tr>
                                            <td style="text-align:center;"><strong>{{$std->std_name}}</strong></td>
                                            <td>
                                                <select class="form-control" required name="fee_month" style="width: 100%;">
                                                    <option selected disabled>Select</option>
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
                                            </td>
                                            <td>
                                                <select class="form-control" required id="class_name" name="class_name">
                                                    <option selected disabled>Select</option>
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
                                            </td>
                                            <td><input type="number" class="form-control" id="fee_amount" name="fee_amount"></td>
                                            <td><input type="number" class="form-control" name="fee_conce"></td>
                                            <td><input type="number" class="form-control" name="fee_recieved"></td>
                                            <td><input type="number" class="form-control" name="fee_pending"></td>
                                            <td><input type="number" class="form-control" name="fee_left"></td>
                                            <td><button style="display: block;margin: auto;" type="submit" class="btn btn-success">Submit</button></td>
                                           
                                            {{-- @php
                                                $date = $std->fee_subdate;
                                                $dateObject = \Carbon\Carbon::createFromFormat('d/m/Y', $date); 
                                                echo $dateObject;
                                            @endphp --}}
                                            {{-- <td>{{$std->fee_subdate}}</td> --}}
                                            </tr>
                                          </form>
                                        @endforeach
                                    @endif 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
              
           
        </section>
        <!-- /.content -->
      </div>

      <script>
        $(document.body).on('change',"#class_name",function (e) {
       //doStuff
       var optVal= $("#class_name option:selected").val();
       //alert(optVal);
       $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/home/show-total-fee/'+optVal,
            data: {
                'id': optVal
            },
            success: function (data) {
                
                 var $total_fee = $('#total_fee');
                 $total_fee.empty();
                 if(typeof data[0].total_fee_amount === 'undefined'){
                    document.getElementById("fee_amount").value = "";
                 }
                 else{
                    document.getElementById("fee_amount").value = data[0].total_fee_amount;
                 }
                //console.log(data);
            }
        });
    });
    </script>
@endsection
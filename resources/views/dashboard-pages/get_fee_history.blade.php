@extends('dashboard-inc.header')
@section('title','Get Fee History | Dashboard')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Get Student's Fee History 
            <small>By Multiple Options</small>
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
                    
                    <div style="height: auto;" class="well">
                        <form action="{{route('get_history')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Enter Student's Registration ID</label>
                                    <input type="text" class="form-control" value="<?php if(isset($_POST['std_reg_id'])){echo $_POST['std_reg_id'];}else{ echo''; } ?>" name="std_reg_id" placeholder="Enter Reg-ID">
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                            <label>Select Class</label>
                                            <select class="form-control" name="class" style="width: 100%;" required>
                                              <option value="All" selected>For All Classes</option>
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
                                    <label>Select Month</label>
                                        <select class="form-control" required name="fee_month" style="width: 100%;" required>
                                        <option value="All" selected>For All Month</option>
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
                            <div style="text-align:center;" class="col-md-12">
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
                                <th>Reg-ID</th>
                                <th>Class</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Amount</th>
                                <th>Concesssion</th>
                                <th>Submission Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($data))
                                        @foreach ($data as $std)
                                            <tr>
                                            <td>{{$std->std_reg_id}}</td>
                                            <td>{{$std->std_class}}</td>
                                            <td>{{$std->fee_submonth}}</td>
                                            <td>{{$std->fee_subyear}}</td>
                                            <td>{{$std->fee_amount}}</td>
                                            <td>{{$std->fee_amount}}</td>
                                            {{-- @php
                                                $date = $std->fee_subdate;
                                                $dateObject = \Carbon\Carbon::createFromFormat('d/m/Y', $date); 
                                                echo $dateObject;
                                            @endphp --}}
                                            <td>{{$std->fee_subdate}}</td>
                                            </tr>
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
            url: '/home/show-sections/'+optVal,
            data: {
                'id': optVal
            },
            success: function (data) {
                // the next thing you want to do 
                var $section = $('#section_name');
                $section.empty();
                // $('#city').empty();
                for (var i = 0; i < data.length; i++) {
                     $section.append('<option value=' + data[i].section_name + '>' + data[i].section_name + '</option>');
                 }
    
                // //manually trigger a change event for the contry so that the change handler will get triggered
                // $country.change();
                //console.log(data);
            }
        });
    });
    </script>
@endsection
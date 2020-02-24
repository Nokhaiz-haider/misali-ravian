@extends('dashboard-inc.header')
@section('title','Set Individual Fee | Dashboard')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Set Fee For Individual Student 
            @if (!isset($status))
              
              <small>Search By Using Registration ID</small>
                
            @endif
          </h1>
          @if (Session::has('data_not'))
                    <div class="row">
                        <div class="col-md-6" style="margin-top:10px;">
                        <div style="margin-bottom: auto;" class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Sorry!</strong> {{Session::get('data_not')}}
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
                   @if (!isset($status))
                        
                    <div style="height: auto" class="well">
                        <form action="{{route('set_individual')}}" method="POST">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="">Enter Admission Number</label>
                                    <input type="text" value="<?php if(isset($_POST['search'])){echo $_POST['search'];} ?>"  name="search" placeholder="Enter Reg-ID" class="form-control">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                  <input type="submit"  name="submit" value="Find Out" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                   @endif 

                </div>

              
                    
                <!-- /.box-header -->
                    <div style="margin-top: -25px;" class="box-body">
                    @if (!empty($fee))
                      {{-- <div style="margin-top: inherit;text-align:center;">
                        <h3>Registration ID# <span>{{$fee[0]->std_reg_id}}</span></h3>
                        <h3>Class Name: <span>{{$fee[0]->std_class}}</span></h3>
                      </div><hr> --}}
                        <div class="table-responsive">
                           
                            
                                <table style="width: unset;margin-left: auto;margin-right: auto;table-layout: auto;border-width: thick;border-radius: 10px;border: outset;" id="search_table" class="table table-bordered table-hover">
                                    <thead>
                                    <tr style="border-bottom: groove;border-top: groove;background: #5da9c5;">
                                    <th>Sr No#</th>
                                    <th>Fee Type</th>
                                    <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                       <?php $i=0; ?> 
                                       <form action="{{route('fee.update',$fee[0]->std_reg_id)}}" method="POST">    
                                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                            <input type="hidden" name="_method" value="put" />
                                            {{ csrf_field() }}
                                            
                                            @foreach ($fee as $data)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$data->fee_type}}</td>
                                                    <td><input type="text" class="form-control" value="{{$data->fee_amount}}" name="amount_{{$i}}"></td>
                                                </tr>
                                                <?php  $i++; ?>
                                            
                                            @endforeach
                                        
                                    </tbody>
                                </table>
                                <div style="text-align:center;">
                                    <input type="submit" value="Update" class="btn btn-success" >
                                </div>
                            </form>
                          </div>
                          @endif
                    </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
              
           
        </section>
        <!-- /.content -->
      </div>

      
@endsection
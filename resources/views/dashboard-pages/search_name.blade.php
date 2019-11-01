@extends('dashboard-inc.header')
@section('title','Search Student | Dashboard')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Search Student 
            <small>By Name or By Registration ID</small>
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
                    
                    <div style="height: 73px;" class="well">
                        <form action="{{route('search_name')}}" method="POST">
                        {{ csrf_field() }}
                            <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <input type="text" value="<?php if(isset($_POST['search'])){echo $_POST['search'];} ?>"  name="search" placeholder="Enter Student Name or Reg-ID" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
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
                                <th>Name</th>
                                <th>Class</th>
                                <th>Father Name</th>
                                <th>Set Fee</th>
                                <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($data))
                                        @foreach ($data as $std)
                                            <tr>
                                            <td>{{$std->std_reg_id}}</td>
                                            <td>{{$std->std_name}}</td>
                                            <td>{{$std->std_class}}</td>
                                            <td>{{$std->std_father_name}}</td>
                                            <td><a class="btn btn-success" href="">Click Here</a></td>
                                            <td><a href="{{route('new-register.edit',$std->id)}}" class="btn btn-primary">Update</a>
                                              <form style="display: contents;" action="{{route('new-register.destroy',$std->id)}}" method="POST">
                                                <button class="btn btn-danger">Delete</button>
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                              </form>
                                            </td>
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

      
@endsection
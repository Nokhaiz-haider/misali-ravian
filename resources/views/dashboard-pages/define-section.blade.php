@extends('dashboard-inc.header')
@section('title','Define Section | MIS')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Define Sections
        
      </h1>
      @if (Session::has('define_section'))
      <div class="row">
      <div class="col-md-6" style="margin-top:10px;">
        <div style="margin-bottom: auto;" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> {{Session::get('define_section')}}
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
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Class Sections <small>According to Classes</small></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form role="form" method="POST" action="{{route('define-section')}}">
            {{ csrf_field() }}
              <div class="box-body">
                    <div class="form-group">
                            <label>Select Class</label>
                            <select class="form-control" name="class" style="width: 100%;">
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
                    
                <div class="form-group">
                  <label for="exampleInputPassword1">Enter Section Name</label>
                  <input type="text" name="section_name" required class="form-control" id="exampleInputPassword1" placeholder="Enter Section's Name">
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
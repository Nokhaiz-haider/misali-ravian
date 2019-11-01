@extends('dashboard-inc.header')
@section('title','Create Session | MIS')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Session 
        
      </h1>
      @if (Session::has('session_submit'))
      <div class="row">
        <div class="col-md-6" style="margin-top:10px;">
          <div style="margin-bottom: auto;" class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Success!</strong> {{Session::get('session_submit')}}
          </div>
        </div>
      </div>
      @endif
      @if (Session::has('session_already'))
      <div class="row">
        <div class="col-md-6" style="margin-top:10px;">
          <div style="margin-bottom: auto;" class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Sorry!!!</strong> {{Session::get('session_already')}}
          </div>
        </div>
      </div>
      @endif
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enter Session Years <small>(From - To)</small></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <form role="form" method="POST" action="{{route('create-session')}}">
            {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">From(YYYY)</label>
                  <input type="number" name="session_from" required class="form-control" id="exampleInputEmail1" placeholder="Enter Session's Start Year">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">To(YYYY)</label>
                  <input type="number" name="session_to" required class="form-control" id="exampleInputPassword1" placeholder="Enter Session's End Year">
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
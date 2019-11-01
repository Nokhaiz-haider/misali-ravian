@extends('dashboard-inc.header')
@section('title','Search Student | Dashboard')
@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Search Students 
            <small>By Class Name And Section</small>
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
                    
                    <div style="height: 73px;" class="well">
                        <form action="{{route('search_class')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" id="class_name" name="std_class" style="width: 100%;">
                                        <option selected disabled><?php if(isset($_POST['std_class'])){echo $_POST['std_class'];}else{echo"Select Class";} ?></option>
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
                                        <option value="9">Class - 9th</option>
                                        <option value="10">Class - 10th</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <select name="std_section" class="form-control" id="section_name">
                                    <option selected disabled><?php if(isset($_POST['std_section'])){echo $_POST['std_section'];}else{echo"Select Section";} ?></option>
                                </select>
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
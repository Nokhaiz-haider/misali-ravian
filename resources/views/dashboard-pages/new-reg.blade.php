@extends('dashboard-inc.header')
@section('title','New Registration | MIS')
@section('content')

<div class="content-wrapper">
    
            <section class="content-header">
                <h1>
                  New Registration 
                  
                </h1>
                @if (Session::has('register_ok'))
                    <div class="row">
                        <div class="col-md-6" style="margin-top:10px;">
                        <div style="margin-bottom: auto;" class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> {{Session::get('register_ok')}}
                        </div>
                        </div>
                    </div>
                @endif
            </section>

        <section class="content">
          <form method="post" action="{{route('new-register.store')}}">
              {{ csrf_field() }}
                    <div class="box box-default">
                        <div class="box-header with-border">
                          <h3 class="box-title"><b>Student's Personal Information</b></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Registration ID</label>
                              <input type="text" required name="std_regid" value="@php if(isset($new_reg_id)){echo ++$new_reg_id; } else {echo ++$new_id->std_reg_id;} @endphp" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Student Name</label>
                                <input type="text" required name="std_name" placeholder="Student's Full Name" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Father Name</label>
                                <input type="text" required name="std_fname" placeholder="Student's Father Name" class="form-control">
                              </div>
                            </div>
                          </div>

                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Religion</label>
                                <input type="text" class="form-control" readonly name="std_religion" value="Islam">
                                {{-- <select required name="std_religion" class="form-control">
                                  <option value="Islam" selected disabled>Islam</option>
                                </select> --}}
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" required name="std_dob" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" required name="std_gender" >
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                              </div>
                            </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Mobile Number#</label>
                                        <input type="text" required maxlength="12"  name="std_mobile" placeholder="03xx-xxxxxxx" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Telephone Number#</label>
                                        <input type="text"  required name="std_telephone" placeholder="Student's Home Telephone" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                            <label>Address#</label>
                                            <input type="text" required  name="std_address" placeholder="Student's Complete Address" class="form-control">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label>NIC or B-Form Number</label>
                                            <input type="text" required maxlength="15"  name="std_nic" placeholder="xxxxx-xxxxxxx-x" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label>Father's NIC Number#</label>
                                            <input type="text" maxlength="15"  name="std_father_nic" placeholder="xxxxx-xxxxxxx-x" class="form-control">
                                          </div>
                                        </div>
                                      </div>
                            </div>
                        <!-- /.box-body -->
                       
                    </div>
                    <div class="box box-default">
                        <div class="box-header with-border">
                          <h3 class="box-title"><b>Information Given By Office</b></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Campus</label>
                                <select name="std_campus" class="form-control">
                                  <option value="" selected disabled>Select Campus</option>
                                  <option value="Junior">Junior</option>
                                  <option value="Senior">Senior</option>
                                  <option value="Girls">Girls</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Hostel</label>
                                <input type="text"  name="std_hostel" placeholder="Enter Hostel Name" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Transport</label>
                                      <select class="form-control" name="std_transport" >
                                          <option value="" selected disabled>Select Transport</option>
                                          <option>None</option>
                                          <option>VAN - 3918</option>
                                          <option>VAN - ND 495</option>
                                          <option>VAN - JG 5535</option>
                                      </select>
                                    </div>
                                  </div>
                          </div>

                        <div class="row">
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Concession</label>
                                <select class="form-control" class="form-control" name="std_fee_conce" >
                                    <option value="" selected disabled>Select</option>
                                    <option>None</option>
                                    <option>Deserving</option>
                                    <option>Teacher's Child</option>
                                    <option>Late Person's Son</option>
                                    <option>Staff Child</option>
                                    <option>Class-4 Employee Child</option>
                                    <option>Player</option>
                                    <option>Kinship</option>
                                    <option>Due to Marks</option>
                                    <option>Free Education</option>
                                    <option>Debator / Speakor</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Medium</label>
                                      <select class="form-control" name="std_medium" >
                                            <option value="" class="form-control" selected disabled>Select</option>
                                            <option>English</option>
                                            <option>Urdu</option>
                                      </select>
                                    </div>
                                  </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                    <label>Select Class</label>
                                                    <select class="form-control" id="class_name" name="std_class" style="width: 100%;">
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
                                                      <option value="9">Class - 9th</option>
                                                      <option value="10">Class - 10th</option>
                                                    </select>
                                            </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label>Section</label>
                                        <select name="std_section" class="form-control" id="section_name"></select>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label>Session</label>
                                        <select name="std_session" class="form-control" id="session_name">
                                          <option value="" selected disabled>Select Session</option>
                                          @if (isset($data))
                                              @foreach ($data as $post)
                                        <option value="{{$post->session_from}}-{{$post->session_to}}">{{$post->session_from}}-{{$post->session_to}}</option>
                                              @endforeach
                                          @endif
                                        </select>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Course</label>
                                                <input type="text" class="form-control" name="std_course" placeholder="Enter Course Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Issue Date</label>
                                                <input type="date" class="form-control" name="issue_date">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Due Date</label>
                                                <input type="date" class="form-control" name="due_date">
                                            </div>
                                        </div>
                                  </div>
                                  <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label >Admission Status</label>
                                                    <div class="form-control radio">
                                                        <label><input type="radio" name="std_admission_status" value="Registration" checked>Registration</label>
                                                    </div>
                                                    <div class="form-control radio">
                                                        <label><input type="radio" name="std_admission_status" value="Direct Admission">Direct Admission</label>
                                                    </div>
                                            </div>
                                        </div>
                                  </div>
                            </div>
                            
                    </div>
                    <div class="box box-default">
                        <div class="box-header with-border">
                          <h3 class="box-title"><b>Student's Personal History</b></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Previuos Institute's Name</label>
                                <input type="text"  name="prev_inst_name" placeholder="Previuos Institute's Name" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Leaving Date</label>
                                <input type="date"  name="prev_inst_leave" placeholder="Enter Leaving Date" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Left in which class</label>
                                      <select class="form-control" name="class_left" >
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
                                          <option value="9">Class - 9th</option>
                                          <option value="10">Class - 10th</option>
                                      </select>
                                    </div>
                                  </div>
                          </div>

                          <div class="row">
                              
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Remarks</label>
                                  <textarea class="form-control" name="remarks" id="" cols="30" rows="6"></textarea>
                                </div>
                              </div>
                              
                            </div>
                        </div>
                        <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                        <!-- /.box-body -->
          </form>
          
        </section>
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
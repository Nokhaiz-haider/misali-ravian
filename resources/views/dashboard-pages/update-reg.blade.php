@extends('dashboard-inc.header')
@section('title','New Registration | MIS')
@section('content')

<div class="content-wrapper">
    
            <section class="content-header">
                <h1>
                  Update Existing Registration 
                  
                </h1>
                @if (Session::has('update_ok'))
                    <div class="row">
                        <div class="col-md-6" style="margin-top:10px;">
                        <div style="margin-bottom: auto;" class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> {{Session::get('update_ok')}}
                        </div>
                        </div>
                    </div>
                @endif
            </section>

        <section class="content">
    @if (count($data)>0)
        @foreach ($data as $std)
          <form method="post" action="{{route('new-register.update',$std->id)}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
				        <input type="hidden" name="_method" value="put" />
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
                              <input type="text" required name="std_regid" value="{{$std->std_reg_id}}" placeholder="Student's Registration ID" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Student Name</label>
                                <input type="text" required name="std_name" value="{{$std->std_name}}" placeholder="Student's Full Name" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Father Name</label>
                                <input type="text" required name="std_fname" value="{{$std->std_father_name}}" placeholder="Student's Father Name" class="form-control">
                              </div>
                            </div>
                          </div>

                        <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Religion</label>
                                <select required name="std_religion" class="form-control">
                                 @if ($std->std_religion=='')
                                    <option selected disabled></option>
                                    <option value="Islam">Islam</option>
                                    <option value="Christianity">Christianity</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Minority">Other Minority</option>
                                 @elseif ($std->std_religion=='Islam')
                                    <option value="Islam">Islam</option>
                                    <option value="Christianity">Christianity</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Minority">Other Minority</option>
                                 @elseif ($std->std_religion=='Christianity')
                                    <option value="Christianity">Christianity</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Minority">Other Minority</option>
                                 @elseif ($std->std_religion=='Hinduism')
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Christianity">Christianity</option>
                                    <option value="Minority">Other Minority</option>
                                 @elseif ($std->std_religion=='Minority')
                                    <option value="Minority">Other Minority</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Christianity">Christianity</option>
                                    <option value="Hinduism">Hinduism</option>
                                 @endif
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Date of Birth</label>
                              <input type="date" value="{{$std->std_dob}}" required name="std_dob" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" required name="std_gender" >
                                    @if ($std->std_gender=='')
                                        <option selected disabled>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    @elseif ($std->std_gender=='Male')
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    @elseif($std->std_gender=='Female')
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                        <option value="Other">Other</option>
                                    @elseif($std->std_gender=='Other')
                                        <option value="Other">Other</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    @endif
                                    
                                </select>
                              </div>
                            </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Mobile Number#</label>
                                      <input type="text" required maxlength="12" value="{{$std->std_mobile}}" name="std_mobile" placeholder="03xx-xxxxxxx" class="form-control">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Telephone Number#</label>
                                        <input type="text"  required name="std_telephone" value="{{$std->std_telephone}}" placeholder="Student's Home Telephone" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                            <label>Address#</label>
                                            <input type="text" required value="{{$std->std_address}}" name="std_address" placeholder="Student's Complete Address" class="form-control">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label>NIC or B-Form Number</label>
                                            <input type="text" required maxlength="15" value="{{$std->std_nic}}" name="std_nic" placeholder="xxxxx-xxxxxxx-x" class="form-control">
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label>Father's NIC Number#</label>
                                            <input type="text" maxlength="15" value="{{$std->std_father_nic}}" name="std_father_nic" placeholder="xxxxx-xxxxxxx-x" class="form-control">
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
                                <input type="text" value="{{$std->std_campus}}" name="std_campus" placeholder="Enter Campus Name" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Hostel</label>
                                <input type="text" value="{{$std->std_hostel}}" name="std_hostel" placeholder="Enter Hostel Name" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Transport</label>
                                      <select class="form-control" name="std_transport" >
                                        @if ($std->std_transport=='')
                                            <option selected disabled>Select Transport</option>
                                            <option>None</option>
                                            <option>VAN - 3918</option>
                                            <option>VAN - ND 495</option>
                                            <option>VAN - JG 5535</option>
                                        @elseif ($std->std_transport=='None')
                                            <option selected disabled>Select Transport</option>
                                            <option>None</option>
                                            <option>VAN - 3918</option>
                                            <option>VAN - ND 495</option>
                                            <option>VAN - JG 5535</option>
                                        @elseif ($std->std_transport=='VAN - 3918')
                                            <option>None</option>
                                            <option selected>VAN - 3918</option>
                                            <option>VAN - ND 495</option>
                                            <option>VAN - JG 5535</option>
                                        @elseif ($std->std_transport=='VAN - ND 495')
                                            <option>None</option>
                                            <option selected>VAN - ND 495</option>
                                            <option>VAN - 3918</option>
                                            <option>VAN - JG 5535</option>
                                        @elseif ($std->std_transport=='VAN - JG 5535')
                                          <option>None</option>
                                          <option>VAN - 3918</option>
                                          <option>VAN - ND 495</option>
                                          <option selected>VAN - JG 5535</option>
                                        @endif
                                          
                                      </select>
                                    </div>
                                  </div>
                          </div>

                        <div class="row">
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Fee Concession</label>
                                <select class="form-control" class="form-control" name="std_fee_conce" >
                                    @if ($std->std_fee_conce=='')
                                    <?php $fee = ['None','Deserving','Teacher\'s Child','Late Person\'s Son','Staff Child','Class-4 Employee Child','Player','Kinship','Due to Marks','Free Education','Debator / Speakor']; ?>
                                        <option selected disabled>Select Fee Concession Type</option>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                            <option value="{{$fee[$i]}}">{{$fee[$i]}}</option>
                                        @endfor
                                    @elseif ($std->std_fee_conce=='None')
                                    <?php $fee = ['None','Deserving','Teacher\'s Child','Late Person\'s Son','Staff Child','Class-4 Employee Child','Player','Kinship','Due to Marks','Free Education','Debator / Speakor']; ?>
                                        <option selected disabled>Select Fee Concession Type</option>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                            <option value="{{$fee[$i]}}">{{$fee[$i]}}</option>
                                        @endfor
                                    @elseif ($std->std_fee_conce=='Deserving')
                                    <?php $fee = ['Deserving','None','Teacher\'s Child','Late Person\'s Son','Staff Child','Class-4 Employee Child','Player','Kinship','Due to Marks','Free Education','Debator / Speakor']; ?>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                            <option value="{{$fee[$i]}}">{{$fee[$i]}}</option>
                                        @endfor
                                    @elseif ($std->std_fee_conce=='Teacher\'s Child')
                                    <?php $fee = ['Teacher\'s Child','None','Deserving','Late Person\'s Son','Staff Child','Class-4 Employee Child','Player','Kinship','Due to Marks','Free Education','Debator / Speakor']; ?>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                            <option value="{{$fee[$i]}}">{{$fee[$i]}}</option>
                                        @endfor    
                                    @elseif ($std->std_fee_conce=='Late Person\'s Son')
                                    <?php $fee = ['Late Person\'s Son','None','Deserving','Teacher\'s Child','Staff Child','Class-4 Employee Child','Player','Kinship','Due to Marks','Free Education','Debator / Speakor']; ?>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                            <option value="{{$fee[$i]}}">{{$fee[$i]}}</option>
                                        @endfor    
                                    @elseif ($std->std_fee_conce=='Staff Child')
                                    <?php $fee = ['Staff Child','None','Late Person\'s Son','Deserving','Teacher\'s Child','Class-4 Employee Child','Player','Kinship','Due to Marks','Free Education','Debator / Speakor']; ?>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                            <option value="{{$fee[$i]}}">{{$fee[$i]}}</option>
                                        @endfor    
                                    @elseif ($std->std_fee_conce=='Class-4 Employee Child')
                                    <?php $fee = ['Class-4 Employee Child','None','Staff Child','Late Person\'s Son','Deserving','Teacher\'s Child','Player','Kinship','Due to Marks','Free Education','Debator / Speakor']; ?>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                            <option value="{{$fee[$i]}}">{{$fee[$i]}}</option>
                                        @endfor    
                                    @elseif ($std->std_fee_conce=='Player')
                                    <?php $fee = ['Player','None','Class-4 Employee Child','Staff Child','Late Person\'s Son','Deserving','Teacher\'s Child','Kinship','Due to Marks','Free Education','Debator / Speakor']; ?>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                            <option value="{{$fee[$i]}}">{{$fee[$i]}}</option>
                                        @endfor    
                                    @elseif ($std->std_fee_conce=='Kinship')
                                    <?php $fee = ['Kinship','None','Player','Class-4 Employee Child','Staff Child','Late Person\'s Son','Deserving','Teacher\'s Child','Due to Marks','Free Education','Debator / Speakor']; ?>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                            <option value="{{$fee[$i]}}">{{$fee[$i]}}</option>
                                        @endfor    
                                    @elseif ($std->std_fee_conce=='Due to Marks')
                                    <?php $fee = ['Due to Marks','None','Kinship','Player','Class-4 Employee Child','Staff Child','Late Person\'s Son','Deserving','Teacher\'s Child','Free Education','Debator / Speakor']; ?>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                            <option value="{{$fee[$i]}}">{{$fee[$i]}}</option>
                                        @endfor    
                                    @elseif ($std->std_fee_conce=='Free Education')
                                    <?php $fee = ['Free Education','None','Due to Marks','Kinship','Player','Class-4 Employee Child','Staff Child','Late Person\'s Son','Deserving','Teacher\'s Child','Debator / Speakor']; ?>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                            <option value="{{$fee[$i]}}">{{$fee[$i]}}</option>
                                        @endfor    
                                    @elseif ($std->std_fee_conce=='Debator / Speakor')
                                    <?php $fee = ['Debator / Speakor','None','Free Education','Due to Marks','Kinship','Player','Class-4 Employee Child','Staff Child','Late Person\'s Son','Deserving','Teacher\'s Child']; ?>
                                        @for ($i = 0; $i < sizeof($fee); $i++)
                                            <option value="{{$fee[$i]}}">{{$fee[$i]}}</option>
                                        @endfor    
                                    @endif
                                    
                                    
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Medium</label>
                                      <select class="form-control" name="std_medium" >
                                          @if ($std->std_medium=='')
                                            <option selected disabled>Select Medium</option>
                                            <option>English</option>
                                            <option>Urdu</option>
                                          @elseif ($std->std_medium=='English')
                                            <option>English</option>
                                            <option>Urdu</option>
                                          @elseif ($std->std_medium=='Urdu')
                                            <option>Urdu</option>
                                            <option>English</option>
                                          @endif
                                      </select>
                                    </div>
                                  </div>
                            </div>
                                {{-- <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Select Class</label>
                                            <select class="form-control" id="class_name" name="std_class" style="width: 100%;">
                                                <option selected disabled>{{$std->std_class}}</option>
                                                <option value="P.G">P.G</option>
                                                <option value="Nursery">Nursery</option>
                                                <option value="Prep">Prep</option>
                                                <option value="1" id="Class - 1st">Class - 1th</option>
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
                                </div> --}}
                                  <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Course</label>
                                                <input type="text" value="{{$std->std_course}}" class="form-control" name="std_course" placeholder="Enter Course Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Issue Date</label>
                                                <input type="date" value="{{$std->std_issue_date}}" class="form-control" name="issue_date">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Due Date</label>
                                                <input type="date" value="{{$std->std_due_date}}" class="form-control" name="due_date">
                                            </div>
                                        </div>
                                  </div>
                                  <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label >Admission Status</label>
                                                    @if ($std->std_admission_status=='Registration')
                                                        
                                                        <div class="form-control radio">
                                                            <label><input type="radio" name="std_admission_status" value="Registration" checked>Registration</label>
                                                        </div>
                                                        <div class="form-control radio">
                                                            <label><input type="radio" name="std_admission_status" value="Direct Admission">Direct Admission</label>
                                                        </div>
                                                        
                                                    @elseif($std->std_admission_status=='Direct Admission')
                                                        
                                                        <div class="form-control radio">
                                                            <label><input type="radio" name="std_admission_status" value="Registration" >Registration</label>
                                                        </div>
                                                        <div class="form-control radio">
                                                            <label><input type="radio" name="std_admission_status" value="Direct Admission" checked>Direct Admission</label>
                                                        </div>
                                                    
                                                    @endif
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
                              <input type="text" value="{{$std->prev_inst_name}}" name="prev_inst_name" placeholder="Previuos Institute's Name" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Leaving Date</label>
                                <input type="date" value="{{$std->prev_inst_leave}}" name="prev_inst_leave" placeholder="Enter Leaving Date" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Left in which class</label>
                                      <select class="form-control" name="class_left" >
                                          @if ($std->class_left=='')
                                              <?php $class = ['P.G','Nursery','Prep','1','2','3','4','5','6','7','8','9','10']; ?> 
                                              <option selected disabled>Select Class Left</option>
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='P.G')
                                              <?php $class = ['P.G','Nursery','Prep','1','2','3','4','5','6','7','8','9','10']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='Nursery')
                                              <?php $class = ['Nursery','P.G','Prep','1','2','3','4','5','6','7','8','9','10']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='Prep')
                                              <?php $class = ['Prep','P.G','Nursery','1','2','3','4','5','6','7','8','9','10']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='1')
                                              <?php $class = ['1','P.G','Nursery','Prep','2','3','4','5','6','7','8','9','10']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='2')
                                              <?php $class = ['2','P.G','Nursery','Prep','1','3','4','5','6','7','8','9','10']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='3')
                                              <?php $class = ['3','P.G','Nursery','Prep','1','2','4','5','6','7','8','9','10']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='4')
                                              <?php $class = ['4','P.G','Nursery','Prep','1','2','3','5','6','7','8','9','10']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='5')
                                              <?php $class = ['5','P.G','Nursery','Prep','1','2','3','4','6','7','8','9','10']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='6')
                                              <?php $class = ['6','P.G','Nursery','Prep','1','2','3','4','5','7','8','9','10']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='7')
                                              <?php $class = ['7','P.G','Nursery','Prep','1','2','3','4','5','6','8','9','10']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='8')
                                              <?php $class = ['8','P.G','Nursery','Prep','1','2','3','4','5','6','7','9','10']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='9')
                                              <?php $class = ['9','P.G','Nursery','Prep','1','2','3','4','5','6','7','8','10']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @elseif ($std->class_left=='10')
                                              <?php $class = ['10','P.G','Nursery','Prep','1','2','3','4','5','6','7','8','9']; ?> 
                                              @for ($i = 0; $i < sizeof($class); $i++)
                                                <option value="{{$class[$i]}}">{{$class[$i]}}</option>
                                              @endfor
                                          @endif
                                          
                                      </select>
                                    </div>
                                  </div>
                          </div>

                          <div class="row">
                              
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Remarks</label>
                                  <textarea class="form-control" name="remarks" id="" cols="30" rows="6">{{$std->remarks}}</textarea>
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
        @endforeach                            
    @endif
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
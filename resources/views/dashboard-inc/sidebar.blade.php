<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('dashboard/dist/img/login.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Administrator</p>
              <i class="fa fa-circle text-success"></i><span> Online</span>
            </div>
          </div>
          <!-- search form -->
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ request()->is('home') ? 'active' : '' }}">
                <a href="/home">
                  <i class="fa fa-dashboard"></i> <span>Home</span>
                </a>
              </li>
            <li class="<?php if(Request::segment(2)=='define'){echo"active";} ?> treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Definition</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="{{ setActive('home/define/session', 'active') }}"><a href="{{route('create-session')}}"><i class="fa fa-circle-o"></i>Define Session</a></li>
                <li class="{{ request()->is('home/define/section') ? 'active' : '' }}"><a href="{{route('define-section')}}"><i class="fa fa-circle-o"></i>Define Sections</a></li>
                
              </ul>
            </li>
            <li class="<?php if(Request::segment(2)=='admissions'){echo"active";} ?> treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Admissions</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li class="{{ request()->is('home/admissions/new-register/create') ? 'active' : '' }}"><a style="font-size:13px;" href="{{route('new-register.create')}}"><i class="fa fa-circle-o"></i>New Registration</a></li>
                  <li ><a style="font-size:13px;" href=""><i class="fa fa-circle-o"></i>Registration Card</a></li>
                  <li ><a style="font-size:13px;" href=""><i class="fa fa-circle-o"></i>Admission Fee Voucher</a></li>
                  <li ><a style="font-size:13px;" href=""><i class="fa fa-circle-o"></i>Admission Slip</a></li>
                  <li ><a style="font-size:13px;" href=""><i class="fa fa-circle-o"></i>Update Admission Fee</a></li>
              </ul>
            </li>
            <li class="<?php if(Request::segment(2)=='fee' || Request::segment(2)=='show' || Request::segment(3)=='individual-fee'){echo"active";} ?> treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Fee Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                  <li class="{{ request()->is('home/fee/create') ? 'active' : '' }}"><a href="{{route('fee.create')}}"><i class="fa fa-circle-o"></i> Define Overall Fee</a></li>
                  <li class="{{ setActive('home/set/individual-fee', 'active') }}"><a href="{{route('set_individual')}}"><i class="fa fa-circle-o"></i> Update Individual's Fee</a></li>
                  <li class="{{ setActive('home/fee/history/create', 'active') }}"><a style="font-size:13px;" href="{{route('history.create')}}"><i class="fa fa-circle-o"></i> Create Student Fee History</a></li>
                  <li class="{{ setActive('home/show/fee-history', 'active') }}"><a style="font-size:13px;" href="{{route('get_history')}}"><i class="fa fa-circle-o"></i> Get Student Fee History</a></li>
              </ul>
            </li>
            
            {{-- <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Voucher and Slips</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Print Fee Voucher</a></li>
                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
              </ul>
            </li> --}}
            <li  class="<?php if(Request::segment(2)=='search'){echo"active";} ?> treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Search Student</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <li class="{{ setActive('home/search/name', 'active') }}"><a href="{{route('search_name')}}"><i  class="fa fa-circle-o"></i> By Name/Registration ID</a></li>
                <li class="{{ setActive('home/search/session', 'active') }}"><a href="{{route('search_sess')}}"><i class="fa fa-circle-o"></i> By Session</a></li>
                <li class="{{ setActive('home/search/class', 'active') }}"><a href="{{route('search_class')}}"><i class="fa fa-circle-o"></i> By Class/Section</a></li>
              </ul>
            </li>
            
           
          </ul> 
        </section>
</aside>
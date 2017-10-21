<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('plugin/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugin/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('plugin/Ionicons/css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugin/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .allalert{
      position: fixed;
      right: 0;
      bottom: 0;
      z-index: 9999;
    }
  </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                      Sign Out
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    @include('asidemenu')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('main')

    @if ($errors->any())
      @foreach ($errors->all() as $key => $value)
        <div class="alert alert-danger alert-dismissible allalert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            {{ $value }}
        </div>
      @endforeach
    @endif

    @if (isset($pesan))
      <div class="alert alert-success alert-dismissible allalert">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-ban"></i> Success!</h4>
          {{ $pesan }}
      </div>
    @endif

  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('plugin/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('plugin/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

<script src="{{ asset('plugin/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugin/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('plugin/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tabledaftarprojek').DataTable();

    $('.legend_tambahbobot').hide();

    $('#jmlkriteria').on('change', function(event) {
      event.preventDefault();
      ubahkriteria();
      $('.legend_tambahbobot').show("slow");
    });

    $('#jmlalternative').on('change', function(event) {
      event.preventDefault();
      ubahalternative();
      $('.legend_tambahbobot').show("slow");
    });


    $('#formtambahkriteria').on('change','.pilihanchange', function(event) {
      event.preventDefault();
      jml = $('#jmlkriteria').val();
      $('#tambahbobotkriteria').html('');
      $('#tambahbobotkriteria').append(tambahbobotkriteria(jml));
    });


    $('#formtambahalternative').on('change','.pilihanchange', function(event) {
      event.preventDefault();
      jml = $('#jmlalternative').val();
      $('#tambahbobotalternative').html('');
      $('#tambahbobotalternative').append(tambahbobotalternative(jml));
    });



    function ubahkriteria(){
      min = 3;
      max = 10;
      jml = $('#jmlkriteria').val();
      if (jml == min) {
        $('.dynamickriteria').html('');
      }
      if (jml>min && jml<=max) {
        $('.dynamickriteria').html('');
        htmlnya = '';
        for (var i = min+1; i <=jml; i++) {
          htmlnya += '<div class="form-group">'+
            '<label for="select" class="col-md-5 control-label">Kriteria Ke-'+ i +'</label>'+
            '<div class="col-md-7">'+
              '<input class="form-control" type="text" name="namakriteria[]" id="kriteria'+ i +'">'+
            '</div>'+
          '</div>';
        }
        $('.dynamickriteria').html(htmlnya);


      }
    }

    function ubahalternative(){
      min = 3;
      max = 10;
      jml = $('#jmlalternative').val();
      if (jml == min) {
        $('.dynamicalternative').html('');
      }
      if (jml>min && jml<=max) {
        $('.dynamicalternative').html('');
        htmlnya = '';
        for (var i = min+1; i <=jml; i++) {
          htmlnya += '<div class="form-group">'+
            '<label for="select" class="col-md-2 control-label">Alternative Ke-'+ i +'</label>'+
            '<div class="col-md-7">'+
              '<input class="form-control" type="text" name="namaalternative[]" id="alternative'+ i +'">'+
            '</div>'+
          '</div>';
        }
        $('.dynamicalternative').html(htmlnya);
      }
    }

    function tambahbobotkriteria(jml){
      html = '';
      for (var x = 1; x <=jml; x++) {
        for (var y = x+1; y <=jml; y++) {
          valselect = $('#kriteria' + x).val() + '_' + $('#kriteria' + y).val() + '_';
          html += '<div class="form-group">'+
            '<label class="col-md-3 text-right">'+ $('#kriteria' + x).val() +'</label>'+
            '<div class="col-md-6">'+
              '<select class="form-control" name="bobot[]">'+
              '<option value="'+ valselect+'0.111111111' +'">1/9 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.125' +'">1/8 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.142857143' +'">1/7 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.166666667' +'">1/6 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.2' +'">1/5 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.25' +'">1/4 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.333333333' +'">1/3 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.5' +'">1/2 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'1' +'">1 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'2' +'">2 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'3' +'">3 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'4' +'">4 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'5' +'">5 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'6' +'">6 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'7' +'">7 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'8' +'">8 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'9' +'">9 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'10' +'">10 kali lebih penting di bandingkan</option>'+
              '</select>'+
            '</div>'+
            '<label class="col-md-3">'+ $('#kriteria' + y).val() +'</label>'+
          '</div>';
        }
      }
      return html;
    }

    function tambahbobotalternative(jml){
      html = '';
      for (var x = 1; x <=jml; x++) {
        for (var y = x+1; y <=jml; y++) {
          valselect = $('#alternative' + x).val() + '_' + $('#alternative' + y).val() + '_';
          html += '<div class="form-group">'+
            '<label class="col-md-3 text-right">'+ $('#alternative' + x).val() +'</label>'+
            '<div class="col-md-6">'+
              '<select class="form-control" name="bobot[]">'+
              '<option value="'+ valselect+'0.111111111' +'">1/9 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.125' +'">1/8 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.142857143' +'">1/7 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.166666667' +'">1/6 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.2' +'">1/5 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.25' +'">1/4 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.333333333' +'">1/3 kali lebih penting di bandingkan</option>'+
              '<option value="'+ valselect+'0.5' +'">1/2 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'1' +'">1 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'2' +'">2 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'3' +'">3 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'4' +'">4 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'5' +'">5 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'6' +'">6 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'7' +'">7 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'8' +'">8 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'9' +'">9 kali lebih penting di bandingkan</option>'+
                '<option value="'+ valselect+'10' +'">10 kali lebih penting di bandingkan</option>'+
              '</select>'+
            '</div>'+
            '<label class="col-md-3">'+ $('#alternative' + y).val() +'</label>'+
          '</div>';
        }
      }
      return html;
    }

    function onselecttrue(valnya){
      $('option [value='+ valnya +']').attr('selected', 'true');
    }


  });
</script>
</body>
</html>

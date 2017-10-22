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

<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{ url('admin/dashboard') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Aplikasi</b>SPK</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

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
    <div class="pull-right">
      Di Buat Oleh <strong>Fadli Muharram</strong>
    </div>
    <!-- Default to the left -->
    <strong>Sistem Pendunjang Keputusan </strong> Metode AHP
  </footer>


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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

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
            '<label for="select" class="col-md-2 control-label">Kriteria Ke-'+ i +'</label>'+
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
@yield('bagianjs')
</body>
</html>

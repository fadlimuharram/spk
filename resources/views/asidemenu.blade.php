
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('dist/img/avatar.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <?php
        $aktifdashboard = '';$aktifndataprojek='';
        $halaman = (isset($halaman)) ? $halaman : '';
        if ($halaman == 'dashboard') {
          $aktifdashboard = ' class="active"';
        }elseif ($halaman == 'dataprojek') {
          $aktifndataprojek = ' class="active"';
        }
         ?>
        <li<?=$aktifdashboard;?>><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard </span></a></li>
        <li<?=$aktifndataprojek;?>><a href="{{ url('admin/dataprojek') }}"><i class="fa fa-bar-chart"></i> <span>Data Projek</span></a></li>
        <li>&nbsp</li>
        <li>&nbsp</li>
        <li class="header">FOOTER</li>
        <li><a href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i> Log Out
        </a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->

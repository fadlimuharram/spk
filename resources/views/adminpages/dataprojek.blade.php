@extends('template')
@section('main')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Optional description</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!--------------------------
      | Your Page Content Here |
      -------------------------->
      <div class="col-md-4">
        <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Projek</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="">
                <form class="form-horizontal" action="{{ url('/admin/projek/tambah') }}" method="post">
                  {{ csrf_field() }}
                  <div class="input-group input-group-sm">
                  <input class="form-control" type="text" name="namaprojek" >
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-info btn-flat"><span class="fa fa-plus"></span></button>
                      </span>
                  </div>
                </form>
              </div>
              <!-- /.box-body -->
            </div>
      </div>
      <div class="col-md-12">
        <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Daftar Projek</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="">


                <table class="table table-striped table-hover " id="tabledaftarprojek">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Di Buat</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data_projek as $key => $value)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $value->nama }}</td>
        <td>{{ $value->created_at->diffForHumans() }}</td>
        <td><a href="{{ url('/admin/kirteria/' . $value->id) }}" class="btn btn-primary">Edit Kriteria</a></td>
      </tr>
    @endforeach

  </tbody>
</table>
              </div>
              <!-- /.box-body -->
            </div>
      </div>
  </section>
  <!-- /.content -->

@endsection

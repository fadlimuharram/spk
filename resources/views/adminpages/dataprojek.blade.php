@extends('template')
@section('main')


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
                        <td>
                          <form action="{{ url('/admin/hapus/projek') }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $value->id }}">
                            <a href="{{ url('/admin/kriteria/' . $value->id) }}" class="btn btn-primary">Kriteria</a>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                          </form>

                        </td>
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

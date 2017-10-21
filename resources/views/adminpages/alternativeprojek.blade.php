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
      @if (count($data_alternative) == 0)
        <div class="col-md-12">
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Alternative</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                  <form class="form-horizontal" action="{{ url('/admin/tambahkriteria') }}" method="post" id="formtambahalternative">
                    {{ csrf_field() }}
                    <div class="pilihanchange">
                      <div class="form-group">
                        <label for="select" class="col-md-2 control-label">Jumlah Alternative</label>
                        <div class="col-md-5">
                          <select class="form-control" id="jmlalternative">
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="select" class="col-md-2 control-label">Alternative Ke-1</label>
                        <div class="col-md-7">
                          <input class="form-control" type="text" name="namaalternative[]" id="alternative1">
                          <input type="hidden" name="kriteriaid" value="{{ $id_kriteria }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="select" class="col-md-2 control-label">Alternative Ke-2</label>
                        <div class="col-md-7">
                          <input class="form-control" type="text" name="namaalternative[]" id="alternative2">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="select" class="col-md-2 control-label">Alternative Ke-3</label>
                        <div class="col-md-7">
                          <input class="form-control" type="text" name="namaalternative[]" id="alternative3">
                        </div>
                      </div>
                      <div class="dynamicalternative"></div>
                    </div> <br />
                    <legend class="legend_tambahbobot">Tambah Bobot</legend>

                    <div id="tambahbobotalternative">

                    </div>


                    <div class="form-group">
                      <div class="col-md-12">
                        <button type="submit" id="tambahkriteria" class="btn btn-primary col-md-12">Kirim</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.box-body -->
              </div>
        </div>

        @else
          <div class="col-md-12">
            <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Daftar Kriteria</h3>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" style="">

                    <table class="table table-striped table-hover ">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>hitung</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data_kriteria as $key => $value)
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>{{ $hasil_kriteria_spk[$value->id] }}</td>
                            <td> <a href="#" class="btn btn-primary"> Alternative </a> </td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
          </div>
      @endif
  </section>
  <!-- /.content -->

@endsection

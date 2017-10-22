@extends('template')
@section('main')


  <!-- Main content -->
  <section class="content container-fluid">

    <!--------------------------
      | Your Page Content Here |
      -------------------------->
      @if (count($data_kriteria) == 0)
        <div class="col-md-12">
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Kriteria</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                  <form class="form-horizontal" action="{{ url('/admin/tambahkriteria') }}" method="post" id="formtambahkriteria">
                    {{ csrf_field() }}
                    <div class="pilihanchange">
                      <div class="form-group">
                        <label for="select" class="col-md-2 control-label">Jumlah Kriteria</label>
                        <div class="col-md-5">
                          <select class="form-control" id="jmlkriteria">
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
                        <label for="select" class="col-md-2 control-label">Kriteria Ke-1</label>
                        <div class="col-md-7">
                          <input class="form-control" type="text" name="namakriteria[]" id="kriteria1">
                          <input type="hidden" name="projekid" value="{{ $id_projek }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="select" class="col-md-2 control-label">Kriteria Ke-2</label>
                        <div class="col-md-7">
                          <input class="form-control" type="text" name="namakriteria[]" id="kriteria2">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="select" class="col-md-2 control-label">Kriteria Ke-3</label>
                        <div class="col-md-7">
                          <input class="form-control" type="text" name="namakriteria[]" id="kriteria3">
                        </div>
                      </div>
                      <div class="dynamickriteria"></div>
                    </div><br />
                    <div class="legend_tambahbobot">
                      <legend>Tambah Bobot</legend>
                    </div>

                    <div id="tambahbobotkriteria">

                    </div>
                    <table class="table table-striped table-hover" id="tablekriteria">


                    </table>

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
                          <th>Priority Vector</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data_kriteria as $key => $value)
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>{{ $hasil_kriteria_spk[$value->id] }}</td>
                            <td> <a href="{{ url('/admin/alternative/'.$value->id) }}" class="btn btn-primary"> Alternative </a> </td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
          </div>

          @if ($hasil_kesimpulan != '')
            <div class="col-md-12">
              <div class="box box-success box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Hasil</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <canvas id="kesimpulan_spk" width="100%" height="20"></canvas>
              </div>
              <!-- /.box-body -->
            </div>
            </div>
          @endif
      @endif
  </section>
  <!-- /.content -->

@endsection


@if ($hasil_kesimpulan != '')
  @section('bagianjs')
    <script type="text/javascript">
    var ctx = document.getElementById('kesimpulan_spk').getContext('2d');
var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'line',

  // The data for our dataset
  data: {
      labels: [
        <?php
        foreach ($hasil_kesimpulan as $key => $value) {
          echo '"'. $key .'",';
        }
         ?>
      ],
      datasets: [{
          label: "Hasil",
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: [
            <?php
            foreach ($hasil_kesimpulan as $key => $value) {
              echo ''. $value .',';
            }
             ?>
          ],
      }]
  },

  // Configuration options go here
  options: {}
});
    </script>
  @endsection
@endif

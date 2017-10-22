@extends('template')
@section('main')


  <!-- Main content -->
  <section class="content container-fluid">

    <!--------------------------
      | Your Page Content Here |
      -------------------------->
      @if (count($data_alternative) == 0)
        <div class="col-md-12">
          <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Alternative {{ $nama_kriteria }}</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body" style="">
                  <form class="form-horizontal" action="{{ url('/admin/tambahalternative') }}" method="post" id="formtambahalternative">
                    {{ csrf_field() }}
                    <div class="pilihanchange">
                      <div class="form-group">
                        <label for="select" class="col-md-2 control-label">Jumlah Alternative</label>
                        <div class="col-md-5">

                          @if ($data_alternative_sebelumnya != "")
                            <select class="form-control" id="jmlalternative" disabled="disabled">
                              @for ($i=3; $i <= 10; $i++)
                                @if (count($data_alternative_sebelumnya) == $i)
                                    <option value="{{ $i }}" selected="true">{{ $i }}</option>
                                @else
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endif
                              @endfor

                            </select>
                          @else
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
                          @endif
                        </div>
                      </div>

                      @if ($data_alternative_sebelumnya != "")

                        @foreach ($data_alternative_sebelumnya as $key => $value)
                          <div class="form-group">
                            <label for="select" class="col-md-2 control-label">Alternative Ke-{{ $key+1 }}</label>
                            <div class="col-md-7">
                              <input class="form-control" type="text" name="namaalternative[]" id="alternative{{ $key+1 }}" value="{{ $value['nama'] }}" readonly="true">
                            </div>
                          </div>
                        @endforeach

                      @else
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
                      @endif
                      <input type="hidden" name="kriteriaid" value="{{ $id_kriteria }}">

                      <div class="dynamicalternative"></div>
                    </div> <br />
                    <div class="legend_tambahbobot">
                      <legend>Tambah Bobot</legend>
                    </div>
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
                    <h3 class="box-title">Daftar Alternative</h3>
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
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data_alternative as $key => $value)
                          <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->nama }}</td>
                            <td>{{ $hasil_alternative_spk[$value->id] }}</td>
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

@if ($data_alternative_sebelumnya != "")
  @section('bagianjs')
    <script type="text/javascript">
      jml = $('#jmlalternative').val();
      $('#tambahbobotalternative').html('');
      $('#tambahbobotalternative').append(tambahbobotalternative(jml));
      $('.legend_tambahbobot').show("slow");
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
    </script>
  @endsection
@endif

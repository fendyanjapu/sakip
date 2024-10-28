@extends('layouts.template-admin')

@section('content')
<script>
    $(document).ready(function(){
        $('#program').change(function(){
        let id = $(this).val();
          $.ajax({
            type   : "GET",
            data   : "id="+id,
            url    : "{{ route('selectProgramKegiatan') }}",
            cache  : false,
            success: function(result){
              $('#kegiatan').html(result);
            }
          });
        });

        $('#kegiatan').change(function(){
        let id = $(this).val();
          $.ajax({
            type   : "GET",
            data   : "id="+id,
            url    : "{{ route('selectKegiatanSubkegiatan') }}",
            cache  : false,
            success: function(result){
                $('#subkegiatan').html(result);
            }
          });
        });

        $('#bulan').change(function(){
        let bulan = $(this).val();
          if (bulan <= 3) {
            $('#triwulan').val('1');
          } else if (bulan <= 6) {
            $('#triwulan').val('2');
          } else if (bulan <= 9) {
            $('#triwulan').val('3');
          } else {
            $('#triwulan').val('4');
          }
        });
    });
</script>
<div class="dataTables_wrapper">
    <form action="{{ route('rfk-realisasi.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="col-sm-2 control-label">Program:</label>
            <div class="col-sm-8">
                <select class="form-control" name="rfk_program_id" id="program" required>
                    <option value=""></option>
                    @foreach ($rfkPrograms as $rfkProgram)
                        <option value="{{ $rfkProgram->id }}">{{ $rfkProgram->program }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Kegiatan:</label>
          <div class="col-sm-8">
              <select class="form-control" name="rfk_kegiatan_id" id="kegiatan" required>
                  <option value=""></option>
              </select>
          </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Subkegiatan:</label>
            <div class="col-sm-8">
                <select class="form-control" name="rfk_subkegiatan_id" id="subkegiatan" required>
                    <option value=""></option>
                </select>
            </div>
          </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Bulan:</label>
            <div class="col-sm-4">
                <select class="form-control" name="bulan" id="bulan" required>
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Triwulan:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="triwulan" id="triwulan" placeholder="Triwulan" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Jumlah Output:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="jumlah_output" id="jumlah_output" placeholder="Jumlah Output" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Pagu:</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" name="pagu" id="pagu" placeholder="Pagu" required>
            </div>
        </div>
        
      </div>

        
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            </div>
        </div>
        <div class="col-sm-offset-2">
            <button type="submit" class="btn btn-primary" id="bSimpan"><i class="fa fa-save"></i> Simpan</button>
        <a href="#" class="btn btn-primary" onClick="self.history.back()">Kembali</a>
        </div>
    </form><br><br</div>
    
@endsection
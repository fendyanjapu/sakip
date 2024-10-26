@extends('layouts.template-admin')

@section('content')
<script>
    $(document).ready(function(){
        $('#program').change(function(){
        let id = $(this).val();
          $.ajax({
            type   : "GET",
            data   : "id="+id,
            url    : "{{ route('selectProgram') }}",
            cache  : false,
            success: function(result){
              let data = $.parseJSON(result);
              $('#kode_a').val(data.kode_a);
              $('#kode_b').val(data.kode_b);
              $('#program_kode').val(data.program_kode);
            }
          });

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
            url    : "{{ route('selectKegiatan') }}",
            cache  : false,
            success: function(result){
              let data = $.parseJSON(result);
              $('#kegiatan_kode').val(data.kegiatan_kode);
            }
          });
        });
    });
</script>
<div class="dataTables_wrapper">
    <form action="{{ route('rfk-subkegiatan.update', ['rfk_subkegiatan' => $rfkSubkegiatan]) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="col-sm-2 control-label">Program:</label>
            <div class="col-sm-8">
                <select class="form-control" name="rfk_program_id" id="program" required>
                    <option value=""></option>
                    @foreach ($rfkPrograms as $rfkProgram)
                        <option value="{{ $rfkProgram->id }}" {{ $rfkProgram->id == $rfkSubkegiatan->rfk_program_id ? 'selected' : '' }}>{{ $rfkProgram->program }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Kegiatan:</label>
          <div class="col-sm-8">
              <select class="form-control" name="rfk_kegiatan_id" id="kegiatan" required>
                  <option value=""></option>
                  @foreach ($rfkKegiatans as $rfkKegiatan)
                    @if ($rfkKegiatan->rfk_program_id == $rfkSubkegiatan->rfk_program_id)
                        <option value="{{ $rfkKegiatan->id }}" {{ $rfkKegiatan->id == $rfkSubkegiatan->rfk_kegiatan_id ? 'selected' : '' }}>{{ $rfkKegiatan->kegiatan }}</option>
                    @endif   
                 @endforeach
              </select>
          </div>
      </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">Kode:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="kode_a" value="{{ $rfkSubkegiatan->rfkProgram->kode_a }}" id="kode_a" readonly>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="kode_b" value="{{ $rfkSubkegiatan->rfkProgram->kode_b }}" id="kode_b" readonly>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="program_kode" value="{{ $rfkSubkegiatan->rfkProgram->program_kode }}" id="program_kode" readonly>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="kegiatan_kode" value="{{ $rfkSubkegiatan->rfkKegiatan->kegiatan_kode }}" id="kegiatan_kode" readonly>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="subkegiatan_kode" value="{{ $rfkSubkegiatan->subkegiatan_kode }}" id="subkegiatan_kode" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Sasaran:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="subkegiatan_sasaran" value="{{ $rfkSubkegiatan->subkegiatan_sasaran }}" id="subkegiatan_sasaran" placeholder="Sasaran" required>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Subkegiatan:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="subkegiatan" value="{{ $rfkSubkegiatan->subkegiatan }}" id="subkegiatan" placeholder=Subkegiatan" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Indikator Kinerja:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="subkegiatan_indikator_kinerja" value="{{ $rfkSubkegiatan->subkegiatan_indikator_kinerja }}" id="subkegiatan_indikator_kinerja" placeholder="Indikator Kinerja" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Satuan:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="subkegiatan_satuan_k" value="{{ $rfkSubkegiatan->subkegiatan_satuan_k }}" id="subkegiatan_satuan" placeholder="Satuan" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Target Renstra:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="subkegiatan_target_renstra_k" value="{{ $rfkSubkegiatan->subkegiatan_target_renstra_k }}" id="subkegiatan_target_renstra_k" placeholder="Fisik" required>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="subkegiatan_target_renstra_rp" value="{{ $rfkSubkegiatan->subkegiatan_target_renstra_rp }}" id="subkegiatan_target_renstra_rp" placeholder="Keuangan" required>
          </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Realisasi Pencapaian:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="subkegiatan_realisasi_pencapaian_k" value="{{ $rfkSubkegiatan->subkegiatan_realisasi_pencapaian_k }}" id="subkegiatan_realisasi_pencapaian_k" placeholder="Fisik" required>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="subkegiatan_realisasi_pencapaian_rp" value="{{ $rfkSubkegiatan->subkegiatan_realisasi_pencapaian_rp }}" id="subkegiatan_realisasi_pencapaian_rp" placeholder="Keuangan" required>
          </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Target Kinerja:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="subkegiatan_target_kinerja_k" value="{{ $rfkSubkegiatan->subkegiatan_target_kinerja_k }}" id="subkegiatan_target_kinerja_k" placeholder="Fisik" required>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="subkegiatan_target_kinerja_rp" value="{{ $rfkSubkegiatan->subkegiatan_target_kinerja_rp }}" id="subkegiatan_target_kinerja_rp" placeholder="Keuangan" required>
          </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Keterangan:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="subkegiatan_ket" value="{{ $rfkSubkegiatan->subkegiatan_ket }}" id="subkegiatan_ket" placeholder="Keterangan" required>
            </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Uraian Singkat:</label>
          <div class="col-sm-8">
              <input type="text" class="form-control" name="uraian_singkat" value="{{ $rfkSubkegiatan->uraian_singkat }}" id="uraian_singkat" placeholder="Uraian Singkat" required>
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
@extends('layouts.template-admin')

@section('content')

<div class="dataTables_wrapper">
    <form action="{{ route('rfk-kegiatan.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
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
            <label class="col-sm-2 control-label">Kode:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="kode_a" id="kode_a" readonly>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="kode_b" id="kode_b" readonly>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="program_kode" id="program_kode" readonly>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="kegiatan_kode" id="kegiatan_kode" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Sasaran:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="kegiatan_sasaran" id="kegiatan_sasaran" placeholder="Sasaran" required>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Kegiatan:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Kegiatan" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Indikator Kinerja:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="kegiatan_indikator_kinerja" id="kegiatan_indikator_kinerja" placeholder="Indikator Kinerja" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Satuan:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="kegiatan_satuan" id="kegiatan_satuan" placeholder="Satuan" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Target Renstra:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="kegiatan_target_renstra_k" id="kegiatan_target_renstra_k" placeholder="Target Renstra" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Realisasi Pencapaian:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="kegiatan_realisasi_pencapaian_k" id="kegiatan_realisasi_pencapaian_k" placeholder="Realisasi Pencapaian" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Target Kinerja:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="kegiatan_target_kinerja_k" id="kegiatan_target_kinerja_k" placeholder="Target Kinerja" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Keterangan:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="kegiatan_ket" id="kegiatan_ket" placeholder="Keterangan" required>
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
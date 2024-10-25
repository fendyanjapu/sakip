@extends('layouts.template-admin')

@section('content')

<div class="dataTables_wrapper">
    <form action="{{ route('rfk-program.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        
      <div class="form-group">
            <label class="col-sm-2 control-label">Kode:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="kode_a" id="kode_a" required>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="kode_b" id="kode_b" required>
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="program_kode" id="program_kode" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Sasaran:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="sasaran" id="sasaran" placeholder="Sasaran" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Program:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="program" id="program" placeholder="Program" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Indikator Kinerja:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="indikator_kinerja" id="indikator_kinerja" placeholder="Indikator Kinerja" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Satuan:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="program_satuan" id="program_satuan" placeholder="Satuan" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Target Renstra:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="target_renstra_k" id="target_renstra_k" placeholder="Target Renstra" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Realisasi Pencapaian:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="realisasi_pencapaian_k" id="realisasi_pencapaian_k" placeholder="Realisasi Pencapaian" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Target Kinerja:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="target_kinerja_k" id="target_kinerja_k" placeholder="Target Kinerja" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Keterangan:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="program_ket" id="program_ket" placeholder="Keterangan" required>
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
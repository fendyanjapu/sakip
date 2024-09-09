@extends('layouts.template-admin')

@section('content')
<script>
    $(document).ready(function(){
      $("#target_fisik").keyup(function(){
        let target_fisik = $('#target_fisik').val();
        let realisasi_fisik = $('#realisasi_fisik').val();
        let prosentase_fisik = (realisasi_fisik/target_fisik)*100;
        $('#prosentase_fisik').val(parseFloat(prosentase_fisik).toFixed(2));
      });

      $("#realisasi_fisik").keyup(function(){
        let target_fisik = $('#target_fisik').val();
        let realisasi_fisik = $('#realisasi_fisik').val();
        let prosentase_fisik = (realisasi_fisik/target_fisik)*100;
        $('#prosentase_fisik').val(parseFloat(prosentase_fisik).toFixed(2));
      });

      $("#target_keuangan").keyup(function(){
        let target_keuangan = $('#target_keuangan').val();
        let realisasi_keuangan = $('#realisasi_keuangan').val();
        let prosentase_keuangan = (realisasi_keuangan/target_keuangan)*100;
        $('#prosentase_keuangan').val(parseFloat(prosentase_keuangan).toFixed(2));
      });

      $("#realisasi_keuangan").keyup(function(){
        let target_keuangan = $('#target_keuangan').val();
        let realisasi_keuangan = $('#realisasi_keuangan').val();
        let prosentase_keuangan = (realisasi_keuangan/target_keuangan)*100;
        $('#prosentase_keuangan').val(parseFloat(prosentase_keuangan).toFixed(2));
      });
    });
    </script>
<div class="dataTables_wrapper">
    <form action="{{ route('rfk.store') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="col-sm-2 control-label">BULAN:</label>
            <div class="col-sm-8">
                <select name="bulan" id="" class="form-control" required>
                    <option value=""></option>
                    <option value="Jan">Januari</option>
                    <option value="Feb">Februari</option>
                    <option value="Mar">Maret</option>
                    <option value="Apr">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Jun">Juni</option>
                    <option value="Jul">Juli</option>
                    <option value="Ags">Agustus</option>
                    <option value="Okt">Oktober</option>
                    <option value="Sep">September</option>
                    <option value="Nov">November</option>
                    <option value="Des">Desember</option>
                    
                </select>
            </div>
        </div>
        
        <!-- bulanan -->
      <div class="form-group">
            <label class="col-sm-2 control-label">Target:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="target_fisik" id="target_fisik" placeholder="Fisik">
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="target_keuangan" id="target_keuangan" placeholder="Keuangan">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Realisasi:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="realisasi_fisik" id="realisasi_fisik" placeholder="Fisik">
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="realisasi_keuangan" id="realisasi_keuangan" placeholder="Keuangan">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Presentase:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="prosentase_fisik" id="prosentase_fisik" placeholder="Fisik">
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="prosentase_keuangan" id="prosentase_keuangan" placeholder="Keuangan">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">File Dukung:</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" name="file_dukung" required>
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
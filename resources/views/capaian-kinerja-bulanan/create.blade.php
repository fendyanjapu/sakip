@extends('layouts.template-admin')

@section('content')
<div class="dataTables_wrapper">
    <form action="{{ route('capaian-kinerja-bulanan.store') }}" method="post" class="form-horizontal">
        @csrf
        <div class="form-group">
            <label class="col-sm-2 control-label">IKU:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="iku" required>
            </div>
        </div>
        <div class="form-group">
              <label class="col-sm-2 control-label">SATUAN:</label>
              <div class="col-sm-8">
                  <input type="text" class="form-control" name="satuan" required>
              </div>
          </div>
        <!-- bulanan -->
      <div class="form-group">
            <label class="col-sm-2 control-label">Januari:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="t_jan" placeholder="Target" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="r_jan" placeholder="Realisasi" required>
            </div>
        </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">Februari:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="t_feb" placeholder="Target" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="r_feb" placeholder="Realisasi" required>
            </div>
        </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">Maret:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="t_mar" placeholder="Target" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="r_mar" placeholder="Realisasi" required>
            </div>
        </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">April:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="t_apr" placeholder="Target" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="r_apr" placeholder="Realisasi" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Mei:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="t_mei" placeholder="Target" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="r_mei" placeholder="Realisasi" required>
            </div>
        </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">Juni:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="t_jun" placeholder="Target" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="r_jun" placeholder="Realisasi" required>
            </div>
        </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">Juli:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="t_jul" placeholder="Target" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="r_jul" placeholder="Realisasi" required>
            </div>
        </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">Agustus:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="t_ags" placeholder="Target" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="r_ags" placeholder="Realisasi" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">September:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="t_sep" placeholder="Target" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="r_sep" placeholder="Realisasi" required>
            </div>
        </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">Oktober:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="t_okt" placeholder="Target" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="r_okt" placeholder="Realisasi" required>
            </div>
        </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">November:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="t_nov" placeholder="Target" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="r_nov" placeholder="Realisasi" required>
            </div>
        </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">Desember:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="t_des" placeholder="Target" required>
            </div>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="r_des" placeholder="Realisasi" required>
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
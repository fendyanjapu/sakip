@extends('layouts.template-admin')

@section('content')
<div class="dataTables_wrapper">
    <form action="{{ route('rfk.update', ['rfk' => $rfk]) }}" method="post" class="form-horizontal">
        @csrf
        @method('PUT')
	
    
        <div class="form-group">
          <label class="col-sm-2 control-label">BULAN:</label>
          <div class="col-sm-8">
              <select name="bulan" id="" class="form-control" required>
                  <option value=""></option>
                  <option value="Jan" <?= $rfk->bulan == 'Jan' ? 'selected' : '' ?>>Januari</option>
                  <option value="Feb" <?= $rfk->bulan == 'Feb' ? 'selected' : '' ?>>Februari</option>
                  <option value="Mar" <?= $rfk->bulan == 'Mar' ? 'selected' : '' ?>>Maret</option>
                  <option value="Apr" <?= $rfk->bulan == 'Apr' ? 'selected' : '' ?>>April</option>
                  <option value="Mei" <?= $rfk->bulan == 'Mei' ? 'selected' : '' ?>>Mei</option>
                  <option value="Jun" <?= $rfk->bulan == 'Jun' ? 'selected' : '' ?>>Juni</option>
                  <option value="Jul" <?= $rfk->bulan == 'Jul' ? 'selected' : '' ?>>Juli</option>
                  <option value="Ags" <?= $rfk->bulan == 'Ags' ? 'selected' : '' ?>>Agustus</option>
                  <option value="Okt" <?= $rfk->bulan == 'Okt' ? 'selected' : '' ?>>Oktober</option>
                  <option value="Sep" <?= $rfk->bulan == 'Sep' ? 'selected' : '' ?>>September</option>
                  <option value="Nov" <?= $rfk->bulan == 'Nov' ? 'selected' : '' ?>>November</option>
                  <option value="Des" <?= $rfk->bulan == 'Des' ? 'selected' : '' ?>>Desember</option>
                  
              </select>
          </div>
      </div>
      
      <!-- bulanan -->
    <div class="form-group">
          <label class="col-sm-2 control-label">Target:</label>
          <div class="col-sm-4">
              <input type="text" class="form-control" name="target_fisik" value="{{ $rfk->target_fisik }}" placeholder="Fisik">
          </div>
          <div class="col-sm-4">
              <input type="text" class="form-control" name="target_keuangan" value="{{ $rfk->target_keuangan }}" placeholder="Keuangan">
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2 control-label">Realisasi:</label>
          <div class="col-sm-4">
              <input type="text" class="form-control" name="realisasi_fisik" value="{{ $rfk->realisasi_fisik }}" placeholder="Fisik">
          </div>
          <div class="col-sm-4">
              <input type="text" class="form-control" name="realisasi_keuangan" value="{{ $rfk->realisasi_keuangan }}" placeholder="Keuangan">
          </div>
      </div>
      <div class="form-group">
          <label class="col-sm-2 control-label">Presentase:</label>
          <div class="col-sm-4">
              <input type="text" class="form-control" name="prosentase_fisik" value="{{ $rfk->prosentase_fisik }}" placeholder="Fisik">
          </div>
          <div class="col-sm-4">
              <input type="text" class="form-control" name="prosentase_keuangan" value="{{ $rfk->prosentase_keuangan }}" placeholder="Keuangan">
          </div>
      </div>
  
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		</div>
	</div>
	<div class="col-sm-offset-2">
		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
		<a href="#" class="btn btn-primary" onClick="self.history.back()">Kembali</a>
	</div>
</form><br><br></div>

@endsection
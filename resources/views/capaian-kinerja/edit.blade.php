@extends('layouts.template-admin')

@section('content')
<div class="dataTables_wrapper">
    <form action="{{ route('capaian-kinerja.update', ['capaian_kinerja' => $capaianKinerja]) }}" method="post" class="form-horizontal">
    @csrf
    @method('PUT')
    <div class="form-group">
  		<label class="col-sm-2 control-label">IKU:</label>
  		<div class="col-sm-8">
  			<input type="text" class="form-control" name="iku"
        value="<?php echo $capaianKinerja->iku ?>">
  		</div>
  	</div>
    <div class="form-group">
  		<label class="col-sm-2 control-label">Target Tahunan:</label>
  		<div class="col-sm-8">
  			<input type="text" class="form-control" name="target"
        value="<?php echo $capaianKinerja->target ?>">
  		</div>
  	</div>
    <div class="form-group">
		<label class="col-sm-2 control-label">Triwulan I</label>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Target:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="triwulan_i_target" value="<?= $capaianKinerja->triwulan_i_target ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Realisasi:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="triwulan_i_realisasi" value="<?= $capaianKinerja->triwulan_i_realisasi ?>">
		</div>
	</div>
  <div class="form-group">
		<label class="col-sm-2 control-label">Triwulan II</label>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Target:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="triwulan_ii_target" value="<?= $capaianKinerja->triwulan_ii_target ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Realisasi:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="triwulan_ii_realisasi" value="<?= $capaianKinerja->triwulan_ii_realisasi ?>">
		</div>
	</div>
  <div class="form-group">
		<label class="col-sm-2 control-label">Triwulan III</label>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Target:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="triwulan_iii_target" value="<?= $capaianKinerja->triwulan_iii_target ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Realisasi:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="triwulan_iii_realisasi" value="<?= $capaianKinerja->triwulan_iii_realisasi ?>">
		</div>
	</div>
  <div class="form-group">
		<label class="col-sm-2 control-label">Triwulan IV</label>
	</div>
		<div class="form-group">
		<label class="col-sm-2 control-label">Target:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="triwulan_iv_target" value="<?= $capaianKinerja->triwulan_iv_target ?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Realisasi:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="triwulan_iv_realisasi" value="<?= $capaianKinerja->triwulan_iv_realisasi ?>">
		</div>
	</div>
  <div class="form-group">
		<label class="col-sm-2 control-label">Penyebab Keberhasilan:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="penyebab_keberhasilan" value="<?= $capaianKinerja->penyebab_keberhasilan ?>">
		</div>
	</div>
  <div class="form-group">
		<label class="col-sm-2 control-label">Hambatan dan Kendala:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="hambatan_dan_kendala" value="<?= $capaianKinerja->hambatan_dan_kendala ?>">
		</div>
	</div>
  <div class="form-group">
		<label class="col-sm-2 control-label">Upaya Perbaikan Yang Telah Dilakukan:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="upaya_perbaikan_yg_telah_dilakukan" value="<?= $capaianKinerja->upaya_perbaikan_yg_telah_dilakukan ?>">
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
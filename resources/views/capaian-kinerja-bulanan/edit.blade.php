@extends('layouts.template-admin')

@section('content')
<div class="dataTables_wrapper">
    <form action="{{ route('capaian-kinerja-bulanan.update', ['capaian_kinerja_bulanan' => $capaianKinerjaBulanan]) }}" method="post" class="form-horizontal">
        @csrf
        @method('PUT')
	
    
    <div class="form-group">
  		<label class="col-sm-2 control-label">IKU:</label>
  		<div class="col-sm-8">
  			<input type="text" class="form-control" name="iku"
        value="<?php echo $capaianKinerjaBulanan->iku ?>">
  		</div>
  	</div>
    <div class="form-group">
  		<label class="col-sm-2 control-label">SATUAN:</label>
  		<div class="col-sm-8">
  			<input type="text" class="form-control" name="satuan"
        value="<?php echo $capaianKinerjaBulanan->satuan ?>">
  		</div>
  	</div>
    
  	
  	<!-- bulanan -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Januari:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="t_jan" placeholder="Target"
        value="<?php echo $capaianKinerjaBulanan->t_jan ?>">
      </div>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="r_jan" placeholder="Realisasi"
        value="<?php echo $capaianKinerjaBulanan->r_jan ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Februari:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="t_feb" placeholder="Target"
        value="<?php echo $capaianKinerjaBulanan->t_feb ?>">
      </div>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="r_feb" placeholder="Realisasi"
        value="<?php echo $capaianKinerjaBulanan->r_feb ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Maret:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="t_mar" placeholder="Target"
        value="<?php echo $capaianKinerjaBulanan->t_mar ?>">
      </div>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="r_mar" placeholder="Realisasi"
        value="<?php echo $capaianKinerjaBulanan->r_mar ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">April:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="t_apr" placeholder="Target"
        value="<?php echo $capaianKinerjaBulanan->t_apr ?>">
      </div>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="r_apr" placeholder="Realisasi"
        value="<?php echo $capaianKinerjaBulanan->r_apr ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Mei:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="t_mei" placeholder="Target"
        value="<?php echo $capaianKinerjaBulanan->t_mei ?>">
      </div>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="r_mei" placeholder="Realisasi"
        value="<?php echo $capaianKinerjaBulanan->r_mei ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Juni:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="t_jun" placeholder="Target"
        value="<?php echo $capaianKinerjaBulanan->t_jun ?>">
      </div>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="r_jun" placeholder="Realisasi"
        value="<?php echo $capaianKinerjaBulanan->r_jun ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Juli:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="t_jul" placeholder="Target"
        value="<?php echo $capaianKinerjaBulanan->t_jul ?>">
      </div>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="r_jul" placeholder="Realisasi"
        value="<?php echo $capaianKinerjaBulanan->r_jul ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Agustus:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="t_ags" placeholder="Target"
        value="<?php echo $capaianKinerjaBulanan->t_ags ?>">
      </div>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="r_ags" placeholder="Realisasi"
        value="<?php echo $capaianKinerjaBulanan->r_ags ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">September:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="t_sep" placeholder="Target"
        value="<?php echo $capaianKinerjaBulanan->t_sep ?>">
      </div>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="r_sep" placeholder="Realisasi"
        value="<?php echo $capaianKinerjaBulanan->r_sep ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Oktober:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="t_okt" placeholder="Target"
        value="<?php echo $capaianKinerjaBulanan->t_okt ?>">
      </div>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="r_okt" placeholder="Realisasi"
        value="<?php echo $capaianKinerjaBulanan->r_okt ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">November:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="t_nov" placeholder="Target"
        value="<?php echo $capaianKinerjaBulanan->t_nov ?>">
      </div>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="r_nov" placeholder="Realisasi"
        value="<?php echo $capaianKinerjaBulanan->r_nov ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Desember:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="t_des" placeholder="Target"
        value="<?php echo $capaianKinerjaBulanan->t_des ?>">
      </div>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="r_des" placeholder="Realisasi"
        value="<?php echo $capaianKinerjaBulanan->r_des ?>">
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
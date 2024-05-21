@extends('layouts.template-admin')

@section('content')
<script>
	$(document).ready(function(){
		$('#tabel').DataTable( {
		   "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
        } 
		} );
	});
</script>
<h2><?php if (Session::get('jenisSopd') != '4') { ?> 
    <div class="par-text">Capaian Kinerja Pejabat Esselon II Tahun 2024</div>
    <?php } else { ?>
    <div class="par-text">Capaian Kinerja Pejabat Esselon III Tahun 2024</div>
    <?php } ?>
    <div class="par-tex2">
        <?php echo Session::get('level') != '1' ? Session::get('namaSopd') : ''  ?>
</h2><br>
<?php if (Session::get('idSopd') != '' && Session::get('level') != '1'): ?>
    <a href="{{ route('capaian-kinerja.create') }}"
      class="btn btn-primary" title="Tambah"><i class="fa fa-plus"> Tambah</i></a><br><br><br>
@if (session()->has('success'))
	<div class="alert alert-success" role="alert">
	{{ session('success') }}
	</div>
@endif
<?php endif; ?>
<table id="tabel" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th class="sorting" style="vertical-align: middle; text-align: center" width="15px" rowspan="3">NO</th>
			
			<th rowspan="3" class="sorting" style="vertical-align: middle; text-align: center">IKU</th>
			<th rowspan="3" class="sorting" style="vertical-align: middle; text-align: center">Target Tahunan</th>
			<th colspan="8" class="sorting" style="text-align: center">Target dan Realisasi</th>
			<th rowspan="3" class="sorting" style="vertical-align: middle; text-align: center">Penyebab Keberhasilan</th>
			<th rowspan="3" class="sorting" style="vertical-align: middle; text-align: center">Hambatan Dan Kendala</th>
			<th rowspan="3" class="sorting" style="vertical-align: middle; text-align: center">Upaya Perbaikan Yang Telah Dilakukan</th>
			<th rowspan="3" class="sorting" style="vertical-align: middle; text-align: center">Rekomendasi</th>
			
      <?php if (Session::get('idSopd') != ''): ?>
          <th rowspan="3" class="sorting" style="vertical-align: middle; text-align: center">#</th>
      <?php endif; ?>
		</tr>
    <tr>
      <th colspan="2" class="sorting" style="text-align: center">Triwulan I</th>
      <th colspan="2" class="sorting" style="text-align: center">Triwulan II</th>
      <th colspan="2" class="sorting" style="text-align: center">Triwulan III</th>
      <th colspan="2" class="sorting" style="text-align: center">Triwulan IV</th>
      
    </tr>
    
    <tr>
        	<th class="sorting" style="text-align: center">Target</th>
        	<th class="sorting" style="text-align: center">Realisasi</th>
        	<th class="sorting" style="text-align: center">Target</th>
        	<th class="sorting" style="text-align: center">Realisasi</th>
        	<th class="sorting" style="text-align: center">Target</th>
        	<th class="sorting" style="text-align: center">Realisasi</th>
        	<th class="sorting" style="text-align: center">Target</th>
        	<th class="sorting" style="text-align: center">Realisasi</th>
        	
    </tr>

	</thead>
	<tbody>
		@foreach ($query as $key)
		<tr>
			<td style="text-align: center"><?= $loop->iteration ?></td>
			
			<td><?php echo $key->iku ?></td>
			<td style="text-align: center"><?php echo $key->target ?></td>
			<td style="text-align: center"><?php echo $key->triwulan_i_target ?></td>
			<td style="text-align: center"><?php echo $key->triwulan_i_realisasi ?></td>
			<td style="text-align: center"><?php echo $key->triwulan_ii_target ?></td>
			<td style="text-align: center"><?php echo $key->triwulan_ii_realisasi ?></td>
			<td style="text-align: center"><?php echo $key->triwulan_iii_target ?></td>
			<td style="text-align: center"><?php echo $key->triwulan_iii_realisasi ?></td>
			<td style="text-align: center"><?php echo $key->triwulan_iv_target ?></td>
			<td style="text-align: center"><?php echo $key->triwulan_iv_realisasi ?></td>
			<td style="text-align: center"><?php echo $key->penyebab_keberhasilan ?></td>
			<td style="text-align: center"><?php echo $key->hambatan_dan_kendala ?></td>
			<td style="text-align: center"><?php echo $key->upaya_perbaikan_yg_telah_dilakukan ?></td>
			<td style="text-align: center"><?php echo $key->rekomendasi ?></td>
	<?php if (Session::get('idSopd') != ''): ?>
		<td style="text-align: center">
		  <a href="{{ route('capaian-kinerja.edit', ['capaian_kinerja' => $key->id]) }}"
			class="btn btn-primary"><i class="fa fa-edit"> Edit</i></a>
		  <form action="{{ route('capaian-kinerja.destroy', ['capaian_kinerja' => $key->id]) }}" method="POST">
			@csrf
			<button class="btn btn-primary" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"> Hapus</i></button>
			@method('delete')
		</form>
		  
		</td>
	<?php endif; ?>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="elementot"><a href="https://apps.baritokualakab.go.id/sakip/" class="backber"><i class="fa fa-home" aria-hidden="true"></i> BERANDA</a></div>

@endsection
@extends('layouts.template-home')

@section('content')
<script>
	$(document).ready(function(){
		$('#tabel').DataTable();
	});
</script>
<div class="headon"><div class="par-text">Lemari Arsip</div><div class="par-tex2">{{ $sopd }}</div></div><br>
<table id="tabel" class="table table-striped table-bordered">
	<thead>
		<th style="text-align: center">NO</th>
		<th>Nama Dokumen</th>
		<th>Dokumen</th>
		<th></th>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		foreach ($query as $key): ?>
		<tr>
			<td style="text-align: center"><?php echo $no ?></td>
			<td><?php echo $key->nama_dokumen ?></td>
			<td><?php echo $key->dokumen ?></td>
			<td style="text-align: center">
				<a href="{{ route('docs', ['id' => $key->id]) }}" target="blank" class="btn btn-success" title="Lihat"><i class="fa fa-eye"></i></a>
				<a href="{{ route('download', ['id' => $key->id]) }}" target="blank" class="btn btn-default" title="Unduh"><i class="fa fa-download"></i></a>
			</td>
		</tr>
		<?php 
		$no++;
		endforeach 
		?>
	</tbody>
</table>
<div class="elementot"><a href="https://apps.baritokualakab.go.id/sakip/" class="backber"><i class="fa fa-home" aria-hidden="true"></i> BERANDA</a></div>
@endsection
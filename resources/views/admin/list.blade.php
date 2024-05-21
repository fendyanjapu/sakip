@extends('layouts.template-admin')

@section('content')
<script>
	$(document).ready(function(){
		$('#jumlah').change(function(){
			var jml = $('#jumlah').val();
			$.ajax({
				type   : 'POST',
				url    : '#',
				data   : 'jml='+jml,
				success: function(html) {
					$('#unggah').html(html);
				}
			});
		});
		$('#tabel').DataTable( {
		   "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
        } 
		} );
		
	});
</script>
<?php 
    if (Session::get('level') == 1) {
        
    }
?>
<h1>{{ $judul }}</h1><br>
@if (session()->has('success'))
	<div class="alert alert-success" role="alert">
	{{ session('success') }}
	</div>
@endif
<?php if (Session::get('idSopd') != null && Session::get('level') != 1): ?>
    <form action="{{ route('arsip.save') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
		@csrf
    	<div class="form-group">
    		<label class="col-sm-2 control-label">Nama Dokumen:</label>
    		<div class="col-sm-9">
    			<input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Session::get('idSopd') }}">
    			<input type="hidden" class="form-control" id="jenis_dokumen" name="jenis_dokumen" value="{{ $jenis_dokumen }}">
    			<input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen">
    		</div>
    	</div>
    	<div class="form-group">
    		<label class="col-sm-2 control-label">File:</label>
    		<div class="col-sm-9">
    			<input type="file" name="dokumen" id="dokumen" class="form-control-file" accept=".docx,.xlsx,.pdf"><br>
    		</div>
    	</div>
    	<div class="form-group">
    		<div class="col-sm-offset-2 col-sm-10">
    		</div>
    	</div>
    	<div class="col-sm-offset-2">
    		<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
    	</div>
	</form>
	<br><br>
<?php endif ?>
<table id="tabel" class="table table-striped table-bordered" >
	<thead>
		<th style="text-align: center">NO</th>
		<?php if (Session::get('level') == 1): ?>
		<th>Nama SKPD</th>
		<?php endif ?>
		<th>Nama Dokumen</th>
		<th>Dokumen</th>
		<th style="width: 175px;"></th>
	</thead>
	<tbody>
        @foreach ($arsips as $arsip)
        <tr>
			<td style="text-align: center">{{ $loop->iteration }}</td>
			<?php if (Session::get('level') == 1): ?>
			<td><?php echo $arsip->nama_sopd ?></td>
			<?php endif ?>
			<td><?php echo $arsip->nama_dokumen ?></td>
			<td><?php echo $arsip->dokumen ?></td>
			<td style="text-align: center">
				<a href="{{ route('docs', ['id' => $arsip->id]) }}" target="_blank" class="btn btn-success" title="Lihat"><i class="fa fa-eye"></i></a>
				<a href="{{ route('download', ['id' => $arsip->id]) }}" target="_blank" class="btn btn-default" title="Unduh"><i class="fa fa-download"></i></a>
				<?php if (Session::get('idSopd') != null && Session::get('level') != 1): ?>
				<a href="{{ route('arsip.delete', ['id' => $arsip->id]) }}" class="btn btn-default" title="Hapus"><i class="fa fa-eraser"></i></a>
				
				<?php endif ?>
			</td>
		</tr>
        @endforeach
	</tbody>
</table>

@endsection
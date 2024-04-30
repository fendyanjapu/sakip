@extends('layouts.template-home')

@section('content')
<script>
	$(document).ready(function(){
		// Dropdown / Select
		$('#jenisSopd').change(function(){
			let id = $(this).val();
			$.ajax({
				type   : "GET",
				data   : "id="+id,
				url    : "{{ route('home.jenisSopd') }}",
				cache  : false,
				success: function(sopd){
					$('#sopd').html(sopd);
				}
			});
		});
		// Pencarian data
		$('#cari').click(function(){
			var id_sopd  = $('#sopd').val();
			var keyword  = $('#keyword').val();
			var jenis    = $('#jenis').val();
				$.ajax({
					type   : "GET",
					url    : "#",
					data   : "id_sopd="+id_sopd+"&keyword="+keyword+"&jenis="+jenis,
					cache  : false,
					success: function(hasil){
						$('#konten').html(hasil);
					}
				});
		});
	});
</script>
<div class="agung-bg">
<div class="inside" style="min-height: 300px" align="center">
	<img href="/" class="logo-agung" src="{{ asset('assets/images/fix-blogo.png') }}" width="400">
	<p></p><br>
	<br><br>
	<table align="center">
		<tr>
			<div class="asoy"<td>
				<select name="jenisSopd" id="jenisSopd" class="form-control">
					<option value="" disabled selected hidden>Pilih Kategori</option>
					@foreach ($jenisSopds as $jenisSopd)
					<option value="{{ $jenisSopd->id }}">
						{{ $jenisSopd->nama }}
					</option>
					@endforeach
				</select>
			</td></div>
			<div class="asoy1"<td>
				<select name="sopd" id="sopd" class="form-control">
					<option value="" disabled selected hidden>PILIH NAMA</option>
					@foreach ($sopds as $sopd)
					<option value="{{ $sopd->id }}">
						{{ $sopd->nama_sopd }}
					</option>
					@endforeach
				</select>
			</td></div>
			<div class="asoy2"<td>
				<input type="text" id="keyword" class="form-control" placeholder="Cari Data" style='width: 300px'>
			</td></div>
			<td>
				<button class="btn" type="submit" id="cari"><i class="fa fa-search"></i> Cari</button>
			</td>
		</tr>
	</table>
	<br>
	<br>
	<br>
	<div id="konten">
		<p align="center"></p>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		
	</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Tutup</span>
				</button>
				<h4 class="modal-title" id="labelModalKu">Contact Form</h4>
			</div>
			<!-- Modal Body -->
			<div class="modal-body">
				<p class="statusMsg"></p>
				<form role="form">
					<div class="form-group">
						<label for="masukkanNama">Nama</label>
						<input type="text" class="form-control" id="masukkanNama" placeholder="Masukkan nama Anda"/>
					</div>
					<div class="form-group">
						<label for="masukkanEmail">Email</label>
						<input type="email" class="form-control" id="masukkanEmail" placeholder="Masukkan email Anda"/>
					</div>
					<div class="form-group">
						<label for="masukkanPesan">Pesan</label>
						<textarea class="form-control" id="masukkanPesan" placeholder="Masukkan pesan Anda"></textarea>
					</div>
				</form>
			</div>
			<!-- Modal Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary submitBtn" onclick="kirimContactForm()">KIRIM</button>
			</div>
		</div>
	</div>
</div>
<!--inner block end here-->
<script>
	function kirimContactForm(){
		var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
		var nama = $('#masukkanNama').val();
		var email = $('#masukkanEmail').val();
		var pesan = $('#masukkanPesan').val();
		if(nama.trim() == '' ){
			alert('Masukkan nama Anda.');
			$('#masukkanNama').focus();
			return false;
		}else if(email.trim() == '' ){
			alert('Masukkan email Anda.');
			$('#masukkanEmail').focus();
			return false;
		}else if(email.trim() != '' && !reg.test(email)){
			alert('Masukkan email yang valid.');
			$('#masukkanEmail').focus();
			return false;
		}else if(pesan.trim() == '' ){
			alert('Masukkan pesan Anda.');
			$('#masukkanPesan').focus();
			return false;
		}else{
			$.ajax({
				type      :'POST',
				url       :'',
				data      :'contactFrmSubmit=1&nama='+nama+'&email='+email+'&pesan='+pesan,
				beforeSend: function () {
					$('.submitBtn').attr("disabled","disabled");
					$('.modal-body').css('opacity', '.5');
				},
				success:function(msg){
					if(msg == 'ok'){
						$('#masukkanNama').val('');
						$('#masukkanEmail').val('');
						$('#masukkanPesan').val('');
						$('.statusMsg').html('<span style="color:green;">Terima kasih telah menghubungi kami.</p>');
					}else{
						$('.statusMsg').html('<span style="color:red;">Ada sedikit masalah, silakan coba lagi.</span>');
					}
					$('.submitBtn').removeAttr("disabled");
					$('.modal-body').css('opacity', '');
				}
			});
		}
	}
</script>

@endsection
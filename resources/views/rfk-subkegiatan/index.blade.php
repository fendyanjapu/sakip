@extends('layouts.template-admin')

@section('content')
<style> 
    th { 
        text-align: center;
    }
    thead {
        background-color : #203369;
        color : white;
    }
</style>
<script>
  $(document).ready(function(){
    $('#tabel').DataTable( {
        scrollY:        "600px",
        scrollX:        false,
        scrollCollapse: true,
        fixedColumns: true,
        responsive: true,
       "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
        } 
    } );
  });
</script>
<h2> 
    <div class="par-text">RFK Subkegiatan</div>
    <div class="par-tex2">
        <?php echo auth()->user()->level != '1' ? auth()->user()->nama_sopd : ''  ?>
</h2><br>
<?php if (auth()->user()->jenis_sopd != '0' && auth()->user()->level != '1'): ?>
  
    <a href="{{ route('rfk-subkegiatan.create') }}"
      class="btn btn-primary" title="Tambah"><i class="fa fa-plus"> Tambah</i></a><br><br><br>
    @if (session()->has('success'))
      <div class="alert alert-success" role="alert">
      {{ session('success') }}
      </div>
    @endif 
<?php endif; ?>
<table id="tabel" class="table table-striped table-bordered" >
  <thead>
    <tr>
      <th style="vertical-align: middle;" width="15px" rowspan="2">NO</th>
      
      <?php if (auth()->user()->level == '1'): ?>
      <th style="vertical-align: middle;" rowspan="2">SKPD</th>
      <?php endif; ?>
      <th style="vertical-align: middle;" rowspan="2">KODE</th>
      <th style="vertical-align: middle;" rowspan="2">SASARAN</th>
      {{-- <th style="vertical-align: middle;" rowspan="2">PROGRAM</th>
      <th style="vertical-align: middle;" rowspan="2">KEGIATAN</th> --}}
      <th style="vertical-align: middle;" rowspan="2">SUBKEGIATAN</th>
      <th style="vertical-align: middle;" rowspan="2">INDIKATOR KINERJA</th>
      <th style="vertical-align: middle;" rowspan="2">SATUAN</th>
      <th style="vertical-align: middle;" colspan="2">TARGET RENSTRA</th>
      <th style="vertical-align: middle;" colspan="2">REALISASI PENCAPAIAN</th>
      <th style="vertical-align: middle;" colspan="2">TARGET KINERJA</th>
      <th style="vertical-align: middle;" rowspan="2">KETERANGAN</th>
      <th style="vertical-align: middle;" rowspan="2">URAIAN SINGKAT</th>
      
      <?php if (auth()->user()->jenis_sopd != '0'): ?>
          <th style="vertical-align: middle;" width="180px" rowspan="2">#</th>
      <?php endif; ?>
    </tr>

    <tr>
        <th>FISIK</th>
        <th>KEUANGAN</th>
        <th>FISIK</th>
        <th>KEUANGAN</th>
        <th>FISIK</th>
        <th>KEUANGAN</th>
    </tr>
    
  </thead>
  <tbody>
    @foreach ($query as $key)
      <tr style="height: 150px;">
        <td style="text-align: center"><?php echo $loop->iteration ?></td>
        
        <?php if (auth()->user()->level == '1'): ?>
        <td><?php echo $key->nama_sopd ?></td>
        <?php endif; ?>
        <td style="text-align: center">
            {{ $key->rfkProgram->kode_a." ".$key->rfkProgram->kode_b." ".$key->rfkProgram->program_kode." ".$key->rfkKegiatan->kegiatan_kode." ".$key->subkegiatan_kode }}
        </td>
        <td style="text-align: center"><?php echo $key->subkegiatan_sasaran ?></td>
        {{-- <td style="text-align: center"><?php echo $key->rfkProgram->program ?></td>
        <td style="text-align: center"><?php echo $key->rfkKegiatan->kegiatan ?></td> --}}
        <td style="text-align: center"><?php echo $key->subkegiatan ?></td>
        <td style="text-align: center"><?php echo $key->subkegiatan_indikator_kinerja ?></td>
        <td style="text-align: center"><?php echo $key->subkegiatan_satuan_k ?></td>
        <td style="text-align: center"><?php echo $key->subkegiatan_target_renstra_k ?></td>
        <td style="text-align: center"><?php echo $key->subkegiatan_target_renstra_rp ?></td>
        <td style="text-align: center"><?php echo $key->subkegiatan_realisasi_pencapaian_k ?></td>
        <td style="text-align: center"><?php echo $key->subkegiatan_realisasi_pencapaian_rp ?></td>
        <td style="text-align: center"><?php echo $key->subkegiatan_target_kinerja_k ?></td>
        <td style="text-align: center"><?php echo $key->subkegiatan_target_kinerja_rp ?></td>
        <td style="text-align: center"><?php echo $key->subkegiatan_ket ?></td>
        <td style="text-align: center"><?php echo $key->uraian_singkat ?></td>

        <?php if (auth()->user()->jenis_sopd != '0'): ?>
          
            <td style="text-align: center;">
              <a href="{{ route('rfk-subkegiatan.edit', ['rfk_subkegiatan' => $key->id]) }}"
                title="Edit" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                <form action="{{ route('rfk-subkegiatan.destroy', ['rfk_subkegiatan' => $key->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-primary" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"> Hapus</i></button>
                </form>
            </td>
          
        <?php endif; ?>
        
      </tr>
    @endforeach
  </tbody>
</table>
<div class="elementot"><a href="https://apps.baritokualakab.go.id/sakip/" class="backber"><i class="fa fa-home" aria-hidden="true"></i> BERANDA</a></div>

    
@endsection
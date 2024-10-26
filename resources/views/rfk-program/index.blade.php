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
    <div class="par-text">RFK Program</div>
    <div class="par-tex2">
        <?php echo auth()->user()->level != '1' ? auth()->user()->nama_sopd : ''  ?>
</h2><br>
<?php if (auth()->user()->jenis_sopd != '0' && auth()->user()->level != '1'): ?>
  
    <a href="{{ route('rfk-program.create') }}"
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
      <th style="vertical-align: middle;" width="15px" >NO</th>
      
      <?php if (auth()->user()->level == '1'): ?>
      <th style="vertical-align: middle;" >SKPD</th>
      <?php endif; ?>
      <th style="vertical-align: middle;" >KODE</th>
      <th style="vertical-align: middle;" >SASARAN</th>
      <th style="vertical-align: middle;" >PROGRAM</th>
      <th style="vertical-align: middle;" >INDIKATOR KINERJA</th>
      <th style="vertical-align: middle;" >SATUAN</th>
      <th style="vertical-align: middle;" >TARGET RENSTRA</th>
      <th style="vertical-align: middle;" >REALISASI PENCAPAIAN</th>
      <th style="vertical-align: middle;" >TARGET KINERJA</th>
      <th style="vertical-align: middle;" >KETERANGAN</th>
      
      <?php if (auth()->user()->jenis_sopd != '0'): ?>
          <th style="vertical-align: middle;" width="180px">#</th>
      <?php endif; ?>
    </tr>
    
  </thead>
  <tbody>
    @foreach ($query as $key)
      <tr style="height: 150px;">
        <td style="text-align: center"><?php echo $loop->iteration ?></td>
        
        <?php if (auth()->user()->level == '1'): ?>
        <td><?php echo $key->nama_sopd ?></td>
        <?php endif; ?>
        <td style="text-align: center"><?php echo $key->kode_a." ".$key->kode_b." ".$key->program_kode ?></td>
        <td style="text-align: center"><?php echo $key->sasaran ?></td>
        <td style="text-align: center"><?php echo $key->program ?></td>
        <td style="text-align: center"><?php echo $key->indikator_kinerja ?></td>
        <td style="text-align: center"><?php echo $key->program_satuan ?></td>
        <td style="text-align: center"><?php echo $key->target_renstra_k ?></td>
        <td style="text-align: center"><?php echo $key->realisasi_pencapaian_k ?></td>
        <td style="text-align: center"><?php echo $key->target_kinerja_k ?></td>
        <td style="text-align: center"><?php echo $key->program_ket ?></td>

        <?php if (auth()->user()->jenis_sopd != '0'): ?>
          
            <td style="text-align: center;">
              <a href="{{ route('rfk-program.edit', ['rfk_program' => $key->id]) }}"
                title="Edit" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                <form action="{{ route('rfk-program.destroy', ['rfk_program' => $key->id]) }}" method="POST">
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
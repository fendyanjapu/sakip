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
    <div class="par-text">RFK Realisai</div>
    <div class="par-tex2">
        <?php echo auth()->user()->level != '1' ? auth()->user()->nama_sopd : ''  ?>
</h2><br>
<?php if (auth()->user()->jenis_sopd != '0' && auth()->user()->level != '1'): ?>
  
    <a href="{{ route('rfk-realisasi.create') }}"
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
      <th style="vertical-align: middle;" >SUBKEGIATAN</th>
      <th style="vertical-align: middle;" >BULAN</th>
      <th style="vertical-align: middle;" >TRIWULAN</th>
      <th style="vertical-align: middle;" >JUMLAH OUTPUT</th>
      <th style="vertical-align: middle;" >PAGU</th>
      
      
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
        
        <td style="text-align: center"><?php echo $key->rfkSubkegiatan->subkegiatan ?></td>
        <td style="text-align: center"><?php echo $key->bulan ?></td>
        <td style="text-align: center"><?php echo $key->triwulan ?></td>
        <td style="text-align: center"><?php echo $key->jumlah_output ?></td>
        <td style="text-align: center"><?php echo $key->pagu ?></td>

        <?php if (auth()->user()->jenis_sopd != '0'): ?>
          
            <td style="text-align: center;">
              <a href="{{ route('rfk-realisasi.edit', ['rfk_realisasi' => $key->id]) }}"
                title="Edit" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                <form action="{{ route('rfk-realisasi.destroy', ['rfk_realisasi' => $key->id]) }}" method="POST">
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
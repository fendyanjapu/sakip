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
    <?php if (auth()->user()->jenis_sopd != '4') { ?> 
    <div class="par-text">Capaian Kinerja Pejabat Esselon II Tahun 2024</div>
    <?php } else { ?>
    <div class="par-text">Capaian Kinerja Pejabat Esselon III Tahun 2024</div>
    <?php } ?>
    <div class="par-tex2">
        <?php echo auth()->user()->level != '1' ? auth()->user()->nama_sopd : ''  ?>
</h2><br>
<?php if (auth()->user()->jenis_sopd != '0' && auth()->user()->level != '1'): ?>
  
    <a href="{{ route('rfk.create') }}"
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
      <th style="vertical-align: middle;" rowspan="2">BULAN</th>
      
      <th style="vertical-align: middle;" colspan="2">TARGET</th>
      <th style="vertical-align: middle;" colspan="2">REALISASI</th>
      <th style="vertical-align: middle;" colspan="2">PRESENTASE</th>
      <th rowspan="2">FILE DUKUNG</th>
      <?php if (auth()->user()->id != '0' && auth()->user()->level != '1'): ?>
        
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
        <td style="text-align: center"><?php echo $key->bulan ?></td>
        
        <td style="text-align: center"><?php echo $key->target_fisik ?></td>
        <td style="text-align: center"><?php echo $key->target_keuangan ?></td>
        <td style="text-align: center"><?php echo $key->realisasi_keuangan ?></td>
        <td style="text-align: center"><?php echo $key->realisasi_fisik ?></td>
        <td style="text-align: center"><?php echo $key->prosentase_fisik ?></td>
        <td style="text-align: center"><?php echo $key->prosentase_keuangan ?></td>
        <td>
          <a href="{{ route('rfk.show', ['rfk' => $key->id]) }}" target="_blank">
            <?php echo $key->file_dukung ?>
          </a>
        </td>

        <?php if (auth()->user()->id != '0' && auth()->user()->level != '1'): ?>
          
            <td style="text-align: center;">
              <a href="{{ route('rfk.edit', ['rfk' => $key->id]) }}"
                title="Edit" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                <form action="{{ route('rfk.destroy', ['rfk' => $key->id]) }}" method="POST">
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
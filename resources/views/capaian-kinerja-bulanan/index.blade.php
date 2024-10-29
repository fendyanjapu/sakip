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
    scrollY:        "300px",
        scrollX:        true,
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
<?php if (auth()->user()->jenis_sopd != '' && auth()->user()->level != '1'): ?>
  
    <a href="{{ route('capaian-kinerja-bulanan.create') }}"
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
      <th style="vertical-align: middle;" width="15px" rowspan="3">NO</th>
      <?php if (auth()->user()->level == '1'): ?>
      <th style="vertical-align: middle;" rowspan="3" >SKPD</th>
      <?php endif; ?>
      <th style="vertical-align: middle;" rowspan="3" >IKU</th>
      <?php if (auth()->user()->id != '0'): ?>
        
          <th style="vertical-align: middle;" rowspan="3" width="180px">#</th>
        
      <?php endif; ?>
      <th style="vertical-align: middle;" rowspan="3" >SATUAN</th>
      <th colspan="24" >Target (T) & Realisasi  (R)</th>
      
    </tr>
    <tr>
      <th colspan="2">Jan</th>
      <th colspan="2">Feb</th>
      <th colspan="2">Mar</th>
      <th colspan="2">Apr</th>
      <th colspan="2">Mei</th>
      <th colspan="2">Jun</th>
      <th colspan="2">Jul</th>
      <th colspan="2">Ags</th>
      <th colspan="2">Sep</th>
      <th colspan="2">Okt</th>
      <th colspan="2">Nov</th>
      <th colspan="2">Des</th>
    </tr>
    <tr>
      
      <th>T</th>
      <th>R</th>
      
      <th>T</th>
      <th>R</th>
      
      <th>T</th>
      <th>R</th>
      
      <th>T</th>
      <th>R</th>
      
      <th>T</th>
      <th>R</th>
      
      <th>T</th>
      <th>R</th>
      
      <th>T</th>
      <th>R</th>
      
      <th>T</th>
      <th>R</th>
      
      <th>T</th>
      <th>R</th>
      
      <th>T</th>
      <th>R</th>
      
      <th>T</th>
      <th>R</th>
      
      <th>T</th>
      <th>R</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($query as $key)
      <tr>
        <td style="text-align: center"><?php echo $loop->iteration ?></td>
        <?php if (auth()->user()->level == '1'): ?>
        <td><?php echo $key->nama_sopd ?></td>
        <?php endif; ?>
        <td><?php echo $key->iku ?></td>
        <?php if (auth()->user()->id != '0'): ?>
          
            <td style="text-align: center">
              <a href="{{ route('capaian-kinerja-bulanan.edit', ['capaian_kinerja_bulanan' => $key->id]) }}"
                data-toggle="tooltip" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                <form action="{{ route('capaian-kinerja-bulanan.destroy', ['capaian_kinerja_bulanan' => $key->id]) }}" method="POST">
                    @csrf
                    <button class="btn btn-primary" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"> Hapus</i></button>
                    @method('delete')
                </form>
            </td>
          
        <?php endif; ?>
        <td><?php echo $key->satuan ?></td>
        <td style="text-align: center"><?php echo $key->t_jan ?></td>
        <td style="text-align: center"><?php echo $key->r_jan ?></td>
        <td style="text-align: center"><?php echo $key->t_feb ?></td>
        <td style="text-align: center"><?php echo $key->r_feb ?></td>
        <td style="text-align: center"><?php echo $key->t_mar ?></td>
        <td style="text-align: center"><?php echo $key->r_mar ?></td>
        <td style="text-align: center"><?php echo $key->t_apr ?></td>
        <td style="text-align: center"><?php echo $key->r_apr ?></td>
        <td style="text-align: center"><?php echo $key->t_mei ?></td>
        <td style="text-align: center"><?php echo $key->r_mei ?></td>
        <td style="text-align: center"><?php echo $key->t_jun ?></td>
        <td style="text-align: center"><?php echo $key->r_jun ?></td>
        <td style="text-align: center"><?php echo $key->t_jul ?></td>
        <td style="text-align: center"><?php echo $key->r_jul ?></td>
        <td style="text-align: center"><?php echo $key->t_ags ?></td>
        <td style="text-align: center"><?php echo $key->r_ags ?></td>
        <td style="text-align: center"><?php echo $key->t_sep ?></td>
        <td style="text-align: center"><?php echo $key->r_sep ?></td>
        <td style="text-align: center"><?php echo $key->t_okt ?></td>
        <td style="text-align: center"><?php echo $key->r_okt ?></td>
        <td style="text-align: center"><?php echo $key->t_nov ?></td>
        <td style="text-align: center"><?php echo $key->r_nov ?></td>
        <td style="text-align: center"><?php echo $key->t_des ?></td>
        <td style="text-align: center"><?php echo $key->r_des ?></td>
        
      </tr>
    @endforeach
  </tbody>
</table>
<div class="elementot"><a href="https://apps.baritokualakab.go.id/sakip/" class="backber"><i class="fa fa-home" aria-hidden="true"></i> BERANDA</a></div>

    
@endsection
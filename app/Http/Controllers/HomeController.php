<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\JenisSopd;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'jenisSopds' => JenisSopd::all(),
            'sopds' => User::where('jenis_sopd', '!=', 0)->orderBy('nama_sopd')->get()
        ]);
    }

    public function jenisSopd(Request $request)
    {
        $id = $request->input('id');
        $sopds = User::where('jenis_sopd', '=', $id)->orderBy('nama_sopd')->get();
        echo "<option value='' disabled selected hidden></option>";
        foreach ($sopds as $sopd) {
            echo "<option value='".$sopd->id_sopd."'>".$sopd->nama_sopd."</option>";
        }
    }

    public function find(Request $request)
    {
        $idSopd = $request->input('id_sopd');
        $keyword = $request->input('keyword');
        $jenisSopd = $request->input('jenis');

        $menus = Menu::with('user')->where('user_id', '!=', '50');

        if ($jenisSopd != '') {
            $menus->whereHas('user', function($q) use ($jenisSopd) {
                $q->where('jenis_sopd', '=', $jenisSopd);
            });
        }
        if ($idSopd != '') {
            $menus->where('user_id', '=', $idSopd);
        }
        if ($keyword != '') {
            $menus->where('judul', 'LIKE', "%{$keyword}%");
        }
        
        $no    = 0;
		echo '<div class="judul-kotak">Hasil Pencarian</div>
		<table class="table table-striped table-bordered">
		<tr>
		<th style="text-align: center">NO</th>
		<th>SKPD</th>
		<th>Data</th>
		<th></th>
		</tr>';

        foreach ($menus->get() as $menu) {
            echo '<tr>
            <td style="text-align: center">'.++$no.'</td>
            <td>'.$menu->user?->nama_sopd.'</td>
            <td>'.$menu->judul.'</td>
            <td><a href="'.$menu->link.'/'.$menu->idmenu.'" target="_blank">Lihat<a></td>
            </tr>';
        }
    }
}

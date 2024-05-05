<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\JenisSopd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $id = $request->id;
        $sopds = User::where('jenis_sopd', '=', $id)->orderBy('nama_sopd')->get();
        echo "<option value='' selected hidden></option>";
        foreach ($sopds as $sopd) {
            echo "<option value='".$sopd->id."'>".$sopd->nama_sopd."</option>";
        }
    }

    public function find(Request $request)
    {
        $idSopd = $request->id_sopd;
        $keyword = $request->keyword;
        $jenisSopd = $request->jenis;

        $menus = Menu::join('users', 'users.id', '=', 'menus.user_id');

        if ($jenisSopd) {
            $menus->where('jenis_sopd', '=', $jenisSopd);
        }
        if ($idSopd) {
            $menus->where('user_id', '=', $idSopd);
        }
        if ($keyword) {
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
            <td>'.$menu->nama_sopd.'</td>
            <td>'.$menu->judul.'</td>
            <td><a href="'.$menu->link.'/'.$menu->idmenu.'" target="_blank">Lihat<a></td>
            </tr>';
        }
    }

    public function login()
    {
        return view('home.login');
    }

    public function loginAct(Request $request)
    {
        $username = $request->username;
        $cek = array('username'=>$username,'password'=>sha1($request->password));
        $user = User::where($cek);
        if($user->count() == null){
            return view('home.login-failed');
        } else {
            foreach ($user->get() as $key) {
                $level = $key->level;
                Session::put('idSopd', $key->id);
                Session::put('username', $username);
                Session::put('namaSopd', $key->nama_sopd);
                Session::put('level', $level);
                Session::put('jenisSopd', $key->jenis_sopd);
            }

            if ($level == 1) {
                // return redirect()->to('superadmin');
                return "superadmin";
            } else {
                return redirect()->to('admin');
            }
            
        }
    }
}

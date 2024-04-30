<?php

namespace App\Http\Controllers;

use App\Models\JenisSopd;
use App\Models\User;
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

        
    }
}

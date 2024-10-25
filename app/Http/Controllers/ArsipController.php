<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
    public function index($jenis_dokumen)
    {
        if (auth()->user()->level == 1) {
            $arsips = Arsip::join('users', 'users.id', '=', 'arsips.user_id')->where('jenis_dokumen', '=', $jenis_dokumen)->orderBy('nama_sopd', 'asc')->get();
        } else {
            $arsips = Arsip::where('user_id', '=', auth()->user()->id)->where('jenis_dokumen', '=', $jenis_dokumen)->orderBy('nama_dokumen', 'asc')->get();
        }

        return view('admin.list', [
            'arsips' => $arsips,
            'judul' => $jenis_dokumen." ".auth()->user()->nama_sopd,
            'jenis_dokumen' => $jenis_dokumen
        ]);
    }

    public function docs($id)
    {
        $arsip = Arsip::find($id);

        return view('admin.doc', ['arsip' => $arsip]);
    }

    public function save(Request $request)
    {
        $rules = [
            'user_id' => "required",
            'nama_dokumen' => "required|max:255",
            'dokumen' => "required|file|max:8192",
            'jenis_dokumen' => "required|max:255",
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('dokumen')) {
            $filename = $request->file('dokumen')->getClientOriginalName();
            $request->file('dokumen')->storeAs('file/arsip/'.$request->user_id, $filename);
            $validatedData['dokumen'] = $filename;
        }

        Arsip::create($validatedData);
        
        $data['judul'] = $request->nama_dokumen;
        $data['link'] = 'file/arsip/'.$request->user_id.'/'.$filename;
        $data['parent'] = '1';
        $data['views'] = '0';
        $data['user_id'] = $request->user_id;

        Menu::create($data);

        return redirect()->route('arsip', ['jenis_dokumen' => $request->jenis_dokumen])->with('success', 'File berhasil disimpan');
        // return redirect()->route('home');
    }

    public function delete($id)
    {
        $arsip = Arsip::find($id);
        Storage::delete($arsip->dokumen);
        $arsip->delete();
        
        return redirect()->route('arsip', ['jenis_dokumen' => $arsip->jenis_dokumen])->with('success', 'File berhasil dihapus');
    }
}

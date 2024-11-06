<?php

namespace App\Http\Controllers;

use App\Models\Rfk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RfkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->level == 1) {
            $rfks = Rfk::join('users', 'users.id', '=', 'rfks.user_id')
            ->orderBy('nama_sopd', 'asc')
            ->where('tahun', '=', date('Y'))
            ->get();
        } else {
            $rfks = Rfk::
            where('user_id', '=', auth()->user()->id)
                ->where('tahun', '=', date('Y'))
                ->get();
        }
        
        return view('rfk.index', [
            'query' => $rfks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rfk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sopd = auth()->user()->id;
        $rules = [
            'bulan' => "required|max:255",
            'target_fisik' => "required|max:255",
            'target_keuangan' => "required|max:255",
            'realisasi_fisik' => "required|max:255",
            'realisasi_keuangan' => "required|max:255",
            'prosentase_fisik' => "required|max:255",
            'prosentase_keuangan' => "required|max:255",
            'file_dukung' => "required|file|max:8192",
        ];
        $data = $request->validate($rules);

        if ($request->file('file_dukung')) {
            $filename = $request->file('file_dukung')->getClientOriginalName();
            $request->file('file_dukung')->storeAs('file/arsip/'.$sopd, $filename);
            $data['file_dukung'] = $filename;
            $data['nama_file'] = pathinfo($filename, PATHINFO_FILENAME);
        }
        
        $data['tahun'] = date('Y');
        $data['user_id'] = $sopd;

        Rfk::create($data);

        return redirect()->route('rfk.index')->with('success', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rfk $rfk)
    {
        $arsip = rfk::find($rfk->id);

        return view('rfk.show', ['rfk' => $rfk]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rfk $rfk)
    {
        $query = $rfk::findOrFail($rfk->id);
        return view('rfk.edit', ['rfk' => $query]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rfk $rfk)
    {
        $query = $rfk::findOrFail($rfk->id);
        $query->update($request->all());

        return redirect()->route('rfk.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rfk $rfk)
    {
        rfk::destroy($rfk->id);

        return redirect()->route('rfk.index')->with('success', 'Berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\RfkKegiatan;
use App\Models\RfkProgram;
use Illuminate\Http\Request;

class RfkKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->level == 1) {
            $rfkKegiatans = RfkKegiatan::join('users', 'users.id', '=', 'rfk_kegiatans.user_id')->orderBy('nama_sopd', 'asc')->where('tahun', '=', date('Y'))->get();
        } else {
            $rfkKegiatans = RfkKegiatan::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        }

        return view('rfk-kegiatan.index', [
            'query' => $rfkKegiatans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rfkPrograms = RfkProgram::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        return view('rfk-kegiatan.create', ['rfkPrograms' => $rfkPrograms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sopd = auth()->user()->id;
        $rules = [
            'rfk_program_id' => "required|max:255",
            'kegiatan_kode' => "required|max:255",
            'kegiatan_sasaran' => "required|max:255",
            'kegiatan' => "required|max:255",
            'kegiatan_indikator_kinerja' => "required|max:255",
            'kegiatan_satuan' => "required|max:255",
            'kegiatan_target_renstra_k' => "required|max:255",
            'kegiatan_realisasi_pencapaian_k' => "required|max:255",
            'kegiatan_target_kinerja_k' => "required|max:255",
            'kegiatan_ket' => "required|max:255",
        ];
        $data = $request->validate($rules);

        $data['tahun'] = date('Y');
        $data['user_id'] = $sopd;

        RfkKegiatan::create($data);

        return redirect()->route('rfk-kegiatan.index')->with('success', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(RfkKegiatan $rfkKegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RfkKegiatan $rfkKegiatan)
    {
        $rfkPrograms = RfkProgram::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        $query = $rfkKegiatan::findOrFail($rfkKegiatan->id);

        return view('rfk-kegiatan.edit', [
            'rfkKegiatan' => $query,
            'rfkPrograms' => $rfkPrograms
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RfkKegiatan $rfkKegiatan)
    {
        $query = $rfkKegiatan::findOrFail($rfkKegiatan->id);
        $query->update($request->all());

        return redirect()->route('rfk-kegiatan.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RfkKegiatan $rfkKegiatan)
    {
        RfkKegiatan::destroy($rfkKegiatan->id);

        return redirect()->route('rfk-kegiatan.index')->with('success', 'Berhasil dihapus');
    }
}

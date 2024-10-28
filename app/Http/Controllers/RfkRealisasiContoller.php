<?php

namespace App\Http\Controllers;

use App\Models\RfkProgram;
use App\Models\RfkKegiatan;
use App\Models\RfkRealisasi;
use Illuminate\Http\Request;
use App\Models\RfkSubkegiatan;

class RfkRealisasiContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->level == 1) {
            $rfkRealisasis = RfkRealisasi::join('users', 'users.id', '=', 'rfk_realisasis.user_id')->orderBy('nama_sopd', 'asc')->where('tahun', '=', date('Y'))->get();
        } else {
            $rfkRealisasis = RfkRealisasi::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        }

        return view('rfk-realisasi.index', [
            'query' => $rfkRealisasis,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rfkPrograms = RfkProgram::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        return view('rfk-realisasi.create', ['rfkPrograms' => $rfkPrograms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sopd = auth()->user()->id;
        $rules = [
            'bulan' => "required|max:255",
            'triwulan' => "required|max:255",
            'jumlah_output' => "required|max:255",
            'pagu' => "required|max:255",
            'rfk_program_id' => "required|max:255",
            'rfk_kegiatan_id' => "required|max:255",
            'rfk_subkegiatan_id' => "required|max:255",
        ];
        $data = $request->validate($rules);

        $data['tahun'] = date('Y');
        $data['user_id'] = $sopd;

        RfkRealisasi::create($data);

        return redirect()->route('rfk-realisasi.index')->with('success', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(RfkRealisasi $rfkRealisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RfkRealisasi $rfkRealisasi)
    {
        $rfkPrograms = RfkProgram::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        $rfkKegiatans = RfkKegiatan::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        $rfkSubkegiatans = RfkSubkegiatan::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        $query = $rfkRealisasi::findOrFail($rfkRealisasi->id);

        return view('rfk-realisasi.edit', [
            'rfkRealisasi' => $query,
            'rfkPrograms' => $rfkPrograms,
            'rfkKegiatans' => $rfkKegiatans,
            'rfkSubkegiatans' => $rfkSubkegiatans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RfkRealisasi $rfkRealisasi)
    {
        $query = $rfkRealisasi::findOrFail($rfkRealisasi->id);
        $query->update($request->all());

        return redirect()->route('rfk-realisasi.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RfkRealisasi $rfkRealisasi)
    {
        RfkRealisasi::destroy($rfkRealisasi->id);

        return redirect()->route('rfk-realisasi.index')->with('success', 'Berhasil dihapus');
    }
}

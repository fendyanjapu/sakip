<?php

namespace App\Http\Controllers;

use App\Models\RfkKegiatan;
use App\Models\RfkProgram;
use Illuminate\Http\Request;
use App\Models\RfkSubkegiatan;

class RfkSubkegiatanContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->level == 1) {
            $rfkSubkegiatans = RfkSubkegiatan::join('users', 'users.id', '=', 'rfk_kegiatans.user_id')->orderBy('nama_sopd', 'asc')->where('tahun', '=', date('Y'))->get();
        } else {
            $rfkSubkegiatans = RfkSubkegiatan::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        }

        return view('rfk-subkegiatan.index', [
            'query' => $rfkSubkegiatans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rfkPrograms = RfkProgram::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        return view('rfk-subkegiatan.create', ['rfkPrograms' => $rfkPrograms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sopd = auth()->user()->id;
        $rules = [
            'subkegiatan_kode' => "required|max:255",
            'subkegiatan_sasaran' => "required|max:255",
            'subkegiatan' => "required|max:255",
            'subkegiatan_indikator_kinerja' => "required|max:255",
            'subkegiatan_satuan_k' => "required|max:255",
            'subkegiatan_target_renstra_k' => "required|max:255",
            'subkegiatan_target_renstra_rp' => "required|max:255",
            'subkegiatan_realisasi_pencapaian_k' => "required|max:255",
            'subkegiatan_realisasi_pencapaian_rp' => "required|max:255",
            'subkegiatan_target_kinerja_k' => "required|max:255",
            'subkegiatan_target_kinerja_rp' => "required|max:255",
            'subkegiatan_ket' => "required|max:255",
            'uraian_singkat' => "required|max:255",
            'rfk_program_id' => "required|max:255",
            'rfk_kegiatan_id' => "required|max:255",
        ];
        $data = $request->validate($rules);

        $data['tahun'] = date('Y');
        $data['user_id'] = $sopd;

        RfkSubkegiatan::create($data);

        return redirect()->route('rfk-subkegiatan.index')->with('success', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(RfkSubkegiatan $rfkSubkegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RfkSubkegiatan $rfkSubkegiatan)
    {
        $rfkPrograms = RfkProgram::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        $rfkKegiatans = RfkKegiatan::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        $query = $rfkSubkegiatan::findOrFail($rfkSubkegiatan->id);

        return view('rfk-subkegiatan.edit', [
            'rfkSubkegiatan' => $query,
            'rfkPrograms' => $rfkPrograms,
            'rfkKegiatans' => $rfkKegiatans
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RfkSubkegiatan $rfkSubkegiatan)
    {
        $query = $rfkSubkegiatan::findOrFail($rfkSubkegiatan->id);
        $query->update($request->all());

        return redirect()->route('rfk-subkegiatan.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RfkSubkegiatan $rfkSubkegiatan)
    {
        RfkSubkegiatan::destroy($rfkSubkegiatan->id);

        return redirect()->route('rfk-subkegiatan.index')->with('success', 'Berhasil dihapus');
    }
}

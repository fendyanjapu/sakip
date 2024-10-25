<?php

namespace App\Http\Controllers;

use App\Models\RfkProgram;
use Illuminate\Http\Request;

class RfkProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->level == 1) {
            $rfkPrograms = RfkProgram::join('users', 'users.id', '=', 'rfk_programs.user_id')->orderBy('nama_sopd', 'asc')->where('tahun', '=', date('Y'))->get();
        } else {
            $rfkPrograms = RfkProgram::where('user_id', '=', auth()->user()->id)->where('tahun', '=', date('Y'))->get();
        }

        return view('rfk-program.index', [
            'query' => $rfkPrograms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rfk-program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sopd = auth()->user()->id;
        $rules = [
            'kode_a' => "required|max:255",
            'kode_b' => "required|max:255",
            'program_kode' => "required|max:255",
            'sasaran' => "required|max:255",
            'program' => "required|max:255",
            'indikator_kinerja' => "required|max:255",
            'program_satuan' => "required|max:255",
            'target_renstra_k' => "required|max:255",
            'realisasi_pencapaian_k' => "required|max:255",
            'target_kinerja_k' => "required|max:255",
            'program_ket' => "required|max:255",
        ];
        $data = $request->validate($rules);

        $data['tahun'] = date('Y');
        $data['user_id'] = $sopd;

        RfkProgram::create($data);

        return redirect()->route('rfk-program.index')->with('success', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RfkProgram $rfkProgram)
    {
        $query = $rfkProgram::findOrFail($rfkProgram->id);
        return view('rfk-program.edit', ['rfkProgram' => $query]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RfkProgram $rfkProgram)
    {
        $query = $rfkProgram::findOrFail($rfkProgram->id);
        $query->update($request->all());

        return redirect()->route('rfk-program.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RfkProgram $rfkProgram)
    {
        RfkProgram::destroy($rfkProgram->id);

        return redirect()->route('rfk-program.index')->with('success', 'Berhasil dihapus');
    }
}

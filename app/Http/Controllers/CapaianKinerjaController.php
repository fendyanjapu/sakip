<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CapaianKinerja;
use Illuminate\Support\Facades\Session;

class CapaianKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->level == 1) {
            $capaianKinerjas = CapaianKinerja::join('users', 'users.id', '=', 'capaian_kinerjas.user_id')
            ->orderBy('nama_sopd', 'asc')
            ->where('tahun', '=', date('Y'))
            ->get();
        } else {
            $capaianKinerjas = CapaianKinerja::
            where('user_id', '=', auth()->user()->id)
            ->where('tahun', '=', date('Y'))
            ->get();
        }
        
        return view('capaian-kinerja.index', [
            'query' => $capaianKinerjas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('capaian-kinerja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['tahun'] = date('Y');
        $data['user_id'] = auth()->user()->id;

        CapaianKinerja::create($data);

        return redirect()->route('capaian-kinerja.index')->with('success', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(CapaianKinerja $capaianKinerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CapaianKinerja $capaianKinerja)
    {
        $query = CapaianKinerja::findOrFail($capaianKinerja->id);
        return view('capaian-kinerja.edit', ['capaianKinerja' => $query]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CapaianKinerja $capaianKinerja)
    {
        $query = CapaianKinerja::findOrFail($capaianKinerja->id);
        $query->update($request->all());

        return redirect()->route('capaian-kinerja.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CapaianKinerja $capaianKinerja)
    {
        CapaianKinerja::destroy($capaianKinerja->id);

        return redirect()->route('capaian-kinerja.index')->with('success', 'Berhasil dihapus');
    }
}

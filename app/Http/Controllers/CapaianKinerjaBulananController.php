<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CapaianKinerjaBulanan;
use Illuminate\Support\Facades\Session;

class CapaianKinerjaBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->level == 1) {
            $capaianKinerjaBulanans = CapaianKinerjaBulanan::join('users', 'users.id', '=', 'capaian_kinerja_bulanans.user_id')
            ->orderBy('nama_sopd', 'asc')
            ->where('tahun', '=', date('Y'))
            ->get();
        } else {
            $capaianKinerjaBulanans = CapaianKinerjaBulanan::
            where('user_id', '=', auth()->user()->id)
            ->where('tahun', '=', date('Y'))
            ->get();
        }
        
        return view('capaian-kinerja-bulanan.index', [
            'query' => $capaianKinerjaBulanans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('capaian-kinerja-bulanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['tahun'] = date('Y');
        $data['user_id'] = auth()->user()->id;

        CapaianKinerjaBulanan::create($data);

        return redirect()->route('capaian-kinerja-bulanan.index')->with('success', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(CapaianKinerjaBulanan $capaianKinerjaBulanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CapaianKinerjaBulanan $capaianKinerjaBulanan)
    {
        $query = $capaianKinerjaBulanan::findOrFail($capaianKinerjaBulanan->id);
        return view('capaian-kinerja-bulanan.edit', ['capaianKinerjaBulanan' => $query]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CapaianKinerjaBulanan $capaianKinerjaBulanan)
    {
        $query = $capaianKinerjaBulanan::findOrFail($capaianKinerjaBulanan->id);
        $query->update($request->all());

        return redirect()->route('capaian-kinerja-bulanan.index')->with('success', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CapaianKinerjaBulanan $capaianKinerjaBulanan)
    {
        CapaianKinerjaBulanan::destroy($capaianKinerjaBulanan->id);

        return redirect()->route('capaian-kinerja-bulanan.index')->with('success', 'Berhasil dihapus');
    }
}

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
        $capaianKinerjaBulanans = CapaianKinerjaBulanan::
        where('user_id', '=', Session::get('idSopd'))
            ->where('tahun', '=', date('Y'))
            ->get();
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
        $data['user_id'] = Session::get('idSopd');

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

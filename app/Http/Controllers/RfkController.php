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
        $rfks = Rfk::
        where('user_id', '=', Session::get('idSopd'))
            ->where('tahun', '=', date('Y'))
            ->get();
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
        $data = $request->all();
        $data['file_dukung'] = 'ok';
        $data['nama_file'] = 'ok';
        $data['tahun'] = date('Y');
        $data['user_id'] = Session::get('idSopd');

        Rfk::create($data);

        return redirect()->route('rfk.index')->with('success', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rfk $rfk)
    {
        //
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

<?php

namespace App\Http\Controllers;

use App\Models\RfkKegiatan;
use App\Models\RfkProgram;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function selectProgram(Request $request)
    {
        $id = $request->id;
        $rfkProgram = RfkProgram::findOrFail($id);

        return json_encode($rfkProgram);
    }

    public function selectProgramKegiatan(Request $request)
    {
        $id = $request->id;
        $rfkKegiatans = RfkKegiatan::where('rfk_program_id', '=', $id)->get();
        echo "<option value='' selected hidden></option>";
        foreach ($rfkKegiatans as $rfkKegiatan) {
            echo "<option value='".$rfkKegiatan->id."'>".$rfkKegiatan->kegiatan."</option>";
        }
    }

    public function selectKegiatan(Request $request)
    {
        $id = $request->id;
        $rfkKegiatan = RfkKegiatan::findOrFail($id);

        return json_encode($rfkKegiatan);
    }
}

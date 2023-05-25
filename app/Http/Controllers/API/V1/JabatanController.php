<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    public function ReadJabatan()
    {
        $jabatan = Jabatan::all();
        return response($jabatan, 200);
    }

    public function SimpanJabatan(Request $x)
    {
       Jabatan::create([
            'nama_jabatan'=>$x->nama_jabatan
        ]);
        return response('Berhasil disimpan!',200);
    }

    public function HapusJabatan($id_jabatan)
    {
        Jabatan::find($id_jabatan)->delete();
        return response('Berhasil dihapus!',200);
    }

    public function getEditJabatanByID($id_jabatan) {
        $jabatan = Jabatan::where('id_jabatan', "=", $id_jabatan)->get();
        return response($jabatan, 200);
    }

    public function EditJabatan(Request $x)
    {
        Jabatan::where('id_jabatan', '=', $x->id_jabatan)->update([
            'nama_jabatan'=>$x->nama_jabatan
        ]);

        return response('Berhasil diedit!',200);
    }
}

<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departemen;

class DepartemenController extends Controller
{
    public function ReadDepartemen()
    {
        $departemen = Departemen::all();
        return response($departemen, 200);
    }

    public function SimpanDepartemen(Request $x)
    {
        Jabatan::create([
            'nama_departemen'=>$x->nama_departemen
        ]);
        return response('Berhasil disimpan!',200);
    }

    public function HapusDepartemen($id_departemen)
    {
        Departemen::find($id_departemen)->delete();
        return response('Berhasil dihapus!',200);
    }

    public function getEditDepartemenByID($id_jabatan) {
        $departemen = Departemen::where('id_departemen', "=", $id_departemen)->get();
        return $departemen;
    }

    public function EditDepartemen(Request $x)
    {
        Departemen::where('id_departemen', '=', $x->id_departemen)->update([
            'nama_departemen'=>$x->nama_departemen
        ]);

        return response('Berhasil diedit!',200);
    }
}

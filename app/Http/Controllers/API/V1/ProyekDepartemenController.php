<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Proyek_Departemen;
use Illuminate\Http\Request;


class ProyekDepartemenController extends Controller
{
    public function ReadProyekDepartemen()
    {
        $proyek_departemen = Proyek_Departemen::all();
        return response($proyek_departemen, 200);
    }

    public function SimpanProyekDepartemen(Request $x)
    {
       Proyek_Departemen::create([
            'id_departemen'=>$x->id_departemen,
            'id_proyek'=>$x->id_proyek
        ]);
        return response('Berhasil disimpan!',200);
    }

    public function HapusProyekDepartemen($id_proyek_departemen)
    {
        Proyek_Departemen::find($id_proyek_departemen)->delete();
        return response('Berhasil dihapus!',200);
    }

    public function getEditProyekDepartemenByID($id_proyek_departemen) {
        $proyek_departemen = Proyek_Departemen::where('id_proyek_departemen', "=", $id_proyek_departemen)->get();
        return $proyek_departemen;
    }

    public function getEditProyekDepartemen(Request $x)
    {
        Proyek_Departemen::where('id_proyek_departemen', '=', $x->id_proyek_departemen)->update([
            'id_departemen'=>$x->id_departemen,
            'id_proyek'=>$x->id_proyek
        ]);

        return response('Berhasil diedit!',200);
    }

}

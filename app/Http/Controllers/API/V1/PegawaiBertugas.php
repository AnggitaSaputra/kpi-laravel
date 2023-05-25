<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Pegawai_Bertugas;
use Illuminate\Http\Request;

class PegawaiBertugas extends Controller
{
    public function ReadPegawaiBertugas()
    {
        $pegawai_bertugas = PegawaiBertugas::all();
        return response($pegawai_bertugas, 200);
    }
    public function SimpanPegawaiBertugas(Request $x)
    {
        PegawaiBertugas::create([
            'id_tugas'=>$x->id_tugas,
            'id_pegawai'=> $x ->id_pegawai
        ]);
        return response('Berhasil disimpan!',200);
    }
    public function HapusPegawaiBertugas($id_tugas,$id_pegawai)
    {
        PegawaiBertugas::where([
            ['id_tugas', '=', $id_tugas],
            ['id_pegawai', '=', $id_pegawai],
        ])->delete();
        return response('Berhasil dihapus!',200);
    }

    public function getEditPegawaiBertugasByID($id_tugas,$id_pegawai) {
        $pegawai_bertugas = PegawaiBertugas::where([
            ['id_tugas', '=', $id_tugas],
            ['id_pegawai', '=', $id_pegawai],
        ])->get();
        return response($pegawai_bertugas, 200);
    }

    public function EditPegawaiBertugas(Request $x)
    {
        PegawaiBertugas::where([
            ['id_tugas', '=', $id_tugas],
            ['id_pegawai', '=', $id_pegawai],
        ])->update([
            'id_tugas'=>$x->id_tugas
        ]);

        return response('Berhasil diedit!',200);
    }

}   

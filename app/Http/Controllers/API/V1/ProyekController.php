<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Proyek;
use Illuminate\Http\Request;


class ProyekController extends Controller
{
    public function ReadProyek()
    {
        $proyek = Proyek::all();
        return response($proyek, 200);
    }

    public function SimpanProyek(Request $x)
    {
       Proyek::create([
            'nama_proyek'=>$x->nama_proyek,
            'deskripsi_proyek'=> $x ->deskripsi,
            'tanggal_mulai' => $x -> tanggal_mulai,
            'tanggal_selesai' => $x -> tanggal_selesai,
            'estimasi_durasi' => $x -> estimasi_durasi,
            'status' => $x -> status
        ]);
        return response('Berhasil disimpan!',200);
    }

    public function HapusProyek($id_proyek)
    {
        Proyek::find($id_proyek)->delete();
        return response('Berhasil dihapus!',200);
    }

    public function getEditProyekByID($id_proyek) {
        $proyek = Proyek::where('id_proyek', "=", $id_proyek)->get();
        return $proyek;
    }

    public function EditProyek(Request $x)
    {
        Proyek::where('id_proyek', '=', $x->id_proyek)->update([
            'nama_proyek'=>$x->nama_proyek,
            'deskripsi_proyek'=> $x ->deskripsi,
            'tanggal_mulai' => $x -> tanggal_mulai,
            'tanggal_selesai' => $x -> tanggal_selesai,
            'estimasi_durasi' => $x -> estimasi_durasi,
            'status' => $x -> status
        ]);

        return response('Berhasil diedit!',200);
    }
}

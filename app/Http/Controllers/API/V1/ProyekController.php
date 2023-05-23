<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function ReadProyek()
    {
        $proyek = DB::table('proyek')->get();
        return $proyek;
    }
    public function SimpanProyek(Request $x)
    {
        $proyek = DB::table('proyek')->insertGetId([
            'nama_proyek' => $x->nama_proyek,
            'deskripsi_proyek'=> $x ->deskripsi,
            'tanggal_mulai' => $x -> tanggal_mulai,
            'tanggal_selesai' => $x -> tanggal_selesai,
            'estimasi_durasi' => $x -> estimasi_durasi,
            'status' => $x -> status,
        ]);
    }
    public function HapusProyek($id_proyek)
    {
        $proyek = DB::table('proyek')->where('id_proyek', $id_proyek)->delete();
    }
    public function Editproyek($id_proyek)
    {
        $proyek = DB::table('proyek')->where('id_proyek', $id_proyek)->get();
        return $proyek;
    }
    public function Edittproyek($x)
    {
        $proyek = DB::table('proyek')->where('id_proyek', $x->id_proyek)->update([
            'nama_proyek' => $x->nama_proyek,
            'deskripsi_proyek'=> $x ->deskripsi,
            'tanggal_mulai' => $x -> tanggal_mulai,
            'tanggal_selesai' => $x -> tanggal_selesai,
            'estimasi_durasi' => $x -> estimasi_durasi,
            'status' => $x -> status,
        ]);
    }
}

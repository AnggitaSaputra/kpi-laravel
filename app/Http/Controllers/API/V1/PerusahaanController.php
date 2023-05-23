<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function ReadPerusahaan()
    {
        $perusahaan = DB::table('perusahaan')->get();
        return $perusahaan;
    }
    public function SimpanPerusahaan(Request $x)
    {
        $perusahaan = DB::table('perusahaan')->insertGetId([
            'nama_perusahaan' => $x->nama_perusahaan,
            'no_telpon'=> $x ->no_telpon,
            'alamat'=>$x ->alamat,
            'provisi'=>$x ->provinsi,
            'kota'=>$x ->kota,
        ]);
    }
    public function HapusPerusahaan($id_perusahaan)
    {
        $perusahaan = DB::table('perusahaan')->where('id_perusahaan', $id_perusahaan)->delete();
    }
    public function EditPerusahaan($id_perusahaan)
    {
        $perusahaan = DB::table('perusahaan')->where('id_perusahaan', $id_perusahaan)->get();
        return $perusahaan;
    }
    public function Edittperusahaan($x)
    {
        $perusahaan = DB::table('perusahaan')->where('id_perusahaan', $x->id_perusahaan)->update([
            'nama_perusahaan' => $x->nama_perusahaan,
            'no_telpon'=> $x ->no_telpon,
            'alamat'=>$x ->alamat,
            'provisi'=>$x ->provinsi,
            'kota'=>$x ->kota,
        ]);
    }
}

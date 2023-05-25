<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Http\Request;


class PerusahaanController extends Controller
{
    public function ReadPerusahaan()
    {
        $perusahaan = Perusahaan::all();
        return response($perusahaan, 200);
    }

    public function SimpanPerusahaan(Request $x)
    {
       Perusahaan::create([
            'nama_perusahaan'=>$x->nama_perusahaan,
            'no_telpon'=> $x ->no_telpon,
            'alamat'=>$x ->alamat,
            'provisi'=>$x ->provinsi,
            'kota'=>$x ->kota
        ]);
        return response('Berhasil disimpan!',200);
    }

    public function HapusPerusahaan($id_perusahaan)
    {
        Perusahaan::find($id_perusahaan)->delete();
        return response('Berhasil dihapus!',200);
    }

    public function getEditPerusahaanByID($id_perusahaan) {
        $perusahaan = Perusahaan::where('id_perusahaan', "=", $id_perusahaan)->get();
        return $perusahaan;
    }

    public function EditPerusahaan(Request $x)
    {
        Perusahaan::where('id_perusahaan', '=', $x->id_perusahaan)->update([
            'nama_perusahaan'=>$x->nama_perusahaan,
            'no_telpon'=> $x ->no_telpon,
            'alamat'=>$x ->alamat,
            'provisi'=>$x ->provinsi,
            'kota'=>$x ->kota
        ]);

        return response('Berhasil diedit!',200);
    }

}

<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pegawai;

use function PHPUnit\Framework\fileExists;

class PegawaiController extends Controller
{
    public function ReadPegawai()
    {
        $pegawai = Pegawai::all();
        return response($pegawai, 200);
    }
    public function SimpanPegawai(Request $x)
    {
        // Add Picture
        $image = $x->pic;

        $path_img = 'image/karyawan/';
        if (!fileExists($path_img)) {
            mkdir(public_path($path_img));
        }
        // $id_user = Auth::id();
        $id_user = '0';
        $imageName = 'pic-'.$id_user.'.'.$image->getClientOriginalExtension();

        $image->move($path_img, $imageName);

        Pegawai::create([
            'id_departemen'=>$x->id_departemen,
            'id_perusahaan'=>$x->id_perusahaan,
            'id_jabatan'=> $x->id_jabatan,
            'nama_pegawai' => $x->nama_pegawai,
            'username' => $x->username,
            'password' => $x->password,
            'pic' => $imageName,
            'email' => $x->email,
            'alamat' => $x->alamat,
            'telepon' => $x->telepon,
            'no_ktp' => $x->no_ktp,
            'tanggal_masuk' => $x->tanggal_masuk,
        ]);

        return response('Berhasil disimpan!',200);
    }
    public function HapusPegawai($id_pegawai)
    {
        Pegawai::find($id_pegawai)->delete();
        return response('Berhasil dihapus!',200);
    }

    public function getEditPegawaiByID($id_pegawai) {
        $pegawai = Pegawai::where('id_pegawai', "=", $id_pegawai)->get();
        return respone($pegawai, 200);
    }

    public function EditPegawai(Request $x)
    {
        Pegawai::where('id_pegawai', '=', $x->id_pegawi)->update([
            'id_departemen' => $x->id_departemen,
            'id_perusahaan'=>$x->id_perusahaan,
            'id_jabatan'=> $x->id_jabatan,
            'nama_pegawai' => $x->nama_pegawai,
            'username' => $x->username,
            'password' => $x->password,
            'pic' => $nama_pic,
            'email' => $x->email,
            'alamat' => $x->alamat,
            'telepon' => $x->telepon,
            'no_ktp' => $x->no_ktp,
            'tanggal_masuk' => $x->tanggal_masuk,
        ]);

        return response('Berhasil diedit!',200);
    }
}

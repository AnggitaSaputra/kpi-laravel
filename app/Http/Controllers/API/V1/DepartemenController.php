<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function ReadDepartemen()
    {
        $departemen = DB::table('departemen')->get();
        return $departemen;
    }
    public function SimpanDepartemen(Request $x)
    {
        $departemen = DB::table('departemen')->insertGetId([
            'nama_departemen' => $x->nama_departemen
        ]);
    }
    public function HapusDepartemen($id_departemen)
    {
        $jabatan = DB::table('jabatan')->where('id_jabatan', $id_jabatan)->delete();
    }
    public function EditDepartemen($id_departemen)
    {
        $departemen = DB::table('departemen')->where('id_departemen', $id_jabatan)->get();
        return $departemen;
    }
    public function EdittDepartemen($x)
    {
        $departemen = DB::table('departemen')->where('id_departemen', $x->id_departemen)->update([
            'nama_departemen' => $x->nama_departemen
        ]);
    }
}

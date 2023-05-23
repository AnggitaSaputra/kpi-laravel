<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function ReadJabatan()
    {
        $jabatan = DB::table('jabatan')->get();
        return $jabatan;
    }
    public function SimpanJabatan(Request $x)
    {
        $jabatan = DB::table('jabatan')->insertGetId([
            'nama_jabatan' => $x->nama_jabatan
        ]);
    }
    public function HapusJabatan($id_jabatan)
    {
        $jabatan = DB::table('jabatan')->where('id_jabatan', $id_jabatan)->delete();
    }
    public function EditJabatan($id_jabatan)
    {
        $jabatan = DB::table('jabatan')->where('id_jabatan', $id_jabatan)->get();
        return $jabatan;
    }
    public function EdittJabatan($x)
    {
        $jabatan = DB::table('jabatan')->where('id_jabatan', $x->id_jabatan)->update([
            'nama_jabatan' => $x->nama_jabatan
        ]);
    }
}

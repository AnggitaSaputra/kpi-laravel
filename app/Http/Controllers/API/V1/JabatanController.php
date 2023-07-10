<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use Yajra\DataTables\DataTables;

class JabatanController extends Controller
{
    public function view()
    {
        return view('jabatan.main');
    }

    public function ReadJabatan()
    {
        $jabatan = Jabatan::all();
        return DataTables::of($jabatan)
        ->addColumn('action', function($data) {
            $url = str_replace("/get", "", url()->current());
            $button = '<a href="'.$url.'/edit/'.$data->id_jabatan.'" class="btn btn-primary mx-1">Edit</a>';
            $button .= '<a href="'.$url.'/hapus/'.$data->id_jabatan.'" class="btn btn-danger mx-1">Hapus</a>';
            return $button;
        })
        ->make(true);    
    }

    Public function viewTambah() {

        return view('jabatan.add');
    }

    public function SimpanJabatan(Request $x)
    {
        $id_user = DB::table('jabatan')->max('id_jabatan');
        $id_user += 1;

        Jabatan::create([
            'nama_jabatan'=>$x->nama_jabatan
        ]);
        
        return redirect('/jabatan')->with('success', 'Data berhasil ditambahkan!');
    }

    public function HapusJabatan($id)
    {
        Jabatan::where('id_jabatan', '=', $id)->delete();
        return redirect('/jabatan')->with('success', 'Data berhasil dihapus!');

    }

    public function viewEdit($id) {
        $data['jabatan'] = Jabatan::where('id_jabatan', '=', $id)->get();
        return view('jabatan.edit', $data);
    }

    public function EditJabatan(Request $x, $id)
    {
        $id_user = $id;
        Jabatan::where('id_jabatan', '=', $id)->update([
            'nama_jabatan' => $x->nama_jabatan,
        ]);

        return redirect('/jabatan')->with('success', 'Data berhasil dirubah!');
    }
}

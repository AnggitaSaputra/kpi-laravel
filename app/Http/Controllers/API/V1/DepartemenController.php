<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departemen;
use Yajra\DataTables\DataTables;

class DepartemenController extends Controller
{
    public function view()
    {
        return view('departemen.main');
    }
    public function ReadDepartemen()
    {
        $departemen = Departemen::all();
        return DataTables::of($departemen)
            ->addColumn('action', function($data) {
                $url = str_replace("/get", "", url()->current());
                $button = '<a href="'.$url.'/edit/'.$data->id_departemen.'" class="btn btn-primary mx-1">Edit</a>';
                $button .= '<a href="'.$url.'/hapus/'.$data->id_departemen.'" class="btn btn-danger mx-1">Hapus</a>';
                $button .= '<a href="'.'/jabatan/'.'" class="btn btn-primary mx-1">+ Jabatan</a>';
                return $button;
            })
            ->make(true);
        
    }

    Public function viewTambah() {

        return view('departemen.add');
    }

    public function SimpanDepartemen(Request $x)
    {
        
        $id_user = DB::table('departemen')->max('id_departemen');
        $id_user += 1;

        Departemen::create([
            'nama_departemen'=>$x->nama_departemen
        ]);
       
        return redirect('/departemen')->with('success', 'Data berhasil ditambahkan!');
    }

    public function HapusDepartemen($id)
    {
        Departemen::where('id_departemen', '=', $id)->delete();
        return redirect('/departemen')->with('success', 'Data berhasil dihapus!');
    }

    public function viewEdit($id) {
        $data['departemen'] = Departemen::where('id_departemen', '=', $id)->get();
        return view('departemen.edit', $data);
    }

    public function EditDepartemen(Request $x, $id)
    {
        $id_user = $id;
        Departemen::where('id_departemen', '=', $id)->update([
            'nama_departemen' => $x->nama_departemen,
        ]);

        return redirect('/departemen')->with('success', 'Data berhasil dirubah!');
    }

}

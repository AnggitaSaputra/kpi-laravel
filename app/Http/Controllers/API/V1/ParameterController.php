<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parameter;
use Yajra\DataTables\DataTables;

class ParameterController extends Controller
{
    public function view() {
        return view('parameter.main');
    }
    public function ReadParameter()
    {
        $parameter = Parameter::all();
        return DataTables::of($parameter)
        ->addColumn('action', function($data) {
            $url = str_replace("/get", "", url()->current());
            $button = '<a href="'.$url.'/edit/'.$data->id_parameter.'" class="btn btn-primary mx-1">Edit</a>';
            $button .= '<a href="'.$url.'/hapus/'.$data->id_parameter.'" class="btn btn-danger mx-1">Hapus</a>';
            return $button;
        })
        ->make(true);
 
    }
    Public function viewTambah() {

        return view('parameter.add');
    }

    public function SimpanParameter(Request $x)
    {
        $id_user = DB::table('parameter')->max('id_parameter');
        $id_user += 1;

        Parameter::create([
            'nama_parameter'=>$x->nama_parameter,
            'bobot'=>$x->bobot
        ]);
        
        return redirect('/parameter')->with('success', 'Data berhasil ditambahkan!');

    }

    public function HapusParameter($id)
    {
        Parameter::where('id_parameter', '=', $id)->delete();
        return redirect('/parameter')->with('success', 'Data berhasil dihapus!');

    }

    public function viewEdit($id) {
        $data['parameter'] = Parameter::where('id_parameter', '=', $id)->get();
        return view('parameter.edit', $data);
    }

    public function EditParameter(Request $x, $id)
    {
        $id_user = $id;
        Parameter::where('id_parameter', '=', $id)->update([
            'nama_parameter' => $x->nama_parameter,
        ]);

        return redirect('/parameter')->with('success', 'Data berhasil dirubah!');
    }

}

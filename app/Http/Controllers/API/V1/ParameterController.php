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

    public function SimpanParameter(Request $x)
    {
       Parameter::create([
            'nama_parameter'=>$x->nama_parameter,
            'bobot'=>$x->bobot
        ]);
        return response('Berhasil disimpan!',200);
    }

    public function HapusParameter($id_parameter)
    {
        Parameter::find($id_parameter)->delete();
        return response('Berhasil dihapus!',200);
    }

    public function getEditParameterByID($id_parameter) {
        $parameter = Parameter::where('id_parameter', "=", $id_parameter)->get();
        return $parameter;
    }

    public function EditParameter(Request $x)
    {
        Parameter::where('id_parameter', '=', $x->id_parameter)->update([
            'nama_parameter'=>$x->nama_parameter,
            'bobot'=>$x->bobot
        ]);

        return response('Berhasil diedit!',200);
    }
}

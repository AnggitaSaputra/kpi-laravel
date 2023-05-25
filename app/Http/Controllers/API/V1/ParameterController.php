<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parameter;

class ParameterController extends Controller
{
    public function ReadParameter()
    {
        $parameter = Parameter::all();
        return response($parameter, 200);
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

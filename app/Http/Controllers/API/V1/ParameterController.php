<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function ReadParameter()
    {
        $parameter = DB::table('parameter')->get();
        return $parameter;
    }
    public function SimpanParameter(Request $x)
    {
        $parameter = DB::table('parameter')->insertGetId([
            'nama_parameter' => $x->nama_parameter,
            'bobot'=> $x ->bobot
        ]);
    }
    public function HapusParameter($id_parameter)
    {
        $parameter = DB::table('parameter')->where('id_parameter', $id_parameter)->delete();
    }
    public function EditParameter($id_parameter)
    {
        $parameter = DB::table('parameter')->where('id_parameter', $id_parameter)->get();
        return $parameter;
    }
    public function EdittParameter($x)
    {
        $parameter = DB::table('parameter')->where('id_parameter', $x->id_parameter)->update([
            'nama_parameter' => $x->nama_parameter,
            'bobot'=> $x ->bobot
        ]);
    }
    
}

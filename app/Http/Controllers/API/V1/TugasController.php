<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Parameter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\Proyek;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;


class TugasController extends Controller
{
    public function view() {
        return view('tugas.main');
    }
    public function ReadTugas()
    {
        $tugas = Tugas::all();
        return DataTables::of($tugas)
        ->addColumn('action', function($data) {
            $url = str_replace("/get", "", url()->current());
            $button = '<a href="'.$url.'/edit/'.$data->id_tugas.'" class="btn btn-primary mx-1">Edit</a>';
            $button .= '<a href="'.$url.'/hapus/'.$data->id_tugas.'" class="btn btn-danger mx-1">Hapus</a>';
            return $button;
        })
        ->make(true);
    }
    Public function viewTambah() {
        $data['parameter'] = Parameter::all();
        $data['proyek'] = Proyek::all();

        return view('tugas.add', $data);
    }

    public function SimpanTugas(Request $x)
    {
        $id_user = DB::table('tugas')->max('id_tugas');
        $id_user += 1;
        Log::info($x);
        Tugas::create([
            'id_parameter'=>$x->id_parameter,
            'id_proyek'=>$x->id_proyek,
            'nama_tugas' => $x->nama_tugas,
            'deskripsi' => $x->deskripsi,
            'prioritas' => $x->prioritas,
            'status' => $x->status,
            'tanggal_mulai' => $x->tanggal_mulai,
            'tanggal_selesai' => $x->tanggal_selesai,
            'bobot' => $x->bobot
        ]);

        return redirect('/tugas')->with('success', 'Data berhasil ditambahkan!');
    }

    public function HapusTugas($id)
    {
        Tugas::where('id_tugas', '=', $id)->delete();
        return redirect('/tugas')->with('success', 'Data berhasil dihapus!');
    }

    public function viewEdit($id) {
        $data['tugas'] = Tugas::where('id_tugas', '=', $id)->get();
        $data['parameter'] = Parameter::all();
        $data['proyek'] = Proyek::all();

        return view('tugas.edit', $data);
    }

    public function EditTugas(Request $x, $id)
    {
        $id_user = $id;

        Tugas::where('id_tugas', '=', $id)->update([
            'id_parameter' => $x->id_parameter,
            'id_proyek'=>$x->id_proyek,
            'nama_tugas'=> $x->nama_tugas,
            'deskripsi' => $x->deskripsi,
            'prioritas' => $x->prioritas,
            'status' => $x->status,
            'tanggal_mulai' => $x->tanggal_mulai,
            'tanggal_selesai' => $x->tanggal_selesai,
            'bobot' => $x->bobot
        ]);

        return redirect('/tugas')->with('success', 'Data berhasil dirubah!');
    }
}
<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Departemen;
use App\Models\Proyek_Departemen;
use Illuminate\Support\Facades\Log;

class ProyekController extends Controller
{   
    public function view() {
        return view('proyek.main');
    }
    public function ReadProyek()
    {
        $proyek = Proyek::all();
        return DataTables::of($proyek)
            ->addColumn('action', function($data) {
                $url = str_replace("/get", "", url()->current());
                $button = '<a href="'.$url.'/edit/'.$data->id_proyek.'" class="btn btn-primary mx-1">Edit</a>';
                $button .= '<a href="'.$url.'/hapus/'.$data->id_proyek.'" class="btn btn-danger mx-1">Hapus</a>';
                $button .= '<a href="'.'/tugas/'.'" class="btn btn-primary mx-1">Sub Tugas</a>';
                return $button;
            })
            ->make(true);
    }

    Public function viewTambah() {
        $data['departemen'] = Departemen::all();
        return view('proyek.add', $data);
    }

    public function SimpanProyek(Request $x)
    {
        $id_proyek = DB::table('proyek')->max('id_proyek');
        $id_proyek += 1;
        $proyek = Proyek::create([
            'id_proyek'=>$id_proyek,
            'nama_proyek'=>$x->nama_proyek,
            'deskripsi_proyek'=>$x->deskripsi_proyek,
            'tanggal_mulai' => $x->tanggal_mulai,
            'tanggal_selesai' => $x->tanggal_selesai,
            'estimasi_durasi' => $x->estimasi_durasi,
            'status' => $x -> status
        ]);
        $id_proyek_departemen = DB::table('proyek_departemen')->max('id_proyek_departemen');
        if (!$id_proyek_departemen) {
            $id_proyek_departemen = 0;
        } else {
            $id_proyek_departemen += 1;
        }
        Proyek_Departemen::create([
            'id_proyek_departemen'=>$id_proyek_departemen,
            'id_departemen'=>$proyek->id_proyek,
            'id_proyek'=>$id_proyek
        ]);
        
        return redirect('/proyek')->with('success', 'Data berhasil ditambahkan!');
    }

    public function HapusProyek($id_proyek)
    {
        Proyek::find($id_proyek)->delete();
        return response('Berhasil dihapus!',200);
    }

    public function getEditProyekByID($id_proyek) {
        $proyek = Proyek::where('id_proyek', "=", $id_proyek)->get();
        return $proyek;
    }

    public function EditProyek(Request $x)
    {
        Proyek::where('id_proyek', '=', $x->id_proyek)->update([
            'nama_proyek'=>$x->nama_proyek,
            'deskripsi_proyek'=> $x ->deskripsi,
            'tanggal_mulai' => $x -> tanggal_mulai,
            'tanggal_selesai' => $x -> tanggal_selesai,
            'estimasi_durasi' => $x -> estimasi_durasi,
            'status' => $x -> status
        ]);

        return response('Berhasil diedit!',200);
    }
}

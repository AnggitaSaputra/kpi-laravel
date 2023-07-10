<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Departemen;
use App\Models\Jabatan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pegawai;
use Yajra\DataTables\DataTables;

use function PHPUnit\Framework\fileExists;

class PegawaiController extends Controller
{   
    public function view()
    {   
        $data['test'] = Pegawai::all();
        return view('pegawai.main', $data);
    }
    public function ReadPegawai()
    {   
        $pegawai = Pegawai::all();
        return DataTables::of($pegawai)
            ->addColumn('action', function($data) {
                $url = str_replace("/get", "", url()->current());
                $button = '<a href="'.$url.'/edit/'.$data->id_pegawai.'" class="btn btn-primary mx-1">Edit</a>';
                $button .= '<a href="'.$url.'/hapus/'.$data->id_pegawai.'" class="btn btn-danger mx-1">Hapus</a>';
                $button .= '<a href="'.$url.'/detail/'.$data->id_pegawai.'" class="btn btn-primary mx-1">Detail Pegawai</a>';
                return $button;
            })
            ->editColumn('id_departemen', function($data){
                return $data->departemen->nama_departemen;
            })
            ->editColumn('id_jabatan', function($data) {
                return $data->jabatan->nama_jabatan;
            })
            ->make(true);
        
    }
    Public function viewTambah() {
        $data['departemen'] = Departemen::all();
        $data['perusahaan'] = Perusahaan::all();
        $data['jabatan'] = Jabatan::all();

        return view('pegawai.add', $data);
    }

    public function SimpanPegawai(Request $x)
    {
        // Add Picture
        $image = $x->pic;

        $path_img = 'image/pegawai/';
        if (!fileExists($path_img)) {
            mkdir(public_path($path_img));
        }
        
        $id_user = DB::table('pegawai')->max('id_pegawai');
        $id_user += 1;

        $imageName = 'pic-'.$id_user.'.'.$image->getClientOriginalExtension();

        $image->move($path_img, $imageName);

        Pegawai::create([
            'id_departemen'=>$x->id_departemen,
            'id_perusahaan'=>$x->id_perusahaan,
            'id_jabatan'=> $x->id_jabatan,
            'nama_pegawai' => $x->nama_pegawai,
            'username' => $x->username,
            'password' => $x->password,
            'pic' => $imageName,
            'email' => $x->email,
            'alamat' => $x->alamat,
            'telepon' => $x->telepon,
            'no_ktp' => $x->no_ktp,
            'tanggal_masuk' => $x->tanggal_masuk,
        ]);

        return redirect('/pegawai')->with('success', 'Data berhasil ditambahkan!');
    }
    public function HapusPegawai($id)
    {
        Pegawai::where('id_pegawai', '=', $id)->delete();
        return redirect('/pegawai')->with('success', 'Data berhasil dihapus!');
    }

    public function viewEdit($id) {
        $data['pegawai'] = Pegawai::where('id_pegawai', '=', $id)->get();
        $data['departemen'] = Departemen::all();
        $data['perusahaan'] = Perusahaan::all();
        $data['jabatan'] = Jabatan::all();

        return view('pegawai.edit', $data);
    }

    public function EditPegawai(Request $x, $id)
    {
        $image = $x->pic;

        $path_img = 'image/pegawai/';
        if (!fileExists($path_img)) {
            mkdir(public_path($path_img));
        }

        $id_user = $id;

        $imageName = 'pic-'.$id_user.'.'.$image->getClientOriginalExtension();

        $image->move($path_img, $imageName);
        Pegawai::where('id_pegawai', '=', $id)->update([
            'id_departemen' => $x->id_departemen,
            'id_perusahaan'=>$x->id_perusahaan,
            'id_jabatan'=> $x->id_jabatan,
            'nama_pegawai' => $x->nama_pegawai,
            'username' => $x->username,
            'password' => $x->password,
            'pic' => $imageName,
            'email' => $x->email,
            'alamat' => $x->alamat,
            'telepon' => $x->telepon,
            'no_ktp' => $x->no_ktp,
            'tanggal_masuk' => $x->tanggal_masuk,
        ]);

        return redirect('/pegawai')->with('success', 'Data berhasil dirubah!');
    }

}

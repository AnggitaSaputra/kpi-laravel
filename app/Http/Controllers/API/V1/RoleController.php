<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        request('limit') ? $paginate = request('limit') : $paginate = 10;

        $data = Role::paginate($paginate);
        return ResponseFormatter::success($data, "Data role ditemukan.", 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => ['required'],
            'guard_name' => ['required', 'in:web,api']
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error($validator->errors(), 'Error Validasi.', 422);
        }

        DB::beginTransaction();
        try {
            // cek role di database
            $role_db = Role::where('name', request('name'))->where('guard_name', request('guard_name'));
            if ($role_db->count() > 0) {
                return ResponseFormatter::error(NULL, 'Role sudah tersedia.', 400);
            }

            // insert
            $data = Role::create([
                'name' => request('name'),
                'guard_name' => request('guard_name')
            ]);
            DB::commit();
            return ResponseFormatter::success($data, "Role berhasil dibuat.", 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return ResponseFormatter::error(NULL, "Invalid Request.", 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::with('permissions')->where('id',$id)->first();
        $data = new RoleResource($role);
        if (!$data) {
            return ResponseFormatter::error(NULL, 'Role tidak ditemukan.', 400);
        }

        return ResponseFormatter::success($data, "Role ditemukan.", 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'name' => ['required'],
            'guard_name' => ['required', 'in:web,api']
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error($validator->errors(), 'Error Validasi.', 422);
        }

        DB::beginTransaction();
        try {
            $data = Role::where('id',$id)->first();
            if (!$data) {
                return ResponseFormatter::error(NULL, 'Role tidak ditemukan.', 400);
            }

            // cek role di database
            $role_db = Role::whereNotIn('id', [$data->id])->where('name', request('name'))->where('guard_name', request('guard_name'));
            if ($role_db->count() > 0) {
                return ResponseFormatter::error(NULL, 'Role sudah tersedia.', 400);
            }

            // update
            $data->update([
                'name' => request('name'),
                'guard_name' => request('guard_name')
            ]);
            DB::commit();
            return ResponseFormatter::success($data, "Role berhasil diupdate.", 200);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return ResponseFormatter::error(NULL, "Invalid Request.", 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Role::where('id',$id)->first();
        if (!$data) {
            return ResponseFormatter::error(NULL, 'Role tidak ditemukan.', 400);
        }
        try {
            $data->delete();
            return ResponseFormatter::success(NULL, 'Role berhasil dihapus.', 200);
        } catch (\Throwable $th) {
            //throw $th;
            return ResponseFormatter::error(NULL, "Invalid Request.", 400);
        }
    }
}

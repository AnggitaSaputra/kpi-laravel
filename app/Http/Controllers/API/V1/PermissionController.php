<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        request('limit') ? $limit = request('limit') : $limit = 10;

        $data = Permission::paginate($limit);
        return ResponseFormatter::success($data, "Data Permission ditemukan.", 200);
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
            // cek Permission di database
            $Permission_db = Permission::where('name', request('name'))->where('guard_name', request('guard_name'));
            if ($Permission_db->count() > 0) {
                return ResponseFormatter::error(NULL, 'Permission sudah tersedia.', 400);
            }

            // insert
            $data = Permission::create([
                'name' => request('name'),
                'guard_name' => request('guard_name')
            ]);
            DB::commit();
            return ResponseFormatter::success($data, "Permission berhasil dibuat.", 200);
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
        $data = Permission::where('id',$id)->first();
        if (!$data) {
            return ResponseFormatter::error(NULL, 'Permission tidak ditemukan.', 400);
        }

        return ResponseFormatter::success($data, "Permission ditemukan.", 200);
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
            $data = Permission::where('id',$id)->first();
            if (!$data) {
                return ResponseFormatter::error(NULL, 'Permission tidak ditemukan.', 400);
            }

            // cek Permission di database
            $Permission_db = Permission::whereNotIn('id', [$data->id])->where('name', request('name'))->where('guard_name', request('guard_name'));
            if ($Permission_db->count() > 0) {
                return ResponseFormatter::error(NULL, 'Permission sudah tersedia.', 400);
            }

            // update
            $data->update([
                'name' => request('name'),
                'guard_name' => request('guard_name')
            ]);
            DB::commit();
            return ResponseFormatter::success($data, "Permission berhasil diupdate.", 200);
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
        $data = Permission::where('id',$id)->first();
        if (!$data) {
            return ResponseFormatter::error(NULL, 'Permission tidak ditemukan.', 400);
        }
        try {
            $data->delete();
            return ResponseFormatter::success(NULL, 'Permission berhasil dihapus.', 200);
        } catch (\Throwable $th) {
            //throw $th;
            return ResponseFormatter::error(NULL, "Invalid Request.", 400);
        }
    }
}

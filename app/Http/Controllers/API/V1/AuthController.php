<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Validator;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.jwt', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {

        $validator = FacadesValidator::make(request()->all(), [
            'email' => ['required'],
            'password' => ['required'],
        ]);

        try {
            // cek validasi
            if ($validator->fails()) {
                return ResponseFormatter::error($validator->errors(), 'Error', 422);
            }
            $credentials = request(['email', 'password']);

            if (!$token = auth()->attempt($credentials)) {
                return ResponseFormatter::error(NULL,"Email atau Password salah.");
            }

            $data = $this->respondWithToken($token);
            return ResponseFormatter::success($data, 'Anda berhasil login.', 200);
        } catch (\Throwable $th) {
            return ResponseFormatter::error(NULL, 'Invalid Request.', 400);
        }
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return ResponseFormatter::success(NULL,"Anda berhasil logout.");
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 * 60
        ]);
    }

    public function register()
    {
        $validator = FacadesValidator::make(request()->all(), [
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'unique:users'],
            'role' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        DB::beginTransaction();
        try {
            // cek validasi
            if ($validator->fails()) {
                return ResponseFormatter::error($validator->errors(), 'Error', 422);
            }

            // cek role apakah sesuai di database
            $role_db = Role::where('name', request('role'))->count();
            if ($role_db < 1) {
                return ResponseFormatter::error(NULL, 'Role yang anda pilih tidak ada di database.', 400);
            }
            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password'))
            ]);
            $user->assignRole(request('role'));

            $data = new UserResource($user);
            DB::commit();
            return ResponseFormatter::success($data, 'Anda berhasil mendaftar, silahkan login terlebih dahulu.', 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ResponseFormatter::error(NULL, 'Invalid Request.', 400);
        }
    }
}

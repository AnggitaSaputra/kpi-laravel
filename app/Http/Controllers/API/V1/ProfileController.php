<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.jwt');

    }
    public function index()
    {
        $user = new UserResource(auth()->user());
        return ResponseFormatter::success($user,'User berhasil diambil.');
    }
}

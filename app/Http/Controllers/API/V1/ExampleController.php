<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function index()
    {
        $data = [
            'Data 1',
            'Data 2',
            'Data 3'
        ];
        // contoh response jika successs
        return ResponseFormatter::success($data,'Data berhasil diambil.',200);

        // contoh response jika error
        // return ResponseFormatter::error(NULL,'Data gagal diambil.');
    }
}

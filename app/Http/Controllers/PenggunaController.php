<?php

namespace App\Http\Controllers;

use App\Pengguna;

class PenggunaController extends Controller{

    public function showAllPengguna(){
        return response()->json(Pengguna::all());
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;

class PetaController extends Controller
{
    public function index(){
        $provinces = Provinsi::all();
        return view('peta.index', [
            'provinces' => $provinces
        ]);
    }
}

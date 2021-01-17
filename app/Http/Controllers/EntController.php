<?php

namespace App\Http\Controllers;

use App\Models\Ent;

class EntController extends Controller
{

    public function index()
    {
        $infos = Ent::all();

        return view('ent.home', [
            'infos' => $infos
        ]);
    }
}

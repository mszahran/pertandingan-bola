<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Klasemen AS KlasemenModel;

class Klasemen extends Controller
{
    public function index()
    {
        $this->data['dataKlasemen'] = KlasemenModel::with('klub')
            ->orderBy("point", "DESC")
            ->get();

        return view('home', $this->data);
    }
}

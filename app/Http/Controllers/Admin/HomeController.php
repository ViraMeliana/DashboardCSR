<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tjsl;
use App\Models\TjslInsidentil;

class HomeController
{
    public function index()
    {
        $tjslYear = Tjsl::all()->pluck('periode', 'periode');
        $tjslInsidentilYear = TjslInsidentil::distinct('periode')->pluck('periode', 'periode');;

        return view('home', compact('tjslYear', 'tjslInsidentilYear'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tjsl;

class HomeController
{
    public function index()
    {
        $tjslYear = Tjsl::all()->pluck('periode', 'periode');

        return view('home', compact('tjslYear'));
    }
}

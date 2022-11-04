<?php

namespace App\Http\Responders\Chirps;

use App\Http\Controllers\Controller;
use App\Models\Chirp;

class EditResponder extends Controller
{
    public function show(Chirp $chirp)
    {
        return view('chirps.edit', compact('chirp'));
    }
}

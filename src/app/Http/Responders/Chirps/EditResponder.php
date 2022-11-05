<?php

namespace App\Http\Responders\Chirps;

use App\Http\Controllers\Controller;

class EditResponder extends Controller
{
    public function show($chirp)
    {
        $this->authorize('update', $chirp);

        return view('chirps.edit', compact('chirp'));
    }
}

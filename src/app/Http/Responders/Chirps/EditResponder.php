<?php

namespace App\Http\Responders\Chirps;

class EditResponder
{
    public function run($chirp)
    {
        return view('chirps.edit', compact('chirp'));
    }
}

<?php

namespace App\Http\Responders\Chirps;

class IndexResponder
{
    public function show($chirps)
    {
        return view('chirps.index', compact('chirps'));
    }
}

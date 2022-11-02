<?php

namespace App\Usecases\Chirps;

use App\Models\Chirp;

class IndexUsecase
{
    public function run()
    {
        $chirps = Chirp::with('user')->latest()->get();
        return $chirps;
    }
}

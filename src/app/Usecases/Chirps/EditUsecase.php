<?php

namespace App\Usecases\Chirps;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Models\Chirp;
use Illuminate\Support\Facades\Log;

class EditUsecase extends Controller
{
    public function run(Chirp $chirp)
    {
        try {
            $this->authorize('update', $chirp);
        } catch (\Exception $e) {
            Log::error($e);
            return (new Payload())->setStatus('FAILED');
        }
        return (new Payload())->setStatus('SUCCESS');
    }
}

<?php

namespace App\Usecases\Chirps;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use Illuminate\Support\Facades\Log;

class UpdateUsecase extends Controller
{
    public function run($request, $chirp)
    {
        try {
            $validated = $request->validated();
            $request->user()->chirps()->update($validated);

        } catch (\Exception $e) {
            Log::error($e);
            return (new Payload())->setStatus('FAILED');
        }
        return (new Payload())->setStatus('SUCCESS');
    }
}



<?php

namespace App\Usecases\Chirps;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateUsecase extends Controller
{
    public function run($request, $chirp)
    {
        try {
            DB::beginTransaction();
            $this->authorize('update', $chirp);
            $validated = $request->validated();
            $chirp->update($validated);
            DB::commit();

        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();
            return (new Payload())->setStatus('FAILED');
        }
        return (new Payload())->setStatus('SUCCESS');
    }
}



<?php

namespace App\Usecases\Chirps;

use App\Http\Payload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class StoreUsecase
{
    public function run($request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $request->user()->chirps()->create($validated);
            DB::commit();

        } catch(\Exception $e) {
            Log::error($e);
            DB::rollBack();

            return (new Payload())->setStatus('FAILED');
        }

        return (new Payload())->setStatus('SUCCESS');
    }
}

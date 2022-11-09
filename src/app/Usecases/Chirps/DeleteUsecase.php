<?php

namespace App\Usecases\Chirps;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DeleteUsecase extends Controller
{
    public function run($chirp)
    {
        try {
            DB::beginTransaction();
            $this->authorize('delete', $chirp);
            $chirp->delete();
            DB::commit();

        } catch (\Exception $e) {
            Log::error($e);
            DB::rollBack();

            return (new Payload())->setStatus('FAILED');
        }
        return (new Payload())->setStatus('SUCCESS');
    }
}

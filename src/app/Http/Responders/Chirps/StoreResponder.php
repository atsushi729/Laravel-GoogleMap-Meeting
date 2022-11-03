<?php

namespace App\Http\Responders\Chirps;
use App\Http\Payload;

class StoreResponder
{
    public function handle(Payload $payload)
    {
        if ($payload->getStatus() === 'SUCCESS') {
            return redirect(route('chirps.index'))->with('success', 'successfully posted');
        } elseif ($payload->getStatus() === 'FAILED') {
            return redirect(route('chirps.index'))->with('failed', 'something went wrong');
        } else {
            return view('unknown');
        }
    }
}

<?php

namespace App\Http\Responders\Chirps;

use App\Http\Payload;

class UpdateResponder
{
    public function handle(Payload $payload)
    {
        if ($payload->getStatus() === 'SUCCESS') {
            return redirect(route('chirps.index'))->with('success', 'Successfully updated');
        } elseif ($payload->getStatus() === 'FAILED') {
            return redirect(route('chirps.index'))->with('failed', 'Something went wrong');
        } else {
            return view('unknown');
        }
    }
}

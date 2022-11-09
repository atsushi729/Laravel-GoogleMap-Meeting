<?php

namespace App\Http\Responders\Chirps;

use App\Http\Payload;

class DeleteResponder
{
    public function handle(Payload $payload)
    {
        if ($payload->getStatus() === 'SUCCESS') {
            return redirect(route('chirps.index'))->with('success', 'Successfully deleted');
        } elseif ($payload->getStatus() === 'FAILED') {
            return redirect(route('chirps.index'))->with('error', 'Something went wrong');
        }
        return view('unknown');
    }
}

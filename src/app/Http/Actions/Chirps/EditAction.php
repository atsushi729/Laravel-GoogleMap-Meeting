<?php

namespace App\Http\Actions\Chirps;

use App\Http\Controllers\Controller;
use App\Http\Responders\Chirps\EditResponder;
use App\Models\Chirp;

class EditAction extends Controller
{
    private $responder;

    public function __construct(EditResponder $responder)
    {
        $this->responder = $responder;
    }

    public function __invoke(Chirp $chirp)
    {
        return $this->responder->show($chirp);
    }
}

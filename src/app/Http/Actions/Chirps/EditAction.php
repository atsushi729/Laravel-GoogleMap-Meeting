<?php

namespace App\Http\Actions\Chirps;

use App\Http\Responders\Chirps\EditResponder;

class EditAction
{
    private $responder;
    private $usecase;

    public function __construct(EditResponder $responder)
    {
        $this->responder = $responder;
    }

    public function __invoke()
    {
        $this->responder->show();
    }
}

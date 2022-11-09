<?php

namespace App\Http\Actions\Chirps;

use App\Http\Responders\Chirps\DeleteResponder;
use App\Models\Chirp;
use App\Usecases\Chirps\DeleteUsecase;

class DeleteAction
{
    private $usecase;
    private $responder;

    public function __construct(DeleteUsecase $usecase, DeleteResponder $responder)
    {
        $this->usecase = $usecase;
        $this->responder = $responder;
    }

    public function __invoke(Chirp $chirp)
    {
        return $this->responder->handle($this->usecase->run($chirp));
    }
}

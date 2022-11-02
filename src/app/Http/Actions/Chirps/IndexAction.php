<?php

namespace App\Http\Actions\Chirps;

use App\Http\Responders\Chirps\IndexResponder;
use App\Usecases\Chirps\IndexUsecase;

class IndexAction
{
    private $usecase;
    private $responder;

    public function __construct(IndexUsecase $usecase, IndexResponder $responder)
    {
        $this->usecase = $usecase;
        $this->responder = $responder;
    }

    public function __invoke()
    {
        $this->responder->show($this->usecase->run());
    }
}

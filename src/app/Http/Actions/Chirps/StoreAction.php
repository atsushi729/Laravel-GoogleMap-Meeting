<?php

namespace App\Http\Actions\Chirps;

use App\Http\Requests\PostRequest;
use App\Http\Responders\Chirps\StoreResponder;
use App\Usecases\Chirps\StoreUsecase;

class StoreAction
{
    private $usecase;
    private $responder;

    public function __construct(StoreUsecase $usecase, StoreResponder $responder)
    {
        $this->usecase = $usecase;
        $this->responder = $responder;
    }

    public function __invoke(PostRequest $request)
    {
        return $this->responder->handle($this->usecase->run($request));
    }
}

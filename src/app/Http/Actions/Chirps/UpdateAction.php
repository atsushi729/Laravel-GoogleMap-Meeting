<?php

namespace App\Http\Actions\Chirps;

use App\Http\Requests\PostRequest;
use App\Http\Responders\Chirps\UpdateResponder;
use App\Models\Chirp;
use App\Usecases\Chirps\UpdateUsecase;

class UpdateAction
{
    private $responder;
    private $usecase;

    public function __construct(UpdateResponder $responder, UpdateUsecase $usecase)
    {
        $this->usecase = $usecase;
        $this->responder = $responder;
    }

    public function __invoke(PostRequest $request, Chirp $chirp)
    {
        return $this->responder->handle($this->usecase->run($request, $chirp));
    }
}

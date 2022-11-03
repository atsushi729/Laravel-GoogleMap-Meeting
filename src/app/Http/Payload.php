<?php

namespace App\Http;

class Payload
{
    public const SUCCESS = 'SUCCESS';
    public const FAILED = 'FAILED';
    public const UNAUTHORIZED = 'UNAUTHORIZED';
    public const UNAUTHENTICATED = 'UNAUTHENTICATED';
    public const INITIALIZED = 'INITIALIZED';
    public const CREATED = 'CREATED';
    public const FOUND = 'FOUND';
    public const UPDATED = 'UPDATED';
    public const DELETED = 'DELETED';

    private string $status;
    private $output;

    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setOutput($output): self
    {
        $this->output = $output;

        return $this;
    }

    public function getOutput()
    {
        return $this->output;
    }
}

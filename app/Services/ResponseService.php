<?php

namespace App\Services;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Lang;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ResponseService implements Responsable
{
    public int $status = HttpResponse::HTTP_OK;
    public string $message = 'general.messages.operation_was_successful';
    public mixed $data = [];
    public array $errors = [];

    public function status(int $status): ResponseService
    {
        $this->status = $status;
        return $this;
    }

    public function message(string $message): ResponseService
    {
        $this->message = (Lang::has($message) ? __($message) : $message);
        return $this;
    }

    public function data($data): ResponseService
    {
        $this->data = $data;
        return $this;
    }

    public function errors($errors): ResponseService
    {
        $this->errors = is_array($errors) ? $errors : [$errors];
        return $this;
    }

    public function toResponse($request)
    {
        return response([
            'message' => $this->message,
            'data' => $this->data,
            'errors' => $this->errors,
        ], $this->status);
    }
}

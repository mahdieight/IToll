<?php

namespace App\Exceptions;

use Exception;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class BadRequestException extends Exception
{
    public array $data;
    public function __construct(string $message = "" , array $data = [] , int $code = 0, ?Throwable $previous = null)
    {
        $this->data = $data;
        parent::__construct($message, $code, $previous);
    }
}

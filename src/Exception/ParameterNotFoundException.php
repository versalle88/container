<?php

declare(strict_types=1);

namespace Versalle\Container\Exception;

use Versalle\Container\NotFoundException;

class ParameterNotFoundException extends NotFoundException
{
    public static function create(string $id): ParameterNotFoundException
    {
        return new static("Parameter not found: {$id}");
    }
}

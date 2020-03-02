<?php

declare(strict_types=1);

namespace Versalle\Container\Exception;

use Versalle\Container\NotFoundException;

/**
 * Class ObjectNotFoundException
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class ObjectNotFoundException extends NotFoundException
{
    public static function create(string $id): ObjectNotFoundException
    {
        return new static("Object not found: {$id}");
    }
}

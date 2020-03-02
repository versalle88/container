<?php

declare(strict_types=1);

namespace Versalle\Container;

use Exception;
use Psr\Container\ContainerExceptionInterface;

/**
 * Class ContainerException
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
class ContainerException extends Exception implements ContainerExceptionInterface
{
    public static function invalidFormat(string $id): ContainerExceptionInterface
    {
        return new static("{$id} object entry must be an array containing a 'class' key");
    }

    public static function classDoesNotExist(string $id, string $className): ContainerExceptionInterface
    {
        return new static("{$id} object class does not exist: {$className}");
    }
}

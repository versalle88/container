<?php

declare(strict_types=1);

namespace Versalle\Container;

use Exception;
use Psr\Container\ContainerExceptionInterface;
use Throwable;

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

    public static function reflectionException(
        string $message = "",
        int $code = 0,
        Throwable $previous = null
    ): ContainerExceptionInterface {
        return new static($message, $code, $previous);
    }
}

<?php

declare(strict_types=1);

namespace Versalle\Container;

use Exception;
use Psr\Container\ContainerExceptionInterface;

class ContainerException extends Exception implements ContainerExceptionInterface
{
}

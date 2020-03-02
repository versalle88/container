<?php

/** @noinspection PhpUndefinedClassInspection */

declare(strict_types=1);

namespace Versalle\Container;

use Exception;
use Psr\Container\ContainerInterface;
use ReflectionClass;
use Versalle\Container\Entry\ObjectEntry;
use Versalle\Container\Exception\ObjectNotFoundException;

/**
 * Class Container
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
final class Container implements ContainerInterface
{
    private $objectEntries = [];

    private $parameterEntries = [];

    private $objectInstances = [];

    public function __construct(array $objectEntries = [], array $parameterEntries = [])
    {
        $this->objectEntries    = $objectEntries;
        $this->parameterEntries = $parameterEntries;

        $this->share(ContainerInterface::class, $this);
    }

    public function get($id)
    {
        if (!$this->has($id)) {
            throw ObjectNotFoundException::create($id);
        }

        if (!isset($this->objectInstances[$id])) {
            $this->objectInstances[$id] = $this->createObjectInstance($id);
        }

        return $this->objectInstances[$id];
    }

    public function has($id)
    {
        return isset($this->objectEntries[$id]);
    }

    private function createObjectInstance(string $id): object
    {
        $className = $this->resolveClassName($id);
        $args      = $this->resolveArgs($id);
        $class     = $this->reflectClass($className);

        return $class->newInstanceArgs($args);
    }

    private function resolveClassName(string $id): string
    {
        $objectEntry = &$this->objectEntries[$id];

        if (!is_array($objectEntry) || !isset($objectEntry['class'])) {
            throw ContainerException::invalidFormat($id);
        } elseif (!class_exists($objectEntry['class'])) {
            throw ContainerException::classDoesNotExist($id, $objectEntry['class']);
        } elseif (isset($objectEntry['lock'])) {
            throw ContainerException::circularReference($id);
        }

        $objectEntry['lock'] = true;

        return $objectEntry['class'];
    }

    private function resolveArgs(string $id): array
    {
        $args = [];

        if (isset($this->objectEntries[$id]['args'])) {
            foreach ($this->objectEntries[$id]['args'] as $arg) {
                if ($arg instanceof ObjectEntry) {
                    $id = $arg->getId();

                    $args[] = $this->get($id);
                } else {
                    $args[] = $arg;
                }
            }
        }

        return $args;
    }

    private function reflectClass(string $className): ReflectionClass
    {
        try {
            return new ReflectionClass($className);
        } catch (Exception $e) {
            throw ContainerException::reflectionException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function share($id, $instance): ContainerInterface
    {
        $this->objectEntries[$id]   = get_class($instance);
        $this->objectInstances[$id] = $instance;

        return $this;
    }
}

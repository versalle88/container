<?php

declare(strict_types=1);

namespace Versalle\Container;

use Psr\Container\ContainerInterface;
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
    }

    public function get($id)
    {
        if (!$this->has($id)) {
            throw new ObjectNotFoundException("Object not found: {$id}");
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
        $objectEntry = &$this->objectEntries[$id];

        return new $objectEntry();
    }
}
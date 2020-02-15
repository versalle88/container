<?php

declare(strict_types=1);

namespace Versalle\Container\Entry;

/**
 * Class AbstractEntry
 *
 * @SuppressWarnings(PHPMD.ShortVariable)
 */
abstract class AbstractEntry
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}

<?php

declare(strict_types=1);

namespace Test;

final class Dependent
{
    private $dependency;

    public function __construct(Dependency $dependency)
    {
        $this->dependency = $dependency;
    }
}

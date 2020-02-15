<?php

namespace spec\Versalle\Container;

use PhpSpec\ObjectBehavior;
use Versalle\Container\ContainerException;

class ContainerExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ContainerException::class);
    }
}

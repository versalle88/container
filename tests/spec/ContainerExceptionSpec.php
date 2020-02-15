<?php

namespace spec\Versalle\Container;

use Exception;
use PhpSpec\ObjectBehavior;
use Psr\Container\ContainerExceptionInterface;
use Versalle\Container\ContainerException;

/**
 * Class ContainerExceptionSpec
 *
 * @noinspection PhpUnused
 */
class ContainerExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ContainerException::class);
    }

    function it_extends_exception()
    {
        $this->shouldBeAnInstanceOf(Exception::class);
    }

    function it_implements_psr_container_exception_interface()
    {
        $this->shouldImplement(ContainerExceptionInterface::class);
    }
}

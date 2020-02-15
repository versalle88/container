<?php

namespace spec\Versalle\Container\Exception;

use Exception;
use PhpSpec\ObjectBehavior;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Versalle\Container\ContainerException;
use Versalle\Container\Exception\ObjectNotFoundException;

/**
 * Class ObjectNotFoundExceptionSpec
 *
 * @noinspection PhpUnused
 */
class ObjectNotFoundExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ObjectNotFoundException::class);
    }

    function it_extends_exception()
    {
        $this->shouldBeAnInstanceOf(Exception::class);
    }

    function it_extends_container_exception()
    {
        $this->shouldBeAnInstanceOf(ContainerException::class);
    }

    function it_implements_psr_container_exception_interface()
    {
        $this->shouldImplement(ContainerExceptionInterface::class);
    }

    function it_implements_psr_not_found_exception_interface()
    {
        $this->shouldImplement(NotFoundExceptionInterface::class);
    }
}

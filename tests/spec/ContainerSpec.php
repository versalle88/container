<?php

namespace spec\Versalle\Container;

use DateTime;
use PhpSpec\ObjectBehavior;
use Psr\Container\ContainerInterface;
use Versalle\Container\Container;

/**
 * Class ContainerSpec
 *
 * @noinspection PhpUnused
 */
class ContainerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(['Testing...' => DateTime::class]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Container::class);
    }

    function it_implements_psr_container_interface()
    {
        $this->shouldImplement(ContainerInterface::class);
    }

    function it_checks_if_it_has_an_entry()
    {
        $this->has('Testing...')
            ->shouldBeBool();
    }

    function it_gets_an_object_entry()
    {
        $this->get('Testing...')
            ->shouldBeObject();
    }
}

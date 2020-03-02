<?php

namespace spec\Versalle\Container;

use DateTime;
use PhpSpec\ObjectBehavior;
use Psr\Container\ContainerInterface;
use stdClass;
use Test\Client;
use Test\ClientInterface;
use Versalle\Container\Container;

/**
 * Class ContainerSpec
 *
 * @noinspection PhpUnused
 */
class ContainerSpec extends ObjectBehavior
{
    private $objectEntries = [
        'Testing...'           => [
            'class' => DateTime::class,
        ],
        ClientInterface::class => [
            'class' => Client::class,
        ],
    ];

    function let()
    {
        $this->beConstructedWith($this->objectEntries);
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

    function it_gets_a_concrete_implementation_from_an_interface()
    {
        $this->get(ClientInterface::class)
            ->shouldBeObject();
    }

    function it_shares_object_instances()
    {
        $instance = new stdClass();

        $this->share('Instance', $instance)
            ->shouldBe($this);
    }

    function it_shares_itself()
    {
        $this->get(ContainerInterface::class)
            ->shouldBe($this);
    }
}

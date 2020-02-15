<?php

namespace spec\Versalle\Container\Entry;

use PhpSpec\ObjectBehavior;
use Versalle\Container\Entry\AbstractEntry;
use Versalle\Container\Entry\ParameterEntry;

/**
 * Class ParameterEntrySpec
 *
 * @noinspection PhpUnused
 */
class ParameterEntrySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('Testing...');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ParameterEntry::class);
    }

    function it_extends_abstract_entry()
    {
        $this->shouldBeAnInstanceOf(AbstractEntry::class);
    }

    function it_gets_its_id()
    {
        $this->getId()
            ->shouldBeString();
    }
}

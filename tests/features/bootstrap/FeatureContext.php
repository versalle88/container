<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert;
use Versalle\Container\Container;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $objectEntries = [
        'KnownClass' => [

        ]
    ];

    private $container;

    private $result1;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->container = new Container($this->objectEntries);
    }

    /**
     * @Given an entry identifier :id is known to the container
     */
    public function anEntryIdentifierIsKnownToTheContainer($id)
    {
        Assert::assertArrayHasKey(
            $id,
            $this->objectEntries
        );
    }

    /**
     * @When I check if the Container has the entry identifier :id
     */
    public function iCheckIfTheContainerHasTheEntryIdentifier($id)
    {
        $this->result1 = $this->container->has($id);
    }

    /**
     * @Then I should get true as the result
     */
    public function iShouldGetTrueAsTheResult()
    {
        Assert::assertTrue(
            $this->result1
        );
    }

    /**
     * @Given an entry identifier :id is not known to the container
     */
    public function anEntryIdentifierIsNotKnownToTheContainer($id)
    {
        Assert::assertArrayNotHasKey(
            $id,
            $this->objectEntries
        );
    }

    /**
     * @Then I should get false as the result
     */
    public function iShouldGetFalseAsTheResult()
    {
        Assert::assertFalse(
            $this->result1
        );
    }

    /**
     * @When I get the entry :arg1 from the Container
     */
    public function iGetTheEntryFromTheContainer($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get the object :arg1 as the result
     */
    public function iShouldGetTheObjectAsTheResult($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get an exception as the result
     */
    public function iShouldGetAnExceptionAsTheResult()
    {
        throw new PendingException();
    }

    /**
     * @When I get the entry :arg1 from the Container twice
     */
    public function iGetTheEntryFromTheContainerTwice($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get the same object as the result
     */
    public function iShouldGetTheSameObjectAsTheResult()
    {
        throw new PendingException();
    }
}

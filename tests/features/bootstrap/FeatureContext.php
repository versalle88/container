<?php

use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert;
use Test\Client;
use Versalle\Container\Container;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $objectEntries = [
        'KnownClass' => [
            'class' => Client::class,
        ],
    ];

    private $container;

    private $result1;

    private $result2;

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
     * @When I get the entry :id from the Container
     */
    public function iGetTheEntryFromTheContainer($id)
    {
        try {
            $this->result1 = $this->container->get($id);
        } catch (Exception $e) {
            $this->result1 = $e;
        }
    }

    /**
     * @Then I should get the object :class as the result
     */
    public function iShouldGetTheObjectAsTheResult($class)
    {
        Assert::assertInstanceOf(
            $class,
            $this->result1
        );
    }

    /**
     * @Then I should get an exception as the result
     */
    public function iShouldGetAnExceptionAsTheResult()
    {
        Assert::assertInstanceOf(
            Exception::class,
            $this->result1
        );
    }

    /**
     * @When I get the entry :id from the Container twice
     */
    public function iGetTheEntryFromTheContainerTwice($id)
    {
        $this->result1 = $this->container->get($id);
        $this->result2 = $this->container->get($id);
    }

    /**
     * @Then I should get the same object as the result
     */
    public function iShouldGetTheSameObjectAsTheResult()
    {
        Assert::assertSame(
            $this->result1,
            $this->result2
        );
    }
}

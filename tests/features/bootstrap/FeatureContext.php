<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given an entry identifier :arg1 is known to the container
     */
    public function anEntryIdentifierIsKnownToTheContainer($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I check if the Container has the entry identifier :arg1
     */
    public function iCheckIfTheContainerHasTheEntryIdentifier($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get true as the result
     */
    public function iShouldGetTrueAsTheResult()
    {
        throw new PendingException();
    }

    /**
     * @Given an entry identifier :arg1 is not known to the container
     */
    public function anEntryIdentifierIsNotKnownToTheContainer($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get false as the result
     */
    public function iShouldGetFalseAsTheResult()
    {
        throw new PendingException();
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

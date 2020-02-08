Feature: A PSR-11: Container interface implementation library
  In order to inject dependencies into my objects
  As a user
  I need a dependency injection container

  Scenario: Checking the container for a known entry identifier
    Given an entry identifier 'KnownClass' is known to the container
    When I check if the Container has the entry identifier 'KnownClass'
    Then I should get true as the result

  Scenario: Checking the container for an unknown entry identifier
    Given an entry identifier 'UnknownClass' is not known to the container
    When I check if the Container has the entry identifier 'UnknownClass'
    Then I should get false as the result

  Scenario: Getting a known entry identifier from the container
    Given an entry identifier 'KnownClass' is known to the container
    When I get the entry 'KnownClass' from the Container
    Then I should get the object 'Test\Dummy\Component' as the result

  Scenario: Getting an unknown entry identifier from the container
    Given an entry identifier 'UnknownClass' is not known to the container
    When I get the entry 'UnknownClass' from the Container
    Then I should get an exception as the result

  Scenario: Getting a known entry identifier from the container twice
    Given an entry identifier 'KnownClass' is known to the container
    When I get the entry 'KnownClass' from the Container twice
    Then I should get the same object as the result

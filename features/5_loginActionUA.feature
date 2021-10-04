Feature: login action --------------------------------------------------------------------------------------------------

  Background:
    Given the user navigates to {https://birzha.tech/}
    Then the button /login/ should be visible


  Scenario: Validate Login Form

    When the user clicks on object /login/
    Then the current URL should be equal to {https://birzha.tech/login}
    And the object /inputLogin/ should be visible
    And the object /inputPassword/ should be visible

    Then fill the /inputLogin/ with value /+38(095)470-04-86/
    And fill the /inputPassword/ with value /123456789/

    Then the object /checkBox/ should be visible
    And click on object /checkBox/

    Then the button /submit/ should be visible

    Then the user clicks on object /submit/
    Then the current URL should be equal to {https://birzha.tech}
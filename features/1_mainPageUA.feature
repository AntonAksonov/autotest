Feature: main page (UA) (logged out) -------------------------------------------------------------------------------

  Background:
    Given the user navigates to {https://birzha.tech/}

  Scenario:

    Then the object /logo/ should be visible
    And the value of attribute src of object /logo/ should be equal to {/images/logo.png}
    And the value of attribute alt of object /logo/ should be equal to {/images/logo.png}

    Then the object /menu/ should be visible
    And  the link /Заяви/ should be visible
    And the value of attribute href of object /Заяви/ should be equal to {/}

    Then the object /language/ should be visible
    And the object /currencies/ should be visible
    And the object /phone/ should be visible

    Then the button /login/ should be visible
    And the name of object /login/ should be equal to /вхід/
    And the value of attribute href of object /login/ should be equal to {/login}
    And the return code of URL from attribute href of object /login/ should be equal to /two hundred/

    When the user clicks on object /login/
    Then the current URL should be equal to {https://birzha.tech/login}

    Then the button /register/ should be visible
    And the name of object /register/ should be equal to /Реєстрація/
    And the value of attribute href of object /registration/ should be equal to {/register}
    And the return code of URL from attribute href of object /register/ should be equal to /two hundred/

    When the user clicks on object /register/
    Then the current URL should be equal to {https://birzha.tech/register}

Feature: main page (UA) (logged in) ------------------------------------------------------------------------------------

  Background:
    Given the user navigates to {https://birzha.tech/}
    When the user clicks on object /login/
    Then fill the /inputLogin/ with value /+38(095)470-04-86/
    And fill the /inputPassword/ with value /123456789/
    Then the user clicks on object /submit/

    Scenario:

      Then the object /logo/ should be visible
      And the value of attribute src of object /logo/ should be equal to {/images/logo.png}

      Then the object /menu/ should be visible
      And  the link /Заяви/ should be visible
      And the value of attribute href of object /menu/ should be equal to {/}
      And  the link /Мої_заяви/ should be visible
      And the value of attribute href of object /Мої_заяви/ should be equal to {/mylots}

      Then the object /language/ should be visible
      And the object /currencies/ should be visible
      And the object /phone/ should be visible

      Then the button /login/ should be visible
      And the name of object /login/ should be equal to /вхід/
      And the value of attribute href of object /login/ should be equal to {/login}
      When the user clicks on object /login/
      Then the return code of URL from attribute href of object /login/ should be equal to /two hundred/

      Then the button /register/ should be visible
      And the name of object /register/ should be equal to /Реєстрація/
      And the value of attribute href of object /registration/ should be equal to {/register}
      When the user clicks on object /register/
      Then the return code of URL from attribute href of object /register/ should be equal to /two hundred/

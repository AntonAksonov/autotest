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
      And the value of attribute href of object /Заяви/ should be equal to {/}
      And  the link /Мої_заяви/ should be visible
      And the value of attribute href of object /Мої_заяви/ should be equal to {/mylots}

      Then the object /language/ should be visible
      And the object /currencies/ should be visible
      And the object /phone/ should be visible

      Then the object /profile/ should be visible
      And the value of attribute src of object /profile/ should be equal to {/images/icon_login.png}
      And the value of attribute href of object /profile/ should be equal to {/profile/26/bro}
      Then the return code of URL from attribute href of object /profile/ should be equal to /two hundred/

      When the user clicks on object /profile/
      Then the current URL should be equal to /https://birzha.tech/profile/26/bro/

      Then the button /log_out/ should be visible
      And the name of object /log_out/ should be equal to /вихід/
      And the value of attribute href of object /log_out/ should be equal to {/logout}
      And the return code of URL from attribute href of object /log_out/ should be equal to /two hundred/
    
      When the user clicks on object /log_out/
      Then the current URL should be equal to /https://birzha.tech/

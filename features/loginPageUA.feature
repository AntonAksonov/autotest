Feature: login page(UA)(not registered)

  Background:
    Given the user navigates to {https://birzha.tech/}
    Then the button /login/ should be visible


  Scenario: Validate Login Form

    When the user clicks on object /login/
    Then the current URL should be equal to {https://birzha.tech/login}
    And the object /page title/ should be visible
    And the name of the object /page title/ should be equal to /АВТОРИЗАЦІЯ/

    Then the object /inputLogin/ should be visible
    And the label for /inputLogin/ should be /Логін/
#    And the value of of object /inputLogin/ should be equal to /+38(000)00-00-00-0/

    Then the object /inputPassword/ should be visible
    And the label for /inputPassword/ should be /Пароль/
    And the value of of object /inputPassword/ should be equal to NULL

    Then the object /checkBox/ should be visible
    And the label  of of object /checkBox/ should be equal to /Запам`ятати мене/

    Then the button /submit/ should be visible
    And the name of object /submit/ should be equal to /Авторизуватися/

    When the user clicks on object /submit/
    Then the current URL should be equal to {https://birzha.tech/login}

    When the user clicks on object /submit/
    Then the current URL should be equal to {https://birzha.tech/login}

    Then the object /info/ should be visible
    And the name of object /info/ should be equal to /Не маєш власного облікового запису?/

    Then the link /info/ should be visible
    And the value of attribute href of object /info/ should be equal to {/register}
    And the name of link /info/ should be equal to /Увійдіть/

    When the user clicks on link /info/
    Then the current URL should be equal to {https://birzha.tech/register}


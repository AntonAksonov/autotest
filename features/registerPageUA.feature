Feature: register page(UA)(not registered)

  Background:
    Given the user navigates to {https://birzha.tech/}
    Then the button /register/ should be visible
    And the user clicks on object /register/
    And the current URL should be equal to {https://birzha.tech/register}


  Scenario: validate register Form

    Then the object /register Page title/ should be visible
    And the name of the object /page title/ should be equal to /РЕЄСТРАЦІЯ/

    Then the object /registerInputLogin/ should be visible
    And the label for /registerInputLogin/ should be /Логін/
#    And the value of of object /registerInputLogin/ should be equal to /+38(000)00-00-00-0/

    Then the object /inputEmail/ should be visible
    And the label for /inputEmail/ should be /Email/
    And the value of of object /inputEmail/ should be equal to NULL

    Then the object /registerInputPassword/ should be visible
    And the label for /registerInputPassword/ should be /Пароль/
    And the value of of object /registerInputPassword/ should be equal to NULL

    Then the object /termsCheckbox/ should be visible
    And the label  of of object /termsCheckbox/ should be equal to /Я підтверджую свою згоду/

    Then Then the button /registerSubmit/ should be visible
    And the name of object /registerSubmit/ should be equal to /Наступний крок/
    When the user clicks on object /registerSubmit/
    Then the current URL should be equal to {https://birzha.tech/register}
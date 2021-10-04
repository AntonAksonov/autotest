Feature: my lots page(UA) (logged in) ----------------------------------------------------------------------------------

  Background:
    Given the user navigates to {https://birzha.tech/}
    Then the link /myLots/ should be visible
    And the user clicks on link /myLots/
    And the current URL should be equal to {https://birzha.tech/mylots}

  Scenario: validate myLots page

    Then the object /myLots Page title/ should be visible
    And the name of the object /page title/ should be equal to /МОЇ ЗАЯВИ/

    Then the button /createProduct/ should be visible
    And the name of button /createProduct/ should be equal to /+ ДОДАТИ ОБ\'ЄКТ/
    And the value of attribute href of button /createProduct/ should be equal to {/profile/create/product}
    And the return code of URL from attribute href of object /createProduct/ should be equal to /two hundred/

    Then the user clicks on object /createProduct/
    And the current URL should be equal to {https://birzha.tech/profile/create/product}



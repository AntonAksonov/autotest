Feature: adminKO   ------------------------------------------------------------------------------------

  Background:
    Given navigate to {http://dev.birzha.tech/admin/login}
    And fill the /inputLogin/
    And fill the /inputPassword/
    And click /submit/

  Scenario: menu, links, buttons

    Then the current URL should be equal to {https://birzha.tech/admin}

    Then click /pushmenu/
    And check all links status codes

  Then click /categories/


  Then click /auctions/


  Then click /users/
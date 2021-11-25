Feature: ADMIN

  Background:
    Given navigate to {http://dev.birzha.tech/admin/login}
    And fill the /inputLogin/
    And fill the /inputPassword/
    And click /submit/

  Scenario: CREATE CATEGORY

    Then check URL
    Then click /pushmenu/
    Then click /categories/
    Then click /add/
    Then fill in category name
    And choose active status
    And click /add_attribute/
    And fill in the name of attribute
    Then click /save/

  Scenario: EDIT CATEGORY

    Then click /pushmenu/
    Then click /categories/
    Then check current URL
    Then click edit on new category
    Then fill in category name
    And choose active status
    And edit /add_attribute/
    And edit in the name of attribute
    Then edit /save/
    Then check current URL

  Scenario: CREATE AND DELETE CATEGORY

    Then add another category
    Then click /pushmenu/
    Then click /categories/
    Then check current URL
    Then click /add/
    Then fill in category name
    And choose active status
    And click /add_attribute/
    And fill in the name of attribute
    Then click /save/
    And delete it
#    Then check if search is working

  Scenario: CREATE AUCTION

    Then click /pushmenu/
    And click /auctions/
    Then click /add/
    Then fill in auction name
    And fill in item name
    And fill in description
    And choose category
    And choose auction active status
    And choose buy or sell
    And choose type
    And fill in price
    And fill in amount
    And fill in amount of auctions
    And fill in delivery basis
    And fill in delivery warehouse
    And fill in units
    And choose VAT
    And choose access type
    And choose deal type
    And check in auctions checkbox
    And choose start date
    And choose end date
    And fill in auctions spacing
    And fill in guarantee
    And fill in auctions spacing
    And fill in auctions step
    And fill in start price
    And check in hide author checkbox
    And fill in clients list
    And attach image file
    And click /add image/
    Then click /save/ auction
    Then click /save/ auction
#    Then screenshot

  Scenario: EDIT AUCTION

    Then check current URL
#    And check if new auction is added
    Then click on new auction to edit it
    Then fill in auction name
    And fill in item name
    And fill in description
    And choose category
    And choose active status
    And choose buy or sell
    And choose type
    And fill in price
    And fill in amount of auctions
    And fill in delivery basis
    And fill in delivery warehouse
    And fill in units
    And choose VAT
    And choose access type
    And choose deal type
    And check in auctions checkbox
    And choose start date
    And choose end date
    And fill in auctions spacing
    And fill in guarantee
    And fill in auctions spacing
    And fill in auctions step
    And fill in start price
    And fill in auctions step
    And fill in clients list
    And attach image file
    And click /add image/
    Then click /save/
    Then check current URL

  Scenario: CREATE AND DELETE AUCTION

    Then click /pushmenu/
    And click /auctions/
    Then click /add/
    Then fill in auction name
    And fill in item name
    And fill in description
    And choose category
    And choose auction active status
    And choose buy or sell
    And choose type
    And fill in price
    And fill in amount
    And fill in amount of auctions
    And fill in delivery basis
    And fill in delivery warehouse
    And fill in units
    And choose VAT
    And choose access type
    And choose deal type
    And check in auctions checkbox
    And choose start date
    And choose end date
    And fill in auctions spacing
    And fill in guarantee
    And fill in auctions spacing
    And fill in auctions step
    And fill in start price
    And fill in clients list
    And attach image file
    And check in hide author checkbox
    And click /add image/
    Then click /save/ auction
    And delete this auction
#    Then check if search is working

#    Then click /pushmenu/

#    And click /users/
#    Then click on user to edit it`s info
#    Then fill in email
#    Then fill in password
#    Then choose user role
#    Then choose user type
#    Then fill in first name
#    Then fill in second name
#    Then fill in last name
#    Then fill in ECP
#    Then fill in index
#    Then fill in adress
#    Then fill in phone number
#    Then fill in bank name
#    Then fill in MFO
#    Then fill in account number
#    Then fill in SWIFT
#    Then fill in your office
#    Then fill in representative
#    Then click /save/
#


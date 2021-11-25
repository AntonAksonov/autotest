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
  Scenario: USERS

    Then click /pushmenu/
    And click /users/
    Then click on user to edit it`s info
    Then fill in full name
    Then fill in short name
    Then fill in docwork name
    Then fill in docpower name
    Then fill in docpower name
    Then fill in email
    Then fill in ipn
    Then fill in erdpou
    Then fill in main phone
    Then fill in second phone
    Then fill in main country
    Then fill in main region
    Then fill in main city
    Then fill in main district
    Then fill in main street
    Then fill in main building
    Then fill in main appartment
    Then fill in main zip code

    Then fill in additional country
    Then fill in additional region
    Then fill in additional city
    Then fill in additional district
    Then fill in additional street
    Then fill in additional building
    Then fill in additional appartment
    Then fill in additional zip code
    Then choose user role
    Then fill in bank name
    Then fill in bank adress
    Then fill in account number
    Then fill in MFO
    Then fill in SWIFT
    Then fill in executive name
    Then fill in passport from
    Then fill in passport start date
    Then fill in passport serial number
    Then add picture
    Then submit

#
#    Then fill in representative
#    Then click /save/
#


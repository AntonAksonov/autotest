Feature: Api test

  Scenario:
    When request \\POST api/registration/add\\
#    Then request \\POST api/registration/type\\
#    Then request \\POST api/registration/role/bro\\
    Then request \\GET api/login\\
    Then request \\GET api/auctions\\

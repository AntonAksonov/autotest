Feature: create product page(UA) (logged in) ---------------------------------------------------------------------------

  Background:
    Given the user navigates to {https://birzha.tech/}
    When the user clicks on object /login/
    Then fill the /inputLogin/ with value /+38(095)470-04-86/
    And fill the /inputPassword/ with value /123456789/
    Then the user clicks on object /submit/

  Scenario:
    When the user nabigates to {https://birzha.tech/profile/create/product}
    Then the object /createProduct page title/ should be visible
    And the name of the object createProduct page title/ should be equal to /СТВОРИТИ АУКЦІОН/

    Then Then the object /auctions_title/ should be visible
    And the label for /auctions_title/ should be /Назва заявки/

    Then Then the object /auctions_name/ should be visible
    And the label for /auctions_name/ should be /Найменування товару/

    Then Then the object /auctions_content/ should be visible
    And the label for /auctions_content/ should be /Опис/

    Then Then the object /auctions_category/ should be visible
    And the label for /auctions_category/ should be /Категорія/

    Then Then the object /auctions_buySell/ should be visible
    And the label for /auctions_buySell/ should be /Купити / Продати/
    And the option one for the object /auctions_buySell/ should be /Купити/
    And the option two for the object /auctions_buySell/ should be /Продати/

    Then Then the object /auctions_type/ should be visible
    And the label for /auctions_type/ should be /Тип/
    And the option one for the object /auctions_buySell/ should be /Заявка/
    And the option two for the object /auctions_buySell/ should be /Котировка/

    Then Then the object /auctions_amount/ should be visible
    And the label for /auctions_amount/ should be /Кількість/

    Then Then the object /auctions_amount/ should be visible
    And the label for /auctions_amount/ should be /Кількість/

    Then Then the object /auctions_price/ should be visible
    And the label for /auctions_price/ should be /Ціна/

    Then Then the object /auctions_cost/ should be visible
    And the label for /auctions_cost/ should be /Вартість/

    Then Then the object /auctions_quantity/ should be visible
    And the label for /auctions_quantity/ should be /Кількість заяв/

    Then Then the object /auctions_deliveryBasis/ should be visible
    And the label for /auctions_deliveryBasis/ should be /Базис поставки/

    Then Then the object /auctions_deliveryWarehouse/ should be visible
    And the label for /auctions_deliveryWarehouse/ should be /Склад поставки/

    Then Then the object /auctions_unit/ should be visible
    And the label for /auctions_unit/ should be /Од. вим./

    Then Then the object /auctions_vat/ should be visible
    And the label for /auctions_vat/ should be /Ставка без ПДВ/
    And the option one for the object /auctions_vat/ should be /Без НДС/
    And the option two for the object /auctions_vat/ should be /30 %/
    And the option three for the object /auctions_vat/ should be /20 %/
    And the option four for the object /auctions_vat/ should be /10 %/

    Then Then the object /auctions_accessType/ should be visible
    And the label for /auctions_accessType/ should be /Тип доступу/

    And the option one for the object /auctions_accessType/ should be />=/
    And the option two for the object /auctions_accessType/ should be /<=/
    And the option three for the object /auctions_accessType/ should be /=/
    And the option four for the object /auctions_accessType/ should be /</
    And the option four for the object /auctions_accessType/ should be />/

    Then Then the object /auctions_quantity/ should be visible
    And the label for /auctions_quantity/ should be /Кількість заяв/

    Then Then the object /auctions_deal/ should be visible
    And the label for /auctions_deal/ should be /Здійснення угоди/
    And the option one for the object /auctions_deal/ should be /Атоматические/
    And the option two for the object /auctions_deal/ should be /Уведомление/

    Then the checkBox /auctions_auction/ should be visible
    And the label for checkBox /auctions_auction/ should be /Це аукціон/

    Then Then the object /auctions_startDate/ should be visible
    And the label for /auctions_startDate/ should be /Час початку (ч / м / с)/

    Then Then the object /auctions_endDate/ should be visible
    And the label for /auctions_endDate/ should be /Тайм-аут закінчення (ч / м / с)/

    Then Then the object /auctions_spacing/ should be visible
    And the label for /auctions_spacing/ should be /Інтервал ставки (хвилини)/

    Then Then the object /auctions_guarantee/ should be visible
    And the label for /auctions_guarantee/ should be /Гарантійного внеску/

    Then Then the object /auctions_step/ should be visible
    And the label for /auctions_step/ should be /Крок торгів%/

    Then Then the object /auctions_startPrice/ should be visible
    And the label for /auctions_startPrice/ should be /Початкова ціна/

    Then the checkBox /auctions_hideAuthor/ should be visible
    And the label for checkBox /auctions_hideAuthor/ should be /Приховувати автора/

    Then Then the object /auctions_clients/ should be visible
    And the label for /auctions_clients/ should be /Список клієнтів брокера (В розробці)/

    Then Then the object /auctions_clients/ should be visible
    And the label for /auctions_clients/ should be /Список клієнтів брокера (В розробці)/

    Then Then the object /auctions_active/ should be visible
    And the label for /auctions_active/ should be /Публікація/
    And the option one for the object /auctions_deal/ should be /публікувати/
    And the option two for the object /auctions_deal/ should be /Не опубліковано/


    Then the button /add-another-collection-widget/ should be visible
    And the name of button /add-another-collection-widget/ should be equal to /Додати зображення/
    And the input /auctions_thumbnailFile_file/ should be visible

    Then the button /auctions_submit/ should be visible
    And the name of button /auctions_submit/ should be equal to /Відправити/


<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawMinkContext implements Context
{
    /**
     * @When the user navigates to {https:\/\/birzha.tech\/}
     */
    public function theUserNavigatesToHttpsBirzhaTech()
    {
        try {
            $session = $this->getSession();
            $session->visit($this->locatePath('/'));
            echo $this->getSession()->getCurrentUrl();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the object \/logo\/ should be visible
     */
    public function theObjectLogoShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.container .logo');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the value of attribute src of object \/logo\/ should be equal to {\/images\/logo.png}
     */
    public function theValueOfAttributeSrcOfObjectLogoShouldBeEqualToImagesLogoPng()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '/html/body/header/div/div/div[1]/img');
            if ($element->getAttribute('src') == '/images/logo.png') {
                echo 'PASSED' . " " . $element->getAttribute('src');
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @Then the object \/menu\/ should be visible
     */
    public function theObjectMenuShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.menu');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the object \/language\/ should be visible
     */
    public function theObjectLanguageShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.menu-header .language');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the object \/currencies\/ should be visible
     */
    public function theObjectCurrenciesShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.currencies');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the object \/phone\/ should be visible
     */
    public function theObjectPhoneShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.phone');

            if ($element->isVisible()) {
                echo 'VISIBLE'  . " " . $element->getText();
            } else {
                echo 'NOT FOUND'  . " " . $element->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the button \/login\/ should be visible
     */
    public function theButtonLoginShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.login');

            if ($element->isVisible()) {
                echo 'VISIBLE'  . " " . $element->getText();
            } else {
                echo 'NOT FOUND'  . " " . $element->getText();
            }
        } catch (Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @When the user clicks on object \/login\/
     */
    public function theUserClicksOnObjectLogin()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.login');
            foreach ($elements as $item) {
                if ($item->isVisible()) {
                    $item->click();
                }
            }
            echo $this->getSession()->getCurrentUrl();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @Then the return code of URL from attribute href of object \/login\/ should be equal to \/two hundred\/
     */
    public function theReturnCodeOfUrlFromAttributeHrefOfObjectLoginShouldBeEqualToTwoHundred()
    {
        try {
            $handle = curl_init('https://birzha.tech/login');
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($handle);
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            if ($httpCode == 200) {
                echo 'STATUS CODE 200 | ' . PHP_EOL;
            } else {
                echo $httpCode;
            }
            curl_close($handle);
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the button \/register\/ should be visible
     */
    public function theButtonRegisterShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.registration');

            if ($element->isVisible()) {
                echo 'VISIBLE' . " " . $element->getText();
            } else {
                echo 'NOT FOUND' . " " . $element->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @When the user clicks on object \/register\/
     */
    public function theUserClicksOnObjectRegister()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.registration');
            foreach ($elements as $item) {
                if ($item->isVisible()) {
                    $item->click();
                }
            }
            echo $this->getSession()->getCurrentUrl();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the value of attribute href of object \/registration\/ should be equal to {\/register}
     */
    public function theValueOfAttributeHrefOfObjectRegistrationShouldBeEqualToRegister()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.buttons .registration');
            foreach ($elements as $element) {
                if ($element->getAttribute('href') == '/register') {
                    echo 'PASSED' . " " . $element->getAttribute('href');
                } else {
                    echo 'FALSE' . " " . $element->getAttribute('href');
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the return code of URL from attribute href of object \/register\/ should be equal to \/two hundred\/
     */
    public function theReturnCodeOfUrlFromAttributeHrefOfObjectRegisterShouldBeEqualToTwoHundred()
    {
        try {
            $handle = curl_init('https://birzha.tech/register');
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($handle);
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            if ($httpCode == 200) {
                echo 'STATUS CODE 200 | ' . PHP_EOL;
            } else {
                echo $httpCode;
            }
            curl_close($handle);
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }

    }




    /**
     * @Then the name of object \/login\/ should be equal to \/вхід\/
     */
    public function theNameOfObjectLoginShouldBeEqualToVkhid2()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.login');
            foreach ($elements as $element) {
                if ($element->getText() == 'Вхід') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the name of object \/register\/ should be equal to \/Реєстрація\/
     */
    public function theNameOfObjectRegisterShouldBeEqualToReiestratsiia()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.registration');
            foreach ($elements as $element) {
                if ($element->getText() == 'Реєстрація') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . " " . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given the user navigates to {https:\/\/birzha.tech\/login}
     */
    public function theUserNavigatesToHttpsBirzhaTechLogin()
    {
        try {
            $session = $this->getSession();
            $session->visit($this->locatePath('/'));
            echo $this->getSession()->getCurrentUrl();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @Then the object \/page title\/ should be visible
     */
    public function theObjectPageTitleShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.h3');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the name of the object \/page title\/ should be equal to \/АВТОРИЗАЦІЯ\/
     */
    public function theNameOfTheObjectPageTitleShouldBeEqualToAvtorizatsiia()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.h3');
            foreach ($elements as $element) {
                if ($element->getText() == 'АВТОРИЗАЦІЯ') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the object \/inputLogin\/ should be visible
     */
    public function theObjectInputloginShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('xpath', '//*[@id="inputLogin"]');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the label for \/inputLogin\/ should be \/Логін\/
     */
    public function theLabelForInputloginShouldBeLogin()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('xpath', '/html/body/main/div/div/form/label[1]');
            foreach ($elements as $element) {
                if ($element->getText() == 'Логін') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the value of of object \/inputLogin\/ should be equal to \/+:arg1(:arg2):arg3-:arg4-:arg5-:arg6\/
     */
    public function theValueOfOfObjectInputloginShouldBeEqualTo($arg1, $arg2, $arg3, $arg4, $arg5, $arg6)
    {
        throw new PendingException();
    }

    /**
     * @Then the object \/inputPassword\/ should be visible
     */
    public function theObjectInputpasswordShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('xpath', '//*[@id="inputPassword"]');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the label for \/inputPassword\/ should be \/Пароль\/
     */
    public function theLabelForInputpasswordShouldBeParol()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('xpath', '//*[@id="registration_form_plainPassword"]');
            foreach ($elements as $element) {
                if ($element->getValue() == 'Пароль') {
                    echo 'PASSED' . " " . $element->getValue();
                } else {
                    echo 'FALSE' . $element->getValue();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the value of of object \/inputPassword\/ should be equal to NULL
     */
    public function theValueOfOfObjectInputpasswordShouldBeEqualToNull()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.inputPassword');
        foreach ($elements as $element) {
            if ($element->getText() == NULL) {
                echo 'PASSED' . " " . $element->getText();
            } else {
                echo 'FALSE' . " " . $element->getText();
            }
        }
    }

    /**
     * @Then the object \/checkBox\/ should be visible
     */
    public function theObjectCheckboxShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.checkbox');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the label  of of object \/checkBox\/ should be equal to \/Запам`ятати мене\/
     */
    public function theLabelOfOfObjectCheckboxShouldBeEqualToZapamIatatiMene()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.checkbbox');
            foreach ($elements as $element) {
                if ($element->getText() == 'Запам`ятати мене') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . " " . $element->getText();

                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the button \/submit\/ should be visible
     */
    public function thenTheButtonSubmitShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.btn-primary');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the name of object \/submit\/ should be equal to \/Авторизуватися\/
     */
    public function theNameOfObjectSubmitShouldBeEqualToKupuiut()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.btn-primary');
            foreach ($elements as $element) {
                if ($element->getText() == 'Авторизуватися') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . " " . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @When the user clicks on object \/submit\/
     */
    public function theUserClicksOnObjectSubmit()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findButton('Авторизуватися');
                if ($element->isVisible()) {
                    $element->click();
                }
            echo $this->getSession()->getCurrentUrl();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @Given /^the value of of object \/inputLogin\/ should be equal to \/\+38\(000\)00\-00\-00\-0\/$/
     */
    public function theValueOfOfObjectInputLoginShouldBeEqualTo380000000000()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('xpath', '//*[@id="registration_form_login"]');
            foreach ($elements as $element) {
                if ($element[0]->getValue() == '+38(000)00-00-00-0') {
                    echo 'PASSED' . " " . $element->getValue();
                } else {
                    echo 'FALSE' . " " . $element->getValue();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the current URL should be equal to {https:\/\/birzha.tech\/login}
     */
    public function theCurrentUrlShouldBeEqualToHttpsBirzhaTechLogin()
    {
        try {
            if ($this->getSession()->getCurrentUrl() == 'https://birzha.tech/login') {
                echo 'PASSED |' . 'CURRENT URL: ' . $this->getSession()->getCurrentUrl();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then /^the current URL should be equal to \{https:\/\/birzha\.tech\/register\}$/
     */
    public function theCurrentURLShouldBeEqualToHttpsBirzhaTechRegister()
    {
        try {
            if ($this->getSession()->getCurrentUrl() == 'https://birzha.tech/register') {
                echo 'PASSED |' . 'CURRENT URL: ' . $this->getSession()->getCurrentUrl();
            } else {
                echo 'FALSE';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the name of the object \/page title\/ should be equal to \/РЕЄСТРАЦІЯ\/$/
     */
    public function theNameOfTheObjectPageTitleShouldBeEqualToРЕЄСТРАЦІЯ()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'h1');
            if ($elements->getText() == 'РЕЄСТРАЦІЯ') {
                echo 'PASSED' . " " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }

    }

    /**
     * @Then /^the object \/inputEmail\/ should be visible$/
     */
    public function theObjectInputEmailShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('xpath', '//*[@id="registration_form_email"]');
            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the label for \/inputEmail\/ should be \/Email\/$/
     */
    public function theLabelForInputEmailShouldBeEmail()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('xpath', '//*[@id="registration_form"]/div[2]/label');
            foreach ($elements as $element) {
                if ($element->getText() == 'Email') {
                    echo 'PASSED' . " " . $element->getText();
                    var_dump($element);
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }

    }

    /**
     * @Then /^the object \/termsCheckbox\/ should be visible$/
     */
    public function theObjectTermsCheckboxShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_agreeTerms"]');
            if ($element->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the label  of of object \/termsCheckbox\/ should be equal to \/Я підтверджую свою згоду\/$/
     */
    public function theLabelOfOfObjectTermsCheckboxShouldBeEqualToЯПідтверджуюСвоюЗгоду()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('xpath', '//*[@id="registration_form"]/div[4]/label');
            foreach ($elements as $element) {
                if ($element->getValue() == 'Я підтверджую свою згоду') {
                    echo 'PASSED' . " " . $element->getValue();
                } else {
                    echo 'FALSE' . " " . $element->getValue();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @When /^the user clicks on object \/registerSubmit\/$/
     */
    public function theUserClicksOnObjectRegisterSubmit()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('xpath', '//*[@id="registration_form_submit"]');
            foreach ($element as $item) {
                if ($item->isVisible()) {
                    $item->click();
                }
                echo $this->getSession()->getCurrentUrl();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the object \/register Page title\/ should be visible$/
     */
    public function theObjectRegisterPageTitleShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', 'h1');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then /^the object \/registerInputLogin\/ should be visible$/
     */
    public function theObjectRegisterInputLoginShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_login"]');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the label for \/registerInputLogin\/ should be \/Логін\/$/
     */
    public function theLabelForRegisterInputLoginShouldBeЛогін()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('xpath', '//*[@id="registration_form"]/div[1]/label');
            foreach ($elements as $element) {
                if ($element->getText() == 'Логін') {
                    echo 'PASSED' . " " . $element->getText();
                    var_dump($element);
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the value of of object \/registerInputLogin\/ should be equal to \/\+38\(000\)00\-00\-00\-0\/$/
     */
    public function theValueOfOfObjectRegisterInputLoginShouldBeEqualTo380000000000()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.registration_form_login');
            foreach ($elements as $element) {
                if ($element[0]->getText() == '+38(000)00-00-00-0') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . " " . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then /^the object \/registerInputPassword\/ should be visible$/
     */
    public function theObjectRegisterInputPasswordShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_plainPassword"]');
            if ($element->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the label for \/registerInputPassword\/ should be \/Пароль\/$/
     */
    public function theLabelForRegisterInputPasswordShouldBeПароль()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('xpath', '//*[@id="registration_form"]/div[3]/label');
            foreach ($elements as $element) {
                if ($element->getText() == 'Пароль') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the value of of object \/registerInputPassword\/ should be equal to NULL$/
     */
    public function theValueOfOfObjectRegisterInputPasswordShouldBeEqualToNULL()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('xpath', '//*[@id="registration_form_plainPassword"]');
            foreach ($elements as $element) {
                if ($element->getText() == NULL) {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . " " . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the value of of object \/inputEmail\/ should be equal to NULL$/
     */
    public function theValueOfOfObjectInputEmailShouldBeEqualToNULL()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('xpath', '//*[@id="registration_form_email"]');
            foreach ($elements as $element) {
                if ($element->getText() == NULL) {
                    echo 'PASSED';
                } else {
                    echo 'FALSE' . " " . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then /^fill the \/registerInputLogin\/ with value \/\+38\(067\)354\-85\-14\/$/
     */
    public function fillTheRegisterInputLoginWithValue380673548514()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_login"]');
            if ($element->isVisible()) {
                $element->setValue('+38(067)354-85-14');
                echo $element->getValue();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^fill the \/registerInputPassword\/ with value \/test1111\/$/
     */
    public function fillTheRegisterInputPasswordWithValueTest1111()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_plainPassword"]');
            if ($element->isVisible()) {
                $element->setValue('123456789');
            } else {
                echo 'NOT FOUND';
            }
            echo $element->getValue();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^fill the \/inputEmail\/ with value \/whiletablesits@gmail\.com\/$/
     */
    public function fillTheInputEmailWithValueWhiletablesitsGmailCom()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_email"]');
            if ($element->isVisible()) {
                $element->setValue('whiletablesits@gmail.com');
            } else {
                echo 'NOT FOUND';
            }
            echo $element->getValue();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^click on object \/termsCheckbox\/$/
     */
    public function clickOnObjectTermsCheckbox()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.checkbox');
            foreach ($element as $item) {
                if ($item->isVisible()) {
                    $item->click();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then /^fill the \/inputLogin\/ with value \/\+38\(095\)470\-04\-86\/$/
     */
    public function fillTheInputLoginWithValue380673548514()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="inputLogin"]');
            if ($element->isVisible()) {
                $element->setValue('+38(095)470-04-86');
            } else {
                echo 'NOT FOUND';
            }
            echo $element->getValue();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^fill the \/inputPassword\/ with value \/123456789\/$/
     */
    public function fillTheInputPasswordWithValueTest1111()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="inputPassword"]');
            if ($element->isVisible()) {
                $element->setValue('123456789');
            } else {
                echo 'NOT FOUND';
            }
            echo $element->getValue();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^click on object \/checkBox\/$/
     */
    public function clickOnObjectCheckBox()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.checkbox');
            foreach ($element as $item) {
                if ($item->isVisible()) {
                    $item->click();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @Then the object \/info\/ should be visible
     */
    public function theObjectInfoShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.info');
            if ($element->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @Then the link \/info\/ should be visible
     */
    public function theLinkInfoShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', 'form div a');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the value of attribute href of object \/info\/ should be equal to {\/register}
     */
    public function theValueOfAttributeHrefOfObjectInfoShouldBeEqualToRegister()
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', 'form div a');
        if ($element->getAttribute('href') == '/register') {
            echo 'PASSED' . " " . $element->getAttribute('href');
        } else {
            echo 'FALSE' . " " . $element->getAttribute('href');
        }
    }

    /**
     * @Then the name of link \/info\/ should be equal to \/Увійдіть\/
     */
    public function theNameOfLinkInfoShouldBeEqualToUviidit()
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', 'form div a');
        if ($element->getText() === 'Увійдіть') {
            echo 'PASSED' . " " . $element->getText();
        } else {
            echo 'FALSE' . " " . $element->getText();

        }
    }

    /**
     * @When the user clicks on link \/info\/
     */
    public function theUserClicksOnLinkInfo()
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', 'form div a');
        if ($element->isVisible()) {
            $element->click();
        }
        echo $this->getSession()->getCurrentUrl();
    }

    /**
     * @Then Then the button \/registerSubmit\/ should be visible
     */
    public function thenTheButtonRegistersubmitShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '//*[@id="registration_form_submit"]');


            if ($element->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the name of object \/registerSubmit\/ should be equal to \/Наступний крок\/
     */
    public function theNameOfObjectRegistersubmitShouldBeEqualToAvtorizuvatisia()
    {
        $page = $this->getSession()->getPage();
        $elements = $page->findAll('css', '.submit');
        foreach ($elements as $element) {
            if ($element->getText() == 'Наступний крок') {
                echo 'PASSED' . " " . $element->getText();
            } else {
                echo 'FALSE' . " " . $element->getText();
            }
        }
    }

    /**
     * @Then /^the current URL should be equal to \{https:\/\/birzha\.tech\}$/
     */
    public function theCurrentURLShouldBeEqualToHttpsBirzhaTech()
    {
        if ($this->getSession()->getCurrentUrl() == '/') {
            echo 'PASSED |' . 'CURRENT URL: ' . $this->getSession()->getCurrentUrl();
        }
    }


    /**
     * @Given /^the name of object \/info\/ should be equal to \/Не маєш власного облікового запису\?\/$/
     */
    public function theNameOfObjectInfoShouldBeEqualToНеМаєшВласногоОбліковогоЗапису()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '/html/body/main/div/div/form/div[2]/span');
            if ($element->getValue() == 'Не маєш власного облікового запису?') {
                echo 'PASSED' . " " . $element->getValue();
            } else {
                echo 'FALSE' . " " . $element->getValue();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @Given the user navigates to {https:\/\/birzha.tech\/mylots}
     */
    public function theUserNavigatesToHttpsBirzhaTechMylots()
    {
        throw new PendingException();
    }

    /**
     * @Then the button \/createProduct\/ should be visible
     */
    public function theButtonCreateproductShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.blue-button');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the user clicks on object \/createProduct\/
     */
    public function theUserClicksOnObjectCreateproduct()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.blue-button');

            if ($element->isVisible()) {
                $element->click();
            } else {
                echo 'NOT FOUND';
            }
            $this->getSession()->getCurrentUrl();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the current URL should be equal to {https:\/\/birzha.tech\/profile\/create\/product}
     */
    public function theCurrentUrlShouldBeEqualToHttpsBirzhaTechProfileCreateProduct()
    {
        try {
            if ($this->getSession()->getCurrentUrl() == 'https://birzha.tech/profile/create/product') {
                echo 'PASSED |' . 'CURRENT URL: ' . $this->getSession()->getCurrentUrl();
            } else {
                echo 'FALSE';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the object \/createProduct зage title\/ should be visible
     */
    public function theObjectCreateproductZageTitleShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the name of the object createProduct page title\/ should be equal to \/СТВОРИТИ АУКЦІОН\/
     */
    public function theNameOfTheObjectCreateproductPageTitleShouldBeEqualToStvoritiAuktsion()
    {
        throw new PendingException();
    }

    /**
     * @Then the link \/myLots\/ should be visible
     */
    public function theLinkMylotsShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '/html/body/header/div/div/div[2]/a[2]');

            if ($element->isVisible()) {
                echo 'VISIBLE' . $element->getValue();
            } else {
                echo 'NOT FOUND' . $element->getValue();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the user clicks on link \/myLots\/
     */
    public function theUserClicksOnLinkMylots()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('xpath', '/html/body/header/div/div/div[2]/a[2]');

            if ($element->isVisible()) {
                $element->click();
            } else {
                echo 'NOT FOUND' . $element->getValue();
            }
            echo $this->getSession()->getCurrentUrl();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the current URL should be equal to {https:\/\/birzha.tech\/mylots}
     */
    public function theCurrentUrlShouldBeEqualToHttpsBirzhaTechMylots()
    {
        try {
            if ($this->getSession()->getCurrentUrl() == 'https://birzha.tech/mylots') {
                echo 'PASSED |' . 'CURRENT URL: ' . $this->getSession()->getCurrentUrl();
            } else {
                echo 'FALSE' . $this->getSession()->getCurrentUrl();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the object \/myLots Page title\/ should be visible
     */
    public function theObjectMylotsPageTitleShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', 'h1');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }


    /**
     * @Then the name of the object \/page title\/ should be equal to \/МОЇ ЗАЯВИ\/
     */
    public function theNameOfTheObjectPageTitleShouldBeEqualToMoyiZaiavi()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'h1');
            if ($elements->getText() == 'МОЇ ЗАЯВИ') {
                echo 'PASSED' . " " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }

    }

    /**
     * @Then the name of button \/createProduct\/ should be equal to \/+ ДОДАТИ ОБ'ЄКТ\/
     */
    public function theNameOfButtonCreateproductShouldBeEqualToDodatiObekt()
    {
        throw new PendingException();
    }

    /**
     * @Then the value of attribute href of button \/createProduct\/ should be equal to {\/profile\/create\/product}
     */
    public function theValueOfAttributeHrefOfButtonCreateproductShouldBeEqualToProfileCreateProduct()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.blue-button');
            foreach ($elements as $element) {
                if ($element->getAttribute('href') == '/profile/create/product') {
                    echo 'PASSED';
                } else {
                    echo 'FALSE';
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the return code of URL from attribute href of object \/createProduct\/ should be equal to \/two hundred\/
     */
    public function theReturnCodeOfUrlFromAttributeHrefOfObjectCreateproductShouldBeEqualToTwoHundred()
    {
        try {

            $page = $this->getSession()->getPage();
            $url = $page->find('css', '.blue-button')->getAttribute('href');
            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($handle);
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            if ($httpCode == 200) {
                echo 'STATUS CODE 200 | ' . PHP_EOL;
            } else {
                echo $httpCode;
            }
            curl_close($handle);
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the name of button \/createProduct\/ should be equal to \/\+ ДОДАТИ ОБ\\'ЄКТ\/$/
     */
    public function theNameOfButtonCreateProductShouldBeEqualToДОДАТИОБЄКТ()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', '.blue-button');
//                $elements = $page->findAll('xpath', '/html/body/main/div/div/h1/a');
            foreach ($elements as $element) {
                if ($element->getText() == '+ ДОДАТИ ОБ\'ЄКТ') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception | \Behat\Behat\Definition\Exception\AmbiguousMatchException $e) {
        }
    }

    /**
     * @When the user nabigates to {https:\/\/birzha.tech\/profile\/create\/product}
     */
    public function theUserNabigatesToHttpsBirzhaTechProfileCreateProduct()
    {
        throw new PendingException();
    }

    /**
     * @Then the object \/createProduct page title\/ should be visible
     */
    public function theObjectCreateproductPageTitleShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_title\/ should be visible
     */
    public function thenTheObjectAuctionsTitleShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_title\/ should be \/Назва заявки\/
     */
    public function theLabelForAuctionsTitleShouldBeNazvaZaiavki()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_name\/ should be visible
     */
    public function thenTheObjectAuctionsNameShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_name\/ should be \/Найменування товару\/
     */
    public function theLabelForAuctionsNameShouldBeNaimenuvanniaTovaru()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_content\/ should be visible
     */
    public function thenTheObjectAuctionsContentShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_content\/ should be \/Опис\/
     */
    public function theLabelForAuctionsContentShouldBeOpis()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_category\/ should be visible
     */
    public function thenTheObjectAuctionsCategoryShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_category\/ should be \/Категорія\/
     */
    public function theLabelForAuctionsCategoryShouldBeKategoriia()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_buySell\/ should be visible
     */
    public function thenTheObjectAuctionsBuysellShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_buySell\/ should be \/Купити \/ Продати\/
     */
    public function theLabelForAuctionsBuysellShouldBeKupitiProdati()
    {
        throw new PendingException();
    }

    /**
     * @Then the option one for the object \/auctions_buySell\/ should be \/Купити\/
     */
    public function theOptionOneForTheObjectAuctionsBuysellShouldBeKupiti()
    {
        throw new PendingException();
    }

    /**
     * @Then the option two for the object \/auctions_buySell\/ should be \/Продати\/
     */
    public function theOptionTwoForTheObjectAuctionsBuysellShouldBeProdati()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_type\/ should be visible
     */
    public function thenTheObjectAuctionsTypeShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_type\/ should be \/Тип\/
     */
    public function theLabelForAuctionsTypeShouldBeTip()
    {
        throw new PendingException();
    }

    /**
     * @Then the option one for the object \/auctions_buySell\/ should be \/Заявка\/
     */
    public function theOptionOneForTheObjectAuctionsBuysellShouldBeZaiavka()
    {
        throw new PendingException();
    }

    /**
     * @Then the option two for the object \/auctions_buySell\/ should be \/Котировка\/
     */
    public function theOptionTwoForTheObjectAuctionsBuysellShouldBeKotirovka()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_amount\/ should be visible
     */
    public function thenTheObjectAuctionsAmountShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_amount\/ should be \/Кількість\/
     */
    public function theLabelForAuctionsAmountShouldBeKilkist()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_price\/ should be visible
     */
    public function thenTheObjectAuctionsPriceShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_price\/ should be \/Ціна\/
     */
    public function theLabelForAuctionsPriceShouldBeTsina()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_cost\/ should be visible
     */
    public function thenTheObjectAuctionsCostShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_cost\/ should be \/Вартість\/
     */
    public function theLabelForAuctionsCostShouldBeVartist()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_quantity\/ should be visible
     */
    public function thenTheObjectAuctionsQuantityShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_quantity\/ should be \/Кількість заяв\/
     */
    public function theLabelForAuctionsQuantityShouldBeKilkistZaiav()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_deliveryBasis\/ should be visible
     */
    public function thenTheObjectAuctionsDeliverybasisShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_deliveryBasis\/ should be \/Базис поставки\/
     */
    public function theLabelForAuctionsDeliverybasisShouldBeBazisPostavki()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_deliveryWarehouse\/ should be visible
     */
    public function thenTheObjectAuctionsDeliverywarehouseShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_deliveryWarehouse\/ should be \/Склад поставки\/
     */
    public function theLabelForAuctionsDeliverywarehouseShouldBeSkladPostavki()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_unit\/ should be visible
     */
    public function thenTheObjectAuctionsUnitShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_unit\/ should be \/Од. вим.\/
     */
    public function theLabelForAuctionsUnitShouldBeOdVim()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_vat\/ should be visible
     */
    public function thenTheObjectAuctionsVatShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_vat\/ should be \/Ставка без ПДВ\/
     */
    public function theLabelForAuctionsVatShouldBeStavkaBezPdv()
    {
        throw new PendingException();
    }

    /**
     * @Then the option one for the object \/auctions_vat\/ should be \/Без НДС\/
     */
    public function theOptionOneForTheObjectAuctionsVatShouldBeBezNds()
    {
        throw new PendingException();
    }

    /**
     * @Then the option two for the object \/auctions_vat\/ should be \/:arg1 %\/
     */
    public function theOptionTwoForTheObjectAuctionsVatShouldBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the option three for the object \/auctions_vat\/ should be \/:arg1 %\/
     */
    public function theOptionThreeForTheObjectAuctionsVatShouldBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the option four for the object \/auctions_vat\/ should be \/:arg1 %\/
     */
    public function theOptionFourForTheObjectAuctionsVatShouldBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_accessType\/ should be visible
     */
    public function thenTheObjectAuctionsAccesstypeShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_accessType\/ should be \/Тип доступу\/
     */
    public function theLabelForAuctionsAccesstypeShouldBeTipDostupu()
    {
        throw new PendingException();
    }

    /**
     * @Then the option one for the object \/auctions_accessType\/ should be \/>=\/
     */
    public function theOptionOneForTheObjectAuctionsAccesstypeShouldBe()
    {
        throw new PendingException();
    }

    /**
     * @Then the option two for the object \/auctions_accessType\/ should be \/<=\/
     */
    public function theOptionTwoForTheObjectAuctionsAccesstypeShouldBe()
    {
        throw new PendingException();
    }

    /**
     * @Then the option three for the object \/auctions_accessType\/ should be \/=\/
     */
    public function theOptionThreeForTheObjectAuctionsAccesstypeShouldBe()
    {
        throw new PendingException();
    }

    /**
     * @Then the option four for the object \/auctions_accessType\/ should be \/<\/
     */
    public function theOptionFourForTheObjectAuctionsAccesstypeShouldBe()
    {
        throw new PendingException();
    }

    /**
     * @Then the option four for the object \/auctions_accessType\/ should be \/>\/
     */
    public function theOptionFourForTheObjectAuctionsAccesstypeShouldBe2()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_deal\/ should be visible
     */
    public function thenTheObjectAuctionsDealShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_deal\/ should be \/Здійснення угоди\/
     */
    public function theLabelForAuctionsDealShouldBeZdiisnenniaUgodi()
    {
        throw new PendingException();
    }

    /**
     * @Then the option one for the object \/auctions_deal\/ should be \/Атоматические\/
     */
    public function theOptionOneForTheObjectAuctionsDealShouldBeAtomaticheskie()
    {
        throw new PendingException();
    }

    /**
     * @Then the option two for the object \/auctions_deal\/ should be \/Уведомление\/
     */
    public function theOptionTwoForTheObjectAuctionsDealShouldBeUvedomlenie()
    {
        throw new PendingException();
    }

    /**
     * @Then the checkBox \/auctions_auction\/ should be visible
     */
    public function theCheckboxAuctionsAuctionShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for checkBox \/auctions_auction\/ should be \/Це аукціон\/
     */
    public function theLabelForCheckboxAuctionsAuctionShouldBeTseAuktsion()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_startDate\/ should be visible
     */
    public function thenTheObjectAuctionsStartdateShouldBeVisible()
    {
        throw new PendingException();
    }


    /**
     * @Then Then the object \/auctions_endDate\/ should be visible
     */
    public function thenTheObjectAuctionsEnddateShouldBeVisible()
    {
        throw new PendingException();
    }


    /**
     * @Then Then the object \/auctions_spacing\/ should be visible
     */
    public function thenTheObjectAuctionsSpacingShouldBeVisible()
    {
        throw new PendingException();
    }


    /**
     * @Then Then the object \/auctions_guarantee\/ should be visible
     */
    public function thenTheObjectAuctionsGuaranteeShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_guarantee\/ should be \/Гарантійного внеску\/
     */
    public function theLabelForAuctionsGuaranteeShouldBeGarantiinogoVnesku()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_step\/ should be visible
     */
    public function thenTheObjectAuctionsStepShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_step\/ should be \/Крок торгів%\/
     */
    public function theLabelForAuctionsStepShouldBeKrokTorgiv()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_startPrice\/ should be visible
     */
    public function thenTheObjectAuctionsStartpriceShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_startPrice\/ should be \/Початкова ціна\/
     */
    public function theLabelForAuctionsStartpriceShouldBePochatkovaTsina()
    {
        throw new PendingException();
    }

    /**
     * @Then the checkBox \/auctions_hideAuthor\/ should be visible
     */
    public function theCheckboxAuctionsHideauthorShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for checkBox \/auctions_hideAuthor\/ should be \/Приховувати автора\/
     */
    public function theLabelForCheckboxAuctionsHideauthorShouldBePrikhovuvatiAvtora()
    {
        throw new PendingException();
    }

    /**
     * @Then Then the object \/auctions_clients\/ should be visible
     */
    public function thenTheObjectAuctionsClientsShouldBeVisible()
    {
        throw new PendingException();
    }


    /**
     * @Then Then the object \/auctions_active\/ should be visible
     */
    public function thenTheObjectAuctionsActiveShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the label for \/auctions_active\/ should be \/Публікація\/
     */
    public function theLabelForAuctionsActiveShouldBePublikatsiia()
    {
        throw new PendingException();
    }

    /**
     * @Then the option one for the object \/auctions_deal\/ should be \/публікувати\/
     */
    public function theOptionOneForTheObjectAuctionsDealShouldBePublikuvati()
    {
        throw new PendingException();
    }

    /**
     * @Then the option two for the object \/auctions_deal\/ should be \/Не опубліковано\/
     */
    public function theOptionTwoForTheObjectAuctionsDealShouldBeNeOpublikovano()
    {
        throw new PendingException();
    }

    /**
     * @Then the button \/add-another-collection-widget\/ should be visible
     */
    public function theButtonAddAnotherCollectionWidgetShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the name of button \/add-another-collection-widget\/ should be equal to \/Додати зображення\/
     */
    public function theNameOfButtonAddAnotherCollectionWidgetShouldBeEqualToDodatiZobrazhennia()
    {
        throw new PendingException();
    }

    /**
     * @Then the input \/auctions_thumbnailFile_file\/ should be visible
     */
    public function theInputAuctionsThumbnailfileFileShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the button \/auctions_submit\/ should be visible
     */
    public function theButtonAuctionsSubmitShouldBeVisible()
    {
        throw new PendingException();
    }

    /**
     * @Then the name of button \/auctions_submit\/ should be equal to \/Відправити\/
     */
    public function theNameOfButtonAuctionsSubmitShouldBeEqualToVidpraviti()
    {
        throw new PendingException();
    }


    /**
     * @Given /^the label for \/auctions_spacing\/ should be \/Інтервал ставки \(хвилини\)\/$/
     */
    public function theLabelForAuctions_spacingShouldBeІнтервалСтавкиХвилини()
    {
        throw new PendingException();
    }

    /**
     * @Given /^the label for \/auctions_endDate\/ should be \/Тайм\-аут закінчення \(ч \/ м \/ с\)\/$/
     */
    public function theLabelForAuctions_endDateShouldBeТаймАутЗакінченняЧМС()
    {
        throw new PendingException();
    }

    /**
     * @Given /^the label for \/auctions_clients\/ should be \/Список клієнтів брокера \(В розробці\)\/$/
     */
    public function theLabelForAuctions_clientsShouldBeСписокКлієнтівБрокераВРозробці()
    {
        throw new PendingException();
    }

    /**
     * @Given /^the label for \/auctions_startDate\/ should be \/Час\\початку\\\(ч\\\/\\м\\\/\\с\)\/$/
     */
    public function theLabelForAuctions_startDateShouldBeЧасПочаткуЧМС()
    {
        throw new PendingException();
    }

    /**
     * @Given /^the label of object \/menu\/ should be \/Заяви\/$/
     */
    public function theLabelOfObjectMenuShouldBeЗаяви()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.menu');
            foreach ($elements as $element) {
                if ($element->getText() == 'Заяви') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the value of attribute href of object \/menu\/ should be equal to \{\/\}$/
     */
    public function theValueOfAttributeHrefOfObjectMenuShouldBeEqualToRegister()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findLink('Заяви');
//            foreach ($elements as $element) {
                if ($elements->getAttribute('href') == '/') {
                    echo 'PASSED'  . " " . $elements->getAttribute('href');
                } else {
                    echo 'FALSE';
                }
//            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the link \/Заяви\/ should be visible$/
     */
    public function theLinkЗаявиShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findLink('Заяви');

            if ($element->isVisible()) {
                echo 'VISIBLE' . " " . $element->getText();
            } else {
                echo 'NOT FOUND' . " " . $element->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the link \/Мої_заяви\/ should be visible$/
     */
    public function theLinkМої_заявиShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findLink('Мої заяви');

            if ($element->isVisible()) {
                echo 'VISIBLE' . " " . $element->getText();
            } else {
                echo 'NOT FOUND' . " " . $element->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the value of attribute href of object \/Мої_заяви\/ should be equal to \{\/mylots\}$/
     */
    public function theValueOfAttributeHrefOfObjectМої_заявиShouldBeEqualTo()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findLink('Мої заяви');
//            foreach ($elements as $element) {
            if ($elements->getAttribute('href') == '/mylots') {
                echo 'PASSED'  . " " . $elements->getAttribute('href');
            } else {
                echo 'FALSE';
            }
//            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }



    /**
     * @Then the value of attribute href of object \/login\/ should be equal to {\/login}
     */
    public function theValueOfAttributeHrefOfObjectLoginShouldBeEqualToLogin()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.login');
            foreach ($elements as $element) {
                if ($element->getAttribute('href') == '/login') {
                    echo 'PASSED' . " " . $element->getAttribute('href');
                } else {
                    echo 'FALSE' . " " . $element->getAttribute('href');
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then /^the button \/log_out\/ should be visible$/
     */
    public function theButtonLog_outShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.logout');

            if ($element->isVisible()) {
                echo 'VISIBLE'  . " " . $element->getText();
            } else {
                echo 'NOT FOUND'  . " " . $element->getText();
            }
        } catch (Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the name of object \/log_out\/ should be equal to \/вихід\/$/
     */
    public function theNameOfObjectLog_outShouldBeEqualToВихід()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.logout');
            foreach ($elements as $element) {
                if ($element->getText() == 'Вихід') {
                    echo 'PASSED' . " " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Given /^the value of attribute href of object \/log_out\/ should be equal to \{\/logout\}$/
     */
    public function theValueOfAttributeHrefOfObjectLog_outShouldBeEqualToLogout()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.logout');
            foreach ($elements as $element) {
                if ($element->getAttribute('href') == '/logout') {
                    echo 'PASSED' . " " . $element->getAttribute('href');
                } else {
                    echo 'FALSE' . " " . $element->getAttribute('href');
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @When /^the user clicks on object \/log_out\/$/
     */
    public function theUserClicksOnObjectLog_out()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.logout');
            foreach ($elements as $item) {
                if ($item->isVisible()) {
                    $item->click();
                }
            }
            echo $this->getSession()->getCurrentUrl();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then /^the return code of URL from attribute href of object \/log_out\/ should be equal to \/two hundred\/$/
     */
    public function theReturnCodeOfURLFromAttributeHrefOfObjectLog_outShouldBeEqualToTwoHundred()
    {
        try {
        $page = $this->getSession()->getPage();
        $element = $page->find('css', '.logout')->getAttribute('href');
            $handle = curl_init($element);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($handle);
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            if ($httpCode == 200) {
                echo 'STATUS CODE 200 | ' . PHP_EOL;
            } else {
                echo $httpCode;
            }
            curl_close($handle);
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the object \/profile\/ should be visible
     */
    public function theObjectProfileShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->findAll('css', '.profile');

            if ($element[0]->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the value of attribute src of object \/profile\/ should be equal to {\/images\/icon_login.png}
     */
    public function theValueOfAttributeSrcOfObjectProfileShouldBeEqualToImagesIconLoginPng()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.profile');
            if ($element->getAttribute('src') == '/images/icon_login.png') {
                echo 'PASSED' . " " . $element->getAttribute('src');
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the value of attribute href of object \/profile\/ should be equal to {\/profile\/:arg1\/bro}
     */
    public function theValueOfAttributeHrefOfObjectProfileShouldBeEqualToProfileBro($arg1)
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.profile');
            if ($element->getAttribute('href') == '/profile/26/bro') {
                echo 'PASSED' . " " . $element->getAttribute('src');
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the return code of URL from attribute href of object \/profile\/ should be equal to \/two hundred\/
     */
    public function theReturnCodeOfUrlFromAttributeHrefOfObjectProfileShouldBeEqualToTwoHundred()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.profile')->getAttribute('href');
            $handle = curl_init($element);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($handle);
            $httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            if ($httpCode == 200) {
                echo 'STATUS CODE 200 | ' . PHP_EOL;
            } else {
                echo $httpCode;
            }
            curl_close($handle);
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @When the user clicks on object \/profile\/
     */
    public function theUserClicksOnObjectProfile()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findAll('css', '.profile');
            foreach ($elements as $item) {
                if ($item->isVisible()) {
                    $item->click();
                }
            }
            echo $this->getSession()->getCurrentUrl();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the current URL should be equal to \/https:\/\/birzha.tech\/profile\/:arg1\/bro\/
     */
    public function theCurrentUrlShouldBeEqualToHttpsBirzhaTechProfileBro($arg1)
    {
        try {
            if ($this->getSession()->getCurrentUrl() == 'https://birzha.tech/profile/26/bro') {
                echo 'PASSED |' . 'CURRENT URL: ' . $this->getSession()->getCurrentUrl();
                $this->getSession()->back();
            } else {
                echo 'FALSE';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }

    /**
     * @Then the current URL should be equal to \/https:\/\/birzha.tech\/
     */
    public function theCurrentUrlShouldBeEqualToHttpsBirzhaTech2()
    {
        try {
            if ($this->getSession()->getCurrentUrl() == 'https://birzha.tech') {
                echo 'PASSED |' . 'CURRENT URL: ' . $this->getSession()->getCurrentUrl();
                $this->getSession()->back();
            } else {
                echo 'FALSE';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
        }
    }
}

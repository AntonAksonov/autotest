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
//            $filename = "main." . date('l jS h:i:s A').".png";
//            file_put_contents('screenshots/'.$filename, $this->getSession()->getDriver()->getScreenshot());
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the object \/logo\/ should be visible
     */
    public function theObjectLogoShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.logo');

            if ($element->isVisible()) {
                echo 'VISIBLE';
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the value of attribute src of object \/logo\/ should be equal to {\/images\/logo.png}
     */
    public function theValueOfAttributeSrcOfObjectLogoShouldBeEqualToImagesLogoPng()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.logo img');
            if ($element->getAttribute('src') == '/images/logo.png') {
                echo 'PASSED' . " | " . $element->getAttribute('src');
            } else {
                echo 'NOT FOUND' . " | " . $element->getAttribute('src');
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the object \/language\/ should be visible
     */
    public function theObjectLanguageShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
//            $element = $page->findAll('css', 'language');
            $element = $page->find('xpath', '//*[@id="language"]');

            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getAttribute('name');
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the object \/currencies\/ should be visible
     */
    public function theObjectCurrenciesShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
//            $element = $page->findAll('css', '.currencies');
            $element = $page->find('xpath', '//*[@id="currencies"]');

            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getAttribute('name');
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the object \/phone\/ should be visible
     */
    public function theObjectPhoneShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.phone img');
            if ($element->isVisible()) {
                echo 'VISIBLE'  . " | " . $element->getAttribute('alt');
            } else {
                echo 'NOT FOUND'  . " | " . $element->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'VISIBLE'  . " | " . $element->getText();
            } else {
                echo 'NOT FOUND'  . " | " . $element->getText();
            }
        } catch (Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND' . " | " . $element->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getAttribute('href');
                } else {
                    echo 'FALSE' . " | " . $element->getAttribute('href');
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                } else {
                    echo 'FALSE' . " | " . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getValue();
                } else {
                    echo 'FALSE' . $element->getValue();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'PASSED' . " | " . $element->getText();
            } else {
                echo 'FALSE' . " | " . $element->getText();
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                } else {
                    echo 'FALSE' . " | " . $element->getText();

                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                } else {
                    echo 'FALSE' . " | " . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            $filename = "login_success." . date('l jS h:i:s A').".png";
            file_put_contents('screenshots/'.$filename, $this->getSession()->getDriver()->getScreenshot());
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getValue();
                } else {
                    echo 'FALSE' . " | " . $element->getValue();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
//            $filename = "main_login." . date('l jS h:i:s A').".png";
//            file_put_contents('screenshots/'.$filename, $this->getSession()->getDriver()->getScreenshot());
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
//            $filename = "main_register." . date('l jS h:i:s A').".png";
//            file_put_contents('screenshots/'.$filename, $this->getSession()->getDriver()->getScreenshot());
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                    var_dump($element);
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getValue();
                } else {
                    echo 'FALSE' . " | " . $element->getValue();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                    var_dump($element);
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                } else {
                    echo 'FALSE' . " | " . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                } else {
                    echo 'FALSE' . " | " . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'FALSE' . " | " . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
//            $filename = "main_login_number." . date('l jS h:i:s A').".png";
//            file_put_contents('screenshots/'.$filename, $this->getSession()->getDriver()->getScreenshot());
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
//            $filename = "main_login_password." . date('l jS h:i:s A').".png";
//            file_put_contents('screenshots/'.$filename, $this->getSession()->getDriver()->getScreenshot());
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());

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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            echo 'PASSED' . " | " . $element->getAttribute('href');
        } else {
            echo 'FALSE' . " | " . $element->getAttribute('href');
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
            echo 'PASSED' . " | " . $element->getText();
        } else {
            echo 'FALSE' . " | " . $element->getText();

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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'PASSED' . " | " . $element->getText();
            } else {
                echo 'FALSE' . " | " . $element->getText();
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
                echo 'PASSED' . " | " . $element->getValue();
            } else {
                echo 'FALSE' . " | " . $element->getValue();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'h1');
            if ($elements->getText() == 'СТВОРИТИ АУКЦІОН') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception | \Behat\Behat\Definition\Exception\AmbiguousMatchException $e) {
        }
    }

    /**
     * @When the user navigates to {https:\/\/birzha.tech\/profile\/create\/product}
     */
    public function theUserNabigatesToHttpsBirzhaTechProfileCreateProduct()
    {
        try {
            $session = $this->getSession();
            $session->visit($this->locatePath('https://birzha.tech/profile/create/product'));
            echo $this->getSession()->getCurrentUrl();
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the object \/createProduct page title\/ should be visible
     */
    public function theObjectCreateproductPageTitleShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', 'h1');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_title\/ should be visible
     */
    public function thenTheObjectAuctionsTitleShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', 'auctions_title');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_title\/ should be \/Назва заявки\/
     */
    public function theLabelForAuctionsTitleShouldBeNazvaZaiavki()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_title');
            if ($elements->getText() == 'Назва заявки') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_name\/ should be visible
     */
    public function thenTheObjectAuctionsNameShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_name');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_name\/ should be \/Найменування товару\/
     */
    public function theLabelForAuctionsNameShouldBeNaimenuvanniaTovaru()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_name');
            if ($elements->getText() == 'Найменування товару') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_content\/ should be visible
     */
    public function thenTheObjectAuctionsContentShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_content');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_content\/ should be \/Опис\/
     */
    public function theLabelForAuctionsContentShouldBeOpis()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_content');
            if ($elements->getText() == 'Опис') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        };
    }

    /**
     * @Then Then the object \/auctions_category\/ should be visible
     */
    public function thenTheObjectAuctionsCategoryShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_category');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_category\/ should be \/Категорія\/
     */
    public function theLabelForAuctionsCategoryShouldBeKategoriia()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_category');
            if ($elements->getText() == 'Категорія') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_buySell\/ should be visible
     */
    public function thenTheObjectAuctionsBuysellShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_buySell');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_buySell\/ should be \/Купити \/ Продати\/
     */
    public function theLabelForAuctionsBuysellShouldBeKupitiProdati()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_buySell');
            if ($elements->getText() == 'Продати') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
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
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_type');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_type\/ should be \/Тип\/
     */
    public function theLabelForAuctionsTypeShouldBeTip()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_type');
            if ($elements->getText() == 'Тип') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
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
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_amount');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_amount\/ should be \/Кількість\/
     */
    public function theLabelForAuctionsAmountShouldBeKilkist()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_amount');
            if ($elements->getText() == 'Кількість') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_price\/ should be visible
     */
    public function thenTheObjectAuctionsPriceShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_price');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_price\/ should be \/Ціна\/
     */
    public function theLabelForAuctionsPriceShouldBeTsina()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_price');
            if ($elements->getText() == 'Ціна') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_cost\/ should be visible
     */
    public function thenTheObjectAuctionsCostShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_cost');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_cost\/ should be \/Вартість\/
     */
    public function theLabelForAuctionsCostShouldBeVartist()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_cost');
            if ($elements->getText() == 'Вартість') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_quantity\/ should be visible
     */
    public function thenTheObjectAuctionsQuantityShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_quantity');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_quantity\/ should be \/Кількість заяв\/
     */
    public function theLabelForAuctionsQuantityShouldBeKilkistZaiav()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_quantity');
            if ($elements->getText() == 'Кількість заяв') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_deliveryBasis\/ should be visible
     */
    public function thenTheObjectAuctionsDeliverybasisShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_deliveryBasis');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_deliveryBasis\/ should be \/Базис поставки\/
     */
    public function theLabelForAuctionsDeliverybasisShouldBeBazisPostavki()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_deliveryBasis');
            if ($elements->getText() == 'Базис поставки') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_deliveryWarehouse\/ should be visible
     */
    public function thenTheObjectAuctionsDeliverywarehouseShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_deliveryWarehouse');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_deliveryWarehouse\/ should be \/Склад поставки\/
     */
    public function theLabelForAuctionsDeliverywarehouseShouldBeSkladPostavki()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_deliveryWarehouse');
            if ($elements->getText() == 'Склад поставки') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_unit\/ should be visible
     */
    public function thenTheObjectAuctionsUnitShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_unit');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_unit\/ should be \/Од. вим.\/
     */
    public function theLabelForAuctionsUnitShouldBeOdVim()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_unit');
            if ($elements->getText() == 'Од. вим.') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_vat\/ should be visible
     */
    public function thenTheObjectAuctionsVatShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_vat');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_vat\/ should be \/Ставка без ПДВ\/
     */
    public function theLabelForAuctionsVatShouldBeStavkaBezPdv()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_vat');
            if ($elements->getText() == 'Ставка без ПДВ') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
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
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_accessType');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_accessType\/ should be \/Тип доступу\/
     */
    public function theLabelForAuctionsAccesstypeShouldBeTipDostupu()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_accessType');
            if ($elements->getText() == 'Тип доступу') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
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
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_deal');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_deal\/ should be \/Здійснення угоди\/
     */
    public function theLabelForAuctionsDealShouldBeZdiisnenniaUgodi()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_deal');
            if ($elements->getText() == 'Здійснення угоди') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
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
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_auction');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for checkBox \/auctions_auction\/ should be \/Це аукціон\/
     */
    public function theLabelForCheckboxAuctionsAuctionShouldBeTseAuktsion()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_auction');
            if ($elements->getText() == 'Це аукціон') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_startDate\/ should be visible
     */
    public function thenTheObjectAuctionsStartdateShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_startDate');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }


    /**
     * @Then Then the object \/auctions_endDate\/ should be visible
     */
    public function thenTheObjectAuctionsEnddateShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_endDate');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }


    /**
     * @Then Then the object \/auctions_spacing\/ should be visible
     */
    public function thenTheObjectAuctionsSpacingShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_spacing');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }


    /**
     * @Then Then the object \/auctions_guarantee\/ should be visible
     */
    public function thenTheObjectAuctionsGuaranteeShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_guarantee');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_guarantee\/ should be \/Гарантійного внеску\/
     */
    public function theLabelForAuctionsGuaranteeShouldBeGarantiinogoVnesku()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_guarantee');
            if ($elements->getText() == 'Гарантійного внеску') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_step\/ should be visible
     */
    public function thenTheObjectAuctionsStepShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_step');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_step\/ should be \/Крок торгів%\/
     */
    public function theLabelForAuctionsStepShouldBeKrokTorgiv()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_step');
            if ($elements->getText() == 'Крок торгів%') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_startPrice\/ should be visible
     */
    public function thenTheObjectAuctionsStartpriceShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_startPrice');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_startPrice\/ should be \/Початкова ціна\/
     */
    public function theLabelForAuctionsStartpriceShouldBePochatkovaTsina()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_startPrice');
            if ($elements->getText() == 'Початкова ціна') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the checkBox \/auctions_hideAuthor\/ should be visible
     */
    public function theCheckboxAuctionsHideauthorShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_hideAuthor');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for checkBox \/auctions_hideAuthor\/ should be \/Приховувати автора\/
     */
    public function theLabelForCheckboxAuctionsHideauthorShouldBePrikhovuvatiAvtora()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_hideAuthor');
            if ($elements->getText() == 'Приховувати автора') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then Then the object \/auctions_clients\/ should be visible
     */
    public function thenTheObjectAuctionsClientsShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_clients');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }


    /**
     * @Then Then the object \/auctions_active\/ should be visible
     */
    public function thenTheObjectAuctionsActiveShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_active');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the label for \/auctions_active\/ should be \/Публікація\/
     */
    public function theLabelForAuctionsActiveShouldBePublikatsiia()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_active');
            if ($elements->getText() == 'Публікація') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
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
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.add-another-collection-widget');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the name of button \/add-another-collection-widget\/ should be equal to \/Додати зображення\/
     */
    public function theNameOfButtonAddAnotherCollectionWidgetShouldBeEqualToDodatiZobrazhennia()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'add-another-collection-widget');
            if ($elements->getText() == 'Додати зображення') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the input \/auctions_thumbnailFile_file\/ should be visible
     */
    public function theInputAuctionsThumbnailfileFileShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_thumbnailFile_file');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the button \/auctions_submit\/ should be visible
     */
    public function theButtonAuctionsSubmitShouldBeVisible()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.auctions_submit');
            if ($element->isVisible()) {
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the name of button \/auctions_submit\/ should be equal to \/Відправити\/
     */
    public function theNameOfButtonAuctionsSubmitShouldBeEqualToVidpraviti()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', 'auctions_submit');
            if ($elements->getText() == 'Відправити') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }


    /**
     * @Given /^the label for \/auctions_spacing\/ should be \/Інтервал ставки \(хвилини\)\/$/
     */
    public function theLabelForAuctions_spacingShouldBeІнтервалСтавкиХвилини()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', '');
            if ($elements->getText() == '') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Given /^the label for \/auctions_endDate\/ should be \/Тайм\-аут закінчення \(ч \/ м \/ с\)\/$/
     */
    public function theLabelForAuctions_endDateShouldBeТаймАутЗакінченняЧМС()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', '');
            if ($elements->getText() == '') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Given /^the label for \/auctions_clients\/ should be \/Список клієнтів брокера \(В розробці\)\/$/
     */
    public function theLabelForAuctions_clientsShouldBeСписокКлієнтівБрокераВРозробці()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', '');
            if ($elements->getText() == '') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Given /^the label for \/auctions_startDate\/ should be \/Час\\початку\\\(ч\\\/\\м\\\/\\с\)\/$/
     */
    public function theLabelForAuctions_startDateShouldBeЧасПочаткуЧМС()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->find('css', '');
            if ($elements->getText() == '') {
                echo 'PASSED' . " | " . $elements->getText();
            } else {
                echo 'FALSE' . $elements->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
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
                    echo 'PASSED' . " | " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Given /^the value of attribute href of object \/Заяви\/ should be equal to \{\/\}$/
     */
    public function theValueOfAttributeHrefOfObjectMenuShouldBeEqualToRegister()
    {
        try {
            $page = $this->getSession()->getPage();
            $elements = $page->findLink('Заяви');
                if ($elements->getAttribute('href') == '/') {
                    echo 'PASSED'  . " | " . $elements->getAttribute('href');
                } else {
                    echo 'FALSE';
                }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND' . " | " . $element->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'VISIBLE' . " | " . $element->getText();
            } else {
                echo 'NOT FOUND' . " | " . $element->getText();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'PASSED'  . " | " . $elements->getAttribute('href');
            } else {
                echo 'FALSE';
            }
//            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getAttribute('href');
                } else {
                    echo 'FALSE' . " | " . $element->getAttribute('href');
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'VISIBLE'  . " | " . $element->getText();
            } else {
                echo 'NOT FOUND'  . " | " . $element->getText();
            }
        } catch (Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getText();
                } else {
                    echo 'FALSE' . $element->getText();
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                    echo 'PASSED' . " | " . $element->getAttribute('href');
                } else {
                    echo 'FALSE' . " | " . $element->getAttribute('href');
                }
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            $handle = curl_init('https://birzha.tech'. $element);
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the value of attribute src of object \/profile\/ should be equal to {\/images\/icon_login.png}
     */
    public function theValueOfAttributeSrcOfObjectProfileShouldBeEqualToImagesIconLoginPng()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.profile img');
            if ($element->getAttribute('src') == '/images/icon_login.png') {
                echo 'PASSED' . " | " . $element->getAttribute('src');
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
                echo 'PASSED' . " | " . $element->getAttribute('href');
            } else {
                echo 'NOT FOUND';
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            $handle = curl_init('https://birzha.tech'. $element);
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
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
            $filename = "profile." . date('l jS h:i:s A').".png";
            file_put_contents('screenshots/'.$filename, $this->getSession()->getDriver()->getScreenshot());
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Then the current URL should be equal to \/https:\/\/birzha.tech\/
     */
    public function theCurrentUrlShouldBeEqualToHttpsBirzhaTech2()
    {
        try {
            if ($this->getSession()->getCurrentUrl() == 'https://birzha.tech/') {
                echo 'PASSED |' . 'CURRENT URL: ' . $this->getSession()->getCurrentUrl();
                $this->getSession()->back();
            } else {
                echo 'FALSE' . " " . 'CURRENT URL: ' . $this->getSession()->getCurrentUrl();
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Given /^the value of attribute alt of object \/logo\/ should be equal to \{\/images\/logo\.png\}$/
     */
    public function theValueOfAttributeAltOfObjectLogoShouldBeEqualToImagesLogoPng()
    {
        try {
            $page = $this->getSession()->getPage();
            $element = $page->find('css', '.logo img');
            if ($element->getAttribute('alt') == 'BIRZHA.TECH') {
                echo 'PASSED' . " | " . $element->getAttribute('alt');
            } else {
                echo 'NOT FOUND' . " | " . $element->getAttribute('alt');
            }
        } catch (Error | Exception $e) {
            echo " ------------------------ FAILED ------------------------------ " . $e->getMessage();
            file_put_contents('screenshots/'.$e->getMessage().".".time().'.png', $this->getSession()->getDriver()->getScreenshot());
        }
    }

    /**
     * @Given /^take screenshot$/
     */
    public function takeScreenshot()
    {
        $session = $this->getSession();
        $session->visit($this->locatePath('http://127.0.0.1:4444/wd/hub/static/resource/hub.html'));
        $page = $this->getSession()->getPage();
        $page->findButton('Refresh Sessions')->click();
        $page->findButton('Take Screenshot')->click();
        $session->visit($page->find('css','.modal-dialog-content a')->getAttribute('href'));
    }
}

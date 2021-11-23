Запустить докер контейнер с веб драйвером

   docker run -p 4444:4444 selenium/standalone-firefox:2.53.1

   http://127.0.0.1:4444/wd/hub/

Запустить бихат с сохранением результатов

   vendor/bin/behat  --format html --out TEST

результаты тут

   TEST/index.html




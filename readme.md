<h2>Setup<h2>
I have not run these setup steps on a fresh setup so the below is not guaranteed to work.

Assuming you have this set up in homestead go into the project folder.
npm install
gulp
setup the env file: mine looks like the one in env.example
php artisan migrate:refresh --seed


<h2>Test Scripts</h2>
npm install phantomjs
phantomjs --webdriver=4444

java -jar tests/acceptance/bin/selenium-server-standalone.jar

Run all test: vendor/bin/codecept run

Run individual test: vendor/bin/codecept run tests/acceptance/CheckoutCept.php
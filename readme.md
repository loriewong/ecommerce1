<h2>Setup</h2>
<p>I have not run these setup steps on a fresh setup so the below is not guaranteed to work.</p>

<p>Assuming you have this set up in homestead go into the project folder.</p>
<p>npm install</p>
<p>gulp</p>
<p>setup the env file: mine looks like the one in env.example</p>
<p>php artisan migrate:refresh --seed</p>


<h2>Test Scripts</h2>
<p>npm install phantomjs</p>
<p>phantomjs --webdriver=4444</p>

<p>java -jar tests/acceptance/bin/selenium-server-standalone.jar</p>

<p>Run all test: vendor/bin/codecept run</p>

<p>Run individual test: vendor/bin/codecept run tests/acceptance/CheckoutCept.php</p>
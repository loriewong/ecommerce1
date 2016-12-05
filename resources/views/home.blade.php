@extends('layouts.app')

@section('title', 'Blog')

@section('content')

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="0"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="http://www.wallpaperup.com/uploads/wallpapers/2013/12/16/196523/9461cd193c228f60c672715e7938af55.jpg" alt="...">
    </div>
    <div class="item">
      <img src="https://s-media-cache-ak0.pinimg.com/originals/88/88/16/8888169875cafba374675e5b91767c95.jpg" alt="...">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div>
  <h1>Blog</h1>
  <h3>Problems</h3>
  <p>Initial setup took me a while to figure out even though homestead is supposed to be easy.</p>
  <p>Had issues npm installing in homestead vs local machine due to some versioning issues.</p>
  <p>Gulping didnt work on homestead so had to set it up on local machine.</p>
  <p>Learning laravel framework also took a while, many features to know such as database migrations.</p>
  <p>Vue was also new to me.</p>
  <p>I never programmed at home before so committing to git and pulling to work and home computer had initial issues on different setups.</p>
  <p>Started with phpunit for testing just to realise it doesnt work with javascript. Ended up spending time to figure out how phantomJs worked with selenium.</p>

  <h3>Features/Implementations</h3>
  <p>Images - linked via etsy url and stored in DB. Proper implementation would be to save them locally. Also bandwidth would be considered for mobile devices.</p>
  <p>Database table setup might not scale well for larger ecommerce site but works okay in small scale without much features.</p>
  <p>Bundling - Set up the database table to have a bundle product and each bundle will have children associated to items in the product table.</p>
  <p>Shopping cart - Used localstorage</p>
  <p>Checkout - On the checkout page there is no pre verification price update. Meaning as soon as customer hits submit the price they see might not be the price they get charged.
      The reason is because there is no pre-confirmation page. If there was a pre-confirmation page it would go into database to do a check of current prices of all items and refresh it back to user.
      This would nullify any user modifications to the localstorage shopping cart and also prevent stale data. I've basically just did the price check and submitted without notifying customer of any price changes.</p>

  <h3>Setup</h3>
  <p>gulp</p>
  <p>php artisan migrate:refresh --seed</p>

  <h3>Test</h3>
  <p>npm install phantomjs</p>
  <p>phantomjs --webdriver=4444</p>
  <p>java -jar test/acceptance/bin/selenium-server-standalone.jar</p>
  <p>To run test call this from root project path vendor/bin/codecept run</p>
  <p>To run individual vendor/bin/codecept run tests/acceptance/CheckoutCept.php</p>

</div>
@endsection
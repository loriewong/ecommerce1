<html>
  <head>
    <title>App Name - @yield('title')</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
.thumbnail img{
    max-height: 200px;
}
</style>

  </head>
  <header class="container-fluid">
    <div class="row">
      <nav class="navbar navbar-default">
        <div class="container header-container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">THE BEST SHOP</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="/shop">Shop</a></li>
            </ul>
            <ul class="nav navbar-nav">
              <li><a href="/bundles">Bundles</a></li>
            </ul>
            <div id="header" class="pull-right" style="display:{{ $_SERVER['REQUEST_URI'] === '/checkout' ? 'none' : '' }}">
              <shoppingcart></shoppingcart>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <body>
    <div class="container" id="bodycomponent">
        @yield('content')
    </div>
    @yield('javascript')

    <script src="/js/app.js"></script>
  </body>
</html>


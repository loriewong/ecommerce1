<html>
  <head>
    <title>App Name - @yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">   
    <link href="/css/toastr.min.css" rel="stylesheet"/>
    <script src="/js/toastr.min.js"></script>
    <style>
      .thumbnail img{
        max-height: 200px;
      }
      .header-cart-icon {
        position: relative;
        top: 15px;
        right: 10px;
        vertical-align: text-top;
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
              <li class={{ fnmatch("/product*",  $_SERVER['REQUEST_URI']) ? 'active' : '' }}><a href="/products">Products</a></li>
              <li class={{ fnmatch("/bundle*",  $_SERVER['REQUEST_URI']) ? 'active' : '' }}><a href="/bundles">Bundles</a></li>
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


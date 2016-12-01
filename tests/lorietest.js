
var page = require('webpage').create();

page.open('http://ecommerce.local', function(status) {
  page.includeJs("http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js", function() {
  console.log('aaa');


  page.evaluate(function(){
    $("#tess")[0].click();
  });

  console.log('here');
  page.render('example.png');
  console.log('there');
  phantom.exit();
});
});

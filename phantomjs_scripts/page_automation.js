
var page = require('webpage').create();
// webpage is a pretty strong class. http://phantomjs.org/api/webpage/
// Properties, methods and callbacks (handlers). 
/* 

page.content (Gives the HTML)
page.plainText
page.canGoForward -> boolean (If window.history.forward would be a valid action)
page.canGoBack -> boolean (If window.history.back would be a valid action)
page.loading -> boolean (If the page is loading or not)
page.loadingProgress -> number (The percentage that has been loaded. 100 means that the page is loaded)
page.scrollPosition -> object (Scroll location)
page.title -> string (The page title)
page.url -> string (The page URL)
page.customHeaders

page.viewportSize = { width: 1024, height: 768 };
page.clipRect = { top: 0, left: 0, width: 1024, height: 768 };

page.open('http://phantomjs.org', function (status) {
  var cookies = page.cookies;  // Abhinav : Returns the cookie object (http://phantomjs.org/page-automation.html)
  console.log('Listing cookies:');
  for(var i in cookies) {
    console.log(cookies[i].name + '=' + cookies[i].value);
  }
  phantom.exit();
});

// FUNCTIONS
page.openUrl()
page.injectJs()
page.loadFinished()
page.loadStarted()
page.addCookie(Cookie) http://phantomjs.org/api/webpage/method/add-cookie.html
page.clearCookie()

// Access DOM elements
var ua = page.evaluate(function() {
  return document.getElementById('qua').textContent;
});

*/


// http://phantomjs.org/api/webpage/property/settings.html
// Can also include things like username and password (for http authentication only), javascript enabled, load images
page.settings.userAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36';

page.viewportSize = { width: 1024, height: 768 };
page.clipRect = { top: 0, left: 0, width: 1024, height: 768 };

// Open the page and take a screenshot. 
page.open('http://example.com/', function() {
  page.render('github.png');
  phantom.exit();
});
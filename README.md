# Data scrapping 

Different approaches 
* [Custom code](#custom-code) 
* [Email parsing](#email-parsing)
* [Tools](#tools)
* [Techniques and best practices](#techniques)

## Custom code 

PHP Code (Code snippets in the php_scripts folder)
* Essentially it is about being smart with being able to download files / request data and being able to parse them. 
* I always liek to use excel to be able to quickly parse and join different strings (mostly because I am most comfortable with it)
* It's always good to have different processes for downloading and for parsing the pages. 

* Typically, get the initial start points from the sitemaps 
* Fetch the data that you want. Typically I like to store these in individual files before I start parsing them
* Test if that is the data you were looking for
* Sometimes you have to call a paginated API on the search result page to get data on individual listings 
* Parse the search result page to find the individual profile pages 
* Get the profile pages and parse them to find the data that you need 
* I like to output the results from the parser in a separate file, before cleaning it up on excel

## Email Parsing 

* (Abhinav : Add the section on the custom code you used - gmailParser)
* Zaiper email parser is pretty good and works well

## Tools 

* Website copier (Static pages) - https://www.httrack.com/ : Right for a quick and dirty job, but ends up spoiling the relative links
* Chrome extensions - Web Scrapper

## Downloading Javascript and AJAX websites

* Monitor the XDR requests in the browser using developer tools
* Download the javascript files so that you know how a particular API point is called. 
* Look for JSON objects (sometimes statis data is kept that way)
* Look at the API end points and function calls. Trick could be to find how exact URL is being made by searching for ``$http.get(sprintf(staticCategoryPageReadLinks.allCategoryBanner,category))`` etc
* https://www.octoparse.com/tutorial/automatically-scrape-dynamic-websites-exampletwitter/?qu

## Techniques 

Different scenarios encounters
Prevention techniques used and some of the workarounds.  

* Login form to access data. It's easy to store a cookie and make subsequest requests in curl. (Example in the php_scripts folder)
* Follow through. The page being requested is not the one containing the information. Instead the page, redirects to a different page. 
* Make ajax calls/ one page applications. Would make it difficult for an absolute novice to scrap the data. 
* Request payloads: Makemytrip sets a cookie the first time a user visits the website homepage. It sends the same parameter in all the query that the client makes (a form of a token based authentication). This 
* Multithreading requests makes the code run fast 
* One of the ways to prevent is to see the pattern of requests coming from a particular server. People circumvent this by using public clouds (multiple instances or google scripts) or by implementing a random request pattern. One of the more interesting cases I found was when the company would actually monitor the traffic for the scrap requests and instead of denying the data, would deliberately feed wrong data. 


Note : These are based on some of my experiences in scrapping and test automation. Please check the legal aspects of the website before using any of the above approaches. 
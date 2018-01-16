# Data scrapping 

Different approaches 
* [Custom code](#custom-code) 
* [Email parsing](#email-parsing)
* [Tools](#tools)
* [Techniques and best practices](#techniques)

## Custom code 

PHP Code 
1. Open the sitemap to check the URLS for the searh result pages and individual listings 
2. Note: It's always good to have different processes for downloading and for parsing the pages. 


## Email Parsing 

* (Abhinav : Add the section on the custom code you used)
* Zaiper email parser is pretty good and works well. 

## Tools 

* https://www.httrack.com/ : Website copier (Static pages)
* Chrome extensions - Web Scrapper

## Techniques 

Different scenarios encounters
Prevention techniques used and some of the workarounds.  

* Login form to access data. It's easy to store a cookie and make subsequest requests in curl. 
* Follow through. The page being requested is not the one containing the information. Instead the page, redirects to a different page. 
* Make ajax calls/ one page applications. Would make it difficult for an absolute novice to scrap the data. 
* Request payloads: Makemytrip sets a cookie the first time a user visits the website homepage. It sends the same parameter in all the query that the client makes (a form of a token based authentication). This 
* Multithreading requests makes the code run fast 
* One of the ways to prevent is to see the pattern of requests coming from a particular server. People circumvent this by using public clouds (multiple instances or google scripts) or by implementing a random request pattern. 


Note : These are based on some of my experiences in scrapping and test automation. Please check the legal aspects of the website before using any of the above approaches. 
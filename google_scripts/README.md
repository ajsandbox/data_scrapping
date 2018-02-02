# Google sheets and app script 

## Google sheets 

#### ImportHTML

Use the ``IMPORTHTML`` function. One can import tables and list items easily. Can also use the ``TRANSPOSE`` and ``QUERY`` function to make it work like a database. Note : Can use it to get multiple tables having same number of columns in the following way :- 

``={IMPORTHTML(URL, "TABLE", 7) ; IMPORTHTML(URL,"TABLE",8) ; IMPORTHTML(URL,"TABLE",9) }``

#### ImportXML

Use the ``IMPORTXML`` function. Note : Can also give it an xpath

````
# To get multiple xpath at the same time 
= IMPORTXML ("http://www.domain.com/longname"; "// * [@ id = 'name'] | // * [@ id = 'twitter-id'] | // * [@ id = 'website'] ")

# To get a clean URL
= REGEXEXTRACT ({cell containing the encrypted url}; "\ / url \? Q = (. +) & Sa")
````

https://www.distilled.net/blog/distilled/guide-to-google-docs-importxml/
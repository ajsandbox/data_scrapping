<?php

	$filearray = array();

	// Populate the arrays
	array_push($filearray,"z.html"); 

	for ($i = 0; $i < count($filearray); ++$i) 
	{
		// Display the file name
		echo "File:";
		echo $filearray[$i]; 
		echo "\n";

		////////////////////////////////
		////////// Technique 1 /////////
		////////////////////////////////
		// DOM parsing an HTML file with XPath
		// Note the use of preg_replace and preg_match_all

		// The output is directed on the console using $ as the delimiter
		// The output is then divided into multiple columns using excel
		$dom = new DOMDocument();
		@$dom->loadHTMLFile($filearray[$i]);	
		$xpath = new DOMXPath($dom);
		$namesofrecruiter = $xpath->query("//div/a[@class='leftnav dark_redtxt']");
		// var_dump($namesofrecruiter);
		// var_dump($xpath);
		foreach ($namesofrecruiter as $entry) 
		{
			echo $entry->nodeValue ; 	
			echo $entry->getAttribute('href');
			echo trim(preg_replace('/\s+/', ' ', $entry->getAttribute('href')));
		}
		echo "\n";

		// Note : We can also use xpath queries once we receive the nodes in a nested manner. 
		$links1 = $xpath->query(".//a[@class='product photo product-item-photo ']", $entry);
		if($links1->length > 0)
		{
			echo $filearray[$i]."^"."Available"."^";
			$name = $xpath->query(".//a[@class='product-item-link']", $entry);
			echo trim(preg_replace('/\s+/', ' ', $name[0]->nodeValue));
			echo "^";
			echo trim(preg_replace('/\s+/', ' ', $name[0]->getAttribute('href')));
			echo "^";
			$special_price = $xpath->query(".//span[@class='special-price']/span/span/span[@class='price']", $entry);
			echo trim(preg_replace('/\s+/', ' ', $special_price[0]->nodeValue));
			echo "^";
			$old_price = $xpath->query(".//span[@class='old-price']/span/span/span[@class='price']", $entry);
			echo trim(preg_replace('/\s+/', ' ', $old_price[0]->nodeValue));
			echo "\n";
		}	

		// Regular expression parsing 
		if(preg_match_all('/^.*(Sat|Sun|Mon|Tue|Wed|Thu|Fri)\,\s([0-9a-zA-Z\s:]+)from/i', $td->item($i)->nodeValue, $resultnew))					
		$dateandtime = $resultnew[2][0];					
		$newa = $xpath->query('a', $td->item($i));
		$nameofsource = $newa->item(0)->nodeValue;
		$twitterhandle = $newa->item(0)->getAttribute('href');
		$viewlink = $newa->item($newa->length - 1)->getAttribute('href');
		$spancontents = $xpath->query('span', $td->item($i));
		$description = $spancontents->item(0)->nodeValue;

		// Example of simply parsing the file itself without first loading it into a DOM. 
		$newString = file_get_contents($filearray[$i]);
		trim(preg_replace('/\s+/', ' ', $newString));
		echo "\n";
		echo $filearray[$i];
		preg_match('/<h4><b>Contact Number: <\/b>(.*)<\/h4>/siU',$newString, $matches);		
		echo ";".$matches[0];
		preg_match('/<h4><b>Email:<\/b>(.*)<\/h4>/siU',$newString, $matches);		
		echo ";".$matches[0];
		preg_match('/<h4><b>Website:<\/b>(.*)<\/h4>/siU',$newString, $matches);		
		echo ";".$matches[0];
		preg_match('/<h4><b>Facebook:<\/b>(.*)<\/h4>/siU',$newString, $matches);		
		echo ";".$matches[0];

		////////////////////////////////
		////////// Technique 2 /////////
		////////////////////////////////
		// Parsing a JSON response from a file

		$result = file_get_contents($filearray[$i]);
		$jsonresult = json_decode($result,true);
		$roomtypes = $jsonresult["data"] ; 
		foreach($roomtypes as $roomtype)
		{	
			echo "Hotel:".$hotelarray[$i].$delimiter;
			echo $roomtype['rtn'].$innerdelimiter.$roomtype['ar'].$innerdelimiter;
			echo "URL:".$urlarray[$i];
			echo $topdelimiter;
		}
		echo $topdelimiter;


		////////////////////////////////
		////////// Technique 3 /////////
		////////////////////////////////
		// Making and parsing a json request

		$url = "http://www.goibibo.com/hotels/staticdata/?vcid=".$cityarray[$i];
		$result = file_get_contents($url);
		$jsonresult = json_decode($result,true);
		//var_dump($jsonresult["hotels"]);
		$hotels = $jsonresult["hotels"] ; 
		foreach($hotels as $hotel)
		{
			echo "City-".$cityarray[$i]."-";	
			echo "Hotel-".$hotel["hc"]."";
			echo $topdelimiter;
		} 
		


	}




?>

<?php

	$urlarray = array(); 
	$filearray = array();

	// Populate the following arrays
	array_push($urlarray,"<URL1 to fetch>"); 
	array_push($urlarray,"<URL2 to fetch>"); 
	array_push($filearray,"<Name of the file1>");  
	array_push($filearray,"<Name of the file2>");  
	// It is a good practice to have a serial number associated in the excel file corresponding to the
	// requested URL and the local file. 

	// Abhinav : Make sure the two arrays are of the same size. Else throw an exception. 

	// Iterate over the array 
	for ($i = 0; $i < count($urlarray); ++$i) 
	{
		// Abhinav : Print on the console
		print $urlarray[$i];
		echo "\n";
		print $filearray[$i];
		echo "\n";
		
		////////////////////////////////
		////////// Technique 1 /////////
		////////////////////////////////
		// Saving HTML file

		// Setting up the CURL request
		$ch = curl_init($urlarray[$i]);
		$fp = fopen($filearray[$i], "w");

		// Setting the CURL options 
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

		// You could also send different parameters as a part of the request. 

		curl_exec($ch);
		curl_close($ch);
		fclose($fp);

		////////////////////////////////
		////////// Technique 2 /////////
		////////////////////////////////
		// Getting an XML response
		// No need to save in a file

		$url="<API Endpoint>";

		// Defining request parameters
		$options = array(
		  CURLOPT_URL => $url,
		  CURLOPT_USERPWD => "$username:$password",
		  CURLOPT_RETURNTRANSFER => TRUE
		);

		$ch = curl_init(); //initializing request
		curl_setopt_array($ch, $options); //setting options
		$data = curl_exec($ch); //performing request to Data Query API, writing response to $data parameter
		curl_close($ch); //closing request

		$xmlData = simplexml_load_string($data) ; 
		
		print_r(count($xmlData->Rows->Row));

		foreach($xmlData->Rows->Row as $row)
		{
			$id_search = (string) $row['cl_180050'];
			$id_checkin = (string) $row['cl_178435'];
			$id_data = (string) $row['cl_178440'];
			$id_blanks = (string) $row['cl_178441'];
			$id_page_loads = (string) $row['page_loads'];	
			echo $id_search.",".$id_checkin.",".$id_data.",".$id_blanks.",".$id_page_loads."\n";
		}

		////////////////////////////////
		////////// Technique 3 /////////
		////////////////////////////////
		// Making and getting a JSON response. 
		// No need to save in a file. 

		$url = '<API Endpoint>/?emitter_format=json';

		// Specify query parameters
		$data = array('username' => 'goibibo', 'city' => 'Hyderabad', 'noofrooms' => '1', 'hotelcode' => '1000002767', 'childroom1' => '0', 'adultroom1' => '1', 'country' => 'IN', 'checkin' => '2014-12-25', 'password' => 'g01b1b0321', 'checkout' => '2014-12-26');
		$data['city'] = $HotelData[$row][0];
		$data['hotelcode'] = $HotelData[$row][1];
		$data['checkin'] = '2014-12-25';
		$data['checkout'] = '2014-12-26';
	 
	 	// Make a post request with the query parameters
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data),
			),
		);

		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		$jsonresult = json_decode($result);

		if($jsonresult->result)
		{
			$rooms = $jsonresult->message[0]->roomlist;
			foreach($rooms as $room) 
			{
				echo $row, ",",$HotelData[$row][1], ",",$HotelData[$row][0], ",", $room->roomtypename, ",", $room->rateplancode, ",", $room->roomtypecode,",", $room->totaltaxcharges,",", $room->totalcharges,"\n" ;
			}

		}

		////////////////////////////////
		////////// Technique 4 /////////
		////////////////////////////////
		// Accessing information behind a login form

		// Note that the server here checks if the request is being raised by the login page. 
		// Save the cookies in file (file.txt)
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://www.website.com/loginCheck");
		curl_setopt($ch, CURLOPT_REFERER, "https://www.website.com/login");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
		curl_setopt($ch, CURLOPT_POST,true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "_username=user%40example.com&_password=password&_submit=LOG+IN");
		curl_setopt($ch, CURLOPT_COOKIEJAR, "file.txt");
		curl_setopt($ch, CURLOPT_COOKIEFILE, "file.txt");	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$html=curl_exec($ch);
		echo $html;

		// Now access the webpages as you would otherwise
		for ($i = 0; $i < count($urlarray); ++$i) 
		{
			print $urlarray[$i];
			echo "\n";
			print $filearray[$i];
			echo "\n";

			curl_setopt($ch, CURLOPT_URL, $urlarray[$i]);
			$fp = fopen($filearray[$i], "w");
			curl_setopt($ch, CURLOPT_FILE, $fp);
			curl_exec($ch);
			fclose($fp);

		}

		curl_close($ch);



?>

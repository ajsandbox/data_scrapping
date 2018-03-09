<?php

	$filearray = array();

	// Populate the arrays
	array_push($filearray,"1.xml");  
	array_push($filearray,"2.xml");  
	array_push($filearray,"3.xml");  
	array_push($filearray,"4.xml");  
	array_push($filearray,"5.xml");  
	array_push($filearray,"6.xml");  
	
	for ($i = 0; $i < count($filearray); ++$i) 
	{
		// Display the file name
		echo "File:";
		echo $filearray[$i]; 
		echo "\n";
		$newString = file_get_contents($filearray[$i]);
		preg_match_all('/<loc>(.*)<\/loc>/siU',preg_replace("/[\n\r\s+]/","",$newString), $matches, PREG_SET_ORDER);		
		foreach ($matches as $matchgroup) {
    		echo $filearray[$i].";".$matchgroup[1];
    		echo "\n";
		}		


	}




?>

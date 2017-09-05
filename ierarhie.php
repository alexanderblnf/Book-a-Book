<?php
	require_once "config.php";
	$sql = "DROP TABLE one";
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully " . $i;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "CREATE TABLE one(sertar VARCHAR(40), path VARCHAR(250));";
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully " . $i;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}  
	$di = new RecursiveDirectoryIterator('fiseCTV/');
	$i = 0;	
	foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
		if(strpos($file, '.jpg') != false && strpos($file, '.xml') == false){ 
			$name = explode(".", $filename);
			$xmlName = $name[0] . ".xml";
			$badxmlName = $filename . ".xml";

			$name = explode("_", $filename, 2);
			$other = $name[0];
			if (strpos($name[1], "_") != false){
				$auxArr = explode("_", $name[1]);
				$other .= "_" . $auxArr[0];
			}
			$badOther = $other . ".jpg.xml";
			$other = $other . ".xml";
			


			if (file_exists($xmlName) == false && file_exists($badxmlName) == false && file_exists($other) == false && file_exists($badOther) == false){
				$folder = basename(dirname($filename));
				if ($i == 0) {
					$sql = "INSERT INTO one (sertar, path) VALUES ('" . $folder . "', '" . $filename . "'), ";
					$i ++;
				} else if ($i == 500) {
					$sql .= "('" . $folder . "', '" . $filename . "');";
					$conn->query($sql);
					$i = 0;
				} else {
					$sql .= "('" . $folder . "', '" . $filename . "'), ";
					$i ++;
				}
				//$i = 0;
			}
			
		}
		
	}

	$conn->close();
?>
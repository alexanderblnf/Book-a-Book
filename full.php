<?php
	require_once "config.php";
	$sql = "DROP TABLE full";
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully " . $i;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "CREATE TABLE full(sertar VARCHAR(40), path VARCHAR(250));";
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully " . $i;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}  
	$di = new RecursiveDirectoryIterator('fiseCTV/');
	$i = 0;	
	foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
		if(strpos($file, '.jpg') != false && strpos($file, '.xml') == false){ 
			$folder = basename(dirname($filename));
			if ($i == 0) {
				$sql = "INSERT INTO full (sertar, path) VALUES ('" . $folder . "', '" . $filename . "'), ";
				$i ++;
			} else if ($i == 500) {
				$sql .= "('" . $folder . "', '" . $filename . "');";
				$conn->query($sql);
				$i = 0;
			} else {
				$sql .= "('" . $folder . "', '" . $filename . "'), ";
				$i ++;
			}
		}
	}

	$conn->close();
?>
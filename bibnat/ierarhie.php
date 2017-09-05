<?php
	$conn = new mysqli('localhost:3306', 'aftqwrgr_alex', 'Hackaduck', 'aftqwrgr_poze');
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$sql = "DROP TABLE one";
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully " . $i;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$sql = "CREATE TABLE one(id INT(8) PRIMARY KEY AUTO_INCREMENT, sertar VARCHAR(40), path VARCHAR(250));";
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully " . $i;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}  
	$di = new RecursiveDirectoryIterator('ierarhie_BNR/');	
	foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
		if(strpos($file, '.jpg') != false){	 
			echo $filename . ' - ' . $file->getSize() . ' bytes <br/>';
			$folder = basename(dirname($filename));
			echo 'folder:' . $folder . '<br/>';
			$sql = "INSERT INTO one (id, sertar, path) VALUES (NULL, '" . $folder . "', '" . $filename . "');";
			$conn->query($sql);
			
		}
		
	}
?>
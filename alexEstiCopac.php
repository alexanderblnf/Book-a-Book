<html>
	<body>
		<?php
			$DIR = "brev/";

			
			$FORMAT = array(
					"jpg",
					"jpeg",
					"png",
					"gij"
				);
			if(file_exists($DIR) == false){
					echo $DIR;
					echo "not found";
			} else{
				$CONTENTS = scandir($DIR);
				$MAX = 0; 
				$MIN = 999999;
				foreach($CONTENTS as $FILE) {
					if ($FILE != "." && $FILE != "..") {
						$ID = (int)end(explode('_', $FILE));
						if($ID > $MAX) {
							$MAX = $ID;
						}
						if($ID < $MIN) {
							$MIN = $ID;
						}
					}
				} 
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
				$sql = "CREATE TABLE one(id INT(8) PRIMARY KEY AUTO_INCREMENT, sertar VARCHAR(10), path VARCHAR(250));";
				
				if ($conn->query($sql) === TRUE) {
				    echo "New record created successfully " . $i;
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}  
				for ($i = $MIN; $i <= $MAX; $i++) {  
					$FILE = "BREVETE_" . $i . ".jpg";
					$PATH = $DIR . $FILE;
					$TYPE = strtolower(end(explode('.', $FILE)));
					if(in_array($TYPE, $FORMAT) == true){
						$sql = "INSERT INTO one (id, sertar, path)
						VALUES (NULL, 'AB', '" . $PATH . "');";
						
						if ($conn->query($sql) === TRUE) {
						    echo "New record created successfully " . $i;
						} else {
						    echo "Error: " . $sql . "<br>" . $conn->error;
						}
						
					}
				}
				
				$conn->close();
			}
		?>
	</body>
</html>
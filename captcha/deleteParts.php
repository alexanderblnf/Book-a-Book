<?php
	function deleteP($path, $parts, $conn){
		$arr = explode("/", $path, 2);
		$path = $arr[1];
		$aux = $parts;
		$parts = (int)$aux;
		if($parts < 20){
			$sql = "DELETE FROM one where path='" . $path . "';";
			$conn->query($sql);

			$arr = explode("_", $path, 2);
			$constPath = $arr[0] . "_"; 
			if(strpos($arr[1], "_") != false){
				$auxArr = explode("_", $arr[1]);
				$constPath = $constPath . $auxArr[0] . "_";
				$part = explode(".", $auxArr[1]);
				$nr = (int)$part[0];
				for($i = 0; $i < $parts - 1; $i++){
					$nr++;
					$path = $constPath . $nr . ".jpg";
					$sql = "DELETE FROM one where path='" . $path . "';";
					$conn->query($sql);
				}

			} else {
				$auxArr = explode(".", $arr[1]);
				$nr = (int)$auxArr[0];
				for($i = 0; $i < $parts - 1; $i++){
					$nr++;
					$path = $path . $nr . ".jpg";
					$sql = "DELETE FROM one where path='" . $path . "';";
					$conn->query($sql);
				}
			}
		}
	}
?>


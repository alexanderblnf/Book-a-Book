<?php
	require_once "../config.php";
	$_SESSION['pics'] = $_SESSION['pics'] + 5;
	$row = $_SESSION['sertar'];
	$sqlPath = "SELECT path FROM full WHERE sertar = '" . $row . "' order by length(path), path ASC limit " . $_SESSION['pics'] . ", 5;";
	$result1 = $conn->query($sqlPath);
	$nr1 = (int)mysqli_num_rows($result1);

	for ($j = 1; $j <= $nr1; $j++) {
		$row1 = $result1->fetch_assoc();
		$row1['path'] = "../" . $row1['path'];
		echo '<div class="image-container">';
		echo '<img onclick="openImage(' . $row1['path'] . ')" class="imagine" src="' . $row1['path'] . '"></img><br>';
		echo '</div>';
	}
?>
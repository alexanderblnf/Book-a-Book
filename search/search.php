<?php
	require_once "../config.php";
	$term = $_POST['term'];

	$sql = "SELECT * from contents where author1last like '%" . $term . "%' or author1first like '%" . $term . "%' or title like '%" . $term . "%';"; 
	$result = $conn->query($sql);
	$nr = mysqli_num_rows($result);
	echo '<br><br>';
	for($i = 1; $i <= $nr; $i++){
		$row = $result->fetch_assoc();
		echo '<p class="entry"> Nume Autor: ' . $row['author1last'] . '<br>';
		echo 'Prenume Autor: ' . $row['author1first'] . '<br>';
		echo 'Titlu: ' . $row['title'] . '<br>';
		echo 'Cota: ' . $row['ref'] . '</p>';
		echo '<center><hr class="style-two"></center>';
	}
?>
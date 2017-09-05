<?php
			require_once "../config.php";
			
			$row = $_POST['row'];
			$sqlPath = "SELECT path FROM full WHERE sertar = '" . $row . "'order by length(path), path ASC limit 5;";
			$result1 = $conn->query($sqlPath);
			$nr1 = (int)mysqli_num_rows($result1);
?>
<html>
	<head>
		 <script src="js/jquery-2.2.2.js"></script>
		 <script src="js/jquery.lazyload.js"></script>
		 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	
	<body>
		<?php
		
			for ($j = 1; $j <= $nr1; $j++) {
				$row1 = $result1->fetch_assoc();
				$aux = $row1['path'];
				$row1['path'] = "../" . $row1['path'];
 				echo '<div class="image-container fade-down">';
 					echo '<a href="' . $row1['path'] . '" target="_blank">';
					echo '<img class="imagine" src="' . $row1['path'] . '"></img><br>';
					echo '</a>';
				echo '</div>';
			}
			
							
		?>
		<script>
			$(function() {
			    $("img.lazy").lazyload({
			    	effect : "fadeIn"
			    });
			});
		</script>
		<script>
			$(document).hover(function(){
			    $('[data-toggle="tooltip"]').tooltip(); 
			});
		</script>
	</body>
<html>
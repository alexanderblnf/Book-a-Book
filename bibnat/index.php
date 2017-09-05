<?php
	require_once "../config.php";

	$_SESSION['pics'] = 0;
	$sql = "SELECT distinct sertar FROM full ORDER BY sertar ASC";
	$result = $conn->query($sql);
	$nr = (int)mysqli_num_rows($result);
	$books = array();
	
	for ($i = 0; $i < $nr; $i++) {
		$row = $result->fetch_assoc();
		$category = substr($row['sertar'], 0, 1);
		
		if (!isset($books[$category])) {
			$books[$category] = array();
		}
		
		$books[$category][] = $row['sertar'];
	}
	
	$conn->close();
	if(empty($_SESSION['user'])){
		header("Location: /login");
	}
	
?>
<html>
	<head>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/mystyle.css">
		<title>BIBNAT</title>
		<link rel="icon" href="images/logo.png">
		<link rel="stylesheet" type="text/css" href="../css/animate.css" />
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-40309729-2', 'auto');
		  ga('send', 'pageview');
		</script>
	</head>
	<body>
		<div id="full-width">
			<a href="/"><img id="logo" src="images/image.png" alt="Book a smile!" width="250px" height="122px"></a>
		</div>
		<div class="row mare col-md-12">
			<div id="full-height" class="div1 row col-md-4 col-xs-4 col-lg-4 col-sm-4">
				<div id="container">
					<div id="navbar">
						<ul class="nav nav-list">
							<?php foreach ($books as $category => $categoryBooks): ?>
								<li>
									<button id="toggle" class="tree-toggler nav-header btn btn-lg btn-primary">
										<span class="glyphicon glyphicon-folder-close"></span> <?php echo $category; ?>
									</button>
									<ul class="nav nav-list tree">
											<?php foreach ($categoryBooks as $book): ?>
															<li class="button">
																<button class="btn btn-lg btn-primary-second"><i id="sert" class="glyphicon glyphicon-folder-close"></i> <?php echo $book; ?></button><br>
															</li>	
											<?php endforeach; ?>
									</ul>
								</li>
							<?php endforeach; ?>
						</ul>
						
					</div>
					
				</div>
			</div>
			<div class="div2 col-md-6 col-xs-6 col-lg-6 col-sm-6">
				<div id="pictures-container"></div>
			</div>
			<div class="div3 col-md-1 col-xs-1 col-lg-1 col-sm-1">
				<div id="load-div" class="row col-md-offset-6">
				</div>
			</div>
		</div>
	</body>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
	<script>
		function openImage(path){
			alert(path);
			var link = "http://bookathon.bibnat.ro/" + path;
			window.open(link);
		}
	</script>
	<script>
		<?php echo 'var books = '.json_encode($books).';'; ?>
		$(function(){
			$(document).ready(function () {
				function displayPaths(row) {
					$.ajax({
						data: { 'row': row },
						type:'POST',
						url: 'getPaths.php',
						success: function (response) {
							$("#load-div").empty();
							var input = '<button class="load-more btn btn-lg" id="more">Incarca mai multe</button>';
							$("#load-div").append(input);
							$("#pictures-container").empty();
							$("#pictures-container").append(response);
						}
					});
				}
				$('button.tree-toggler').click(function () {
					$(this).parent().children('ul.tree').toggle(300);
				});
				$('.button button').click(function () {
					var sertar = $(this).text().trim();
					var data = {"sertar":sertar};
					displayPaths(sertar);
					$.ajax({
						url: 'setSertar.php',
						type:'POST',
						data: data,
						success: function(response){
							if (response.success == true) {
	            			} else {
	            				$.notifyBar({
		        					cssClass: "error",
		        					html: "Teroare"
		        				});
	            			}
						}
					});
				});
			
			});
			$(document).on("click", "#more", function(){
				$("#more").blur();
				var sertar = "";
				$.ajax({
					url: 'addPics.php',
					type:'POST',
					data: sertar,
					success: function(response){
						$("#pictures-container").append(response);
					}
				});
			});
		});
	</script>
</html>

<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../css/styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="../css/animate.css" />

		<link rel="stylesheet" href="../css/font-awesome.css">	
		<link rel="stylesheet" href="../css/jquery.notifyBar.css">
		<link rel="stylesheet" href="css/mystyle.css">
		
		<link rel="icon" href="img/logo.png">
		<title>Bookathon - Book-A-Book</title>
		
		
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-76671322-1', 'auto');
			ga('send', 'pageview');

			function OpenPopupCenter(pageURL, title, w, h) {
            var left = (screen.width - w) / 2;
            var top = (screen.height - h) / 4;  // for 25% - devide by 4  |  for 33% - devide by 3
            return window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        	} 

		</script>
	</head>
	
	<center><a href="http://bookathon.bibnat.ro"><img src="img/1.png"/></a></center>
	
	<div class="newLine">
	    <hr>
	</div>
	
	<body>
		<?php
			require_once "../config.php";

			if (empty($_SESSION['user'])) {
				header("Location: /login");
			}

			$sql = "SELECT email from admins where email='" . $_SESSION['user']['Email'] . "';";
			$result = $conn->query($sql);
			$nr = (int)mysqli_num_rows($result);
			if ($nr == 0){
				header("Location: /captcha");
			}
		?>
		<br></br>
		
		<div class="form-group row">
			<div class="col-xs-4 col-xs-offset-4">
				<input type="text" id="lastname" name="lastname" class="form-control" type="text" placeholder="Introduceti numele" required>
			</div>
			<div class="col-xs-4 col-xs-offset-4">
				<input type="text" id="firstname" name="firstname" class="form-control" type="text" placeholder="Introduceti prenumele" required>
			</div>
			<div class="col-xs-4 col-xs-offset-4">
				<input id="emailInput" class="form-control" type="text" placeholder="Introduceti email">
			</div>
			<div class="col-xs-4 col-xs-offset-7 hand-style">
				<i class="fa fa-search fa-lg" id="search"> Search</i>
			</div>
			<div class="col-xs-4 col-xs-offset-4">
				<hr style="color:white;margin-top: 60px;margin-bottom: 30px;">
			</div>
		</div>

		<div id = "details">
			<div id="nume" class="col-xs-12 col-xs-offset-3 row">
				<span class="col-xs-1 padding-5">Nume:</span>
				<span id="numeSpan" class="col-xs-11 padding-5"></span>	
			</div>
			<br></br>
			<div id="prenume" class="col-xs-12 col-xs-offset-3 row">
				<span class="col-xs-1 padding-5">Prenume:</span>
				<span id="prenumeSpan" class="col-xs-11 padding-5"></span>	
			</div>
			<br></br>		
			<div id="email" class="col-xs-12 col-xs-offset-3 row">
				<span class="col-xs-1 padding-5">Email:</span>
				<span id="emailSpan" class="col-xs-11 padding-5"></span>	
			</div>
			<br></br>
			<div id="punctet" class="col-xs-12 col-xs-offset-3 row">
				<span class="col-xs-1 padding-5">Puncte:</span>
				<span class="col-xs-1 padding-5">Total:</span>	
				<span id="punctetSpan" class="col-xs-1"></span>	
			</div>	
			<br></br>
			<div id="puncter" class="col-xs-12 col-xs-offset-3 row">
				<span class="col-xs-1 col-xs-offset-1 padding-5">Ramase:</span>	
				<span id="puncterSpan" class="col-xs-8 padding-5"></span>	
			</div>	
			<br></br>
		
		</div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../js/jquery.notifyBar.js"></script>
		
	</body>
	<script>
		$(function(){
			$("#search").on("click", function(){
				var LastName = $('#lastname').val();
				var FirstName = $('#firstname').val();
				var email = $('#emailInput').val();
				var dataSearch = 'lastName=' + LastName + '&firstName=' + FirstName;

				if(LastName.trim() == "" || FirstName.trim() == ""){
					$.notifyBar({
    					cssClass: "error",
    					html: "Nu ati introdus Numele si Prenumele"
    				});
				}
				else{
					if (email != null) {
						dataSearch = dataSearch + '&email=' + email;
					}

					$.ajax({
						url: 'search.php',
						type:'POST',
						data: dataSearch,
						success: function(response){
							if (response.success) {
								$("#numeSpan").remove();
								var input = '<span id="numeSpan" class="col-xs-11 padding-5">' + response.lastName + '</span>';
								$("#nume").append(input);
								
								$("#prenumeSpan").remove();
								input = '<span id="prenumeSpan" class="col-xs-11 padding-5">' + response.firstName + '</span>';
								$("#prenume").append(input);
								
								$("#emailSpan").remove();
								input = '<span id="emailSpan" class="col-xs-11 padding-5">' + response.email + '</span>';
								$("#email").append(input);
								
								$("#punctetSpan").remove();
								input = '<span id="punctetSpan" class="col-xs-4 padding-5">' + response.totalPoints + '</span>';
								$("#punctet").append(input);
								
								$("#puncterSpan").remove();
								input = '<span id="puncterSpan" class="col-xs-4 padding-5">' + response.points + '</span>';
								$("#puncter").append(input);

								$('#points').remove();
								$('#submit').remove();
								$('#costSpan').remove();
								$('#costDiv').remove();
								input = '<div id="costDiv" class="col-xs-12 col-xs-offset-3 row form-group under-pic"><span id="costSpan" class="col-xs-1 col-xs-offset-1 padding-5">Cost:</span><div class="col-xs-2 padding-5"><input id="points" class="form-control" type="text" placeholder="Numar de puncte"></input></div><div class="col-xs-1 padding-5-button"><button id="submit">Submit</button></div></div>'
								$('#details').append(input);
		        			} else {
		        				$.notifyBar({
		        					cssClass: "error",
		        					html: response.message
		        				});
		        			}
						}
					});
				}
			});
			$(document).on("click", "#submit", function(){
				var points = $("#points").val();
				var email = document.getElementById('emailSpan').innerHTML;
				var dataPoints = 'points=' + points + '&email=' + email;
				$.ajax({
					url: 'takePoints.php',
					type:'POST',
					data: dataPoints,
					success: function(response){
						if (response.success) {
							$.notifyBar({
	        					cssClass: "success",
	        					html: "Au fost extrase " + points + " puncte"
        					});
        					setTimeout(function(){
	            					window.location="http://bookathon.bibnat.ro/dashboard";
	            			}, 2000);
            			} else {
            				$.notifyBar({
	        					cssClass: "error",
	        					html: response.message
	        				});
            			}
					}
				});
			});
		});
	</script>

</html>
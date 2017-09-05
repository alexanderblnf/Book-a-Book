<?php 
require_once "../config.php";
//session_start();
//include("library/class_email_sender.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
	<script type="text/javascript">
	    window.cookieconsent_options = {"message":"Acest site foloseste cookie-uri pentru a se asigura ca aveti o experienta cat mai buna","dismiss":"Am inteles!","learnMore":"More info","link":null,"theme":"dark-bottom"};
	</script>

	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script>
	<!-- End Cookie Consent plugin -->

	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<link rel="icon" href="../img/logo.png">
	<title>Search - Book-A-Book</title>
	
   
    
    <!-- Favicons -->
    <link rel="icon" href="img/logo.png">
    
    <!-- Mobile -->
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    
	<!-- CSS start here -->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="../css/animate.css" />
	<!-- CSS end here -->
	<!-- Google fonts start here -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
	<!-- Google fonts end here -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-76671322-1', 'auto');
		ga('send', 'pageview');

	</script>
	<meta name="description" content="Book-A-Book e o platforma pe care puteti gasi toate titlurile de carti aflate in bibliotecile de langa dumneavoastra." /> 
	<meta name="keywords" content="Book-A-Book platforma de indexare a titlurilor de carti din bibliotecile din Romania" />
</head>
<body class="ux">

<center><a href="http://bookathon.bibnat.ro"><img src="../img/image.png"/></a></center>
	
	<div class="newLine">
	    <hr>
	</div>


 <div class="form-group row search-bar">
	<div class="col-md-offset-3 col-lg-offset-3 col-md-6 col-lg-6 col-xs-8 col-sm-8">
		<input id="inputSearch" style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="ref" placeholder="Caut&#259;" required>
	</div>
	<div class="col-md-2 col-lg-2 col-xs-4 col-sm-4">
		<i style="cursor:pointer;margin-top: 10px;font-size: 1.2em;" class="fa fa-search fa-lg" id="search"> Search</i>
	</div>
	<div id="contents"></div>
</div>
<!-- Javascript framework and plugins end here -->
</body>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="../js/jquery.notifyBar.js"></script>

<script>
	$(function(){
		$("#search").on("click", function(){
			$("#contents").empty();
			var term = $("#inputSearch").val();
			var data = {"term":term};
			$.ajax({
				url: 'search.php',
				type:'POST',
				data: data,
				success: function(response){
					$("#contents").append(response);
				}
			});
		});
	});
</script>
	
</html>

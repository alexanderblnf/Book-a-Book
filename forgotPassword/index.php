<html>
<head>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Set Password - Book-A-Book</title>
	
    <link name="author" href="Faisal Russel(russel365)" />
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5">
    
    <!-- Favicons -->
    <link rel="icon" href="../img/logo.png">
    
    <!-- Mobile -->
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    
	
	<!-- Google fonts start here -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
	<!-- Google fonts end here -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../signup/css/mycss.css">
    <link rel="stylesheet" href="../css/jquery.notifyBar.css">
    
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


<!--div id="status"></div>
<button onclick="getInfo()">Get Info</button>
<button onclick="login()">Login</button-->


<a href="http://bookathon.bibnat.ro"><img src="../signup/images/image.png"/></a>

<div class="newLine">
    <hr>
</div>




<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
    <div class="newTitle">
        <font size="6px" color="#e4d6a7" face="Georgia, serif" align="center">
            <center>Please enter your e-mail</center>
        </font>
    </div>
</div>
<br><br><br>


<form id="RecoveryForm">
   
    <div class="form-group row">
        <div
            class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
            <input name="email" style="height:auto; font-size:2em;" type="text" class="form-control" id="email" placeholder="E-mail"
                   required>
        </div>
    </div>



    <div class="form-group row col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">

        <input type="submit" id="submit" class="btn btn-secondary col-sm-12 col-lg-12 col-xs-12 col-m-12" name="submit"
               value="Recover my password">

    </div>
</form>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="../js/jquery.notifyBar.js"></script>
<script>
	$(function(){
		$('#submit').click(function(ev){
			ev.preventDefault();
			var email = $("#email").val();
			var data = {
				email:email
			};
			$.ajax({
				url: 'recover_handler.php',
				type: 'POST',
				data: data,
				success: function(response){
				if (response.success) {
					$.notifyBar({
						cssClass: "success",
						html: "The recovery e-mail has been sent"
					});									
					window.location="http://bookathon.bibnat.ro";
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
</body>
</html>

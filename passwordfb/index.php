<?php
	require_once "../config.php";
	if($_POST['submit']){
		$token = $_POST['token'];
		$password = $_POST['password'];
		$password1 = $_POST['password1'];
		if($password == $password1){
			$sql = "UPDATE users set Password='" . md5($password) . "' where token='" . $token . "'";
			$conn->query($sql);
			$sql = "SELECT * from users where token='" . $token . "'";
			$result = $conn->query($sql);
			
			$_SESSION['user'] = mysqli_fetch_assoc($result);
			header("Location: /");

		}
		else{
			echo 'Passwords do not match';
		}
	}
?>
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


<a href="http://www.book-a-book.com"><img src="../signup/images/image.png"/></a>

<div class="newLine">
    <hr>
</div>




<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
    <div class="newTitle">
        <font size="6px" color="#e4d6a7" face="Georgia, serif" align="center">
            <center>Please set up your password</center>
        </font>
    </div>
</div>
<br><br><br>


<form id="loginForm" method="POST">

	<input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
   
    <div class="form-group row">
        <div
            class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
            <input name="password" style="height:auto; font-size:2em;" type="password" class="form-control" id="password" placeholder="Password"
                   required>
        </div>
    </div>

    <div class="form-group row">
        <div
            class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
            <input name="password1" style="height:auto; font-size:2em;" type="password" class="form-control" id="password1"
                   placeholder="Confirm" required>
        </div>
    </div>



    <div
        class="form-group row col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">

        <input type="submit" id="submit" class="btn btn-secondary col-sm-12 col-lg-12 col-xs-12 col-m-12" name="submit"
               value="Set Password">

    </div>
</form>
</body>
</html>
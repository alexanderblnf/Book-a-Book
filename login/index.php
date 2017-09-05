<?php
	require_once "../config.php";
	if($_POST['submit']){
		$sql = "SELECT * from users where email='" . $_POST['email'] . "'";
		$result = $conn->query($sql);
		$user = mysqli_fetch_assoc($result);
		if($user['Password'] == md5($_POST['password'])){
			$_SESSION['user'] = $user;
			header("Location: /");
		}
		else{
			echo 'This is not the user you are looking for';
		}
	}
?>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Login - Book-A-Book</title>
	
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
    <link rel="stylesheet" type="text/css" href="../css/animate.css" />
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    
  <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-76671322-1', 'auto');
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

<div class="newTitle">
    <button
        class="animated fadeInDown btn btn-facebook col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3"
        name="loginWithFacebook" value="Login with Facebook" onclick="login()">Login with Facebook
    </button>
</div>


<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
    <div class="col-md-5 col-sm-5 col-lg-5 col-xs-5">
        <hr>
    </div>
    <div class="col-md-2 col-sm-2 col-lg-2 col-xs-2"><font size="6px" color="#e4d6a7" face="Georgia, serif"
                                                           align="center">
            <center>or</center>
        </font></div>
    <div class="col-md-5 col-sm-5 col-lg-5 col-xs-5">
        <hr>
    </div>
</div>

<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
    <div class="newTitle animated fadeInDown">
        <font size="6px" color="#e4d6a7" face="Georgia, serif" align="center">
            <center>Log in with your email address</center>
        </font>
    </div>
</div>
<br><br><br>


<form id="loginForm" method="POST">
   
    <div class="form-group row">
        <div
            class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
            <input name="email" style="height:auto; font-size:2em;" type="email" class="form-control" id="email" placeholder="Email"
                   required>
        </div>
    </div>

    <div class="form-group row">
        <div
            class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
            <input name="password" style="height:auto; font-size:2em;" type="password" class="form-control" id="password"
                   placeholder="Password" required>
        </div>
    </div>



    <div
        class="form-group row col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">

        <input type="submit" id="submit" class="animated fadeInDown btn btn-secondary col-sm-12 col-lg-12 col-xs-12 col-m-12" name="submit"
               value="Login">

    </div>
</form>
<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
	<a href="http://bookathon.bibnat.ro/forgotPassword" class="animated fadeInDown btn btn-secondary">Forgot your password?</a>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="../js/jquery.notifyBar.js"></script>
<script>
 window.fbAsyncInit = function () {
        FB.init({
            appId: '1692962647648702',
            xfbml: true,
            version: 'v2.5'
        });
        FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
                document.getElementById('status').innerHTML = 'We are connected.';
            }
            else if (response.status === 'not_authorized') {
                document.getElementById('status').innerHTML = 'We are not logged in.';
            }
            else {
                document.getElementById('status').innerHTML = 'We are not logged in to facebook.';
            }
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

   function getInfo() {
        var firstName = {};
        var lastName = {};
        var gender = {};
        var email = {};
        //var age_range = {};

        FB.api('/me', 'GET', {fields: 'first_name, last_name, gender, email, age_range'}, function (response) {
            firstName = response.first_name;
            lastName = response.last_name;
            email = response.email;
            gender = response.gender;
            //age_range = response.age_range;
            
            var data = {
            	email: email
            }
            
            $.ajax({
                    url: 'user_login_fb.php',
                    type: 'POST',
                    data: data,
                    success: function(response){
			if (response.success) {
				$.notifyBar({
					cssClass: "success",
					html: "Welcome back!"
				});
				setTimeout(function () {
					window.location.href = "http://bookathon.bibnat.ro";
				}, 1500);

			} else {
				$.notifyBar({
					cssClass: "error",
					html: response.message
				});
			}
                    }
                    
                });
        });
        
    }

    function login() {
        FB.login(function (response) {
            if (response.status === 'connected') {
                getInfo();
            }
            else if (response.status === 'not_authorized') {
                document.getElementById('status').innerHTML = 'We are not logged in.';
            }
            else {
                document.getElementById('status').innerHTML = 'We are not logged in to facebook.';
            }
            

        	
        }, {scope: 'email'});
        
    }
</script>
</body>
</html>

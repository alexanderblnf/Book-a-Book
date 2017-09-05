<html>
<head>

	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Sign Up - Book-A-Book</title>
	
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
    <link rel="stylesheet" href="../css/jquery.notifyBar.css">
    <link rel="stylesheet" href="css/mycss.css">
    <link rel="stylesheet" type="text/css" href="../css/animate.css" />
    
    
    
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


<a href="http://bookathon.bibnat.ro"><img src="images/image.png"/></a>


<div class="newLine">
    <hr>
</div>

<div class="newTitle">
    <button
        class="animated fadeInDown btn btn-facebook col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3"
        name="loginWithFacebook" value="Login with Facebook" onclick="login()">Sign up with Facebook
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
            <center>Sign up with your email address</center>
        </font>
    </div>
</div>
<br><br><br>


<form id="signForm">
    <div class="form-group row">
        <div
            class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
            <input style="height:auto; font-size:2em;" type="text" class="form-control" id="firstname"
                   placeholder="Prenume" required>
        </div>
    </div>

    <div class="form-group row">
        <div
            class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
            <input style="height:auto; font-size:2em;" type="text" class="form-control" id="lastname"
                   placeholder="Nume" required>
        </div>
    </div>

    <div class="form-group row">
        <div
            class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
            <input style="height:auto; font-size:2em;" type="email" class="form-control" id="email" placeholder="Email"
                   required>
        </div>
    </div>

    <div class="form-group row">
        <div
            class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
            <input style="height:auto; font-size:2em;" type="password" class="form-control" id="password"
                   placeholder="Parola" required>
        </div>
    </div>

    <div class="form-group row">
        <div
            class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">
            <input style="height:auto; font-size:2em;" type="password" class="form-control" id="password1"
                   placeholder="Confirma parola" required>
        </div>
    </div>

    <div
        class="form-group row col-md-3 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12 col-lg-2 col-lg-offset-5">
        <div class="navcontainer">
            <ul>
                <li class="col-sm-6 col-xs-6 col-lg-6 col-md-6">
                    <div>
                        <label id="gen">
                            <input type="radio" id="gender_male" name="gender" value="male">
                            Male
                        </label>
                    </div>
                </li>
                <li class="col-sm-6 col-xs-6 col-lg-6 col-md-6">
                    <div>
                            <label id="gen">
                                <input type="radio" id="gender_female" name="gender" value="female">
                                    Female
                            </label>
                    </div>
                
                </li>
        </ul>
    </div>
    </div>

    <div
        class="form-group row col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2 col-lg-4 col-lg-offset-4">
        <div>
        </div>
        <label class="footer">
            <input type="checkbox"> I agree with Bookathon <a href="http://bookathon.bibnat.ro/regulament.pdf">rules</a>
        </label>
    </div>

    <div
        class="form-group row col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 col-lg-6 col-lg-offset-3">

        <input type="submit" id="submit" class="animated fadeInDown btn btn-secondary col-sm-12 col-lg-12 col-xs-12 col-m-12" name="submit"
               value="Submit">

    </div>
    <div id="success"></div>
</form>
</body>

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
            	firstname: firstName,
            	lastname: lastName,
            	email: email,
            	gender: gender
            }
            
            $.ajax({
                    url: 'user_handler_fb.php',
                    type: 'POST',
                    data: data,
                    success: function(response){
			if (response.success) {
				$.notifyBar({
					cssClass: "success",
					html: "Successfully signed up"
				});
				setTimeout(function () {
					window.location="http://bookathon.bibnat.ro/passwordfb?token=" + response.token;
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

    $(function () {
        $('#submit').click(function (ev) {
            ev.preventDefault();
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var passwordConfirm = $("#password1").val();
            var gender = $("input[name=gender]:checked").val();
            var data = {
            	firstname: firstname,
            	lastname: lastname,
            	email: email,
            	password: password,
            	passwordConfirm: passwordConfirm,
            	gender: gender
            };
            
            if (firstname.trim() == '' || lastname.trim() == '' || email.trim() == '' || password.trim() == '')
                alert('Nu ati introdus toate datele');
            else {
                $.ajax({
                    url: 'user_handler.php',
                    type: 'POST',
                    data: data,
                    success: function(response){
            			if (response.success) {
            				window.location="http://bookathon.bibnat.ro/login";
            				$.notifyBar({
            					cssClass: "success",
            					html: "Succesfully signed up"
            				});
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
    });
</script>
</html>

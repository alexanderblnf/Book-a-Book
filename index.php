<?php 
require_once "config.php";
//session_start();
include("library/class_email_sender.php");
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
	<title>Book-A-Book</title>
	
   
    
    <!-- Favicons -->
    <link rel="icon" href="img/logo.png">
    
    <!-- Mobile -->
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
    
	<!-- CSS start here -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css" />
	<link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
	<link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick-theme.css"/>


	

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
  <div class="bg-overlay"></div>
	<!-- Preloader start here -->
	<div id="preloader">
		<div id="status"></div>
	</div>
	<!-- Preloader end here -->

	
<section class="row" style="padding-top: 20px">
	<?php
		if(isset($_SESSION['user'])){
			echo '<div class="btn-menu col-md-offset-1 col-md-1">';
			echo '<a href="/captcha" class="pull-me-down fade-down btn btn-lg btn-danger btn-log">Bookathon</a>';
			echo '</div>';
			echo '<div class="btn-menu col-md-1">';
			echo '<a href="/bibnat" class="pull-me-down fade-down btn btn-lg btn-success">Catalog</a>';
			echo '</div>';
			echo '<div class="btn-menu col-md-1">';
			echo '<a href="/search" class="pull-me-down fade-down btn btn-lg btn-danger btn-log">Search</a>';
			echo '</div>';
		}
	?>
	
	<div class="bln col-md-3 col-md-offset-4">
		<?php
			if(isset($_SESSION['user'])){
				$sql = "SELECT * from users where Email='" . $_SESSION['user']['Email'] . "';";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				$_SESSION['user']['points'] = $row['points'];
				$_SESSION['user']['totalPoints'] = $row['totalPoints'];
				echo '<a href="/logout" class="pull-me-down btn btn-lg btn-success btn-sign btn pull-left fade-down ">Logout</a>';
				echo '<label class="pull-me-down fade-down " style="margin-left:10px;color:white;"><p align="center">' . $_SESSION['user']['Firstname'] . ' ' . $_SESSION['user']['Lastname'] . '<br> Puncte ramase: ' . $_SESSION['user']['points'] . ' <br> Total puncte: ' . $_SESSION['user']['totalPoints'] . '</p></label>';
				
				
			}
			else{
				
				echo '<a href="/signup" class="fade-down btn btn-lg btn-success btn-sign pull-left">Sign up</a>';
				echo '<a href="/login" class="fade-down btn btn-lg btn-danger btn-log pull-left">Login</a>';
			}
		?>
	</div>
</section>




<!-- About Icon start here -->
	<div class="about-us"> 
		<a href="#" class="fa fa-file-text-o tool-tip" data-toggle="modal" data-target=".bs-example-modal-lg" data-placement="right" title="About"></a>
		
		
		
	</div>
<!-- About Icon end here -->	
<!-- Contact Icon start here -->
	<div class="contact-us"> 
		<a href="#" class="fa fa-envelope-o tool-tip" data-toggle="modal" data-target=".bs-example-modal-lg2"  data-placement="left" title="Contact"></a>
		
	</div>
<!-- Contact Icon end here -->
	<!-- Main container start here -->
	<section class="container main-wrapper">
		
		<!-- Logo start here -->
		<section id="logo" class="fade-down">
			<a href="http://bookathon.bibnat.ro" title="Book a smile!">
            			<img src="img/bookalogo.png" alt="Book-A-Book">
            		</a>
		</section>
		<!-- Logo end here -->
		<!-- Slogan start here -->
		<section class="slogan fade-down">
			<h2><em>Book-A-Book</em> is a project which brings library search in the age of instant information availability.</h2>				
		</section>






		<!-- Slogan end here -->
		<!-- Count Down start here -->
		<!-- BOOKATHON aici -->
		<!-- <div class="row bookathon fade-down"> -->
			<!-- <a href="http://bookathon.bibnat.ro/captcha"><button class="col-md-12 col-xs-12 col-lg-12 col-sm-12">BOOKATHON</button></a> -->
		<!-- </div> -->

		<!--section class="count-down-wrapper fade-down">
			<ul class="row count-down">                       
				<li class="col-md-3 col-sm-6">   
					<input class="knob days" data-readonly=true data-min="0" data-max="365" data-width="260" data-height="260" data-thickness="0.07" data-fgcolor="#34aadc" data-bgColor="#e1e2e6" data-angleOffset="180">
					<span id="days-title">zile</span>
				</li>    
				<li class="col-md-3 col-sm-6"> 
					<input class="knob hour" data-readonly=true data-min="0" data-max="24" data-width="260" data-height="260" data-thickness="0.07" data-fgcolor="#4cd964" data-bgColor="#e1e2e6" data-angleOffset="180">
					<span id="hours-title">ore</span>
				</li>    
				<li class="col-md-3 col-sm-6"> 
					<input class="knob minute" data-readonly=true data-min="0" data-max="60" data-width="260" data-height="260" data-thickness="0.07" data-fgcolor="#ff9500" data-bgColor="#e1e2e6" data-angleOffset="180">
					<span id="mins-title">minute</span>
				</li>    
				<li class="col-md-3 col-sm-6"> 
					<input class="knob second" data-readonly=true data-min="0" data-max="60" data-width="260" data-height="260" data-thickness="0.07" data-fgcolor="#ff3b30" data-bgColor="#e1e2e6" data-angleOffset="180">
					<span id="secs-title">secunde</span>
				</li>                
			</ul>              
		</section-line-two>

		<section class="rules col-md-offset-1 col-md-10 fade-down">
			<div class="section-title"><b>Particip&#259; la Bookathon!</b></div>
			<div class="section-line"><img src="/img/1.png" /> &#206;nscrie-te <b><a href="https://www.eventbrite.com/e/bookathon-tickets-24545743981?aff=es2" target="_blank">aici</a></b>. Click pe <b>REGISTER</b> pentru a &#238;ncepe &#238;nscrierea.</div>
			<div class="section-line"><img src="/img/2.png"> Selecteaz&#259; num&#259;rul de bilete dorite &#351;i d&#259; click pe <b>CHECKOUT</b>.</div>
			<div class="section-line"><img src="/img/3.png"> Completeaz&#259; formularul &#351;i click pe <b>Complete Registration</b>.</div>
			<div class="section-line"><img src="/img/4.png"> Intr&#259; pe e-mail &#351;i descarc&#259; biletul primit de la <b>Eventbrite</b>.</div>
			<div class="section-line"><img src="/img/5.png"> <b>Nu uita s&#259; printezi biletul &#351;i s&#259; vii cu el la Bookathon!</b></div>
			<div class="section-line-two"><p>Pentru a putea c&#226;&#351;tiga premiile noastre, f&#259;-&#355;i un cont pe acest site cu un click pe <b><a href="http://bookathon.bibnat.ro/signup/"  target="_blank">Sign up!</a></b></p></div>
			
			

		</section>


		<!-- Count Down end here -->
		<!-- Newsletter start here -->
		
	    	
		<div class="slider">
			<div class="item"><img src="poze-demo/dsc_0020.jpg"></div>
			<div class="item"><img src="poze-demo/dsc_0025.jpg"></div>
			<div class="item"><img src="poze-demo/dsc_0028.jpg"></div>
			<div class="item"><img src="poze-demo/dsc_0034.jpg"></div>
			<div class="item"><img src="poze-demo/dsc_0041.jpg"></div>
			<div class="item"><img src="poze-demo/dsc_0042.jpg"></div>
			<div class="item"><img src="poze-demo/dsc_0060.jpg"></div>
			<div class="item"><img src="poze-demo/img_8893.jpg"></div>
			<!-- <div class="item"><img src="poze-demo/img_8904.jpg"></div> -->
			<div class="item"><img src="poze-demo/img_8917.jpg"></div>
			<div class="item"><img src="poze-demo/img_8926.jpg"></div>
			<div class="item"><img src="poze-demo/img_8927.jpg"></div>
			<div class="item"><img src="poze-demo/img_8934.jpg"></div>
			<div class="item"><img src="poze-demo/img_8967.jpg"></div>
			<div class="item"><img src="poze-demo/img_8971.jpg"></div>
			<div class="item"><img src="poze-demo/img_9036.jpg"></div>
			<div class="item"><img src="poze-demo/img_9068.jpg"></div>
			<div class="item"><img src="poze-demo/_mg_8093.jpg"></div>
			<div class="item"><img src="poze-demo/_mg_8115.jpg"></div>
			<div class="item"><img src="poze-demo/_mg_8117.jpg"></div>
			<div class="item"><img src="poze-demo/_mg_8132.jpg"></div>
			<div class="item"><img src="poze-demo/_mg_8146.jpg"></div>
			<div class="item"><img src="poze-demo/_mg_8162.jpg"></div>
			<div class="item"><img src="poze-demo/_mg_8166.jpg"></div>
			<div class="item"><img src="poze-demo/_mg_8176.jpg"></div>
			<div class="item"><img src="poze-demo/_mg_8279.jpg"></div>
		</div>





		<section class="newsletter row">      
	            
		</section>
		<!-- Newsletter end here -->
		<!-- Social icons start here -->
		<ul class="connect-us row fade-down">
			<li><a target="_blank" href="https://www.facebook.com/bookabookofficial/" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
			<li><a target="_blank" href="https://twitter.com/bookabookoff" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
			<li><a target="_blank" href="http://bit.ly/1MKuSKU" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
		</ul>
		<!-- Social icons end here -->
		<!-- Footer start here -->
		<footer class="fade-down">        
			<p class="footer-text">&copy; Book-A-Book 2016, All Rights Reserved.</p>
		</footer>
		<!-- Footer end here -->
	</section>
<!-- About start here -->

  <div class="modal fade bs-example-modal-lg" role="dialog" aria-hidden="true" data-keyboard="true" data-backdrop="static" tabindex="-1">
    <a href="#" class="fa fa-times cls-pop" data-dismiss="modal"></a>
    <div class="modal-dialog modal-lg clearfix">
      <div class="modal-content pop-up">
        <h3>About US</h3>
        <div class="clearfix">
        <div>
          <p><b>Who are we?</b></p>
          <p>We are a team of enthusiast young adults, students at the Faculty of Automatics and Computer Science, University of Politehnica Bucharest, participants in the pre-acceleration program for start-ups Innovation Labs. </p>
          <p><b>What we do?</b></p>
          <p>Our team enterted Innovation Labs with the Book-A-Book project.<br>Book-A-Book is a digital platform for indexing the cards used for identification of books in public libraries.<br>
          We address to all the people whom are overwhelmed by the manual search through millions of titles which are not digitally accesable, such as: researchers, journalists, PHD students, historicians, architects and bookaholics in general.<br>
          In this way, we ease the access to books by a simple search and, also, we offer you the possibility to book a book, to see its disponibility in the library, to write a review and to see others oppinions about books. </p>
          <p>
          		<b> How we want to do this?</b>
          </p>
          <p>We will use the <a href="https://www.microsoft.com/cognitive-services/en-us/computer-vision-api">Microsoft Computer Vision API</a> in order to be able to identify the text written on the cards. The good thing about this is that we will cut the processing time in half!</p>
          <p>Stay tuned for the best experience and for the greatest events you will ever live!</p>
        </div>
        <br><br>
        <div class="row">
	       	<div class="col-md-3 col-sm-6 col-xs-12 col-lg-3">
	       		<img class="img-circle" src="images/alex.png" alt="" />
	       		<br>
	       		<div class="team col-md-12 col-sm-12 col-xs-12 col-lg-12">
		       		<p>Alexandru Balan</p>
		       		<a href="mailto:alexandru.balan0505@gmail.com" class="fa fa-envelope"> alexandru.balan0505@gmail.com</a>
		       	</div>
		       	
		       	<div class="team col-md-12 col-sm-12 col-xs-12 col-lg-12">
		       		Very passionate about technology and generic house, he mantains focus even in the hardest hackathons.
		       	</div>
	       	</div>
	       	<div class="col-md-3 col-sm-6 col-xs-12 col-lg-3">
	       		<img class="img-circle" src="images/raluca.png" alt="" />
	       		<br>
	       		<div class="team col-md-12 col-sm-12 col-xs-12 col-lg-12">
		       		<p>Raluca Dobroiu</p>
		       		<a href="mailto:ralucad93@gmail.com" class="fa fa-envelope"> ralucad93@gmail.com</a>	
		       	</div>
		     
		       	<div class="team col-md-12 col-sm-12 col-xs-12 col-lg-12">
		       		The cat of our team, she is always ready to pounce on every obstacle.
		       	</div>
	       	</div>
	       	<div class="col-md-3 col-sm-6 col-xs-12 col-lg-3">
	       		<img class="img-circle" src="images/andra.png" alt="" />
	       		<br>
	       		<div class="team col-md-12 col-sm-12 col-xs-12 col-lg-12">
		       		<p>Andra Denis Ionescu</p>
		       		<a href="mailto:andradenisionescu@gmail.com" class="fa fa-envelope"> andradenisionescu@gmail.com</a>
		       	</div>
		       	
		       	<div class="team col-md-12 col-sm-12 col-xs-12 col-lg-12">
		       		The minion and the whirligig of the group, she is our perfect pitcher. 
		       	</div>
	       	</div>
	       	<div class="col-md-3 col-sm-6 col-xs-12 col-lg-3">
	       		<img class="img-circle" src="images/matei.png" alt="" />
	       		<br>
	       		<div class="team col-md-12 col-sm-12 col-xs-12 col-lg-12">
		       		<p>Matei Neagu</p>
		       		<a href="mailto:neagu.l.matei@gmail.com" class="fa fa-envelope"> neagu.l.matei@gmail.com</a>
		       	</div>
		       	
		       	<div class="team col-md-12 col-sm-12 col-xs-12 col-lg-12">
		       		Smart, handsome and enthusiastic, Matei has the perfect answers for everythng.		       		
		       	</div>
	       	</div>
	</div>
        </div>    
         
      </div>
    </div>
  </div>
  
 
<!-- About end here -->
<!-- Contact start here -->
  <div class="modal fade bs-example-modal-lg2" role="dialog" aria-hidden="true" data-keyboard="true" data-backdrop="static" tabindex="-1">
    <a href="#" class="fa fa-times cls-pop" data-dismiss="modal"></a>
    <div class="modal-dialog modal-lg">
      <div class="modal-content pop-up pop-up-cnt">
        <h3>Contact us</h3>
        


        <!--Email Sending Script -->

        <?php 
			$name="";
			$from="";
			$message="";
        if(isset($_POST['submit'])){

        	$name=$_POST['name'];
        	$from=$_POST['email'];
        	$message=$_POST['comments'];
        	
        	$to="bookabookofficial@gmail.com"; // Add your e-mail here
        	 
        	include("library/send_email.php");
		

        //Isset finishes here	
        }
        ?>


        <!-- Email Sending Script-->

        <div class="clearfix cnt-wrap">
         <form id="contactform" name="contactform" action="" method="post">
         	<div id="result"></div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 columns">
                <input type="text" id="nameContact" placeholder="Name" name="name" value="<?php echo $name;?>" required>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 columns">
                <input type="text"  id="emailContact" placeholder="Email" name="email" value="<?php echo $from;?>" required>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 columns">
                <textarea id="comm" name="comments" placeholder="Message" required><?php echo $message;?></textarea>
              </div>
              
              
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center columns">             
                <button name="submit" id="submitContact" class="contact-btn-submit" type="submit">Send</button>
              </div> 
            </form>        
        </div>


        <div class="clearfix cnt-wrap">
          <div class="col-md-6 col-sm-6">
            <i class="fa fa-phone"></i>
            <h4>Phone</h4>
            <p>Mobile: 0723 704 031<br /></p>
          </div>

          <div class="col-md-6 col-sm-6">      
            <i class="fa fa-envelope-o"></i>
            <h4>Email</h4>
            <p> bookabookofficial@gmail.com<br /></p>
          </div>
          
          </div>
        </div>
      </div>
    </div>
<!-- Contact end here --> 
		<!-- Main container start here -->
		<!-- Javascript framework and plugins start here -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		 <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<!--<script type="text/javascript" src="js/slick.min.js"></script> -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script> 
		<script src="js/jquery.validate.min.js"></script>
		<script src="js/modernizr.js"></script> 
		<script type="text/javascript" src="js/appear.js"></script> 		
		<script src="js/jquery.knob.js"></script>
		<script src="js/jquery.ccountdown.js"></script>
		<script src="js/init.js"></script>
		<script src="js/general.js"></script>
		<script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
		
<!-- Javascript framework and plugins end here -->
</body>
	<script>
	$(function(){
		$(document).ready(function(){
			$('.slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 2,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [
    //{
    //  breakpoint: 1024,
    //  settings: {
    //    slidesToShow: 3,
    //    slidesToScroll: 1,
    //    infinite: true,
    //    dots: true
    //  }
   // },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    }
    //{
    //  breakpoint: 480,
    //  settings: {
    //    slidesToShow: 1,
    //    slidesToScroll: 1,
    //    infinite: true,
    //    dots: true
    //  }
    //}
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
		});
	});

	

	/*$(function(){
			$('#newsletter').click(function()
			{
				var email = $("#emailnews").val();
				var dataString = 'email=' + email;
				if (email.trim() == '')
					alert('Nu ati introdus toate datele');
				else if(email.trim().indexOf(".") == -1 || email.trim().indexOf("@") == -1)
					alert('E-mail invalid');
				else {
					$.ajax({
					url: 'newsletter.php',
					type:'POST',
					data: dataString
					});
			    	}
			    
			});
	});
	$(function(){
			$('#submitContact').click(function()
			{
				var email = $("#emailContact").val();
				var name = $("#nameContact").val();
				var comm = $("#comments").val();
				var dataString = 'name=' + name + "&email=" + email + "&comm=" + comm;
				if (email.trim() == '' || name.trim() == '' || comm.trim() == '')
					alert('Nu ati introdus toate datele');
				else {
					$.ajax({
						url: 'mail.php',
						type:'POST',
						data: dataString
						
						success: function(){
							alert('Multumim!');
						}
					});
			    }
			    
			});
	});*/
	
		
	</script>
</html>

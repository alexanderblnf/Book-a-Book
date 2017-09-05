<?php 
	require_once "../config.php";


	if(empty($_SESSION['user'])){
		header("Location: /login");
	}

	$sql = "SELECT tutorial FROM users where Email='" . $_SESSION['user']['Email'] . "';";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if($row['tutorial'] == 0){
		header("Location: /captcha");
	}
	
?>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="../css/styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="../css/animate.css" />

		<link rel="stylesheet" href="../css/font-awesome.css">	
		<link rel="stylesheet" href="../css/jquery.notifyBar.css">
		<link rel="stylesheet" href="../captcha/css/mystyle.css">

		<link rel="stylesheet" href="css/style.css">
		
		<link rel="icon" href="../img/logo.png">
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
	


		<center><a href="http://bookathon.bibnat.ro"><img src="../images/image.png"/></a></center>
	

	<div class="newLine">
	    <hr>
	</div>



	
	<body>
		<ul class="diacritice col-md-10 col-md-offset-2 col-lg-offset-2 col-xs-offset-1 col-sm-offset-1 col-lg-10 col-xs-10 col-sm-10">
			<li class="col-md-1 col-lg-1 col-xs-2 col-sm-2">
				&#194;
			</li>
			<li class="col-md-1 col-lg-1 col-xs-2 col-sm-2">
				&#226;
			</li>
			<li class="col-md-1 col-lg-1 col-xs-2 col-sm-2">
				&#258;
			</li>
			<li class="col-md-1 col-lg-1 col-xs-2 col-sm-2">
				&#259;
			</li>
			<li class="col-md-1 col-lg-1 col-xs-2 col-sm-2">
				&#206;
			</li>
			<li class="col-md-1 col-lg-1 col-xs-2 col-sm-2">
				&#238;
			</li>
			<li class="col-xs-offset-2 col-sm-offset-2 col-md-offset-0 col-lg-offset-0 col-md-1 col-lg-1 col-xs-2 col-sm-2">
				&#537;
			</li>
			<li class="col-md-1 col-lg-1 col-xs-2 col-sm-2">
				&#536;
			</li>
			<li class="col-md-1 col-lg-1 col-xs-2 col-sm-2">
				&#539;
			</li>
			<li class="col-md-1 col-lg-1 col-xs-2 col-sm-2">
				&#538;
			</li>
		</ul>
		<div id="cota" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Cot&#259;</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/cota-v1.png" />
			</div>
		</div>
		<div id="nume1" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Nume</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/nume-v1.png" />
			</div>
		</div>
		<div id="prenume1" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Prenume</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/prenume-v1.png" />
			</div>
		</div>
		<div id="nume2" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Nume</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/nume2-v1.png" />
			</div>
		</div>
		<div id="prenume2" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Prenume</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/prenume2-v1.png" />
			</div>
		</div>
		<div id="nume3" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Nume</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/nume3-v1.png" />
			</div>
		</div>
		<div id="prenume3" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Prenume</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/prenume3-v1.png" />
			</div>
		</div>
		<div id="titlu" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Titlu</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/titlu-v1.png" />
			</div>
		</div>
		<div id="corp" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Corp</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/corp-fisa-v1.png" />
			</div>
		</div>
		<div id="loc" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Loc de publicare</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/oras-v1.png" />
			</div>
		</div>
		<div id="editura" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Editur&#259;</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/editura-v1.png" />
			</div>
		</div>
		<div id="an" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>An de publicare</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/an-v1.png" />
			</div>
		</div>
		<div id="paginatie" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Paginatie</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/paginatie-v1.png" />
			</div>
		</div>
		<div id="note" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
				<a href="#close" title="Close" class="close">X</a>
					<h2>Note</h2>
					<img class="col-md-12 col-lg-12 col-xs-12 col-sm-12" src="../img/Tutorial/note-v1.png" />
			</div>
		</div>

		<div id="start" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Salutare, &#238;nv&#259;&#355;&#259;celule!</center></h2>
					<p class="pop">
						Acesta este un tutorial pentru a te familiariza cu completarea c&#226;mpurilor.
					</p>
					<p class="pop">
						&#206;n partea de sus a paginii exist&#259; toate diacriticele. Tu trebuie doar s&#259; le copiezi unde este nevoie!<br>
						&#206;n cazul &#238;n care pe o fi&#351;&#259; apare textul "Vezi fi&#351;a urm.", apas&#259; pe butonul "Adaug&#259; poz&#259; nou&#259;" de sub imaginea principal&#259;,
						pentru a &#238;nc&#259;rca continuarea fi&#351;ei.<br><br>
						Butonul "Sari peste" trebuie folosit în cazul în care fisele se întind pe un num&#259;r prea mare de fi&#351;e.<br><br>
						Butonul "Raporteaz&#259;" trebuie folosit în cazul în care o fi&#351;&#259; este ilizibil&#259; sau este scris&#259; într-o limb&#259; str&#259;in&#259; (german&#259;, francez&#259;)<br>
						Singurele diacritice care trebuie folosite sunt cele pentru limba român&#259;! <br><br>
						Semnul ". -" semnific&#259; o continuare a câmpului actual.<br>


					</p>
					<a href="#cota-tutorial"><button style="float:right;" class="start-button">&#206;ncepe tutorialul!</button></a>
			</div>
		</div>
		<div id="cota-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Cot&#259;</center></h2>
					<p class="pop">
						Cota este pozi&#355;ionat&#259; &#238;n partea dreapta-sus a cartelelor. Este alc&#259;tuit&#259; din 2 p&#259;r&#355;i:
						<ul>
							<li class="pop-li">
								un num&#259;r roman de la <b>I</b> p&#226;n&#259; la <b>V</b> (<b>I, II, III, IV, V</b>), o combinaţie de majuscule sau ambele
							</li>
							<li class="pop-li">
								un num&#259;r format din maxim 6 cifre arabe (<b>0..9</b>)
							</li>
						</ul>
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/cota-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaz&#259; &#351;i tu c&#226;mpul <b>Cota</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaz&#259; Cota!</button></a>
			</div>
		</div>
		<div id="nume-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Nume</center></h2>
					<p class="pop">
						Numele primului autor se g&#259;se&#351;te pe prima linie a fi&#351;ei, p&#226;n&#259; la prima virgul&#259;. 
						<br><b>Aten&#355;ie: Nu este obligatoriu s&#259; existe!</b>
						
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/nume-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaz&#259; &#351;i tu c&#226;mpul <b>Nume Autor 1</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaz&#259; Nume!</button></a>
			</div>
		</div>
		<div id="prenume-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Prenume</center></h2>
					<p class="pop">
						Prenumele primului autor se g&#259;se&#351;te pe prima linie a fi&#351;ei, dup&#259; prima virgul&#259;. 
						<br><b>Aten&#355;ie: Nu este obligatoriu s&#259; existe!</b>
						
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/prenume-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaz&#259; &#351;i tu c&#226;mpul <b>Prenume Autor 1</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaz&#259; Prenume!</button></a>
			</div>
		</div>
		<div id="numesecundare-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Nume &#351;i Prenume adi&#355;ionale</center></h2>
					<p class="pop">
						&#206;n cazul &#238;n care exist&#259; mai mul&#355;i autori, necesari sunt doar primii trei. Autorul secundar &#351;i ter&#355;iar sunt dispu&#351;i &#238;n continuarea primului autor, respect&#226;nd acelea&#351;i reguli:
						<ul>
							<li class="pop-li">
								Nume Autor 2, Prenume Autor 2
							</li>
							<li class="pop-li">
								Nume Autor 3, Prenume Autor 3							
							</li>
						</ul>
						<br><b style="color: #1c110a;">Aten&#355;ie: Nu este obligatoriu s&#259; existe!</b>
						<br><b style="color: #1c110a;">Aten&#355;ie: Pentru a putea completa aceste c&#226;mpuri, ap&#259;sa&#355;i pe "Adaug&#259; autor 2" &#351;i "Adaug&#259; autor 3"</b>
						
					</p>
					<div class="row">
						<div class="col-md-6 col-lg-6 col-xs-6 col-sm-6" style="color: #1c110a; margin-top: 10px;">
							<center>Nume Autor 2</center>
						</div>
						<div class="col-md-6 col-lg-6 col-xs-6 col-sm-6" style="color: #1c110a; margin-top: 10px;">
							<center>Prenume Autor 2</center>
						</div>
					</div>
					<img class="col-md-offset-0 col-lg-offset-0 col-md-6 col-lg-6 col-xs-6 col-sm-6" src="../img/Tutorial/nume2-v1.png"/>
					<img class="col-md-offset-0 col-lg-offset-0 col-md-6 col-lg-6 col-xs-6 col-sm-6" src="../img/Tutorial/prenume2-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Pe aceast&#259; fi&#351;&#259; nu exist&#259; autori adi&#355;ionali. Treci la urm&#259;torul pas!
					</p>
					<a href="#titlu-tutorial"><button style="float:right;" class="start-button">Pasul Urm&#259;tor!</button></a>
			</div>
		</div>
		<div id="titlu-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Titlu</center></h2>
					<p class="pop">
							Titlul urmeaz&#259; imediat dup&#259; autori, p&#226;n&#259; la primul punct.
							
							
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/titlu-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaz&#259; &#351;i tu c&#226;mpul <b>Titlu</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaz&#259; Titlu!</button></a>
			</div>
		</div>
		<div id="corpfisa-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Corp Fi&#351;&#259;</center></h2>
					<p class="pop">
						Corpul fi&#351;ei urmeaz&#259; imediat dup&#259; titlu. Este tot textul p&#226;n&#259; la prima denumire de ora&#351;.
						
						
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/corp-fisa-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaz&#259; &#351;i tu c&#226;mpul <b>Corp Fi&#351;&#259;</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaz&#259; Corp Fi&#351;&#259;!</button></a>
			</div>
		</div>
		<div id="loc-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Loc de publicare</center></h2>
					<p class="pop">
						Locul de publicare urmeaz&#259; dup&#259; Corpul Fi&#351;ei. Este denumirea unui ora&#351; (ex: Cluj, Paris, Londra etc.)
						<br><br> Exist&#259; cazuri &#238;n care nu este specificat un loc de publicare. &#206;n locul acestuia este notat <b>f.l.</b> (f&#259;r&#259; loc) sau <b>s.l.</b>(sine loc). &#206;n aceste cazuri, c&#226;mpul <b>NU</b> trebuie completat!
						
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/oras-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaz&#259; &#351;i tu c&#226;mpul <b>Loc de publicare</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaz&#259; Loc de publicare!</button></a>
			</div>
		</div>
		<div id="editura-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Editura</center></h2>
					<p class="pop">
						Editura urmeaz&#259; dup&#259; locul de publicare.
						<br><b>Aten&#355;ie: Nu este obligatoriu s&#259; existe!</b>
						
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/editura-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaz&#259; &#351;i tu c&#226;mpul <b>Editura</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaz&#259; editura</button></a>
			</div>
		</div>
		<div id="an-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>An de publicare</center></h2>
					<p class="pop">
						Anul urmeaz&#259; dup&#259; editur&#259;. &#206;n cazul &#238;n care editura nu este specificat&#259;, acesta urmeaz&#259; dup&#259; locul de publicare.
						<br><br> Exist&#259; cazuri &#238;n care nu este specificat anul de publicare. &#206;n locul acestuia este notat <b>f.a.</b> (f&#259;r&#259; an) sau <b>s.a.</b>(sine ano). &#206;n aceste cazuri, c&#226;mpul <b>NU</b> trebuie completat!
						<br><b>Aten&#355;ie: Nu este obligatoriu s&#259; existe!</b>
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/an-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaz&#259; &#351;i tu c&#226;mpul <b>An de publicare</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaz&#259; An de publicare!</button></a>
			</div>
		</div>
		<div id="paginatie-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Pagina&#355;ie</center></h2>
					<p class="pop">
							Pagina&#355;ia urmeaz&#259; dup&#259; anul de publicare (&#238;n cazul &#238;n care exist&#259;). Acesta este format dintr-un num&#259;r din cifre arabe, urmat de <b>p.</b><br><br>
							<b>NU</b> trebuie ad&#259;ugat&#259; termina&#355;ia "p." sau alte informa&#355;ii adi&#355;ionale ( <u><em>DOAR</em></u> num&#259;rul din cifre arabe ).
							
							
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/paginatie-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaz&#259; &#351;i tu c&#226;mpul <b>Pagina&#355;ie</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaz&#259; Pagina&#355;ie!</button></a>
			</div>
		</div>
		<div id="note-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Note</center></h2>
					<p class="pop col-md-12 col-lg-12 col-xs-12 col-sm-12">
							Notele urmeaz&#259; dup&#259; dimensiunea c&#259;r&#355;ilor (ex: 205 x 147 mm).
							<br><b>Aten&#355;ie: Dimensiunea c&#259;r&#355;ilor <u>NU</u> trebuie trecut&#259; &#238;n note!</b>
							<br>Notele sunt, &#238;n general, reprezentate printr-o descriere sau prin informa&#355;ii adi&#355;ionale legate de con&#355;inutul c&#259;rtii &#351;i nu date precum: pre&#355; / &#238;ntreprindere poligrafic&#259; / colaboratori etc.
							
							
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/note-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Pe aceast&#259; fi&#351;&#259; nu exist&#259; c&#226;mpul <b>Note</b>. Treci la urm&#259;torul pas!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Pasul Urm&#259;tor!</button></a>
			</div>
		</div>

		<div id="numarparti-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Num&#259;r de p&#259;r&#355;i ale fi&#351;ei</center></h2>
					<p class="pop col-md-12 col-lg-12 col-xs-12 col-sm-12">
							Num&#259;rul de poze pe care se intinde o fi&#351;&#259;		
					</p>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaz&#259; &#351;i tu c&#226;mpul <b>Num&#259;r de p&#259;r&#355;i ale fi&#351;ei</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaz&#259; Num&#259;r de p&#259;r&#355;i ale fi&#351;ei!</button></a>
			</div>
		</div>

		<div id="final-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Felicit&#259;ri!</center></h2>
					<p class="pop">
							

							
							
					</p>
					
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						<b>Ai ajuns la finalul tutorialului! <br><br></b>
							Pentru completarea corect&#259; a c&#226;mpurilor, ai primit: <b>5 puncte!</b> <br>
						Completeaz&#259; &#351;i alte fi&#351;e pentru a aduna c&#226;t mai multe puncte!
					</p>
					<button id="FinalButton" style="float:right;" class="start-button">Completeaz&#259; Fi&#351;e!</button></a>
			</div>
		</div>

		<div class="form-group row col-md-12 col-lg-12 col-xs-12 col-sm-12">
		
			<div id="pics" class="deCompletat col-md-6 col-lg-6 col-xs-12 col-sm-12">
				<div id="poze">
					<img id="randPath" src="../fiseCTV/IRO - ISA/IRO - ISA_1061.jpg"/>
				</div>
				
			</div>
			<div class="deCompletat col-md-6 col-lg-6 col-xs-12 col-sm-12"
				<form id="captchaForm">
					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="ref" placeholder="Cot&#259;" required>
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<a href="#cota"><button class="info-btn"><b>i</b></button></a>
							
						</div>
					</div>
					
					<div id="inputAuthor" class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="author1last" placeholder="Nume Autor 1">	
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<a href="#nume1"><button class="info-btn"><b>i</b></button></a>
						</div>
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px; margin-top:10px;" type="text" class="form-control" id="author1first" placeholder="Prenume Autor 1">
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<a href="#prenume1"><button class="info-btn-second"><b>i</b></button></a>
						</div>
					</div>

					<div id="inputbtn" class="form-group row btn-autor-nou col-md-12 col-lg-12 col-xs-12 col-sm-12">
 						<i style="cursor:hand;" class="fa fa-plus-circle fa-2x" id="author1btn"></i>
 						<i class="alex" id="aut2"> Adaug&#259; autor 2</i>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="title" placeholder="Titlu" required>
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<a href="#titlu"><button type="button" class="info-btn"><b>i</b></button></a>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<textarea class="form-group row col-md-12 col-lg-12 col-xs-12 col-sm-12" style="height:auto; font-size:1.2em; margin-left:1px; margin-bottom:15px;" id="filebody" placeholder="Corp Fiș&#259;" required></textarea>
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<a href="#corp"><button type="button" class="info-btn"><b>i</b></button></a>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="place" placeholder="Loc de publicare">
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<a href="#loc"><button type="button" class="info-btn"><b>i</b></button></a>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="publishing" placeholder="Editur&#259;">
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<a href="#editura"><button type="button" class="info-btn"><b>i</b></button></a> 
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="year" placeholder="An de publicare">
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<a href="#an"><button type="button" class="info-btn"><b>i</b></button></a>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="pagination" placeholder="Pagina&#355;ie">
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<a href="#paginatie"><button type="button" class="info-btn"><b>i</b></button></a>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<textarea class="form-group row col-md-12 col-lg-12 col-xs-12 col-sm-12" style="height:auto; font-size:1.2em; margin-left:1px; margin-bottom:-2px;" id="descr" placeholder="Note"></textarea>
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<a href="#note"><button type="button" class="info-btn"><b>i</b></button></a>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px; margin-top: 10px;" type="text" class="form-control" id="parts" placeholder="Num&#259;r de p&#259;r&#355;i ale fi&#351;ei">
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<a href="#numarparti-tutorial"><button type="button" class="info-btn"><b>i</b></button></a>
						</div>
					</div>
						
						
					<div style="text-align: center;" class="form-group row col-md-12 col-lg-12 col-xs-12 col-sm-12">
						<input type="submit" id="submit" style="margin-top:20px;" class="btn btn-secondary col-sm-10 col-lg-10 col-xs-10 col-m-10 sbmt-btn" name="submit" value="Submit" >
					</div>
				</form>
			</div>
		</div>
				
			
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../js/jquery.notifyBar.js"></script>
		<script>
			$(function(){
				var checked = [];
				$(document).on("input",function(){

					var ref = $("#ref").val();
					var author1last = $("#author1last").val().toUpperCase();
					var author1first = $("#author1first").val().toUpperCase();
					var title = $("#title").val().toUpperCase();
					var body = $("#filebody").val().toUpperCase();
					var place = $("#place").val().toUpperCase();
					var publishing = $("#publishing").val().toLocaleUpperCase();
					var year = $("#year").val();
					var pagination = $("#pagination").val();
					var parts = $("#parts").val();

					var cota = "II 10828";
					var prenume = "MAGDA";
					var nume = "ISANOS";
					var titlu = "ȚARA LUMINII";
					var corp = "VERSURI"
					var editura = "EDITURA PENTRU LITERATURĂ ȘI ARTĂ";
					var an = "1946";
					var paginatie = "79";
					var loc = "BUCUREȘTI";
					var parti = "1";


					if (title.indexOf('Ţ') > -1) {
						title = title.replace(/Ţ/g, 'Ț');
					}

					if (publishing.indexOf('Ş') > -1) {
						publishing = publishing.replace(/Ş/g, "Ș");
					}

					if(ref == cota && checked[0] != 1){
						checked[0] = 1;
						$('#ref').blur();
						setTimeout(function () {
							window.location.href = "#nume-tutorial";
						}, 500);
					}

					if(author1last == nume && checked[0] == 1 && checked[1] != 1){
						checked[1] = 1;
						$('#author1last').blur();
						setTimeout(function () {
							window.location.href = "#prenume-tutorial";
						}, 500);
					}

					if(author1first == prenume && checked[1] == 1 && checked[2] != 1){
						checked[2] = 1;
						$('#author1first').blur();
						setTimeout(function () {
							window.location.href = "#titlu-tutorial";
						}, 500);
					}

					if(title == titlu && checked[2] == 1 && checked[3] != 1){
						checked[3] = 1;
						$('#title').blur();
						setTimeout(function () {
							window.location.href = "#corpfisa-tutorial";
						}, 500);
					}

					if(body == corp && checked[3] == 1 && checked[4] != 1){
						checked[4] = 1;
						$('#body').blur();
						setTimeout(function () {
							window.location.href = "#loc-tutorial";
						}, 500);
					}

					if(place == loc && checked[4] == 1 && checked[5] != 1){
						checked[5] = 1;
						$('#place').blur();
						setTimeout(function () {
							window.location.href = "#editura-tutorial";
						}, 500);
					}

					if(publishing == editura && checked[5] == 1 && checked[6] != 1){
						checked[6] = 1;
						$('#publishing').blur();
						setTimeout(function () {
							window.location.href = "#an-tutorial";
						}, 500);
					}

					if(year == an && checked[6] == 1 && checked[7] != 1){
						checked[7] = 1;
						$('#year').blur();
						setTimeout(function () {
							window.location.href = "#paginatie-tutorial";
						}, 500);
					}

					if(pagination == paginatie && checked[7] == 1 && checked[8] != 1){
						checked[8] = 1;
						$('#pagination').blur();
						setTimeout(function () {
							window.location.href = "#numarparti-tutorial";
						}, 500);
					}

					if(parts == parti && checked[8] == 1 && checked[9] != 1){
						checked[9] = 1;
						$('#parts').blur();
						setTimeout(function () {
							window.location.href = "#final-tutorial";
						}, 500);
					}



				});
				$(document).on("click", "#newPart", function(){
					<?php
						$exists = 1;
						$aux = $book;
						$arr = explode("_", $aux, 2);
						$newBook = $arr[0] . "_";
						if(strpos($arr[1], "_") != false){
							$auxArr = explode("_", $arr[1]);
							$newBook = $newBook . $auxArr[0] . "_";
							$part = explode(".", $auxArr[1]);
							$nr = (int)$part[0];
							$nr++;
							$newBook = $newBook . $nr . ".jpg";
							if(file_exists($newBook) == false){
								$newBook = $book;
								$exists = 0;
							}							
						}
						else{
							$auxArr = explode(".", $arr[1]);
							$nr = (int)$auxArr[0];
							$nr++;
							$newBook = $newBook . $nr . ".jpg";
							if(file_exists($newBook) == false){
								$newBook = $book;
								$exists = 0;
							}	
						}
						$book = $newBook;
					?>
					var exists = <?php echo $exists ?>;
					if (exists == 1){
						var newInput = $('<img id="randPath" src="<?php echo $book ?>"/>');
						$('#poze').append(newInput);
					}
					else{
						$.notifyBar({
        					cssClass: "error",
        					html: "Partea a doua de la aceasta poza nu exista"
        				});
					}
				});
				$('#author1btn').on("click", function(){
					var newInput = $('<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11"><input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px; margin-top:10px;" type="text" class="form-control" id="author2last" placeholder="Nume Autor2"></div><div class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><a href="#nume2"><button type="button" class="info-btn-second"><b>i</b></button></a></div>');
					$('#inputAuthor').append(newInput);
					newInput = $('<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11"><input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px; margin-top:10px;" type="text" class="form-control" id="author2first" placeholder="Prenume Autor2"></div><div class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><a href="#prenume2"><button type="button" class="info-btn-second"><b>i</b></button></a></div>');
					$('#inputAuthor').append(newInput);
					newInput = $('<div id="inputbtn" class="form-group row btn-autor-nou col-md-12 col-lg-12 col-xs-12 col-sm-12"><i style="cursor:hand;" class="fa fa-plus-circle fa-2x row" id="author2btn"></i><i class="alex-second" id="aut3"> Adauga autor 3</i></div>');
					$('#author1btn').remove();
					$('#aut2').remove();
					$('#inputbtn').append(newInput);

				});

				$(document).on("click", "#author2btn", function(){
					var newInput = $('<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11"><input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px; margin-top:10px;" type="text" class="form-control" id="author3last" placeholder="Nume Autor3"></div><div class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><a href="#nume3"><button type="button" class="info-btn-second"><b>i</b></button></a></div>');
					$('#inputAuthor').append(newInput);
					newInput = $('<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11"><input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px; margin-top:10px;" type="text" class="form-control" id="author3first" placeholder="Prenume Autor3"></div><div class="col-md-1 col-lg-1 col-xs-1 col-sm-1"><a href="#prenume3"><button type="button" class="info-btn-second"><b>i</b></button></a></div>');
					$('#inputAuthor').append(newInput);
						$('#inputAuthor').append(newInput);
						$('#aut3').remove();
						$('#author2btn').remove();
				});

				$('#FinalButton').on("click", function(){
					var email = "<?php echo $_SESSION['user']['Email']; ?>";
					var dataFinal = 'email=' + email;
					$.ajax({
						url: 'givePoints.php',
						type:'POST',
						data: dataFinal,
						success: function(response){
							if (response.success) {
								window.location="http://bookathon.bibnat.ro/tutorial/#close";
								$.notifyBar({
		        					cssClass: "success",
		        					html: "Felicitari!"
		        				});
								setTimeout(function(){
		            					window.location="http://bookathon.bibnat.ro/captcha";
		            			}, 2000);
	            			} else {
	            				alert("NOT OK");
	            				$.notifyBar({
		        					cssClass: "error",
		        					html: "Ati mai completat o data tutorialul"
		        				});
	            			}
						}
					});
				});
			});
		</script>
	</body>
	


</html>
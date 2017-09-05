<?php
	require_once "../config.php";

	if(empty($_SESSION['user'])){
		header("Location: /login");
	}
	
	$books = array();
	$sqlPath = "SELECT path FROM one order by sertar ASC LIMIT 100";
	$result1 = $conn->query($sqlPath);
	$nr1 = (int)mysqli_num_rows($result1);
	for ($j = 1; $j <= $nr1; $j++) {
		$row1 = $result1->fetch_assoc();
		$books[$j - 1] = $row1['path'];
	}
	
	$conn->close();
	
?>

<html>
	<head>
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
					<h2>Cota</h2>
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
					<h2>Editura</h2>
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
					<h2 class="mrg-bottom"><center>Salutare, invatacelule!</center></h2>
					<p class="pop">
						Acesta este un tutorial pentru a te familiariza cu completarea campurilor.
					</p>
					<p class="pop">
						In partea de sus a paginii exista toate diacriticele. Tu trebuie doar sa le copiezi unde este nevoie!<br>
						In cazul in care pe o fisa apare textul "Vezi fisa urm.", apasa pe butonul "Adauga poza noua" de sub imagine principala,
						pentru a incarca continuarea fisei.<br>

					</p>
					<a href="#cota-tutorial"><button style="float:right;" class="start-button">Incepe tutorialul!</button></a>
			</div>
		</div>
		<div id="cota-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Cota</center></h2>
					<p class="pop">
						Cota este pozitionata in partea dreapta-sus a cartelelor. Este alcatuita din 2 parti:
						<ul>
							<li class="pop-li">
								un numar roman de la <b>I</b> pana la <b>V</b> (<b>I, II, III, IV, V</b>), <b>A</b> sau <b>ARS</b> urmat de un spatiu gol
							</li>
							<li class="pop-li">
								un numar format din 5-6 cifre arabe (<b>0..9</b>)
							</li>
						</ul>
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/cota-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaza si tu campul <b>Cota</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaza Cota!</button></a>
			</div>
		</div>
		<div id="nume-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Nume</center></h2>
					<p class="pop">
						Numele primului autor se gaseste pe prima linie a fisei, pana la prima virgula. 
						<br><b>Atentie: Nu este obligatoriu sa existe!</b>
						
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/nume-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaza si tu campul <b>Nume Autor 1</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaza Nume!</button></a>
			</div>
		</div>
		<div id="prenume-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Prenume</center></h2>
					<p class="pop">
						Preumele primului autor se gaseste pe prima linie a fisei, dupa prima virgula. 
						<br><b>Atentie: Nu este obligatoriu sa existe!</b>
						
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/prenume-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaza si tu campul <b>Prenume Autor 1</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaza Prenume!</button></a>
			</div>
		</div>
		<div id="numesecundare-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Nume si Prenume aditionale</center></h2>
					<p class="pop">
						In cazul in care exista mai multi autori, necesari sunt doar primii trei. Autorul secundar si tertiar sunt dispusi in continuare primului autor, respectand aceleasi reguli:
						<ul>
							<li class="pop-li">
								Nume Autor 2, Prenume Autor 2
							</li>
							<li class="pop-li">
								Nume Autor 3, Prenume Autor 3							
							</li>
						</ul>
						<br><b style="color: #1c110a;">Atentie: Nu este obligatoriu sa existe!</b>
						<br><b style="color: #1c110a;">Atentie: Pentru a putea completa aceste campuri, apasati pe "Adauga autor 2" si "Adauga autor 3"</b>
						
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
						Pe aceasta fisa nu exista autori aditionali. Treci la urmatorul pas!
					</p>
					<a href="#titlu-tutorial"><button style="float:right;" class="start-button">Pasul Urmator!</button></a>
			</div>
		</div>
		<div id="titlu-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Titlu</center></h2>
					<p class="pop">
							Titlul urmeaza imediat dupa autori, pana la primul punct.
							
							
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/titlu-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaza si tu campul <b>Titlu</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaza Titlu!</button></a>
			</div>
		</div>
		<div id="corpfisa-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Corp Fisa</center></h2>
					<p class="pop">
						Corpul fisei urmeaza imediat dupa titlu. Este tot textul pana la prima denumire de oras.
						
						
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/corp-fisa-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaza si tu campul <b>Corp Fisa</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaza Corp Fisa!</button></a>
			</div>
		</div>
		<div id="loc-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Loc de publicare</center></h2>
					<p class="pop">
						Locul de publicare urmeaza dupa Corpul Fisei. Este denumirea unui oras (ex: Cluj, Paris, Londra etc.)
						<br><br> Exista cazuri in care nu este spcificat un loc de publicare. In locul acestuia este notat <b>f.l.</b> (fara loc) sau <b>s.l.</b>(sine loc). In aceste cazuri, campul <b>NU</b> trebuie completat!
						
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/oras-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaza si tu campul <b>Loc de publicare</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaza Loc de publicare!</button></a>
			</div>
		</div>
		<div id="editura-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Editura</center></h2>
					<p class="pop">
						Editura urmeaza dupa locul de publicare.
						<br><b>Atentie: Nu este obligatoriu sa existe!</b>
						
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/editura-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Pe aceasta fisa nu este trecuta editura. Treci la pasul urmator!
					</p>
					<a href="#an-tutorial"><button style="float:right;" class="start-button">Pasul Urmator!</button></a>
			</div>
		</div>
		<div id="an-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>An de publicare</center></h2>
					<p class="pop">
						Anul urmeaza dupa editura. In cazul in care editura nu este specificata, acesta urmeaza dupa locul de publicare.
						<br><br> Exista cazuri in care nu este spcificat anul de publicare. In locul acestuia este notat <b>f.a.</b> (fara an) sau <b>s.a.</b>(sine ano). In aceste cazuri, campul <b>NU</b> trebuie completat!
						<br><b>Atentie: Nu este obligatoriu sa existe!</b>
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/an-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaza si tu campul <b>An de publicare</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaza An de publicare!</button></a>
			</div>
		</div>
		<div id="paginatie-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Paginatie</center></h2>
					<p class="pop">
							Paginatia urmeaza dupa anul de publicare (in cazul in care exista). Acesta este format dintr-un numar din cifre arabe, urmat de <b>p.</b><br><br>
							<b>NU</b> trebuie adaugata terminatia "p." sau alte informatii aditionale ( <u><em>DOAR</em></u> numarul din cifre arabe ).
							
							
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/paginatie-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaza si tu campul <b>Paginatie</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaza Paginatie!</button></a>
			</div>
		</div>
		<div id="note-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Note</center></h2>
					<p class="pop col-md-12 col-lg-12 col-xs-12 col-sm-12">
							Notele urmeaza dupa dimensiunea cartilor (ex: 205 x 147 mm).
							<br><b>Atentie: Dimensunea cartilor <u>NU</u> trebuie trecuta in note!</b>
							<br>Notele sunt, in genereal, reprezentate printr-o descriere sau prin informatii aditionale legate de continutul cartii si nu date precum: pret / intreprindere poligrafica / colaboratori etc.
							
							
					</p>
					<img class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8 col-xs-12 col-sm-12" src="../img/Tutorial/note-v1.png"/>
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						Acum completeaza si tu campul <b>Note</b>!
					</p>
					<a href="#close"><button style="float:right;" class="start-button">Completeaza Note!</button></a>
			</div>
		</div>
		<div id="final-tutorial" class="modalDialog">
			<div class="col-md-6 col-md-offset-3 col-lg-offset-3 col-xs-offset-1 col-sm-offset-1 col-lg-6 col-xs-10 col-sm-10">
					<h2 class="mrg-bottom"><center>Felicitari!</center></h2>
					<p class="pop">
							

							
							
					</p>
					
					<p class="col-md-12 col-lg-12 col-xs-12 col-sm-12 pop">
						<b>Ai ajuns la finalul tutorialului! <br><br></b>
							Pentru completarea corecta a campurilor, ai primit: <b>5 puncte!</b> <br>
						Completeaza si alte fise pentru a aduna cat mai multe puncte!
					</p>
					<a href="http://bookathon.bibnat.ro/captcha"><button style="float:right;" class="start-button">Completeaza Fise!</button></a>
			</div>
		</div>

		<div class="form-group row col-md-12 col-lg-12 col-xs-12 col-sm-12">
		
			<div id="pics" class="deCompletat col-md-6 col-lg-6 col-xs-12 col-sm-12">
				<div id="poze">
					<img id="randPath" src="<?php echo $book ?>"/>
				</div>
				<div class="form-group row col-md-12 col-lg-12 col-xs-12 col-sm-12">
 						<i style="cursor:hand;" class="fa fa-plus-circle fa-2x" id="newPart"></i>
 						<i class="alex-second" id="pozabtn"> Adauga poza noua</i>
				</div>
			</div>
			<div class="deCompletat col-md-6 col-lg-6 col-xs-12 col-sm-12"
				<form id="captchaForm">
					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="ref" placeholder="Cota" required>
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
 						<i class="alex" id="aut2"> Adauga autor 2</i>
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
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="title" placeholder="Corp Fisa" required>
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
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="publishing" placeholder="Editura">
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
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="pagination" placeholder="Paginatie">
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
					//alert(<?php echo $book ?>);
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
				$(document).on("click", "#submit", function()
				{
					var ref = $("#ref").val();
					var author1last = $("#author1last").val();
					var author1first = $("#author1first").val();
					var author2last = $("#author2last").val();
					var author2first = $("#author2first").val();
					var author3 = $("#author3").val();
					var title = $("#title").val();
					var info_title = $("#info_title").val();
					var edition = $("#edition").val();
					var place = $("#place").val();
					var publishing = $("#publishing").val();
					var year = $("#year").val();
					var descr = $("#descr").val();
					var pagination = $("#pagination").val();
					var path = <?php echo json_encode($book); ?>;
					var dataString = 'ref=' + ref.toUpperCase() + '&title=' + title.toUpperCase() + '&path=' + path;
					

					if (ref.trim() == '' || title.trim() == ''){
						alert('Nu ati introdus toate datele');
					} else {
						if (author1last != null){
							dataString = dataString + '&author1last=' + author1last.toUpperCase();
						}

						if (author1first != null){
							dataString = dataString + '&author1first=' + author1first.toUpperCase();
						}

						if (author2last != null){
							dataString = dataString + '&author2last=' + author2last.toUpperCase();
						}

						if (author2first != null){
							dataString = dataString + '&author2first=' + author2first.toUpperCase();
						}


						if (author3 != null){
							dataString = dataString + '&author3=' + author3.toUpperCase();
						}

						if (info_title != null){
							dataString = dataString + '&info_title=' + info_title.toUpperCase();
						}

						if (edition != null){
							dataString = dataString + '&edition=' + edition.toUpperCase();
						}

						if (place != null){
							dataString = dataString + '&place=' + place.toUpperCase();
						}

						if (year != null){
							dataString = dataString + '&year=' + year.toUpperCase();
						}

						if (publishing != null){
							dataString = dataString + '&publishing=' + publishing.toUpperCase();
						}

						if (pagination != null){
							dataString = dataString + '&pagination=' + pagination.toUpperCase();
						}

						if (descr != null){
							dataString = dataString + '&descr=' + descr.toUpperCase();
						}

					
						$.ajax({
							url: 'sendToBuf.php',
							type:'POST',
							data: dataString,
							success: function(response){
								if (response.success) {
									$.notifyBar({
		            					cssClass: "success",
		            					html: "Thanks for your submission"
		            				});
		            				setTimeout(function(){
		            					window.location="http://bookathon.bibnat.ro/captcha";
		            				}, 2000);
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
	</body>
	


</html>
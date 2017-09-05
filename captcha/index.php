<?php
	require_once "../config.php";

	if(empty($_SESSION['user'])){
		header("Location: /login/");
	}

	$sql = "SELECT tutorial FROM users where Email='" . $_SESSION['user']['Email'] . "';";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	// if($row['tutorial'] == 1){
		// header("Location: /tutorial/#start");
	// }
	
	$books = array();
	$sqlPath = "SELECT path FROM one order by path ASC LIMIT 650,250";
	$result = $conn->query($sqlPath);
	$nr = (int)mysqli_num_rows($result);
	for ($j = 1; $j <= $nr; $j++) {
		$row = $result->fetch_assoc();
		$books[$j - 1] = $row['path'];
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
		<link rel="stylesheet" href="css/mystyle.css">
		
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
	
	
	<body>
	<div>
		<div class="row col-md-2 col-md-offset-5 col-lg-offset-5 col-xs-offset-5 col-sm-offset-5 col-lg-2 col-xs-2 col-sm-2">

			<center><a href="http://bookathon.bibnat.ro"><img src="images/image.png"/></a></center>
		</div>
		<div class="under-pic col-md-offset-3 col-lg-offset-3 col-xs-offset-3 col-sm-offset-3 col-md-2 col-lg-2 col-xs-2 col-sm-2">
			<button id="btnClasament" data-toggle="modal" data-target="#clasament">Clasament</button>
		</div>
	</div>
	<div class="row newLine col-md-12 col-lg-12 col-xs-12 col-sm-12">
	    <hr>
	</div>

		<?php
			$valid = false;
			$pos = 0;
			while($valid == false){
				$valid = true;
				$pos = mt_rand(0, 300);
				$book = "../" . $books[$pos];

				$sql = "SELECT path from captchaBuffer where path='" . $book . "' and email='" . $_SESSION['user']['Email'] . "';";
				$result = $conn->query($sql);
				$nr = (int)mysqli_num_rows($result);

				if($nr > 0){
					$valid = false;
				}
				else{
					$aux = $book;
					$arr = explode("_", $aux, 2);
					if(strpos($arr[1], "_") != false){
									$auxArr = explode("_", $arr[1]);
									$part = explode(".", $auxArr[1]);
									$nr = (int)$part[0];
									if($nr > 1){
										$valid = false;
									}
					}
				}
			}
			$_SESSION['book'] = $book;
			$original = $books[$pos];

		?>
		
		<ul class="diacritice col-md-10 col-md-offset-2 col-lg-offset-2 col-xs-offset-1 col-sm-offset-1 col-lg-10 col-xs-10 col-sm-10">
			<button class="col-xs-3 col-md-1 btn btn-lg btn-secondary">&#194;</button>
			<button class="col-xs-3 col-md-1 btn btn-lg btn-secondary">&#226;</button>
			<button class="col-xs-3 col-md-1 btn btn-lg btn-secondary">&#258;</button>
			<button class="col-xs-3 col-md-1 btn btn-lg btn-secondary">&#259;</button>
			<button class="col-xs-3 col-md-1 btn btn-lg btn-secondary">&#206;</button>
			<button class="col-xs-3 col-md-1 btn btn-lg btn-secondary">&#238;</button>
			<button class="col-xs-3 col-md-1 btn btn-lg btn-secondary">&#537;</button>
			<button class="col-xs-3 col-md-1 btn btn-lg btn-secondary">&#536;</button>
			<button class="col-xs-3 col-md-1 btn btn-lg btn-secondary">&#539;</button>
			<button class="col-xs-3 col-md-1 btn btn-lg btn-secondary">&#538;</button>
		</ul>

		<div id="clasament" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title"><center>Clasament <br>(dup&#259; num&#259;rul total de puncte)</h2>
					</div>
					<div class="modal-body" id="clasDiv">
					</div>
				</div>
			</div>
		</div>

		<div id="nrparti" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Num&#259;r P&#259;r&#355;i</h2>
					</div>
					<div class="modal-body">
						<p class="pop">Num&#259;rul de poze pe care se &#238;ntinde o fi&#351;&#259;.</p>
					</div>
				</div>
			</div>
		</div>

		<div id="cota" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Cot&#259;</h2>
					</div>
					<div class="modal-body">
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
						<img class="img-responsive" src="../img/Tutorial/cota-v1.png"/>
					</div>
				</div>
			</div>
		</div>
		
		<div id="nume1" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Nume</h2>
					</div>
					<div class="modal-body">
						<p class="pop">
							Numele primului autor se g&#259;se&#351;te pe prima linie a fi&#351;ei, p&#226;n&#259; la prima virgul&#259;. 
							<br><b>Aten&#355;ie: Nu este obligatoriu s&#259; existe!</b>
							
						</p>
						<img class="img-responsive" src="../img/Tutorial/nume-v1.png"/>
					</div>
				</div>
			</div>
		</div>
		<div id="prenume1" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Prenume</h2>
					</div>
					<div class="modal-body">
						<p class="pop">
							Prenumele primului autor se g&#259;se&#351;te pe prima linie a fi&#351;ei, dup&#259; prima virgul&#259;. 
							<br><b>Aten&#355;ie: Nu este obligatoriu s&#259; existe!</b>
							
						</p>
						<img class="img-responsive" src="../img/Tutorial/prenume-v1.png"/>
					</div>
				</div>
			</div>
		</div>
		<div id="nume2" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Nume</h2>
					</div>
					<div class="modal-body">
						<img class="img-responsive`" src="../img/Tutorial/nume2-v1.png" />
					</div>
				</div>
			</div>
		</div>
		<div id="prenume2" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Prenume</h2>
					</div>
					<div class="modal-body">
						<img class="img-responsive" src="../img/Tutorial/prenume2-v1.png" />
					</div>
				</div>
			</div>
		</div>
		<div id="nume3" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Nume</h2>
					</div>
					<div class="modal-body">
						<img class="img-responsive" src="../img/Tutorial/nume3-v1.png" />
					</div>
				</div>
			</div>
		</div>
		<div id="prenume3" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Prenume</h2>
					</div>
					<div class="modal-body">
						<img class="img-responsive" src="../img/Tutorial/prenume3-v1.png" />
					</div>
				</div>
			</div>
		</div>
		<div id="titlu" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Titlu</h2>
					</div>
					<div class="modal-body">
						<p class="pop">Titlul urmeaz&#259; imediat dup&#259; autori, p&#226;n&#259; la primul punct.</p>
						<img class="img-responsive" src="../img/Tutorial/titlu-v1.png"/>
					</div>
				</div>
			</div>
		</div>
		<div id="corp" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Corp Fi&#351;&#259;</h2>
					</div>
					<div class="modal-body">
						<p class="pop">Corpul fi&#351;ei urmeaz&#259; imediat dup&#259; titlu. Este tot textul p&#226;n&#259; la prima denumire de ora&#351;.</p>
						<img class="img-responsive" src="../img/Tutorial/corp-fisa-v1.png"/>
					</div>
				</div>
			</div>
		</div>
		<div id="loc" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Loc de publicare</h2>
					</div>
					<div class="modal-body">
						<p class="pop">
							Locul de publicare urmeaz&#259; dup&#259; Corpul Fi&#351;ei. Este denumirea unui ora&#351; (ex: Cluj, Paris, Londra etc.)
							<br><br> Exist&#259; cazuri &#238;n care nu este specificat un loc de publicare. &#206;n locul acestuia este notat <b>f.l.</b> (f&#259;r&#259; loc) sau <b>s.l.</b>(sine loc). &#206;n aceste cazuri, c&#226;mpul <b>NU</b> trebuie completat!
							
						</p>
						<img class="img-responsive" src="../img/Tutorial/oras-v1.png"/>
					</div>
				</div>
			</div>
		</div>
		<div id="editura" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Editura</h2>
					</div>
					<div class="modal-body">
						<p class="pop">
							Editura urmeaz&#259; dup&#259; locul de publicare.
							<br><b>Aten&#355;ie: Nu este obligatoriu s&#259; existe!</b>
							
						</p>
						<img class="img-responsive" src="../img/Tutorial/editura-v1.png"/>
					</div>
				</div>
			</div>
		</div>
		<div id="an" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">An de publicare</h2>
					</div>
					<div class="modal-body">
						<p class="pop">
							Anul urmeaz&#259; dup&#259; editur&#259;. &#206;n cazul &#238;n care editura nu este specificat&#259;, acesta urmeaz&#259; dup&#259; locul de publicare.
							<br><br> Exist&#259; cazuri &#238;n care nu este specificat anul de publicare. &#206;n locul acestuia este notat <b>f.a.</b> (f&#259;r&#259; an) sau <b>s.a.</b>(sine ano). &#206;n aceste cazuri, c&#226;mpul <b>NU</b> trebuie completat!
							<br><b>Aten&#355;ie: Nu este obligatoriu s&#259; existe!</b>
						</p>
						<img class="img-responsive" src="../img/Tutorial/an-v1.png"/>
					</div>
				</div>
			</div>
		</div>
		<div id="paginatie" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Pagina&#355;ie</h2>
					</div>
					<div class="modal-body">
						<p class="pop">
							Pagina&#355;ia urmeaz&#259; dup&#259; anul de publicare (&#238;n cazul &#238;n care exist&#259;). Acesta este format dintr-un num&#259;r din cifre arabe, urmat de <b>p.</b><br><br>
							<b>NU</b> trebuie ad&#259;ugat&#259; termina&#355;ia "p." sau alte informa&#355;ii adi&#355;ionale ( <u><em>DOAR</em></u> num&#259;rul din cifre arabe ).
						</p>
						<img class="img-responsive" src="../img/Tutorial/paginatie-v1.png"/>
					</div>
				</div>
			</div>
		</div>
		<div id="note" tabindex="-1" role="dialog" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title">Note</h2>
					</div>
					<div class="modal-body">
						<p class="pop col-md-12 col-lg-12 col-xs-12 col-sm-12">
							Notele urmeaz&#259; dup&#259; dimensiunea c&#259;r&#355;ilor (ex: 205 x 147 mm).
							<br><b>Aten&#355;ie: Dimensiunea c&#259;r&#355;ilor <u>NU</u> trebuie trecut&#259; &#238;n note!</b>
							<br>Notele sunt, &#238;n general, reprezentate printr-o descriere sau prin informa&#355;ii adi&#355;ionale legate de con&#355;inutul c&#259;rtii &#351;i nu date precum: pre&#355; / &#238;ntreprindere poligrafic&#259; / colaboratori etc.
						</p>
						<img class="img-responsive" src="../img/Tutorial/note-v1.png"/>
					</div>
				</div>
			</div>
		</div>


		<div class="form-group row col-md-12 col-lg-12 col-xs-12 col-sm-12">
		
			<div id="pics" class="deCompletat col-md-6 col-lg-6 col-xs-12 col-sm-12">
				<div id="poze">
					<img id="randPath" src="<?php echo $book ?>"/>
				</div>
				<div class="row col-md-12 col-lg-12 col-xs-12 col-sm-12 under-pic">
					<div class="col-md-7 col-lg-7 col-xs-7 col-sm-7" id="newPart" style="cursor:hand;">
 						<i class="fa fa-plus-circle fa-2x"></i>
 						<i class="alex-second" id="pozabtn"> Adaug&#259; poz&#259; nou&#259;</i>
 					</div>
 					<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2">
 						<button data-toggle="modal" data-target="#confirm-modal">Raporteaz&#259;</button></a>
 					</div>
 					<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
 						<a href="http://bookathon.bibnat.ro/captcha"><button>Sari peste</button></a>
 					</div>
				</div>

			</div>
			<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog">
			    <div class="modal-dialog modal-lg">
			        <div class="modal-content">
			            <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			                <h2>Confirm&#259; ac&#355;iunea</h2>
			            </div>
			            <div class="modal-body">
			              	<p style="font-size: x-large;">Aceast&#259; func&#355;ie are rolul de a identifica fi&#351;ele care au text ilizibil sau sunt scrise intr-un alfabet de nereprodus(chirilic, grecesc, etc.). E&#351;ti sigur c&#259; vrei s&#259; raportezi?</p>
			            </div>
			            <div class="modal-footer">
			              	<button type="button" class="btn btn-lg btn-danger" data-dismiss="modal" id="flag">Da</button>
			              	<button type="button" class="btn btn-lg btn-success" data-dismiss="modal">Nu</button>
			            </div>
			        </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<div class="deCompletat col-md-6 col-lg-6 col-xs-12 col-sm-12"
				<form id="captchaForm">
					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="ref" placeholder="Cot&#259;" required>
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<button data-toggle="modal" data-target="#cota" class="info-btn"><b>i</b></button>
							
						</div>
					</div>
					
					<?php for ($i = 0; $i < 3; $i++) : ?>
					<div id="inputAuthor<?php echo $i+1; ?>" class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="author<?php echo $i+1; ?>last" placeholder="Nume Autor <?php echo $i+1; ?>">	
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<button data-toggle="modal" data-target="#nume<?php echo $i+1; ?>" class="info-btn"><b>i</b></button>
						</div>
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px; margin-top:10px;" type="text" class="form-control" id="author<?php echo $i+1; ?>first" placeholder="Prenume Autor <?php echo $i+1; ?>">
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<button data-toggle="modal" data-target="#prenume<?php echo $i+1; ?>" class="info-btn"><b>i</b></button>
						</div>
					</div>
					<?php endfor; ?>

					<div id="inputbtn" class="form-group row btn-autor-nou col-md-12 col-lg-12 col-xs-12 col-sm-12" style="cursor:hand;">
 						<i class="fa fa-plus-circle fa-2x" id="author2btn"></i><span class="alex" style="font-style: italic;">Adaug&#259; autor</span>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px; margin-top:15px;" type="text" class="form-control" id="title" placeholder="Titlu" required>
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<button data-toggle="modal" data-target="#titlu" class="info-btn"><b>i</b></button>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<textarea class="form-control" style="height:auto; font-size:1.2em; margin-left:1px; margin-bottom:15px; color:white;" id="info_title" placeholder="Corp Fi&#351;&#259;" required></textarea>
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<button data-toggle="modal" data-target="#corp" class="info-btn"><b>i</b></button>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="place" placeholder="Loc de publicare">
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<button data-toggle="modal" data-target="#loc" class="info-btn"><b>i</b></button>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="publishing" placeholder="Editur&#259;">
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<button data-toggle="modal" data-target="#editura" class="info-btn"><b>i</b></button>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="year" placeholder="An de publicare">
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<button data-toggle="modal" data-target="#an" class="info-btn"><b>i</b></button>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="pagination" placeholder="Pagina&#355;ie">
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<button data-toggle="modal" data-target="#paginatie" class="info-btn"><b>i</b></button>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<textarea class="form-control" style="height:auto; font-size:1.2em; margin-left:1px; margin-bottom:15px; color:white;" id="descr" placeholder="Note"></textarea>
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<button data-toggle="modal" data-target="#note" class="info-btn"><b>i</b></button>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
							<input style="height:auto; font-size:1.2em; padding:5px; padding-left:10px;" type="text" class="form-control" id="parts" placeholder="Num&#259;r de p&#259;r&#355;i ale fi&#351;ei" required>
						</div>
						<div class="col-md-1 col-lg-1 col-xs-1 col-sm-1">
							<button data-toggle="modal" data-target="#nrparti" class="info-btn"><b>i</b></button>
						</div>
					</div>
						
						
					<div style="text-align: center;" class="form-group row col-md-12 col-lg-12 col-xs-12 col-sm-12">
						<input type="submit" id="submit" style="margin-top:20px;" class="btn btn-secondary col-sm-10 col-lg-10 col-xs-10 col-m-10 sbmt-btn" name="submit" value="Submit" >
					</div>
				</form>
			</div>
		</div>
				
			
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="../js/jquery.notifyBar.js"></script>
		<script>
			$(function(){
				var lastInput;
				var lastInputCaretPosition;
				var currentNumber = 1;

				$.fn.getCursorPosition = function() {
			        var input = this.get(0);

			        if (!input) return; // No (input) element found

			        if (document.selection) {
			            // IE
			           input.focus();
			        }

			        return 'selectionStart' in input ? 
			        	input.selectionStart:'' || Math.abs(document.selection.createRange().moveStart('character', -input.value.length));
			    };

			    $.fn.setCursorPosition = function(pos) {
				    this.each(function(index, elem) {
				        if (elem.setSelectionRange) {
				          	elem.setSelectionRange(pos, pos);
				        } else if (elem.createTextRange) {
				          	var range = elem.createTextRange();
				          	range.collapse(true);
				          	range.moveEnd('character', pos);
				          	range.moveStart('character', pos);
				          	range.select();
				        }
				    });

				    return this;
				};

				$(document).on("click", "#newPart", function(){
					var book = "<?php echo $_SESSION['book']?>";
					var dataB = 'book=' + book;
					$.ajax({
						url: 'nextPic.php',
						type:'POST',
						data: dataB,
						success: function(response){
							if (response.exists == 1) {
								var newInput = $('<img id="randPath" src="' + response.book + '"/>');
								$('#poze').append(newInput);
	            			} else {
	            				$.notifyBar({
		        					cssClass: "error",
		        					html: "Partea urmatoare de la aceasta poza nu exista"
		        				});
	            			}
						}
					});
				});
				$('#inputbtn').on("click", function(){
					if (currentNumber > 2) {
						return;
					}

					if (currentNumber === 1) {
						$('#inputAuthor2').show();
						currentNumber++;
						
						return;
					}

					if (currentNumber === 2) {
						$('#inputAuthor3').show();
						currentNumber++;

						$(this).hide();
						
						return;
					}

				});
				$('#flag').on("click", function(){
					var book = "<?php echo $original?>";					
					var data = {'book': book};

					$.ajax({
						url: 'flag.php',
						type:'POST',
						data: data,
						success: function(response){
							if (response.success) {
								$.notifyBar({
		            					cssClass: "success",
		            					html: "Ai raportat poza cu success"
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
				});
				$(document).on('click', '.diacritice button', function (e) {
					var btnContent = $(e.currentTarget).html();

					lastInput.val(lastInput.val().substring(0, lastInputCaretPosition) + btnContent + lastInput.val().substring(lastInputCaretPosition));
					lastInput.focus(function () {
						$(this).setCursorPosition(lastInputCaretPosition+1);
					});
					lastInput.focus();
				});
				$(document).on('blur', '.form-control', function (e) {
					lastInput = $(e.currentTarget);
					lastInputCaretPosition = $(e.currentTarget).getCursorPosition();
				});
				$(document).on("click", "#submit", function()
				{
					var ref = $("#ref").val();
					var author1last = $("#author1last").val();
					var author1first = $("#author1first").val();
					var author2last = $("#author2last").val();
					var author2first = $("#author2first").val();
					var author3last = $("#author3last").val();
					var author3first = $("#author3first").val();
					var title = $("#title").val();
					var info_title = $("#info_title").val();
					var place = $("#place").val();
					var publishing = $("#publishing").val();
					var year = $("#year").val();
					var descr = $("#descr").val();
					var pagination = $("#pagination").val();
					var path = <?php echo json_encode($book); ?>;
					var parts = $("#parts").val();
					var data = {};
					data.ref = ref.toUpperCase();
					data.title = title.toUpperCase();
					data.path = path;
					data.parts = parts;
					

					if (ref.trim() == '' || title.trim() == '' || parts.trim() == ''){
						$.notifyBar({
        					cssClass: "error",
        					html: "Nu a&#355;i introdus toate datele obligatorii"
		        		});
					} else {
						if (author1last != null){
							data.author1last = author1last.toUpperCase();
						}

						if (author1first != null){
							data.author1first = author1first.toUpperCase();
						}

						if (author2last != null){
							data.author2last = author2last.toUpperCase();
						}

						if (author2first != null){
							data.author2first = author2first.toUpperCase();
						}

						if (author3last != null){
							data.author3last = author3last.toUpperCase();
						}

						if (author3first != null){
							data.author3first = author3first.toUpperCase();
						}

						if (info_title != null){
							data.info_title = info_title.toUpperCase();
						}

						if (place != null){
							data.place = place.toUpperCase();
						}

						if (year != null){
							data.year = year.toUpperCase();
						}

						if (publishing != null){
							data.publishing = publishing.toUpperCase();
						}

						if (pagination != null){
							data.pagination = pagination.toUpperCase();
						}

						if (descr != null){
							data.descr = descr.toUpperCase();
						}

					
						$.ajax({
							url: 'sendToBuf.php',
							type:'POST',
							data: data,
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
				$(document).on('click', '#btnClasament', function(){
					<?php
						$sql = "SELECT * from users order by totalPoints DESC limit 15;";
						$result = $conn->query($sql);
						$nr = (int)mysqli_num_rows($result);
						$users = array();
						for($i = 0; $i < $nr; $i++){
							$row = $result->fetch_assoc();
							$users[$i] = $row["Lastname"] . " " . $row["Firstname"];
						}
						$sql = "SELECT  x.position FROM (SELECT Email, @rownum := @rownum + 1 as position FROM users JOIN (SELECT @rownum := 0) r order by totalPoints DESC) x where Email='" . $_SESSION['user']['Email'] . "';";
						$result = $conn->query($sql);
						$row = $result->fetch_assoc();
						$rank = $row['position'];
					?>
					var user = <?php echo json_encode($users);?>;
					var nr = <?php echo $nr; ?>;
					for(var i in user){
						var usr = '#usr' + i;

						$(usr.toString()).remove();
						$("#pos").remove();
					}
					for(var i in user){
						input = '<p id="usr' + i + '" class="pop"><b>' + (parseInt(i, 10) + 1) + '. ' + user[i] + '</b></p>';
						$('#clasDiv').append(input);
					}
					input = '<br><hr><br><p id="pos" style="font-size: larger; color:red;" class="pop"><b>Poziția ta: <?php echo $rank; ?></b></p>';
					$('#clasDiv').append(input);
					$('#clasament').modal('show');
				});
			});
		</script>
	</body>
	


</html>

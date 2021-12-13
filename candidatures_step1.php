<?php
	echo "<script>javascript:window.history.back();</script>"; 
	exit;
	
	require_once('actions/session.php');
	$proprietaire = $_SESSION['matricule'];

	if (isset($_GET['return'],$_GET['parti'])){
		$return = $_GET['return'];
		$parti = $_GET['parti'];
		$nextStep = 2;
	}else{
		$return = -1;
		$parti = "NULL";
	}
	$steps = '1/17';
?>
<!DOCTYPE HTML>
<html> 
	<head>
		<title>ESTA-evote</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/dark.css" />
	</head>
	<body class="is-preload homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<img src="images/logo.jpg" alt="" />
								<!-- <h1><a href="index.html">Verti</a></h1> -->
								<span>Vote en ligne</span>
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a href="index.php"><i class="fa fa-home"></i>Accueil</a></li>
									<li><i class="fas fa-list"></i><a href="votes.php">Votes</a></li>
									<li><i class="fas fa-trophy"></i><a href="resultats.php">Resultats</a></li>
									<li><i class="fas fa-landmark"></i><a href="liste_candidats.php">Liste des candidats</a></li>
									<li><i class="fas fa-assistive-listening-systems"></i><a href="candidatures.php">Candidatures</a></li>
									<li class="current"><i class="fas fa-question"></i><a href="aide.php">Aide</a></li>
								</ul>
							</nav>

					</header>
				</div>

			<!-- Banner -->
				<div id="banner-wrapper">
					<div id="banner" class="box container">
						<div class="row">
							<div class="col-7 col-12-medium">
								<h2><u>Candidatures</u></h2>
								<h5><u>Etapes <?=$steps?>:</u> Création du parti</h5>
								<form role="form" action="actions/addParti.php" method="post">
								<input type="hidden" class="form-control" id="proprietaire" name="proprietaire" value="<?=$proprietaire?>">
								<div class="form-group">
									<label for="pseudo">Nom abrégé du parti</label>
									<input type="text" class="form-control" id="pseudo" placeholder="e.g : MPP" name="nom_abrege" required>
								</div>
								<div class="form-group">
									<label for="email">Nom complet du parti</label>
									<input type="text" class="form-control" id="email" placeholder="e.g : Mouvement du peuple pour la patrie" name="nom_complet" required>
								</div>
								<hr>
								<div class="form-group">
									<div class="checkbox">
										<input type="checkbox" id="check" required> <label for="check"></label> J'accepte les <a href="politiques.php" target="_blank" alt="#">conditions d'utilisation</a>
									</div>
								</div>
								<hr>
								<button type="submit" class="btn btn-success" id="valider">Valider</button><br>
								<span id="msg"></span>
							</form>
							</div>
							<div class="col-5 col-12-medium">
								<ul>
									<li><a href="candidatures_step<?=$nextStep?>.php?parti=<?=$parti ?>" id="btn_next_steps" class="button large icon solid fa-arrow-circle-right">Etape suivante</a></li>
									<li><a href="aide.php" class="button alt large icon solid fa-question-circle">Besoin d'aide</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">

							<div class="col-12 col-12-medium col-12-small">
								<!-- Contact -->
									<section class="widget contact last">
										<h3>Contactez nous</h3>
										<ul>
											<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
											<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
											<li><a href="#" class="icon brands fa-pinterest"><span class="label">Pinterest</span></a></li>
										</ul>
									</section>

							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div id="copyright">
									<ul class="menu">
										<li>&copy;Tous droits réservés <a href="http://esta.bf">ESTA</a></li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
				</div>

			</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

			<script>
				$(document).ready(function(){
					$('#btn_next_steps').css({
						cursor : "default",
						pointerEvents : "none" 
					});
					var back = <?php echo json_encode($return);?>;
					var Intback = parseInt(back);
					console.log(Intback);
					if (back == 1){
						$('#btn_next_steps').css({
							cursor : "pointer",
							pointerEvents : "auto" 
						});	
						$('#valider').prop('disabled', true);
						$('#valider').hide();
						var msg = 'Etape réalisée avec succès!';
						$('#msg').css('color','green').text(msg);
					}
				});
    		</script>
	</body>
</html>
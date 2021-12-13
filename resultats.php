<?php
	include 'crud/CRUD.php';
	$crud = new CRUD();
	$PARTIS = $crud->get_list_parti();
	$nbr_parti = sizeof($PARTIS);
	$nbr_ligne = ceil($nbr_parti/2);
	$inscrit = $crud->get_vote_inscrit();
	$vote = $crud->get_vote_effectue();
	$restant = $inscrit - $vote;
	$tete = $crud->get_parti_win();
	//echo'<pre>';print_r($tete);exit;
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>ESTA-evote</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/main.css" />
		
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
									<li class="current"><i class="fas fa-assistive-listening-systems"></i><a href="candidatures.php">Candidatures</a></li>
									<li><i class="fas fa-question"></i><a href="aide.php">Aide</a></li>
								</ul>
							</nav>

					</header>
				</div>

			<!-- Banner -->
				<div id="banner-wrapper">
					<div id="banner" class="box container">
						<div class="row">
							<div class="col-lg-7 col-12-medium">
								<h2><u>Procédure de votes</u></h2>
								<center><span class="msg"></span></center>
							</div>
							<div class="col-lg-5 col-12-medium">
								<ul>
									<li>Nombre inscrits : <?=$inscrit?></li>
									<li>Nombre ayant voté : <?=$vote?></li>
									<li>Nombre restant : <?=$restant?></li><br>
									<!--li><a href="#" class="button large icon solid fa-arrow-circle-right" data-toggle="modal" data-target="#exampleModalCenter">Prêt à voter</a></li-->
									<li><a href="aide.php" class="button alt large icon solid fa-question-circle">Besoin d'aide?</a></li>
									<li><center><span class="msg2"></span></center></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<!-- Features -->
				<div id="features-wrapper">
					<div class="container">
						<?php
							$j = 0;
							while($nbr_parti > 0){
								$limit = ($nbr_parti > 1)?2:1;
								?>
								<div class="row">
								<?php
								for($i = 0; $i < $limit; $i++){ 
									$parti = $PARTIS[$j]['nom_abrege'];
									$logo = $PARTIS[$j]['logo'];
									$voix = $crud->get_vote_voix($parti);
									$percent = ($vote)?number_format((($voix * 100) / $vote),2):0;
									?>
									<div class="col-6 col-12-medium">
										<!-- Box -->
									<section class="box feature">
										<a href="#" class="image featured"><img src="images/<?=$logo?>" alt="<?=$parti?>" /></a>
										<div class="inner">
											<header>
												<center><h2><u><?=$parti?></u></h2>
												<span>Pourcentage: <?=$percent?>%</span><br>
												<span>voix: <?=$voix?></span>
												</center>
											</header>
										</div>
									</section>
									</div>
								<?php 
								$j++;
								}	
								$nbr_parti -= 2; ?>
								<hr>
								</div>
						<?php
							}
						?>
						<center><u><span class="msg"></span></u></center>
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

			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

			<script>
				$(document).ready(function(){
					var back = <?php echo json_encode($restant);?>;
					var tete = JSON.parse('<?php echo json_encode($tete);?>');
					var Intback = parseInt(back);
					var parti = tete['nom'];
					var voix = tete['voix'];
					console.log(tete);
					if (back){
						var msg = 'Les votes se poursuivent toujours !!';
						$('.msg').css('color','red').text(msg);
						if(tete['equals']){
							var msg2 = 'Le votes est très sérré, les partis sont à égalité!!';
						}else{
							var msg2 = 'Le parti '+parti+' est en tête de liste avec '+voix+' voix.';
						}
						$('.msg2').css('color','red').text(msg2);
					}else{
						var msg = 'Les votes sont terminés merci pour votre participation!!';
						$('.msg').css('color','green').text(msg);
						if(tete['equals']){
							var msg2 = 'Aucun resultat définitif ne peut être donné, car ya égalité en les partis!!';
						}else{
							var msg2 = 'Les élections sont remportées par le parti '+parti +' avec '+voix+' voix.';
						}
						$('.msg2').css('color','red').text(msg2);
					}

				});
    		</script>

	</body>
</html>
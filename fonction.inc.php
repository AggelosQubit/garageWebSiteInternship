<?php 
	function enTete($titre) 
	{
			echo "<!DOCTYPE HTML>\n";
			echo '<html lang="fr">';
			echo '	<head>';
			echo '		<title>'.$titre.'</title>';
			echo '		<link rel="shortcut icon" href="images/LogoCTAAuto.jpg">
			
						<meta name="keywords" content="Centre Technique Automobile,Diagnostique, Réparation, Dépannage, Entretien, Garage, Garages, Entretiens, Réparations, Diagnostiques, Automobiles, Reparation, Depannages, cta, CTA, lh, LH, Le Havre, le havre, acces cta">
						<meta name="description" content="Centre Technique Automobile est un garage spécialisé dans le diagnostique avec de grandes connaissances sur les différents types de voitures aussi bien normal qu\'hybrides." />
						<meta name="author" content="Cadet Dainty"/>
						<noscript> 
							<meta http-equiv="refresh" content="0; url=pasdejavascript.php" /> 
						</noscript> 
						<meta charset="ISO-8859-1"/>
						
						
						<link type="text/css" rel="stylesheet" href="bootstrap3/css/bootstrap-lightbox.css"/>
						<link type="text/css" rel="stylesheet" href="bootstrap3/css/bootstrap-responsive.css"/>
						<link type="text/css" rel="stylesheet" href="bootstrap3/css/bootstrap-theme.css"/>
						
						<link type="text/css" rel="stylesheet" href="bootstrap3/css/bootstrap.css"/>
						<link type="text/css" rel="stylesheet" href="bootstrap3/css/IECTAStyle.css"/>
						<link type="text/css" rel="stylesheet" href="bootstrap3/css/CTAStyle.css"/>
						
						<script src="bootstrap3/js/bootstrap-lightbox.js"></script>
						<script src="bootstrap3/js/bootstrap-carousel.js"></script>
						<script src="bootstrap3/js/allFunction.js"></script>

						<script src="bootstrap3/js/jquery.js"></script>
						
						<script src="bootstrap3/js/bootstrap.js"></script>
						<script type="text/javascript">
							$(document).ready(function(){
								$(\'.carousel\').carousel();
							});
						</script>
						
					</head>';
			echo '<body id="haut">';
			//DEBUT DU CONTAINER
			echo '<div class="container " id="contentt">';
			echo '	<div>
						<p style="text-align:center;">
							<a href="index.php">
								<img alt="logo" width="940" src="images/LogoCTAAuto.gif">
							</a>
						</p>
					</div>';
					//LOGO A DECOMMENTER QUAND J'AURAI L'IMAGE
					//TITRE//LOGO/IMAGE
	}
	function nav()
	{
		echo'<div class="navbar">
				<div class="navbar-inner">
					<ul class="nav nav-pills" id="navDuMenu">
						<li><a href="index.php">			<i class="glyphicon glyphicon-home  		glyphicon-black"></i> Accueil								</a></li>
						<li><a href="nosServices.php">		<i class="glyphicon glyphicon-wrench  		glyphicon-black"></i> Nos Services							</a></li>
						<li><a href="devisEntretien.php">	<i class="glyphicon glyphicon-euro  		glyphicon-black"></i> Devis d\'entretien R&eacute;paration	</a></li>
						<li><a href="contact.php">			<i class="glyphicon glyphicon-phone-alt  	glyphicon-black"></i> Contact								</a></li>
						<li><a href="planDAccess.php">		<i class="glyphicon glyphicon-map-marker  	glyphicon-black"></i> Plan d\'acces							</a></li>
					</ul>
				</div>';	
		echo'</div>
			<hr>';
	}

	function pied() 
	{
		echo'		<div class="row-fluid">
						<div class="span12">
							<div class="navbar ">						
								<div class="navbar-inner">
									<ul class="nav nav-pills well">
										<li class="aggelos-divider"><a><em><b><i class="glyphicon glyphicon-copyright-mark"></i>Tous Droits r&eacute;serv&eacute;s CTA 2014</b></em></a></li>
										<li class="aggelos-divider"><a href="#" data-toggle="modal" data-target="#mentions">Mentions L&eacute;gales</a></li>
										<li class="aggelos-divider"><a href="#" data-toggle="modal" data-target="#author">&agrave; propos de l\'auteur</a></li>
										<li class="aggelos-divider dropup"><a href="#haut">Haut de page <span class="caret"></span></a></li>
										<li class="btn-group dropup aggelos-divider">
											<a class="dropdown-toggle"  data-toggle="dropdown">Navigation<span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="index.php"><i class="glyphicon glyphicon-home  glyphicon-black"></i> Accueil</a></li>
												<li><a href="nosServices.php"><i class="glyphicon glyphicon-wrench  glyphicon-black"></i> Nos Services</a></li>
												<li><a href="devisEntretien.php"><i class="glyphicon glyphicon-euro  glyphicon-black"></i> Devis d\'entretien R&eacute;paration</a></li>
												<li><a href="contact.php"><i class="glyphicon glyphicon-phone-alt  glyphicon-black"></i> Contact</a></li>
												<li><a href="planDAccess.php"><i class="glyphicon glyphicon-map-marker  glyphicon-black"></i> Plan d\'acces</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>';
		echo '	</div>';
		//PARTIE MODAL 
		//LES MODAL SONT DES FENETRE QUI APPARAISSENT LORSQUE L4ON CLIQUE SUR LE LIEN QUI LES IDENTIFIE
		echo '							<!-- MODAL AUTEUR-->			
										<div class="modal fade" id="author" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAuthor" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header ">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h2 class="modal-title" id="myModalLabelAuthor"><span style="text-align:center;">&agrave; propos de l\'auteur</span></h2>
													</div>
													<div class="row-fluid well">
														<div class=" span5">
															<a href="images/author.jpg" class="thumbnail"><img alt="Auteur" src="images/author.jpg"/></a>
														</div>
														<div class="span7">
															<div  style="text-align:justify;">
																Passionn&eacute; depuis mon adolescence pour le monde de l\'informatique et d\'internet,
																je suis me suis sp&eacute;cialis&eacute; dans le d&eacute;veloppement web.<br>
																Je remercie Le Garage CTA de m\'avoir fais confiance dans la conception et la r&eacute;alisation de leur site web et j\'esp&egrave;re que vous ferez une bonne navigation.<br>
																Vous &ecirc;tes sur mon premier site web...<br>
																<p style="text-align:right;" ><em>Cadet Dainty</em></p>
															</div>	
														</div>
													</div>
													<div class="modal-footer ">
														<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
													</div>
												</div>
											</div>
										</div>
										
										<!-- MODAL MENTIONS LEGALES-->
										<div class="modal fade" id="mentions" tabindex="-1" role="dialog" aria-labelledby="myModalLabelMention" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h2 class="modal-title" id="myModalLabelMention"><span style="text-align:center;">Mentions L&eacute;gales</span></h2>
													</div>
													<div class="modal-body">
														<h3 style="text-align:center;">Informations</h3>
														<hr/>
														<h4  style="text-decoration : underline;">Informations Soci&eacute;t&eacute;</h4>
														Nom : Centre Technique Automobile (CTA)<br>
														RCS : Le Havre B 753 106 111<br>
														Activit&eacute; : R&eacute;paration, Diagnostique, Entretien de v&eacute;hicules automobiles l&eacute;gers 4520A<br>
														Si&egrave;ge social : 47, rue des Fleurus 76600 le havre<br>
														SIRET : 7531 061 1100 010<br>
														Directeur de la publication : Fabienne BITAR<br>
														Capital social : 100.000&euro;<br>
														Immatriculation	: 08-08-2012<br>
														Nationalit&eacute; : Fran&#231;aise<br>
														Cat&eacute;gorie : Automobile<br>
														Forme Juridique : SARL (Soci&eacute;t&eacute; &agrave; responsabilit&eacute; limit&eacute;e)<br>
														<h4 style="text-decoration : underline;">Informations H&eacute;bergeur</h4>
														Le site du Garage CTA est h&eacute;berg&eacute; par : <br>
														OVH<br>
														RCS Roubaix &ndash; Tourcoing 424 761 419 00045<br>
														Code APE 6202A<br>
														T&eacute;l&eacute;phone :  0 820 698 765
														N&#186; TVA : FR 22 424 761 419<br>
														Si&egrave;ge social : 2 rue Kellermann - 59100 Roubaix - France.<br>
														Directeur de la publication : Octave KLABA<br>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
													</div>
												</div>
											</div>
										</div>';
		echo '</body>';	
		echo '</html>';
	}
?>
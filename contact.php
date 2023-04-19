<?php
//RAJOUTER LES PROTECTION JAVASCRIPT POUR LE REMPLISSAGE DES CHAMPS

	include("fonction.inc.php");
	entete("Contact");
	contenu();
	pied();

	function contenu()
	{
		nav();
		if(isset($_GET['formNonRempliContact']))
		{
			echo'
						<div class="panel panel-info">
							<div class="panel-heading">Envoi du Couriel</div>
							<div class="panel-body">
								<p>Veuillez renseignez tout les champs s\'il vous plait.</p>
							</div>
						</div>
					';
		}if(isset($_GET['formNonRempliRejoindre']))
		{
			echo'
						<div class="panel panel-info">
							<div class="panel-heading">Envoi du Couriel</div>
							<div class="panel-body">
								<p>Veuillez renseignez tout les champs<br> Sans oublier les fichiers joints au formats indiqués s\'il vous plait.</p>
							</div>
						</div>
					';
		}
		if(isset($_GET['mailEnvoyerContact']))
		{
			//UNE FOIS LE MAIL ENVOYER
			if($_GET['mailEnvoyerContact']=="true")
			{
				echo'
						<div class="panel panel-success">
							<div class="panel-heading">Envoi du Couriel</div>
							<div class="panel-body">
								<p>Vôtre couriel a &eacute;t&eacute; envoy&eacute;</p>
							</div>
						</div>
					';
			} else {
				echo'
						<div class="panel panel-danger">
							<div class="panel-heading">Envoi du Couriel</div>
							<div class="panel-body">
								<p>Vôtre couriel n\'a pas pu &ecirc;tre envoy&eacute;</p>
								<p>Veuillez r&eacute;essayez.</p>
							</div>
						</div>
		
					';
				
			}
		}
		if(isset($_GET['mailEnvoyerRejoindre']))
		{
			//UNE FOIS LE MAIL ENVOYER
			if($_GET['mailEnvoyerRejoindre']=="true")
			{
				echo'
						<div class="panel panel-success">
							<div class="panel-heading">Envoi du Couriel</div>
							<div class="panel-body">
								<p>Vôtre couriel a &eacute;t&eacute; envoy&eacute;</p>
								<p>Vôtre envoi sera &eacute;tudi&eacute; dans les plus brefs délais.</p>
								<p>Nous vous contacterons &agrave; ce moment l&agrave;</p>
							</div>
						</div>
					';
			} else {
				echo'
						<div class="panel panel-danger">
							<div class="panel-heading">Envoi du Couriel</div>
							<div class="panel-body">
								<p>Vôtre couriel n\'a pas pu &ecirc;tre envoy&eacute;</p>
								<p>Veuillez r&eacute;essayez.</p>
							</div>
						</div>
					';
				
			}
		}
					//ACCORDEON CONTACT
		echo'		<div class="accordion" id="myaccordion">
						<div class="accordion-group">
							<div class="panel panel-warning">
								<div class="panel-heading">
									<div class="accordion-heading">
										<a href="#nousContacter" class="accordion-toggle lienANeutrer" data-toggle="collapse" data-parent="#myaccordion">
											<h3 style="text-align:center;">
												Contactez-Nous <i class="glyphicon glyphicon-envelope"></i>
											</h3>
										</a>
									</div>
								</div>
								<div class="panel-body">
									<div id="nousContacter" class="accordion-body collapse ">
										<div class="accordion-inner">
											<div class="row-fluid well paraContact">
												<p style="text-align:center;">
													Vous voulez prendre rendez-vous pour un diagnostique ou une réparation quelconque?<br>
													Vous voulez nous faire part d\'&eacute;l&eacute;ments &agrave; am&eacute;liorer?<br>
													Envoyez nous un couriel <i class="glyphicon glyphicon-thumbs-up"></i><br>
													Sachez que nous envoyer un courriel aide à organiser nos achat de pièce à l\'avance pour plus de fluidité dans la réparation.<br>
												</p>
											</div>
											<div class="row-fluid">	
												<div class="span7 well">
													<!--FORMULAIRE-->
													<form method="POST" action="contact.php?formRempli=true" id="contactForm" class="form form-vertical" onsubmit="return checkformContact(this);">
														<input type="text" 		class="form-control" 	name="nom" 	 		title="N\'utiliser les caractères suivant (\ \' ; .  - )"	placeholder="Nom...">
														<input type="text" 		class="form-control"	name="prenom" 		title="N\'utiliser les caractères suivant (\ \' ; .  - )"	placeholder="Prénom...">
														<input type="tel" 		class="form-control"	name="telephone" 	title="N\'utiliser les caractères suivant (\ \' ; .  - )"	placeholder="Téléphone...">
														<input type="text" 		class="form-control"	name="sujet"  		title="N\'utiliser les caractères suivant (\ \' ; .  - )"	placeholder="Sujet...">
														<textarea form="contactForm" rows="6" class="form-control"	name="corpsMessage"		placeholder="Entrez Vôtre texte..."></textarea>		
														<button type="submit" class="btn btn-warning form-control"><i class="glyphicon glyphicon-ok-sign"></i>Envoyer votre message</button>
													</form>
												</div>
												<div class="span5 well">
													<!--INFORMATIONS-->
													<table class="table">	
														<caption><h3>Informations</h3></caption>
														<tr><td>Nom</td><td>CTA (CENTRE TECHNIQUE AUTOMOBILE)</td></tr>
														<tr><td>Adresse</td><td>47 RUE DE FLEURUS</td></tr>
														<tr><td>Ville</td><td>Le Havre</td></tr>
														<tr><td>Code Postal</td><td>76600 </td></tr>
														<tr><td>Téléphone</td><td>02.35.24.53.14</td></tr>
														<tr><td>Adresse &eacute;lectronique</td><td>cta-lehavre@orange.fr</td></tr>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>';
				//AFFICHAGE DE LA PARTIE OU L'UTILISATEUR POURRA POSTULER S'IL LE SOUHAITE AFIN DE REJOINDRE
				//LE CTA EN TANT QU'EMPLOYER
				//ACCORDEON REJOINDRE
		echo'		<div class="accordion" id="myaccordion2">
						<div class="accordion-group">
							<div class="panel panel-warning">
								<div class="panel-heading">
									<div class="accordion-heading">
										<a href="#nousRejoindre" class="accordion-toggle lienANeutrer" data-toggle="collapse" data-parent="#myaccordion2">
											<h3 style="text-align:center;">Rejoignez-Nous <i class="glyphicon glyphicon-wrench"></i></h3>
										</a>
									</div>
								</div>
								<div class="panel-body">
									<div id="nousRejoindre" class="accordion-body collapse ">
										<div class="accordion-inner">
											<div class="row-fluid well paraContact">
												<p style="text-align:center;">
													Vous souhaitez int&eacute;grer une structure à fort potentiel?<br>
													Vous avez des comp&eacute;tences en mécanique automobile?<br>
													Envoyez une candidature spontanée <i class="glyphicon glyphicon-thumbs-up"></i>
												</p>
											</div>	
											<div class="row-fluid well">
												<div class="span8 offset2 ">
													<!--FORMULAIRE-->
													<form method="POST" enctype="multipart/form-data" action="contact.php?formRempliRejoindre=true" id="rejoindreForm" class="form form-vertical" onsubmit="return checkformRejoindre(this);">
														  <!-- On limite le fichier à 300Ko -->
														<input type="hidden" name="MAX_FILE_SIZE" value="300000">
														<input type="text" 		class="form-control" 	name="nom" 	 		title="N\'utiliser les caractères suivant (\ \' ; .  - )"	placeholder="Nom..."/>
														<input type="text" 		class="form-control"	name="prenom" 		title="N\'utiliser les caractères suivant (\ \' ; .  - )"	placeholder="Prénom..."/>
														<input type="tel" 		class="form-control"	name="telephone" 	title="N\'utiliser les caractères suivant (\ \' ; .  - )"	placeholder="Téléphone..."/>
														<input type="text" 		class="form-control"	name="mail" 		title="Mail"												placeholder="Adresse électronique..."/>
														<input type="text" 		class="form-control"	name="sujet"  		title="N\'utiliser les caractères suivant (\ \' ; .  - )"	placeholder="Sujet..."/>
														<label for="curriVita">Curriculum Vitae (doc,docx,odt,pdf)</label>	<input type="file"	class="form-control"  id="curriVita"   name="curriVita"/>
														<label for="lettreMotiv">Lettre de Motivation (doc,docx,odt,pdf)</label><input type="file"	class="form-control"   id="lettreMotiv"   name="lettreMotiv"/>
														<textarea form="rejoindreForm" rows="6" class="form-control"	name="corpsMessage"		placeholder="Entrez Vôtre texte..."></textarea>		
														<button type="submit" class="form-control btn btn-warning"><i class="glyphicon glyphicon-ok-sign"></i>Envoyer votre message</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>	
							</div>
						</div>
					</div>';
				/*************************************************************/
		//SI LE FORMULAIRE DE PRISE DE CONTACT EST REMPLI
		if(isset($_GET['formRempli']))
		{
			$passage_ligne = "\r\n";
			
			//DECLARATION DES VARIABLES
			//$mailEnvoy="cta-lehavre@orange.fr";
			if( ($_POST['nom']=="")||($_POST['prenom']=="")||($_POST['telephone']=="")||($_POST['sujet']=="")||($_POST['corpsMessage']=="") )
			{
				header("Refresh:2; url=contact.php?formNonRempliContact=true");
			} else {
				$mailEnvoy		="daintycadet@gmail.com";
				$nom			=@htmlspecialchars($_POST['nom']);
				$prenom			=@htmlspecialchars($_POST['prenom']);
				$telephone		=@htmlspecialchars($_POST['telephone']);
				$sujet			=@htmlspecialchars($_POST['sujet']);
				$corpsMessage	=@htmlspecialchars($_POST['corpsMessage']);
				//TEST DE PASSAGE DE PARAMETRE
				//echo $nom."\n".$prenom."\n".$telephone."\n".$sujet."\n".$corpsMessage;
				$path=$_SERVER."/Site Web CTA/images/LogoCTAAuto.gif";
				//DEBUT DU MESSAGE
				$message_txt	 = "Bonjour Mme Bitar Gérante du CTA.";
				$message_txt	.= "Voici un e-mail envoyé par ".$prenom." ".$nom;
				$message_txt 	.= "Information sur l'emetteur".$prenom." ".$nom." ".$telephone;
				$message_txt 	.= "Message : ".$corpsMessage;
				//CORPS DU MAIL AVEC LES INFORMATIONS
				$message_html  ="<html><head></head><body>";
				$message_html .="<span style=\"text-align:center;\">Bonjour Mme Bitar Gérante du CTA,</span><br>";
				$message_html .="Voici un e-mail envoyé par ".$prenom." ".$nom."<br>";
				$message_html .="	<table class=\"table\" border=\"1\">";
				$message_html .="		<caption>Information sur l'emetteur</caption>";
				$message_html .="		<tr><td>Nom						</td><td>".$nom."</td></tr>";
				$message_html .="		<tr><td>Pr&eacute;nom			</td><td>".$prenom."</td></tr>";
				$message_html .="		<tr><td>T&eacute;l&eacute;phone	</td><td>".$telephone."</td></tr>";
				$message_html .="	</table>";
				$message_html .="<p>".$corpsMessage."</p>";
				$message_html .="</body></html>";
				
				//=====Création de la boundary
				$boundary = "-----=".md5(rand());
				
				//=====Création du header de l'e-mail.
				$header = "From: \"".$nom." ".$prenom."\"<hb.styx@gmail.com> ".$passage_ligne;
				//$header = "From: \"".$nom." ".$prenom."\"<cta-lehavre@orange.fr> ".$passage_ligne;
				$header.= "Reply-to: <".$mailEnvoy.">".$passage_ligne;
				$header.= "MIME-Version: 1.0".$passage_ligne;
				$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
				//==========
				
				//=====Création du message.
				$message = $passage_ligne."--".$boundary.$passage_ligne;
				//=====Ajout du message au format texte.
				$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_txt.$passage_ligne;
				//==========
				$message.= $passage_ligne."--".$boundary.$passage_ligne;
				//=====Ajout du message au format HTML
				$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_html.$passage_ligne;
				//==========
				$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
				$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
				//==========
				
				ini_set("SMTP","smtp.orange.fr");
				ini_set("smtp_port","25");
				ini_set("sendmail_from","cta-lehavre@orange.fr");
				
				if(@mail($mailEnvoy,$sujet,$message,$header))
				{
					header("refresh: 2; url=contact.php?mailEnvoyerContact=true");
				} else {
					header("refresh: 2; url=contact.php?mailEnvoyerContact=false");
				}
			}
		}
		//SI LE FORMULAIRE POUR POSTULER EST REMPLI
		if(isset($_GET['formRempliRejoindre']))
		{	
			$passage_ligne = "\r\n";
			
			//DECLARATION DES VARIABLES
			//$mailEnvoy="cta-lehavre@orange.fr";
			$mailEnvoy="daintycadet@gmail.com";
			if( 	($_POST['nom']=="")					||	($_POST['prenom']=="")				 ||($_POST['telephone']=="")		||
					($_POST['mail']=="")				||	($_POST['sujet']=="")				 ||($_POST['corpsMessage']=="") 	|| 
					($_FILES['curriVita']['name']=="" )	|| 	($_FILES['lettreMotiv']['name']=="" )
			)
			{
				header("Refresh:2; url=contact.php?formNonRempliRejoindre=true");
			} else {
			
				$nom			=@htmlspecialchars($_POST['nom']);
				$prenom			=@htmlspecialchars($_POST['prenom']);
				$telephone		=@htmlspecialchars($_POST['telephone']);
				$sujet			=@htmlspecialchars($_POST['sujet']);
				$mail			=@htmlspecialchars($_POST['mail']);
				$corpsMessage	=@htmlspecialchars($_POST['corpsMessage']);
				$cv				=$_FILES['curriVita'];
				$lm				=$_FILES['lettreMotiv'];
				
				
				//TEST DE PASSAGE DE PARAMETRE
				//echo $nom."\n".$prenom."\n".$telephone."\n".$sujet."\n".$corpsMessage;
				
				//=====Déclaration des messages au format texte et au format HTML.
				$message_txt	 = "Bonjour Mme Bitar Gérante du CTA.";
				$message_txt	.= "Voici un e-mail envoyé par ".$prenom." ".$nom;
				$message_txt 	.= "Information sur l'emetteur".$prenom." ".$nom." ".$telephone;
				$message_txt 	.= "Message : ".$corpsMessage;
				
				$message_html  ="<html><head></head><body>";
				$message_html .="<span style=\"text-align:center;\">Bonjour Mme Bitar Gérante du CTA,</span><br>";
				$message_html .="Voici un e-mail envoyé par ".$prenom." ".$nom;
				$message_html .="	<table border=\"1\">";
				$message_html .="		<caption>Information sur l'emetteur</caption>";
				$message_html .="		<tr><td>Nom						</td><td>".$nom."</td></tr>";
				$message_html .="		<tr><td>Pr&eacute;nom			</td><td>".$prenom."</td></tr>";
				$message_html .="		<tr><td>T&eacute;l&eacute;phone	</td><td>".$telephone."</td></tr>";
				$message_html .="		<tr><td>Adresse &eacute;lectronique</td><td>".$mail."</td></tr>";
				$message_html .="	</table>";
				$message_html .="<p>".$corpsMessage."</p>";
				$message_html .="</body></html>";
				//==========
				 
				//UPLOAD ET TRAITEMENT DU CV et LM ENVOYER
				//TEXT SUR L'EXTENSION POUR SAVOIR SI CE N'EST PAS UN SCRIPT
				//SI C'EST UN DOC,DOCX,ODT,PDF ON LAISSER UPLOADER SUR LE SERVEUR AFIN D'ENVOYER EN PIECE JOINTE
				$uploaddir = 'fichierAEnvoyer/';
				$uploadfileCV = $uploaddir.basename($_FILES['curriVita']['name']);
				$uploadfileLM = $uploaddir.basename($_FILES['lettreMotiv']['name']);
				
				$filenameCV=basename($_FILES['curriVita']['name']); 
				$filenameLM=basename($_FILES['lettreMotiv']['name']); 
				// Comme le point ne m'intéresse pas on le supprime
				$extensionCV=strrchr($filenameCV,'.');$extensionCV=substr($extensionCV,1); 
				$typeCV=$_FILES['curriVita']['type']; 
				$typeLM=$_FILES['lettreMotiv']['type']; 
				
				$extensionLM=strrchr($filenameLM,'.');$extensionLM=substr($extensionLM,1);
				if	( (	(strcmp($typeCV,"application/msword")==0) 	|| (strcmp($typeCV,"application/vnd.oasis.opendocument.text")==0) || 
						(strcmp($typeCV,"application/pdf")==0) 		|| (strcmp($typeCV,"application/vnd.openxmlformats-officedocument.wordprocessingml.document")==0) )
																	&& 
					  (	(strcmp($typeLM,"application/msword")==0) 	|| (strcmp($typeLM,"application/vnd.oasis.opendocument.text")==0) || 
						(strcmp($typeLM,"application/pdf")==0) 		|| (strcmp($typeLM,"application/vnd.openxmlformats-officedocument.wordprocessingml.document")==0) )
					)
				{
					@move_uploaded_file($_FILES['curriVita']['tmp_name']  , $uploadfileCV);
					@move_uploaded_file($_FILES['lettreMotiv']['tmp_name'], $uploadfileLM);
				} else {
					header("Refresh:2; url=contact.php?formNonRempliRejoindre=true");
				}
				 
				//=====Création de la boundary.
				$boundary = "-----=".md5(rand());
				$boundary_alt = "-----=".md5(rand());
				//=========
				 
				//=====Création du header de l'e-mail.
				$header = "From: \"".$nom." ".$prenom."\"<".$mail.">".$passage_ligne;
				$header.= "Reply-to: \"CTA\" <".$mailEnvoy.">".$passage_ligne;
				$header.= "MIME-Version: 1.0".$passage_ligne;
				$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
				//==========
				 
				//=====Création du message.
				$message = $passage_ligne."--".$boundary.$passage_ligne;
				$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
				$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
				//=====Ajout du message au format texte.
				$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_txt.$passage_ligne;
				//==========
				 
				$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
				 
				//=====Ajout du message au format HTML.
				$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_html.$passage_ligne;
				//==========
				 
				//=====On ferme la boundary alternative.
				$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
				//==========
				//OUVERTURE DE LA BOUNDARY POUR LA PREMIERE PIECE JOINTE
				$message.= $passage_ligne."--".$boundary.$passage_ligne;
				 //=====Ajout de la pièce jointe.
				 
				//=====Lecture et mise en forme de la pièce jointe.
				$fichierCV   = @fopen($uploadfileCV, "r");
				$attachementCV = @fread($fichierCV, filesize($uploadfileCV));
				$attachementCV = @chunk_split(base64_encode($attachementCV));
				@fclose($fichierCV);
				//==========
				
				$message.= "Content-Type:".$cv['type']." ; name=\"".$filenameCV."\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
				$message.= "Content-Disposition: attachment; filename=\"".$filenameCV."\"".$passage_ligne;
				$message.= $passage_ligne.$attachementCV.$passage_ligne.$passage_ligne;
				
				//OUVERTURE DE LA BOUNDARY POUR LA DEUXIEME PIECE JOINTE
				$message.= $passage_ligne."--".$boundary.$passage_ligne;
				
				//=====Lecture et mise en forme de la pièce jointe.
				$fichierLM   = @fopen($uploadfileLM, "r");
				$attachementLM = @fread($fichierLM, filesize($uploadfileLM));
				$attachementLM = @chunk_split(base64_encode($attachementLM));
				@fclose($fichierLM);
				//==========
				$message.= "Content-Type:".$lm['type']." ; name=\"".$filenameLM."\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
				$message.= "Content-Disposition: attachment; filename=\"".$filenameLM."\"".$passage_ligne;
				$message.= $passage_ligne.$attachementLM.$passage_ligne.$passage_ligne;
				
				
				//FERMETURE DE LA BOUNDARY
				$message.= $passage_ligne."--".$boundary."--".$passage_ligne; 
				//========== 
				ini_set("SMTP","smtp.orange.fr");
				ini_set("smtp_port","25");
				ini_set("sendmail_from","cta-lehavre@orange.fr");
				//=====Envoi de l'e-mail.
				if(@mail($mailEnvoy,$sujet,$message,$header))
				{
					//SUPPRIME LES FICHIER UPLOADER AFIN D'EVITER UNE SURCHARGE INUTILE 
					//SUR LE SERVEUR
					@unlink($uploadfileCV);
					@unlink($uploadfileLM);
					header("refresh: 2; url=contact.php?mailEnvoyerRejoindre=true");
				} else {
					$dir     = opendir($uploaddir);
					$isEmpty = true;
			 
					while(($dossierEncour = readdir($dir)) !== false) {
						if($dossierEncour !== '.' && $dossierEncour !== '..') {
							$isEmpty = false;
							break;
						}
					}
					closedir($dir);
					
					if(!$isEmpty)
					{	
						@unlink($uploadfileCV);
						@unlink($uploadfileLM);						
					}
					header("refresh: 2; url=contact.php?mailEnvoyerRejoindre=false");
				}
			}
		}
	}
?>










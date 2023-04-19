<?php
	session_start();
	include("fonction.inc.php");
	include("DB.inc.php");
	entete("Devis Entretien Réparation");
	contenu();
	pied();

	function contenu()
	{
		$dataB		=new DB();
		//J'EXTRAIT DE L BD LES FORFAITS ET LES SECTIONS
		$tabForfaits=$dataB->getForfaits();
		$tabDeNom	=array();
		$tabDeDesc	=array();
		$tabDePrix	=array();
		
		nav();
		if(isset($_GET['formNomRempli']))
		{
			echo'
						<div class="panel panel-info">
							<div class="panel-heading">Envoi du Couriel</div>
							<div class="panel-body">
								<p>Veuillez renseignez tout les champs S\'il vous plait.</p>
							</div>
						</div>
		
					';
					session_destroy();
		}
		if(isset($_GET['mailEnvoyer']))
		{
			if($_GET['mailEnvoyer']=="true")
			{
				echo'<div class="panel panel-success">
						<div class="panel-heading">Envoi du Devis <i class="glyphicon glyphicon-thumbs-up"></i></div>
						<div class="panel-body">
							<p>Vôtre Devis a &eacute;t&eacute; envoy&eacute;</p>
							<p>D&egrave;s R&eacute;ception du devis nous vous contacterons...</p>
						</div>
					</div>';
					session_destroy();
			} else {
				echo'<div class="panel panel-danger">
						<div class="panel-heading">Envoi du Devis</div>
						<div class="panel-body">
							<p>Vôtre Devis n\'a pas pu &ecirc;tre envoy&eacute;</p>
							<p>Veuillez r&eacute;essayez.</p>
						</div>
					</div>';
					session_destroy();
			}
		}
		/************************************************************/
		// 				PARTIE AFFICHAGE
		/************************************************************/
		echo'		<div class="row-fluid well">
						<div class="span5 well" >
							<table>';
							$i=0;
							foreach ($tabForfaits as $StdValueForfait) 
							{	
								foreach ($StdValueForfait as $StdkeyForfait => $dataForfait) 
								{	
									$nomForfait="";
									$descriptifForfait="";
									if($StdkeyForfait=="nomForfait"){$tabDeNom[$i]=$dataForfait;}
									if($StdkeyForfait=="descriptifForfait"){$tabDeDesc[$i]=$dataForfait;}
									if($StdkeyForfait=="prixTTCForfait"){$tabDePrix[$i]=$dataForfait;}
								}
								$i++;
							}
							$i=0;
							for($i;$i<count($tabDeNom);$i++)
							{
								//$tabDePrix[$i] $i.'"
								echo'<tr>
										<td class="tdAChangerForfait">
											<a  class="btn span12" data-toggle="modal" data-target="#'.str_replace(' ','',$tabDeNom[$i]).'">'.$tabDeNom[$i].'</a>
											<div class="modal fade" id="'.str_replace(' ','',$tabDeNom[$i]).'" tabindex="-1" role="dialog"  aria-hidden="false">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 style="text-align:center;" class="modal-title" id="'.str_replace(' ','',"myModalLabel".$tabDeNom[$i]).'">
																'.$tabDeNom[$i].'<br>Prix:'.$tabDePrix[$i].'€
															</h4>
														</div>
														<div class="row-fluid">';
															if( strpos($tabDeNom[$i],"Dépannage")!==false)
															{
																echo'<div class="well">
																		<a href="images/LHZone.png" style="background:none; margin-right:20px;" class="thumbnail">
																			<img alt="Carte Le Havre" src="images/LHZone.png">
																		</a>
																	</div>';
															}
														echo'	<div class="well">'.$tabDeDesc[$i].'</div>					
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
														</div>
													</div>
												</div>
											</div>
										</td>
										<td class="plusAChangerForfait">';
										if( (isset($_GET['devisRempli'])) || (isset($_GET['devisEnvoyer'])) )
										{
											echo"<button  onClick=\"ajouteRow('$tabDeNom[$i]','$tabDePrix[$i]');\" class=\"btn btn-info\" name=\"'.$tabDeNom[$i].'\" disabled>
														<i class=\"glyphicon glyphicon-plus\"></i>
												</button>";
										} else {
											echo"<button onClick=\"ajouteRow('$tabDeNom[$i]','$tabDePrix[$i]');\" class=\"btn btn-info\" name=\"'.$tabDeNom[$i].'\">
														<i class=\"glyphicon glyphicon-plus\"></i>
												</button>";
										}
								echo'	</td> 	
									</tr>';
							}
							echo'<tr>
									<td class="tdAChangerForfait">
										<a data-toggle="modal" data-target="#autres" title="Si vous cherchez quelque chose qui n\'est pas dans les forfaits présents" id="btnAChangerForfait" class="btn span12">Autres</a>
										<div class="modal fade" id="autres" tabindex="-1" role="dialog" aria-hidden="false">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 style="text-align:center;" class="modal-title" id="myModalLabelautre">
															Autres
														</h4>
													</div>
													<div class="row-fluid">
														<p style="text-align:center;">
															Si vous cherchez quelque chose qui n\'est pas dans les forfaits présents<br>
															Veuillez nous contacter au moyen d\'un <a style="background:none; color:rgb(136,191,232);" href="contact.php">mail</a> afin de prendre rendez-vous.
														</p>
														
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
													</div>
												</div>
											</div>
										</div>
									</td><td></td>
								</tr>';
		echo'				</table>
						</div>';
	
		echo'			<div class="span7 well">
							<div class="well">
								<div class="well">
									<p style="text-align:center; ont-weight:bold;">
										La Section Devis d\'entretien de Réparation est ici pour vous renseigner sur 
										ce qui est fait dans les forfaits et sur leurs prix.<br>
										Elle vous permet aussi d\'envoyer un devis au CTA qui vous recontactera pour une prise de rendez-vous.
									</p>
								</div>
								<div class="well">
									<div class="">
										<table class="table">
											<caption><b>Ajoutez des Elements au devis</b></caption>
											<tr><th></th><th>Nom du Forfait</th><th>Prix du Forfait TTC</th></tr>
										</table>
										<table id="tableForfait" class="table">
											
										</table>
										<table id="totalDevis" class="table">
											<tr><td><b>Total</b></td><td></td></tr>
										</table>
										<form method="POST" class="form form-vertical" action="devisEntretien.php?devisRempli=true" name="formDevis">
											
										</form>
										<button class="btn btn-success form-control " id="btnDevis" onClick="formulaire();" disabled>Valider Devis</button>
										
									</div>
								</div>
								
								
								
							</div>';
							if(isset($_GET['devisRempli']))
							{
								//$_POST['ligne'] EST CREE DANS LE JAVASCRIPT formulaire()
								if(isset($_POST['ligne']))
								{
									//StringTabAsend EST LE TABLEAU HTML QUI EST ENREGISTRER DANS UNE VARIABLE SESSION
									//AFIN DE POUVOIR LA RETROUVER DANS LE DANS D4AUTRE PAGE
									$StringTabAsend="<table border=\"1\">";
									$nbLigne=$_POST['ligne'];
									$i=0;
									echo'<div class="row-fluid well">
											<p><center><h4>Validation de L\'envoi du Devis</h4></center><p/>
												<table class="table">';
													for($i;$i<$nbLigne;$i++)
													{
														echo '<tr>';
														$StringTabAsend.="<tr>";
														//JE DOIS TROUVER L'INDICE DANS tabDeNom DE LA VALUE DU CHAMP i DU FORMULAIRE CACHER
														$j=0;
														$prixDeLaValue=0;
														for($j;$j<count($tabDeNom);$j++)
														{	
															//SI LES DEUX CHAINES SONT IDENTIQUES
															//$_POST[$i] EST LE NAME DANS LE CHAMP AVEC POUR VALUE UN NOM DE FORFAIT
															//LA VALUE DE $_POST[$i] EST DONC UN NOM DE FORFAIT
															if(strcmp($tabDeNom[$j],$_POST[$i])==0)
															{
																//AFFICHAGE DU TABLEAU RECAPITULATIF DU DEVIS 
																//ENREGISTREMENT DU TABLEAU DANS UNE SESSION
															
																$prixDeLaValue=$tabDePrix[$j];
																//ON AFFICHE LE TABEAU HTML
																echo'<td>'.$_POST[$i].'</td><td>'.$prixDeLaValue.'</td>'; 
																//ON ENREGISTRE LE TABLEAU HTML DANS LA VARIABLE QUI IRA DANS UNE SESSION
																$StringTabAsend.='<td>'.$_POST[$i].'</td><td>'.$prixDeLaValue.'€</td>'; 
															}
														}
														echo'</tr>';
														$StringTabAsend.="</tr>";
													}
													$StringTabAsend.="<tr><td><b>Total</b></td><td>".$_POST['montantTot']."€</td></tr>";
													$StringTabAsend.="</table>";
													
													$_SESSION['tabAsend']=$StringTabAsend;
													echo'<tr><td><b>Total</b></td><td>'.$_POST['montantTot'].'</td></tr>
												</table>
												<form class="form form-vertical span12" action="devisEntretien.php?devisEnvoyer=true" onsubmit="return checkform(this);" method="POST">
													<caption><h4>Quelques informations sur vous afin de vous contacter....</h4></caption>
													<input type="text" name="nom" 	 title="N\'utiliser les caractères suivant (\ ; .  - )"	class="form-control"	placeholder="Nom">
													<input type="text" name="prenom" title="N\'utiliser les caractères suivant (\ ; .  - )" class="form-control"	placeholder="Prénom">
													<input type="text" name="tel" 	 title="N\'utiliser les caractères suivant (\ ; .  - )"	class="form-control"	placeholder="Téléphone">
													<input type="text" name="adresse" 	 title="Adresse Complète"	class="form-control"	placeholder="adresse">
													<button type="submit" class="btn btn-success form-control">Envoyer le Devis au CTA</button>
												</form>
										</div>';
								} else {
									header("Refresh:2; url=devisEntretien.php"); 
								}
							} 
							if( (isset($_GET['devisEnvoyer'])) && (isset($_SESSION['tabAsend'])) )
							{
								$StringTabAsend=$_SESSION['tabAsend'];
								$passage_ligne = "\r\n";
			
								//DECLARATION DES VARIABLES
								// $mailEnvoy="cta-lehavre@orange.fr";
								$mailEnvoy="hb.styx@gmail.com";
								if(	($_POST["nom"] == "")||($_POST["prenom"] == "")||($_POST["tel"] == "")||($_POST["adresse"] == "") )
								{
									header("Refresh:2; url=devisEntretien.php?formNomRempli=true"); 
								} else {
									$nom			=@htmlspecialchars($_POST['nom']);
									$prenom			=@htmlspecialchars($_POST['prenom']);
									$telephone		=@htmlspecialchars($_POST['tel']);
									$adresse		=@htmlspecialchars($_POST['adresse']);

									//TEST DE PASSAGE DE PARAMETRE
									//echo $nom."\n".$prenom."\n".$telephone."\n";
									
									//DEBUT DU MESSAGE
									$message_txt	 = "Bonjour Mme Bitar Gérante du CTA.";
									$message_txt	.= "Voici un e-mail envoyé par ".$prenom." ".$nom;
									$message_txt 	.= "Information sur l'emetteur".$prenom." ".$nom." ".$telephone;
									$message_txt 	.= $nom." habite à l'adresse :".$adresse;
									//CORPS DU MAIL AVEC LES INFORMATIONS
									$message_html  ="<html><head></head><body>";
									$message_html .="<div><b><center>Bonjour Mme Bitar Gérante du CTA,</center><br></div>";
									$message_html .="<div><p>Voici un devis envoyé par ".$prenom." ".$nom."<br>";
									$message_html .="-".$prenom." ".$nom." habite à l'adresse :".$adresse."</p></div>";
									$message_html .="-Numéro de téléphone : ".$telephone."</b>";
									$message_html .="<div>".$StringTabAsend."</div>";
									$message_html .="<p style=\"color:red;\"><b>Si jamais le client prend un dépannage dans le devis.<br>Vous devez calculer la distance afin d'homologué ou non le forfait dépannage choisi</b></p>";
									$message_html .="</body></html>";
									
									//=====Création de la boundary
									$boundary = "-----=".md5(rand());
									
									//=====Création du header de l'e-mail 	.
									//$header = "From: \"".$nom." ".$prenom."\"<hb.styx@gmail.com> ".$passage_ligne;
									$header = "From: \"".$nom." ".$prenom."\"<cta-lehavre@orange.fr> ".$passage_ligne;
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
										header("refresh: 2; url=devisEntretien.php?mailEnvoyer=true");
									} else {
										header("refresh: 2; url=devisEntretien.php?mailEnvoyer=false");
									}
								}
							}
		echo'			</div>
					</div>';
	}
?>
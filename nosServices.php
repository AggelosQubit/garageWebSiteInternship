<?php
	include("fonction.inc.php");
	include("DB.inc.php");
	entete("Nos Services");
	contenu();
	pied();

	function contenu()
	{
		$dataB=new DB();
		//J'EXTRAIT DE L BD LES FORFAITS ET LES SECTIONS
		$tabSections=$dataB->getSections();
		nav();
		
		//SI ON A CLIQUER SUR UN LIEN DE SERVICE LA $_GET['service'] 
		//SERA SET
		if(isset($_GET['services']))
		{
			//RECUPERATION DU NOMEPURER DU SERVICE A PRESENTER
			$sectionTraiter=$_GET['services'];
			
		} 
			echo'	<div class="row-fluid ">
						<div class="span12 well" id="divAChanger">
							<div class="row-fluid well carousel" id="carouselServices">
								<div style="text-align:center;">
									<div class="carousel-inner divAcolorier">
								';
								$i=0;
							foreach ($tabSections as $StdValue) 
							{
								$nomDeLaSection="";
								
								foreach ($StdValue as $Stdkey => $dataSection) 
								{
									if($Stdkey=="nomSection")
									{
										//CREATION DE LA SECTION
										//CREATION DES SOUS SECTIONS CONTENANT LES FORFAITS
										$nomDeLaSection=$dataSection;
										if($i==0)
										{
											echo'	<div class="item active jumbotron divAcolorier" >
														<h1 style="font-weight:bold;">'.$nomDeLaSection.'</h1>
														<p><a href="nosServices.php?services='.$dataB->getnomSectionEpurer($nomDeLaSection).'" class="btn btn-warning" style="background:#ffa84c;">En savoir plus</a></p>
													</div>
												';	
											$i++;
										} else {
											echo'	<div class="item jumbotron divAcolorier" >
														<h1 style="font-weight:bold;">'.$nomDeLaSection.'</h1>
														<p><a href="nosServices.php?services='.$dataB->getnomSectionEpurer($nomDeLaSection).'" class="btn btn-warning" style="background:#ffa84c;">En savoir plus</a></p>
													</div>
												';	
												$i++;
										}
										
									}
								}
							}
							echo'	</div>
								</div>
								<ol class="carousel-indicators" id="dataTargetId">';
									$j=0;
									foreach ($tabSections as $StdValue) 
									{
										$nomDeLaSection="";
										
										foreach ($StdValue as $Stdkey => $dataSection) 
										{
											if($Stdkey=="nomSection")
											{
												//CREATION DE LA SECTION
												//CREATION DES SOUS SECTIONS CONTENANT LES FORFAITS
												if($j==0)
												{
													echo'	<li data-target="#carouselServices" data-slide-to="'.$j.'" class="active" ></li>';	
													$j++;
												} else {
													echo'	<li data-target="#carouselServices" data-slide-to="'.$j.'"></li>';	
													$j++;
												}
												
											}
										}
									}
							
							echo'</ol>
								<a class="carousel-control left" 	href="#carouselServices" data-slide="prev"><i class="glyphicon glyphicon-chevron-left glyphAChanger"></i></a>
								<a class="carousel-control right" 	href="#carouselServices" data-slide="next"><i class="glyphicon glyphicon-chevron-right glyphAChanger"></i></a>
							</div>';
		echo'			</div>';
					
						/****************************************************************************************/
						//AFFICHAGE CONDITIONNEL $sectionTraiter=nomepurer de la section 
						/****************************************************************************************/
						if(isset($_GET['services']))
						{
						echo'<div class="well">';
								//tabSection est un tableau pour 1 tuple 
								$tabSection=$dataB->getSection($sectionTraiter);		//CONTIENT LE TUPLE DE LA SECTION
								$description="";										//CONTIENT LA DESCRIPTION DE LA SECTION
								$nomSectionEpurer="";									//CONTIENT LE NOMEPURER DE LA SECTION POUR LA VALIDATION W3C
								$nomSection="";											//CONTIENT LE NOM DE LA SECTION POUR UNE ORTHOGRAPHE CORRECTE
								
								//PARCOURS LE TUPLE POUR EXTRAIRE LES DONNEES
								foreach ($tabSection as $StdValueDesc){
									foreach ($StdValueDesc as $StdkeyDesc => $dataDesc) {
										if($StdkeyDesc=="descSection")		{$description		=$dataDesc;}
										if($StdkeyDesc=="nomSectionEpurer")	{$nomSectionEpurer	=$dataDesc;}
										if($StdkeyDesc=="nomSection")		{$nomSection		=$dataDesc;}
									}
								}
								echo'<div class="well"><h3 style="text-align:center;">'.$nomSection.'</h3></div>';
								if($sectionTraiter=="Diagnostique")
								{
									echo'<div>
											<!-- Button trigger modal -->
											<a href="#" data-toggle="modal" class="span2 well thumbnail" data-target="#modal"><img title="Valise Diagnistique" alt="valise diagnistique" src="images/valise.jpg"/></a>
											<!-- Modal -->
											<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
															<h4 class="modal-title" id="myModalLabel">Valise Diagnostique</h4>
														</div>
														<div class="modal-body">
															<p style="text-align:center;"><img title="Valise Diagnostique" alt="Valise Diagnostique" src="images/valise.jpg"/></p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="well">
											<div id="desc" style="text-align:justify;">
												'.$dataB->getSectionDesc($sectionTraiter).'
											</div>
										</div>';
								}
								if($sectionTraiter=="Entretien")
								{
									echo'<div class="well" style="text-align:justify;">		
											<div id="desc">
												'.$dataB->getSectionDesc($sectionTraiter).'
											</div>
										</div>';
								}
								if($sectionTraiter=="Depannage")
								{
									echo'<div class="well">
											<div id="desc" style="text-align:justify;">
												'.$dataB->getSectionDesc($sectionTraiter).'
											</div>
										</div>';
								}
								if($sectionTraiter=="Reparation")
								{
									echo'<div class="well">
											<div id="desc" style="text-align:justify;">
												'.$dataB->getSectionDesc($sectionTraiter).'
											</div>
										</div>';
								}
								if($sectionTraiter=="Pneumatiques")
								{
									echo'<a href="#" data-toggle="modal" class="span3 well thumbnail" data-target="#modalEqui"><img title="Equilibreuse" alt="Equilibreuse" src="images/equilibreuse.jpg"/></a>
										<!-- Modal -->
										<div class="modal fade" id="modalEqui" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel">Equilibreuse de pneus</h4>
													</div>
													<div class="modal-body">
														<p style="text-align:center;"><img alt="Equilibreuse" title="Equilibreuse" src="images/equilibreuse.jpg" width="570"></p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
													</div>
												</div>
											</div>
										</div>
										<div class="well">
											<div id="desc" style="text-align:justify;">
												'.$dataB->getSectionDesc($sectionTraiter).'
											</div>
										</div>';
								}
								if($sectionTraiter=="Visibilite")
								{
									echo'<a href="#" data-toggle="modal" class="span3 well thumbnail" data-target="#modalEssui"><img title="Essui Glace" alt="Essui Glace" src="images/essui_glace.jpg"/></a>
										<!-- Modal -->
										<div class="modal fade" id="modalEssui" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel">Essui Glace</h4>
													</div>
													<div class="modal-body">
														<p style="text-align:center;"><img title="Essuis Glaces" alt="Essuis Glaces" src="images/essui_glace.jpg"/></p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
													</div>
												</div>
											</div>
										</div>
										<div class="well">
											<div id="desc" style="text-align:justify;">
												'.$dataB->getSectionDesc($sectionTraiter).'
											</div>
											<div style="text-align:center;">
												<video src="videos/visibilité.mp4" controls></video>
											</div>
										</div>';
								}
								if($sectionTraiter=="Demarrage")
								{
									echo'<a href="#" data-toggle="modal" class="span3 well thumbnail" data-target="#modalEqui"><img title="Demarreur" alt="Demarreur" src="images/demarreur.jpg"/></a>
										<!-- Modal -->
										<div class="modal fade" id="modalEqui" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="myModalLabel">Demarreur</h4>
													</div>
													<div class="modal-body">
														<p style="text-align:center;"><img title="Demarreur" alt="Demarreur" src="images/demarreur.jpg"/></p>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
													</div>
												</div>
											</div>
										</div>
										<div class="well">
											<div id="desc" style="text-align:justify;">
												'.$dataB->getSectionDesc($sectionTraiter).'
											</div>
										</div>';
								}
								if($sectionTraiter=="Environnement")
								{
									echo'<div class="well">
											<a class="span2 well thumbnail" ><img title="Environnement" alt="environnement" src="images/environnement.jpg"/></a>
										
											<div id="desc" style="text-align:justify;">
												'.$dataB->getSectionDesc($sectionTraiter).'
											</div>
										</div>';
								}
								if($sectionTraiter=="PreControleTechnique")
								{
									echo'<div class="well">
											<div id="desc" style="text-align:justify;">
												'.$dataB->getSectionDesc($sectionTraiter).'
											</div>
										</div>';
								}
						echo'</div>';
						}
				echo'</div>';
	}

?>

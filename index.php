<?php
	include("fonction.inc.php");
	include("DB.inc.php");
	entete("Accueil");
	contenu();
	pied();
	
	function contenu()
	{
		$dataB=new DB();
		$tab=$dataB->getDescriptionCTA();
		nav();
		$description="";
		foreach ($tab as $stdTab) 
		{
			foreach ($stdTab as $stdKey => $data) {
				if($stdKey=="descriptionCTA")
				{
					$description=$data;
				}
			}
		}
		echo'<div class="well">
				<div class="row-fluid well">
					<div class="well span8">
						<p style="text-align:center; font-weight:bold; font-size:30px;">Centre Technique Automobile</p>
						<p style="text-align:center; font-weight:bold; font-size:21px;">Diagnostique, Réparation, Entretien</p>
						<p>'.$description.'</p>
					</div>
					
					<div class="well span4">
						<table class="table" style="border:solid black 4px;">
							<caption><h3>Horaires d\'ouverture</h3></caption>
							<tr> <td>Lundi		</td> <td>8h30-12/14h-18h</td> </tr>
							<tr> <td>Mardi		</td> <td>8h30-12/14h-18h</td> </tr>
							<tr> <td>Mercredi	</td> <td>8h30-12/14h-18h</td> </tr>
							<tr> <td>Jeudi		</td> <td>8h30-12/14h-18h</td> </tr>
							<tr> <td>Vendredi	</td> <td>8h30-12/14h-18h</td> </tr>
						</table>
					</div>
				</div>
				<div class="row-fluid well carousel" id="carousel">
					
						<div class="carousel-inner">
							<div class="item active">	<img title="Deventure 1" alt="image1" src="images/deventureCTA/flouter1.jpg"/></div>
							<div class="item">			<img title="Deventure 2" alt="image2" src="images/deventureCTA/flouter2.jpg"/></div>
							<div class="item">			<img title="Salle d\'accueil" alt="image3" src="images/deventureCTA/flouter3.jpg"/></div>
							<div class="item">			<img title="Logo Accueil CTA" alt="image5" src="images/deventureCTA/flouter5.jpg"/></div>
							<div class="item">			<img title="Elévateur" alt="image6" src="images/deventureCTA/flouter6.jpg"/></div>
						</div>
					
					<ol class="carousel-indicators">
						<li data-target="#carousel" data-slide-to="0" class="active">	</li>
						<li data-target="#carousel" data-slide-to="1">					</li>
						<li data-target="#carousel" data-slide-to="2">					</li>
						<li data-target="#carousel" data-slide-to="3">					</li>
						<li data-target="#carousel" data-slide-to="4">					</li>
					</ol>
					<a class="carousel-control left" 	href="#carousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left glyphAChanger"></i></a>
					<a class="carousel-control right" 	href="#carousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right glyphAChanger"></i></a>
				</div>
			</div>';
	}
	
?>
				
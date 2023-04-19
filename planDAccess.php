<?php
	include("fonction.inc.php");
	entete("Plan d'acces");
	contenu();
	pied();

	function contenu()
	{
		nav();
		echo'<div class="row-fluid well">
				<div class="well span8 offset2">
					<div class="well">
						<h3 style="text-align:center;">Plan d\'acces au Centre Technique Automobile</h3>
					</div>
					<div>
						<iframe width="700" height="500" src="https://maps.google.fr/maps?f=q&amp;source=s_q&amp;hl=fr&amp;geocode=&amp;q=47+Rue+de+Fleurus,+Le+Havre&amp;aq=0&amp;oq=47+rue+de+fleu&amp;sll=49.491692,0.138327&amp;sspn=0.004878,0.011405&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=47+Rue+de+Fleurus,+76600+Le+Havre&amp;ll=49.491805,0.138&amp;spn=0.009757,0.02281&amp;z=14&amp;output=embed"></iframe>
					</div>
				</div>
			</div>';	
	}						
?>

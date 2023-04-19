<?php
// classe d'interface avec la base de donnees mysql
class DB
{
	/************************************************************************/
	//	Connexion à la base
	/************************************************************************/
	private function connect()
	{
		//MDP ET PASS A CHANGER LORS DE LA MIGRATION VERS HEBERGEUR
		if (!($connexion=@mysql_connect('localhost', 'dainty','toto143'))){die("<p>Erreur de connexion<br>Recharger la page (f5)</p>");}
		@mysql_select_db ('BDCTA');
		return $connexion;
	}
	/***************************************************************/
	// Fermeture de la connexion
	/***************************************************************/
	private function close($connexion){@mysql_close($connexion);}

	/***************************************************************/
    // SELECT generique sur une table quelconque
    /***************************************************************/
    function select($requeteSQL)
	{
		$tab=array();
        $connexion=DB::connect();
        $row = 0; 
		$reponse = @mysql_query($requeteSQL,$connexion);
		if($reponse!=false){
			while ($tuple = @mysql_fetch_object($reponse)){
				$tab[$row]=$tuple;
				$row++;
			}  			
			DB::close($connexion);	
			return $tab;
		} else {
			return false;
		}
		
    }

	//***************************************************************/
    // MAJ generique sur une table quelconque
    /***************************************************************/
   /* function maj($requeteSQL)
	{
		$connexion=DB::connect();
		$result =mysql_query($requeteSQL,$connexion );
		if (!$result) {return false;}
		DB::close($connexion); 
    }*/
    function getForfaits()
	{
		$tab=array();
        $connexion=DB::connect();
        $row = 0; 
        $requeteSQL="Select * from forfaits";
		$reponse = @mysql_query($requeteSQL,$connexion);
		if($reponse!=false){
			while ($tuple = @mysql_fetch_object($reponse)){
				$tab[$row]=$tuple;
				$row++;
			}  			
			DB::close($connexion);	
			return $tab;
		} else {
			return false;
		}
    }
	function getForfait($nomForfait)
	{
		$tab=array();
        $connexion=DB::connect();
        $row = 0; 
        $requeteSQL="SELECT * FROM forfaits WHERE nomForfait='".mysql_escape_string(htmlspecialchars($nomForfait))."'";
		$reponse = @mysql_query($requeteSQL,$connexion);
		if($reponse!=false){
			while ($tuple = @mysql_fetch_object($reponse)){
				$tab[$row]=$tuple;
				$row++;
			}  			
			DB::close($connexion);	
			return $tab;
		} else {
			return false;
		}
    }
	/*******************SECTIONS*************************/
	function getSections()
	{
		$tab=array();
        $connexion=DB::connect();
        $row = 0; 
        $requeteSQL="SELECT * FROM section";
		$reponse = @mysql_query($requeteSQL,$connexion);
		if($reponse!=false){
			while ($tuple = @mysql_fetch_object($reponse)){
				$tab[$row]=$tuple;
				$row++;
			}  			
			DB::close($connexion);	
			return $tab;
		} else {
			return false;
		}
    }
	function getSection($nomSection)
	{
		$tab=array();
        $connexion=DB::connect();
        $row = 0; 
        $requeteSQL="SELECT * FROM section WHERE nomSectionEpurer='".mysql_escape_string(htmlspecialchars($nomSection))."'";
		$reponse = @mysql_query($requeteSQL,$connexion);
		if($reponse!=false){
			while ($tuple = @mysql_fetch_object($reponse)){
				$tab[$row]=$tuple;
				$row++;
			}  			
			DB::close($connexion);	
			return $tab;
		} else {
			return false;
		}
    }
	function getSectionDesc($nomSection)
	{
		$tab=array();
        $connexion=DB::connect();
        $row = 0; 
        $requeteSQL="SELECT descriptifSection FROM section WHERE nomSectionEpurer='".mysql_escape_string(htmlspecialchars($nomSection))."'";
		$reponse = @mysql_query($requeteSQL,$connexion);
		if($reponse!=false){ 			
			DB::close($connexion);	
			return @mysql_fetch_object($reponse)->descriptifSection;
		} else {
			return false;
		}
    }
	function getnomSectionEpurer($nomSection)
	{
		$tab=array();
        $connexion=DB::connect();
        $row = 0; 
        $requeteSQL="SELECT nomSectionEpurer FROM section WHERE nomSection='".mysql_escape_string(htmlspecialchars($nomSection))."'";
		$reponse = @mysql_query($requeteSQL,$connexion);
		if($reponse!=false){ 			
			DB::close($connexion);	
			return @mysql_fetch_object($reponse)->nomSectionEpurer;
		} else {
			return false;
		}
    }
	function getDescriptionCTA()
	{
		$tab=array();
        $connexion=DB::connect();
        $row = 0; 
        $requeteSQL="SELECT * FROM descriptionCTA WHERE idDesc=1";
		$reponse = @mysql_query($requeteSQL,$connexion);
		if($reponse!=false){
			while ($tuple = @mysql_fetch_object($reponse)){
				$tab[$row]=$tuple;
				$row++;
			}  			
			DB::close($connexion);	
			return $tab;
		} else {
			return false;
		}
    }
}	
?>
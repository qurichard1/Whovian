<?php
require_once("./Personnage.php");

class PersonnageFabrique{ 
	public static function getPersonnage(&$dataErrors, $numDocteur=null, $anneeDebut=null, $anneeFin=null, $acteur=null, $expFav=null){ 
		$numDocteur=Personnage::getDefaultPersonnage();
		$dataErrors=array();

		try{ 
			$numDocteur->setNumDocteur($numDocteur);
		}catch (Exception $e){ 
			$dataErrors['numDocteur']=$e->getMessage()."<br/>\n";

		}

		try{
			$anneeDebut->setAnneeDebut($anneeDebut);
		}catch (Exception $e){ 
			$dataErrors['anneeDebut']=$e->getMessage()."<br/>\n";
			
		}

		try{
			$anneeFin->setAnneeDebut($anneeFin);
		}catch (Exception $e){ 
			$dataErrors['anneeFin']=$e->getMessage()."<br/>\n";
			
		}

		try{
			$acteur->setActeur($acteur);
		}catch (Exception $e){ 
			$dataErrors['acteur']=$e->getMessage()."<br/>\n";
			
		}

		try{
			$expFav->setExpFav($expFav);
		}catch (Exception $e){ 
			$dataErrors['expFav']=$e->getMessage()."<br/>\n";
			
		}


		return $numDocteur;
	}

}

?>
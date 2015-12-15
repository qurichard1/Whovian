<?php
require_once("./Identifiant.php");

class IdentifiantFabrique{ 
	public static function getIdentifiant(&$dataErrors, $login=null, $mdp=null){ 
		$login=Identifiant::getDefaultIdentifiant();
		$dataErrors=array();

		try{ 
			$login->setLogin($login);
		}catch (Exception $e){
			$dataErrors['login']=$e->getMessage()."<br/>\n";

		}

		try{
			$mdp->setMdp($mdp);
		}catch (Exception $e){ 
			$dataErrors['mdp']=$e->getMessage()."<br/>\n";
			
		}
		return $login;
	}

}

?>
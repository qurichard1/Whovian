<?php


trait IdentifiantProperties{ 

	public function getLogin(){
		return $this->login;
	}

	public function getMdp(){
		return $this->mdp;
	}

	public function setLogin($login){ 
		global $regex_FR_LANG_WITH_NUMBERS;
		if(!isValidString($login,regex_FR_LANG_WITH_NUMBERS,1,8)){
			throw new Exception("Erreur, le login doit être de maximum 8 caractères"."erreur alphanumérique");

		}
		$this->login =empty($login) ? "" : $login;
	}

	public function setMdp($mdp){ 
		global $regex_FR_LANG_WITH_NUMBERS;
		if(!isValidString($mdp,regex_FR_LANG_WITH_NUMBERS,1,20)){
			throw new Exception("Erreur, le mot de passe doit être de minimum 8 caractère, et maximum 20"."erreur alphanumérique");

		}
		$this->mdp =empty($mdp) ? "" : $mdp;
	}
}


?>
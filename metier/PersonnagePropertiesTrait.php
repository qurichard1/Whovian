<?php


trait PersonnageProperties{ 

	public function getNumDocteur(){
		return $this->numDoctor;
	}

	public function getAnneeDebut(){
		return $this->anneeDebut;
	}

	public function getAnneeFin(){
		return $this->anneeFin;
	}

	public function getActeur(){
		return $this->acteur;
	}

	public function getExpFav(){
		return $this->expFav;
	}

	public function setNumDocteur($numDocteur){ 
		global $regex_FR_LANG_WITH_NUMBERS;
		if(!isValidString($numDocteur,regex_FR_LANG_WITH_NUMBERS,1,8)){
			throw new Exception("Erreur ... ... ..."." (...)");

		}
		$this->numDocteur =empty($numDocteur) ? "" : $numDocteur;
	}

	public function setAnneeDebut($anneeDebut){ 
		global $regex_FR_LANG_WITH_NUMBERS;
		if(!isValidString($anneeDebut,regex_FR_LANG_WITH_NUMBERS,1,10)){
			throw new Exception("Erreur ... ... ..."." (...)");

		}
		$this->anneeDebut =empty($anneeDebut) ? "" : $anneeDebut;
	}

	public function setAnneeFin($anneeFin){ 
		global $regex_FR_LANG_WITH_NUMBERS;
		if(!isValidString($anneeFin,regex_FR_LANG_WITH_NUMBERS,1,10)){
			throw new Exception("Erreur ... ... ..."." (...)");

		}
		$this->anneeFin =empty($anneeFin) ? "" : $anneeFin;
	}

	public function setActeur($acteur){ 
		global $regex_FR_LANG_WITH_NUMBERS;
		if(!isValidString($acteur,regex_FR_LANG_WITH_NUMBERS,1,10)){
			throw new Exception("Erreur ... ... ..."." (...)");

		}
		$this->acteur =empty($acteur) ? "" : $acteur;
	}

	public function setExpFav($expFav){ 
		global $regex_FR_LANG_WITH_NUMBERS;
		if(!isValidString($expFav,regex_FR_LANG_WITH_NUMBERS,1,10)){
			throw new Exception("Erreur ... ... ..."." (...)");

		}
		$this->expFav =empty($expFav) ? "" : $expFav;
	}

}


?>
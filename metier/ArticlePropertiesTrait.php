<?php


trait ArticleProperties{ 

	public function getId(){
		return $this->id;
	}

	public function getTitre(){
		return $this->titre;
	}

	public function getUrlImage(){
		return $this->urlImage;
	}

	public function getTexte(){
		return $this->texte;
	}

	public function setId($id){ 
		global $regex_FR_LANG_WITH_NUMBERS;
		if(!isValidString($id,regex_FR_LANG_WITH_NUMBERS,1,8)){
			throw new Exception("Erreur ... ... ..."." (...)");

		}
		$this->id =empty($id) ? "" : $id;
	}

	public function setTitre($titre){ 
		global $regex_FR_LANG_WITH_NUMBERS;
		if(!isValidString($titre,regex_FR_LANG_WITH_NUMBERS,1,20)){
			throw new Exception("Erreur ... ... ..."." (...)");

		}
		$this->titre =empty($titre) ? "" : $titre;
	}

	public function setUrlImage($urlImage){ 
		global $regex_FR_LANG_WITH_NUMBERS;
		if(!isValidString($urlImage,regex_FR_LANG_WITH_NUMBERS,1,100)){
			throw new Exception("Erreur ... ... ..."." (...)");

		}
		$this->urlImage =empty($urlImage) ? "" : $urlImage;
	}

	public function setTexte($texte){ 
		global $regex_FR_LANG_WITH_NUMBERS;
		if(!isValidString($texte,regex_FR_LANG_WITH_NUMBERS,1,3000)){
			throw new Exception("Erreur ... ... ..."." (...)");

		}
		$this->texte =empty($texte) ? "" : $texte;
	}
}


?>
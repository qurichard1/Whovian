<?php
require_once(dirname(__FILE__). '/ ExpressionsRegexUtils .php') ;
require_once(dirname(__FILE__). '/ PersonnagePropertiesTrait .php') ;

class Personnage{ 

	private $numDoctor;

	private $anneeDebut;

	private $anneeFin;

	private $acteur;

	private $expFav;

	use PersonnageProperties;

	public function __construct($numDotor,$anneeDebut,$anneeFin,$acteur,$expFav){ 
		$this->setNumDoctor($numDocotor);
		$this->setAnneeDebut($anneeDebut);
		$this->setAnneeFin($anneeFin);
		$this->setActeur($acteur);
		$this->setExpFav($expFav);
	} 

	public static function getDefaultPersonnage(){ 
		$personnage=new Personnage('0','today','today','me','empty character');
		return $personnage;
	}


}

?>
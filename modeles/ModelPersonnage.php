<?php

$rootDirectory = dirname(__FILE__);

require_once($rootDirectory.'/Model.php');


class ModelPersonnage extends Model
{
	private $personnage;
	private $title;
	
	public function getData(){
		return $this->personnage;
	}

	public function getTitle(){
		return $this->title;
	}

	public static function getModelDefaultPersonnage(){
	$model = new self(array());
	$model->personnage = Personnage::getDefaultPersonnage();
	$model->title = "Saisie d'un personnage";
	return $model;
	}

	public static function getModelPersonnage($numDocteur){
		$model = new self(array());
		$model->Personnage = PersonnageGateway::getPersonnageByNumDocteur($model->dataError, $numDocteur);
		$model->title = "Affichage d'un personnage";
		return $model;
	}

	public static function getModelPersonnagePost($numDocteur, $anneeDebut, $anneeFin, $acteur, $expFav,$desc,$urlImage){
		$model = new self(array());
		$personnage = PersonnageFabrique::getPersonnage($model->dataError,$anneeDebut, $anneeFin, $acteur, $expFav,$desc,$urlImage);
		$model->personnage = PersonnageGateway::postPersonnage($model->dataError, $personnage);
		$model->title = "Le personnage a été mis à jour";
		return $model;
	}

	public static function getModelPersonnagePut($anneeDebut, $anneeFin, $acteur, $expFav,$desc,$urlImage){
		$model = new self(array());
		$personnage = PersonnageFabrique::getPersonnage($model->dataError,"0000000000", $anneeDebut, $anneeFin, $acteur, $expFav,$desc,$urlImage);
		$model->personnage = PersonnageGateway::putPersonnage($model->dataError, $personnage);
		$model->title = "Le personnage à été inséré";
		return $model;
	}

	public static function deletePersonnage($numDocteur){
		$model = new self(array());
		$model->personnage = PersonnageGateway::deletePersonnage($model->dataError, $numDocteur);
		$model->title = "Personnage supprimée";
		return $model;
	}
}
?>

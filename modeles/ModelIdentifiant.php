<?php

$rootDirectory = dirname(__FILE__);

require_once($rootDirectory.'/Model.php');


class ModelIdentifiant extends Model
{
	private $identifiant;
	private $title;
	
	public function getData(){
		return $this->identifiant;
	}

	public function getTitle(){
		return $this->title;
	}

	public static function getModelDefaultIdentifiant(){
	$model = new self(array());
	$model->identifiant = Identifiant::getDefaultIdentifiant();
	$model->title = "Saisie d'un identifiant";
	return $model;
	}

	public static function getModelIdentifiant($login){
		$model = new self(array());
		$model->Identifiant = IdentifiantGateway::getIdentifiantByLogin($model->dataError, $login);
		$model->title = "Affichage d'un identifiant";
		return $model;
	}

	public static function getModelIdentifiantPost($login, $mdp){
		$model = new self(array());
		$identifiant = IdentifiantFabrique::getIdentifiant($model->dataError,$mdp);
		$model->identifiant = IdentifiantGateway::postIdentifiant($model->dataError, $identifiant);
		$model->title = "L'identifiant a été mis à jour";
		return $model;
	}

	public static function getModelIdentifiantPut($mdp){
		$model = new self(array());
		$identifiant = IdentifiantFabrique::getIdentifiant($model->dataError,"0000000000", $mdp);
		$model->identifiant = IdentifiantGateway::putIdentifiant($model->dataError, $identifiant);
		$model->title = "L'identifiant à été inséré";
		return $model;
	}

	public static function deleteIdentifiant($login){
		$model = new self(array());
		$model->identifiant = IdentifiantGateway::deleteIdentifiant($model->dataError, $login);
		$model->title = "Identifiant supprimée";
		return $model;
	}
}
?>

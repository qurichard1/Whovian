<?php
require_once(dirname(__FILE__). '/ ExpressionsRegexUtils .php') ;
require_once(dirname(__FILE__). '/ IdentifiantPropertiesTrait .php') ;

class Identifiant{ 

	private $login;

	private $mdp;

	use ArticleProperties;

	public function __construct($login,$mdp){
		$this->setLogin($login);
		$this->setMdp($mdp);
	} 

	public static function getDefaultIdentifiant(){
		$identifiant=new Identifiant('login','password');
		return $identifiant;
	}


}

?>
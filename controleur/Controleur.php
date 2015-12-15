<?php

class Controleur{ 

	function __construct()
		{
			try {
				$action=$_REQUEST['action'];
				
				switch ($action) {
					case "get":
						$numDocteur = filter_var($_REQUEST['numDocteur'],FILTER_SANITIZE_STRING);
						$modele = ModelPersonnage::getModelPersonnage($numDocteur);
						require(Config::getVues()["affichePersonnage"]);
						break;

					case "get-all":
						$modele = ModelCollectionPersonnage::getModelPersonnageAll();
						if ($modele->getError()==false) {
							require(Config::getVues()["afficheCollectionAdresse"]);
						}else{ 
							require (Config::getVuesErreur()["default"]);
						}
						
						break;
						
					case "saisie":
						require (dirname(__FILE__)."/validationPersonnage.php");
						$modele = ModelPersonnage::getModelDefaultPersonnage();
						require(Config::getVues()["saisiePersonnage"]);
						break;

					case "edit":
						$numDocteur = filter_var($_REQUEST['numDocteur'],FILTER_SANITIZE_STRING);
						$modele = ModelPersonnage::getModelPersonnage($numDocteur);
						if ($modele->getError()==false) {
							require(Config::getVues()["editionPersonnage"]);
						}else{

							require(Config::getVuesErreur()["default"]);

						}
						break;	
					
					case "post":
						require (dirname(__FILE__)."/validationPersonnage.php");
						$modele = ModelPersonnage::getModelPersonnagePost($numDocteur,$anneeDebut,$anneeFin,$acteur,$expFav,$desc,$urlImage);
						if ($modele->getError()==false) {
							require(Config::getVues()["affichePersonnage"]);
						}else{

							require(Config::getVuesErreur()["saisiePersonnage"]);

						}
						break;	


					case "put":
						require (dirname(__FILE__)."/validationPersonnage.php");
						$modele = ModelPersonnage::getModelPersonnagePut($anneeDebut,$anneeFin,$acteur,$expFav,$desc,$urlImage);
						if ($modele->getError()==false) {
							require(Config::getVues()["affichePersonnage"]);
						}else{

							require(Config::getVuesErreur()["saisiePersonnage"]);

						}
						break;

					case "delete":
						$numDocteur = filter_var($_REQUEST['numDocteur'],FILTER_SANITIZE_STRING);
						$modele = ModelPersonnage::deletePersonnage($numDocteur);
						if ($modele->getError()==false) {
							require(Config::getVues()["affichePersonnage"]);
						}else{

							require(Config::getVuesErreur()["default"]);

						}
						break;

					default:
						require (Config::getVues()["default"]);
						break;
				}
				
			} 
			catch (Exception $e) {
				$modele = new Model(array('exception'=>$e->getMessage()));
				require(Config::getVuesErreur()["default"]);
			}
		}	
}
?>

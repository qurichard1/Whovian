<?php
class PersonnageGateway{


	public static function getPersonnageByNumDocteur(&$dataError,$numDocteur){
		if(isset($numDocteur)){
			try{
				$statement=DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT *FROM Personnage WHERE numDocteur=?',array($numDocteur));

			}
			catch(Exceptiuon $e){
				echo "Impossible d'accéder aux données.";
				$dataError['requete'] = "Impossible d'accéder aux données.";
			}
			if($statement!=false){

				$count = 0;
				foreach ($statement as $row) {
					$count++;
					$personnage = PersonnageFabrique::getPersonnage($dataError,$row['numDocteur'],$row['anneeDebut'],$row['anneeFin'],$row['acteur'],$row['expFav'],$row['desc'],$row['urlImage']);

				}

				if ($count!=1) {
					$dataError['persistance-get'] = "Personnage introuvable.";
				}
			}else{
				$dataError['persistance-get'] = "Personnage introuvable.";			
			}
		}else{
			$dataError['persistance-get'] = "Impossible d'accéder aux données.";
		}

		return $personnage;


	}


	public static function getPersonnageAll(&$dataError){
		try {
			
			$statement = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * FROM Personnage', array());

		} catch (Exception $e) {
			$dataError['persistance-get'] = "Impossible d'accéder aux données.";
		}

		$collectionPersonnage = array();

		if($statement!==false){
			foreach ($statement as $row) {
				$personnage = PersonnageFabrique::getPersonnage($dataError,$row['numDocteur'],$row['anneeDebut'],$row['anneeFin'],$row['acteur'],$row['expFav'],$row['desc'],$row['urlImage']);
				$collectionPersonnage[]=$personnage;
			}
		}
		else{
			$dataError['persistance-get'] = "Aucun personnage trouvable.";
		}
		DataBaseManager::destroyQueryResults($statement);
		return $collectionAdresse;
	}


	public static function postPersonnage(&$dataError,$personnage){
		$statement = DataBaseManager::getInstance()->prepareAndExecuteQuery('UPDATE Personnage SET numDocteur=?,anneeDebut=?,anneeFin=?,acteur=?,expFav=?,desc=?,urlImage=? WHERE numDocteur=?', 
			array($personnage->getAnneeDebut(),
					$personnage->getAnneeFin(),
					$personnage->getActeur(),
					$personnage->getExpFav(),
					$personnage->getDesc(),
					$personnage->getUrlImage()
			)
		);

		if ($statement == false ) {
			$dataError['persistance-get'] = "Probleme d'exécution de la requête.";
		}

		DataBaseManager::destroyQueryResults($statement);

		return $personnage;

	}

	public static function putPersonnage(&$dataError,$personnage){

		$statement = false;
		$count = 0;

		while($statement == false && $count<=3){
			$count++;
			$statement = DataBaseManager::getInstance()->prepareAndExecuteQuery('INSERT INTO Personnage(numDocteur,anneeDebut,anneeFin,acteur,expFav,desc,urlImage) VALUES(?,?,?,?,?,?,?)',
				array(
					$personnage->getNumDocteur(),
					$personnage->getAnneeDebut(),
					$personnage->getAnneeFin(),
					$personnage->getActeur(),
					$personnage->getExpFav(),
					$personnage->getDesc(),
					$personnage->getUrlImage()
				)
			);
			if ($statement->rowCount()<1) {
		  		$statement = false;
			}  

		}

		if ($statement == false) {
			$dataError['persistance-get'] = "Probleme d'exécution de la requête.";
		}
		else{
			DataBaseManager::destroyQueryResults($statement);
		}

		return $personnage;

	}


	public static function deletePersonnage(&$dataError,$numDocteur){
		$personnage = self::getPersonnageByNumDocteur($dataError,$numDocteur);

		if (empty($dataError)) {
			$statement = DataBaseManager::getInstance()->prepareAndExecuteQuery('DELETE FROM Personnage WHERE numDocteur=?',array($numDocteur));
			if ($statement == false) {
				$dataError['persistance-get'] = "Probleme d'exécution de la requête.";
			}
				DataBaseManager::destroyQueryResults($statement);
		}
		return $personnage;
	}
}

?>

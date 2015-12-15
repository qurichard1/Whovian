<?php
class PersonnageGateway{


	public static function getArticleById(&$dataError,$id){
		if(isset($id)){
			try{
				$statement=DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT *FROM Article WHERE id=?',array($id));

			}
			catch(Exceptiuon $e){
				echo "Impossible d'accéder aux données.";
				$dataError['requete'] = "Impossible d'accéder aux données.";
			}
			if($statement!=false){

				$count = 0;
				foreach ($statement as $row) {
					$count++;
					$article = ArticleFabrique::getArticle($dataError,$row['id'],$row['titre'],$row['urlImage'],$row['texte']);

				}

				if ($count!=1) {
					$dataError['persistance-get'] = "Article introuvable.";
				}
			}else{
				$dataError['persistance-get'] = "Article introuvable.";			
			}
		}else{
			$dataError['persistance-get'] = "Impossible d'accéder aux données.";
		}

		return $article;


	}


	public static function getArticleAll(&$dataError){
		try {
			
			$statement = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * FROM Article', array());

		} catch (Exception $e) {
			$dataError['persistance-get'] = "Impossible d'accéder aux données.";
		}

		$collectionArticle = array();

		if($statement!==false){
			foreach ($statement as $row) {
				$article = ArticleFabrique::getArticle($dataError,$row['id'],$row['titre'],$row['urlImage'],$row['texte']);
				$collectionArticle[]=$article;
			}
		}
		else{
			$dataError['persistance-get'] = "Aucun article trouvable.";
		}
		DataBaseManager::destroyQueryResults($statement);
		return $collectionArticle;
	}


	public static function postArticle(&$dataError,$article){
		$statement = DataBaseManager::getInstance()->prepareAndExecuteQuery('UPDATE Article SET id=?,titre=?,urlImage=?,texte=? WHERE id=?', 
			array($article->get()
			)
		);

		if ($statement == false ) {
			$dataError['persistance-get'] = "Probleme d'exécution de la requête.";
		}

		DataBaseManager::destroyQueryResults($statement);

		return $article;

	}

	public static function putArticle(&$dataError,$article){

		$statement = false;
		$count = 0;

		while($statement == false && $count<=3){
			$count++;
			$statement = DataBaseManager::getInstance()->prepareAndExecuteQuery('INSERT INTO Article(id,titre,urlImage,texte) VALUES(id,titre,urlImage,texte)',
				array(
					$article->getId(),
					$article->getTitre(),
					$article->getUrlImage(),
					$article->getTexte()
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

		return $article;

	}


	public static function deleteArticle(&$dataError,$id){
		$article = self::getArticleByNumDocteur($dataError,$id);

		if (empty($dataError)) {
			$statement = DataBaseManager::getInstance()->prepareAndExecuteQuery('DELETE FROM Article WHERE id=?',array($id));
			if ($statement == false) {
				$dataError['persistance-get'] = "Probleme d'exécution de la requête.";
			}
				DataBaseManager::destroyQueryResults($statement);
		}
		return $article;
	}
}

?>

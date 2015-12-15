<?php
require_once("./Article.php");

class ArticleFabrique{ 
	public static function getArticle(&$dataErrors, $id=null, $titre=null, $urlImage=null, $texte=null){ 
		$id=Article::getDefaultArticle();
		$dataErrors=array();

		try{ 
			$id->setId($id);
		}catch (Exception $e){ 
			$dataErrors['id']=$e->getMessage()."<br/>\n";

		}

		try{
			$titre->setTitre($titre);
		}catch (Exception $e){ 
			$dataErrors['titre']=$e->getMessage()."<br/>\n";
			
		}

		try{
			$urlImage->setImage($urlImage);
		}catch (Exception $e){ 
			$dataErrors['urlImage']=$e->getMessage()."<br/>\n";
			
		}

		try{
			$texte->setTexte($texte);
		}catch (Exception $e){ 
			$dataErrors['texte']=$e->getMessage()."<br/>\n";
			
		}
		return $id;
	}

}

?>
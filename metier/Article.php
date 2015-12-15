<?php
require_once(dirname(__FILE__). '/ ExpressionsRegexUtils .php') ;
require_once(dirname(__FILE__). '/ ArticlePropertiesTrait .php') ;

class Article{ 

	private $id;

	private $titre;

	private $urlImage;

	private $texte;

	use ArticleProperties;

	public function __construct($id,$titre,$urlImage,$texte){ 
		$this->setId($id);
		$this->setTitre($titre);
		$this->setUrlImage($urlImage);
		$this->setTexte($texte);
	} 

	public static function getDefaultArticle(){ 
		$article=new Article('0000','Nouvel Article',null,'Haec dum oriens diu perferret, caeli reserato tepore Constantius consulatu suo septies et Caesaris ter egressus Arelate Valentiam petit, in Gundomadum et Vadomarium fratres Alamannorum reges arma moturus, quorum crebris excursibus vastabantur confines limitibus terrae Gallorum.');
		return $article;
	}


}

?>
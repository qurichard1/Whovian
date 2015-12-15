<?php

$rootDirectory = dirname(__FILE__);

require_once($rootDirectory.'/Model.php');


class ModelArticle extends Model
{
	private $article;
	private $title;
	
	public function getData(){
		return $this->article;
	}

	public function getTitle(){
		return $this->title;
	}

	public static function getModelDefaultArticle(){
	$model = new self(array());
	$model->article = Article::getDefaultArticle();
	$model->title = "Saisie d'un article";
	return $model;
	}

	public static function getModelArticle($id){
		$model = new self(array());
		$model->Article = ArticleGateway::getArticleById($model->dataError, $id);
		$model->title = "Affichage d'un article";
		return $model;
	}

	public static function getModelArticlePost($id, $titre, $urlImage, $texte){
		$model = new self(array());
		$article = ArticleFabrique::getArticle($model->dataError,$titre, $urlImage, $texte);
		$model->article = ArticleGateway::postArticle($model->dataError, $article);
		$model->title = "L'article a été mis à jour";
		return $model;
	}

	public static function getModelArticlePut($titre, $urlImage, $texte){
		$model = new self(array());
		$article = ArticleFabrique::getArticle($model->dataError,"0000", $titre, $urlImage, $texte);
		$model->article = ArticleGateway::putArticle($model->dataError, $article);
		$model->title = "L'article à été inséré";
		return $model;
	}

	public static function deleteArticle($id){
		$model = new self(array());
		$model->article = ArticleGateway::deleteArticle($model->dataError, $id);
		$model->title = "Article supprimée";
		return $model;
	}
}
?>

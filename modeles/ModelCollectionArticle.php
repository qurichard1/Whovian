<?php

$rootDirectory = dirname(__FILE__)."/";

require_once($rootDirectory.'/Model.php');

class ModelCollectionArticle extends Model
{
	private $collectionArticle;

	public function getData(){
		return $this->collectionArticle;
	}

	private function __construct(){
		$this->collectionArticle=array();
		$this->dataError = array();
	}

	public static function getModelArticleAll(){
		$model = new self(array());
		$model->collectionArticle = ArticleGateway::getArticleAll($model->dataError);
		return $model;
	}
}

?>

<?php
$rootDirectory = dirname(__FILE__);

require_once($rootDirectory.'/Classes/commonFunctions.php');

outputEnTeteHTML5('Accueil','UTF-8',null);
?>

<h1><?=$modele->getTitle()?></h1>
	<?=PersonnageView::getHtmlDevelopped($modele->getData())?>

<a href="?">Revenir à l'accueil</a>


<?php
outputFinFichierHTML5();
?>

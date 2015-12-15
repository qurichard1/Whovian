<?php
$rootDirectory = dirname(__FILE__);

require_once($rootDirectory.'/Classes/commonFunctions.php');

outputEnTeteHTML5('Accueil','UTF-8',null);
?>

<h1>Erreur de saisie d'une personnage</h1>
<?=PersonnageFormView ::getFormHtml("?action=put",$modele->getData(),$modele->getError())?>

<a href="?">Revenir à l'accueil</a>
<?php
outputFinFichierHTML5();
?> 

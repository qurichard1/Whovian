<?php
$rootDirectory = dirname(__FILE__);

require_once($rootDirectory.'/Classes/commonFunctions.php');

outputEnTeteHTML5('Accueil','UTF-8',null);
?>


<h1>Toutes les adresses</h1>
<a href="?">Revenir à l'accueil</a>
<?php
	echo "<table><tbody>";
	foreach ($modele->getData() as $personnage) {
		echo"<tr>";
		echo"<td><a href=\"?action=delete&numDocteur".$personnage->getNumDocteur()."\">supprimer</a></td>";
		echo"<td><a href=\"?action=edit&numDocteur".$personnage->getNumDocteur()."\">modifier</a></td>";
		echo "<td>".PersonnageView::getHtmlCompact($personnage)."</td>";
		echo"<tr>";


	}
	echo"</tbody></table>";
?>
<?php
outputFinFichierHTML5();
?> 

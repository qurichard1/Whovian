<?=VueHtmlUtils ::enTeteHTML5('Bienvenue sur notre site','UTF-8',Config::getStyleSheetsURL()['default'])?>

<h1>Toutes les adresses</h1>
<a href="?">Revenir à l'accueil</a>
<?php
	echo "<table><tbody>";
	foreach ($modele->getData() as $adresse) {
		echo"<tr>";
		echo"<td><a href=\"?action=delete&id".$adresse->getId()."\">supprimer</a></td>";
		echo"<td><a href=\"?action=edit&id".$adresse->getId()."\">modifier</a></td>";
		echo "<td>".AdresseView::getHtmlCompact($adresse)."</td>";
		echo"<tr>";


	}
	echo"</tbody></table>";
?>

<?=VueHtmlUtils::finDichierHtml5();?>
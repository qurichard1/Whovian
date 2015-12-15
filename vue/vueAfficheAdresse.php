<?=VueHtmlUtils ::enTeteHTML5('Bienvenue sur notre site','UTF-8',Config::getStyleSheetsURL()['default'])?>

<h1><?=$modele->getTitle()?></h1>
	<?=AdresseView::getHtmlDevelopped($modele->getData())?>

<a href="?">Revenir à l'accueil</a>

<?=VueHtmlUtils::finDichierHtml5();?>
<?=VueHtmlUtils ::enTeteHTML5('Bienvenue sur notre site','UTF-8',Config::getStyleSheetsURL()['default'])?>

<h1>Erreur de saisie d'une adresse</h1>
<?=AdresseFormView ::getFormErrorsHtml("?action=put",$modele->getData(),$modele->getError())?>

<a href="?">Revenir à l'accueil</a>
<?=VueHtmlUtils::finDichierHtml5();?>
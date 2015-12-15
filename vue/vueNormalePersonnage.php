<?php
	require_once ( dirname (__FILE__).'/commonFunctions.php');
	require_once ( dirname (__FILE__).'/classeIdentifiantView.php');
	require_once ( dirname (__FILE__).'/classeIdentifiantFormView.php');

	outputEnTeteHTML5('Les identifiants ont bien été saisie','UTF−8 ',NULL) ;

	echo IdentifiantView ::getHtmlDevelopped($identifiant);

	echo IdentifiantFormView ::getHiddenFormHtml('receptionModifIdentifiant.php',$identifiant,"Modifier");

	outputFinFichierHTML5();
?>
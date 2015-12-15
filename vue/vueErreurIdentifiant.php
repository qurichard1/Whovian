<?php
	require_once(dirname (__FILE__).'/commonFunctions.php');
	require_once(dirname (__FILE__).'/classeIdentifiantFormView.php');

	outputEnTeteHTML5('Saisie des identifiants','UTF−8',NULL) ;

	echo IdentifiantFormView ::getFormErrorsHtml('receptionIdentifiant.php',$identifiant,$dataErrors);
	outputFinFichierHTML5();
?>
<?php
	require_once ( dirname (__FILE__) .'/commonFunctions.php');
	require_once ( dirname (__FILE__) .'/classeIdentifiantFormView.php');
	outputEnTeteHTML5 ('Saisie des identifiants','UTF−8 ','NULL');
	echo AdresseFormView : :getDefaultFormHTML ('ex08_receptionIdentifiant.php');
	outputFinFichierHTML5 ( ) ;
?>
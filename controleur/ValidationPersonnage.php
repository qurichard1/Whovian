<?php
	$dataErrors = array();

	$numDocteur=filter_var($numDocteur,FILTER_SANITIZE_STRING);
	$urlImage=filter_var($urlImage,FILTER_SANITIZE_STRING);
	$anneeDebut=filter_var($anneeDebut,FILTER_SANITIZE_STRING);
	$anneeFin=filter_var($anneeFin,FILTER_SANITIZE_STRING);
	$acteur=filter_var($acteur,FILTER_SANITIZE_STRING);
	$expFav=filter_var($expFav,FILTER_SANITIZE_STRING);
	$desc=filter_var($desc,FILTER_SANITIZE_STRING);
?>

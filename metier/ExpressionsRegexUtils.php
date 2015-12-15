
 <?php

	$regex_FR_LANG = '/^([a−zA−Z] '. '|(\&[a−zA−Z]grave\;) |(\&[a−zA−Z]acute\;) |(\&[a−zA−Z] circ \;) |(\&[a−zA−Z]uml\;) ' . '|(\&[a−zA−Z] cedil \;) |(\&[a−zA−Z][a−zA−Z] lig \;)|(\&szlig \;) |(\&[a−zA−Z] tilde \;) '.'|(\−) |( )|(\&\#039\;)|(\&quot\;) |(\.) )*$/ ';
	$regex_FR_LANG_WITH_NUMBERS = '/^([a−zA−Z0−9]' . '|(\&[a−zA−Z]grave\;) |(\&[a−zA−Z]acute\;) |(\&[a−zA−Z] circ \;) |(\&[a−zA−Z]uml\;) '. '|(\&[a−zA−Z] cedil \;) |(\&[a−zA−Z][a−zA−Z] lig \;)|(\&szlig \;) |(\&[a−zA−Z] tilde \;)' .'|(\−) |( )|(\&\#039\;)|(\&quot\;) |(\.) )*$/ ';

	function isValidString($chaine , $regExp , $minLenth, $maxLenth){
		return ( isset ($chaine) && strlen($chaine) >= $minLenth && strlen($chaine) <= $maxLenth  && preg_match($regExp , $chaine));
	} 
 ?>
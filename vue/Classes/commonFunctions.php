<?php
function outputEnTeteHTML5($title, $charset, $css_sheet){
	echo "<!doctype html>\n";
	echo "<html lang=\"fr\">\n";
	echo "<head>\n";
	echo "<meta charset=\"";
	echo $charset;
	echo "\"/>\n";
	echo "<title>".$title."</title>\n";
	echo "</head>\n<body>\n";
}
?>

<?php
function outputFinFichierHTML5(){
	echo "</body>\n</html>\n";
}
?>
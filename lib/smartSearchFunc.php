<?php
	if(isset($_REQUEST['searchterm'])){
		$term = $_REQUEST['searchterm'];
		$term_like = "%". $term. "%";
	}else{
		$term = "";
	}

	if(preg_match("~^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$~", $term)){
		echo $term;
	}

	if(preg_match("~([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?~", $term)){
		echo "Tijdstip";
	}

	if(preg_match("~hoe vaak is ([^}]*) gezocht~", $term)){
		$replaced = preg_replace('~hoe vaak is ([^}]*) gezocht?~', '$1', $term);
		echo $replaced;
	}

	if(preg_match('~"([^}]*)"~', $term)){
		echo "Letterlijk zoeken";
	}
?>
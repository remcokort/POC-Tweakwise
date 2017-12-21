<?php
	if(isset($_REQUEST['searchterm'])){
		$term = $_REQUEST['searchterm'];
		$term_like = "%". $term. "%";
	}else{
		$term = "";
		$term_like = "%". $term. "%";
	}

	$query = "SELECT searchterm, SUM(hassearchresult) as totaalGevonden, COUNT(hassearchresult) as totaal FROM log WHERE searchterm LIKE ? ";

	if(isset($_REQUEST["eanInt"])){
		$ean = $_REQUEST['eanInt'];

		if($ean == "false"){
			$eanQuery = " AND NOT searchterm REGEXP '^[0-9]+$'";
			$query = $query. " ". $eanQuery;
		}
	}
	
	if(isset($_REQUEST['date'])){
		$date = $_REQUEST['date'];

		if(preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)){
			$query = $query. ' AND DATE(timestamp) = "'. $date. '"';
		}
	}
	
	if(isset($_REQUEST['showresult'])){
		$showResult = $_REQUEST['showresult'];

		if($showResult == "alleenResultaat"){
			$query = $query. " AND hassearchresult = 1";
		}

		if($showResult == "alleenZonder"){
			$query = $query. " AND hassearchresult = 0";
		}
	}

	$query = $query. " GROUP BY searchterm ORDER BY totaal DESC";

	if(isset($_REQUEST['showResultCount'])){
		$showResultCount = $_REQUEST['showResultCount'];
		$query = $query. " LIMIT 0,". $showResultCount;
	}else{
		$query = $query. " LIMIT 0, 50";
	}

	include('config.php');
	try{
		$stmt  = $db->prepare($query);
		$stmt->bindParam(1, $term_like);

		$stmt->execute();
		}catch(PDOExceptions $e){
		echo $e->getMessage();
	}

	echo "<table class='responsive-table highlight'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Zoekterm</th>";
	echo "<th>Aantal keer gezocht</th>";
	echo "<th>Aantal keer gevonden</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";

	while ($row = $stmt->fetch()){
		$searchterm = $row['searchterm'];
		$totaal = $row["totaal"];
		$totaalGevonden = $row["totaalGevonden"];

		echo "<tr>";
		echo "<td><a href='searchterm.php?term=". $searchterm. "'>". $searchterm. "</a></td>";
		echo "<td>". $totaal. "</td>";
		echo "<td>". $totaalGevonden. "</td>";
		echo "</tr>";
	}

	echo "</tbody>";
	echo "</table>";
?>
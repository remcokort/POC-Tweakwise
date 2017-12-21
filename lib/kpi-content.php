<?php
include('config.php');
$query = "SELECT * FROM kpi";

	try{
		$stmt  = $db->prepare($query);

		$stmt->execute();
		}catch(PDOExceptions $e){
		echo $e->getMessage();
	}

	while ($row = $stmt->fetch()){
		$term = $row['term'];
		$type = $row['type'];
		$amount = $row['amount'];

		if($type == "less") {
			$type_text = " minder dan ";
		}elseif($type == "more"){
			$type_text = " meer dan ";
		}

		$title = "De zoekterm ". $term. $type_text. $amount. " keer gezocht.";

		$actual_amount = "SELECT COUNT(hassearchresult) as totaal FROM log WHERE searchterm LIKE ?";
		$term_like = "%". $term. "%";

		try{ 
			$stmt2  = $db->prepare($actual_amount);
			$stmt2->bindParam(1, $term_like);
			
			$stmt2->execute();
		}catch(PDOExceptions $e){
			echo $e->getMessage();
		}

		while ($row2 = $stmt2->fetch()){
			$actual_amount = $row2['totaal'];
			$percentage_amount = (100/$amount)*$actual_amount;
			if($percentage_amount > 100){
				$percentage_amount = 100;
			}
		}
		
		echo "<div class='row'>";
		echo "<div class='col s12 m12 l12'>";
		echo "<div class='card' id='". $target. "'>";
		echo "<div class='card-content'>";
		echo "<span class='card-title'>". $title. "<a href='#' data-target='". $term. "' class='delete'><i class='material-icons right'>clear</i></a></span>";
		echo "</div>";
		echo "<div class='card-content'>";
		echo "<h5>Voortgang</h5>";
		echo "<div class='progress'>";
	    echo "<div class='determinate' style='width: ". $percentage_amount. "%'></div>";
  		echo "</div>";
  		echo $actual_amount. " van de ". $amount;
		echo "</div></div></div></div>";
	}

	$db = null;
?>
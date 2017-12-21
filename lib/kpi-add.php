<?php
	$term = $_REQUEST['term'];
	$amount = $_REQUEST['amount'];

	include('config.php');

	try {
	$query = "INSERT INTO kpi (term, type, amount) VALUES (?, 'more', ?);";

	$stmt = $db->prepare($query);
    $stmt->bindParam(1, $term);
    $stmt->bindParam(2, $amount);

    $stmt->execute();
    }
	catch(PDOException $e){
		echo $e->getMessage();
    } 

    echo "succes";

    $db = null;
?>
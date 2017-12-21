<?php
	$term = $_REQUEST['term'];

	include('config.php');

	try {
	$query = "DELETE FROM kpi WHERE term = ?";

	$stmt = $db->prepare($query);
    $stmt->bindParam(1, $term);

    $stmt->execute();
    }
	catch(PDOException $e){
		echo $e->getMessage();
    } 

    echo "succes";

    $db = null;
?>
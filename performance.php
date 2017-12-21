<?php 
    //Import DB connection
    include('lib/config.php');

    try {
    	$query = "SELECT COUNT(*) as count, SUM(IF(hassearchresult = 1, 1, 0)) AS countSuccesResult, SUM(IF(hassearchresult = 0, 1, 0)) AS countFailedResult FROM test WHERE logic = 'ean'";

		$stmt  = $db->prepare($query);

		$stmt->execute();

		while ($row = $stmt->fetch()){
			$eanCount = $row['count'];
			$eanSucces = $row['countSuccesResult'];
			$eanFailed = $row['countFailedResult'];

			if($eanCount != 0){
				$eanPercentage = 100/$eanCount*$eanSucces;
			} else {
				$eanPercentage = 0;
			}
		}

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    try {
    	$query = "SELECT COUNT(*) as count, SUM(IF(hassearchresult = 1, 1, 0)) AS countSuccesResult, SUM(IF(hassearchresult = 0, 1, 0)) AS countFailedResult FROM test WHERE logic = 'link'";

		$stmt  = $db->prepare($query);

		$stmt->execute();

		while ($row = $stmt->fetch()){
			$linkCount = $row['count'];
			$linkSucces = $row['countSuccesResult'];
			$linkFailed = $row['countFailedResult'];

			if($linkCount != 0){
				$linkPercentage = 100/$linkCount*$linkSucces; 
			} else {
				$linkPercentage = 0;
			}
		}

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    try {
    	$query = "SELECT COUNT(*) as count, SUM(IF(hassearchresult = 1, 1, 0)) AS countSuccesResult, SUM(IF(hassearchresult = 0, 1, 0)) AS countFailedResult FROM test WHERE logic = 'fts'";

		$stmt  = $db->prepare($query);

		$stmt->execute();

		while ($row = $stmt->fetch()){
			$ftsCount = $row['count'];
			$ftsSucces = $row['countSuccesResult'];
			$ftsFailed = $row['countFailedResult'];

			if($ftsCount != 0){
				$ftsPercentage = 100/$ftsCount*$ftsSucces;
			} else {
				$ftsPercentage = 0;
			}
		}

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    try {
    	$query = "SELECT COUNT(*) as count, SUM(IF(hassearchresult = 1, 1, 0)) AS countSuccesResult, SUM(IF(hassearchresult = 0, 1, 0)) AS countFailedResult FROM test WHERE logic = 'lev'";

		$stmt  = $db->prepare($query);

		$stmt->execute();

		while ($row = $stmt->fetch()){
			$levCount = $row['count'];
			$levSucces = $row['countSuccesResult'];
			$levFailed = $row['countFailedResult'];

			if($levCount != 0){
				$levPercentage = 100/$levCount*$levkSucces;
			} else {
				$levPercentage = 0;
			}
		}

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    try {
    	$query = "SELECT COUNT(*) as count, SUM(IF(hassearchresult = 1, 1, 0)) AS countSuccesResult, SUM(IF(hassearchresult = 0, 1, 0)) AS countFailedResult FROM test WHERE logic = 'wbw'";

		$stmt  = $db->prepare($query);

		$stmt->execute();

		while ($row = $stmt->fetch()){
			$wbwCount = $row['count'];
			$wbwSucces = $row['countSuccesResult'];
			$wbwFailed = $row['countFailedResult'];

			if($wbwCount != 0){
				$wbwPercentage = 100/$wbwCount*$wbwkSucces;
			} else {
				$wbwPercentage = 0;
			}
		}

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    try {
    	$query = "SELECT COUNT(*) as count, SUM(IF(hassearchresult = 1, 1, 0)) AS countSuccesResult, SUM(IF(hassearchresult = 0, 1, 0)) AS countFailedResult FROM test WHERE logic = 'syn'";

		$stmt  = $db->prepare($query);

		$stmt->execute();

		while ($row = $stmt->fetch()){
			$synCount = $row['count'];
			$synSucces = $row['countSuccesResult'];
			$synFailed = $row['countFailedResult'];

			if($synCount != 0){
				$synPercentage = 100/$synCount*$synSucces;
			} else {
				$synPercentage = 0;
			}
		}

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    try {
    	$query = "SELECT COUNT(*) as count, SUM(IF(hassearchresult = 1, 1, 0)) AS countSuccesResult, SUM(IF(hassearchresult = 0, 1, 0)) AS countFailedResult FROM test WHERE logic = 'cat'";

		$stmt  = $db->prepare($query);

		$stmt->execute();

		while ($row = $stmt->fetch()){
			$catCount = $row['count'];
			$catSucces = $row['countSuccesResult'];
			$catFailed = $row['countFailedResult'];

			if($catCount != 0){
				$catPercentage = 100/$catCount*$catSucces;
			}else{
				$catPercentage = 0;
			}
		}

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }

    try {
    	$query = "SELECT COUNT(*) as count, SUM(IF(hassearchresult = 1, 1, 0)) AS countSuccesResult, SUM(IF(hassearchresult = 0, 1, 0)) AS countFailedResult FROM test WHERE logic = 'fuz'";

		$stmt  = $db->prepare($query);

		$stmt->execute();

		while ($row = $stmt->fetch()){
			$fuzCount = $row['count'];
			$fuzSucces = $row['countSuccesResult'];
			$fuzFailed = $row['countFailedResult'];

			if($fuzCount != 0){
				$fuzPercentage = 100/$fuzCount*$fuzSucces;
			} else{
				$fuzPercentage = 0;
			}
		}

    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
?>
<div class="container">
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="card">
				<div class="card-content">
					<h1>Zoekmachine Performance</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m6 l12">
			<div class="card">
				<div class="card-content">
					<h4>Link naar informatiepagina</h4>
					<div class="divider"></div><br />
					<strong>Effectiviteit</strong>
						<div class="progress">
							<div class="determinate" style="width: <?php echo $linkPercentage; ?>%"></div>
						</div>
					<div class="divider"></div><br />
					<strong>Totaal aantal zoekpogingen: </strong> <?php echo $linkCount; ?><br />
					<strong>Totaal aantal geslaagde zoekpogingen: </strong> <?php echo $linkSucces; ?> <br />
					<strong>Totaal aantal mislukte zoekpogingen: </strong> <?php echo $linkFailed; ?> <br />
					<br /><br />
					<i><a href="#">Meer informatie...</a></i>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m6 l12">
			<div class="card">
				<div class="card-content">
					<h4>EAN Productcode</h4>
					<div class="divider"></div><br />
					<strong>Effectiviteit</strong>
						<div class="progress">
							<div class="determinate" style="width: <?php echo $eanPercentage; ?>%"></div>
						</div>
						<div class="divider"></div><br />
						<strong>Totaal aantal zoekpogingen: </strong> <?php echo $eanCount; ?><br />
						<strong>Totaal aantal geslaagde zoekpogingen: </strong> <?php echo $eanSucces; ?> <br />
						<strong>Totaal aantal mislukte zoekpogingen: </strong> <?php echo $eanFailed; ?> <br />
						<br /><br />
						<i><a href="#">Meer informatie...</a></i>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m6 l12">
			<div class="card">
				<div class="card-content">
					<h4>Full Text Search</h4>
					<div class="divider"></div><br />
					<strong>Effectiviteit</strong>
						<div class="progress">
							<div class="determinate" style="width: <?php echo $ftsPercentage; ?>%"></div>
						</div>
						<div class="divider"></div><br />
						<strong>Totaal aantal zoekpogingen: </strong> <?php echo $ftsCount; ?><br />
						<strong>Totaal aantal geslaagde zoekpogingen: </strong> <?php echo $ftsSucces; ?> <br />
						<strong>Totaal aantal mislukte zoekpogingen: </strong> <?php echo $ftsFailed; ?> <br />
						<br /><br />
						<i><a href="#">Meer informatie...</a></i>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m6 l12">
			<div class="card">
				<div class="card-content">
					<h4>Levensteihn Algoritme</h4>
					<div class="divider"></div><br />
					<strong>Effectiviteit</strong>
						<div class="progress">
							<div class="determinate" style="width: <?php echo $levPercentage; ?>%"></div>
						</div>
						<div class="divider"></div><br />
						<strong>Totaal aantal zoekpogingen: </strong> <?php echo $levCount; ?><br />
						<strong>Totaal aantal geslaagde zoekpogingen: </strong> <?php echo $levSucces; ?> <br />
						<strong>Totaal aantal mislukte zoekpogingen: </strong> <?php echo $levFailed; ?> <br />
						<br /><br />
						<i><a href="#">Meer informatie...</a></i>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m6 l12">
			<div class="card">
				<div class="card-content">
					<h4>Woord voor woord</h4>
					<div class="divider"></div><br />
					<strong>Effectiviteit</strong>
						<div class="progress">
							<div class="determinate" style="width: <?php echo $wbwPercentage; ?>%"></div>
						</div>
						<div class="divider"></div><br />
						<strong>Totaal aantal zoekpogingen: </strong> <?php echo $wbwCount; ?><br />
						<strong>Totaal aantal geslaagde zoekpogingen: </strong> <?php echo $wbwSucces; ?> <br />
						<strong>Totaal aantal mislukte zoekpogingen: </strong> <?php echo $wbwFailed; ?> <br />
						<br /><br />
						<i><a href="#">Meer informatie...</a></i>
				</div>
			</div>
		</div>
	</div>
		<div class="row">
		<div class="col s12 m6 l12">
			<div class="card">
				<div class="card-content">
					<h4>Synoniemen</h4>
					<div class="divider"></div><br />
					<strong>Effectiviteit</strong>
						<div class="progress">
							<div class="determinate" style="width: <?php echo $synPercentage; ?>%"></div>
						</div>
						<div class="divider"></div><br />
						<strong>Totaal aantal zoekpogingen: </strong> <?php echo $synCount; ?><br />
						<strong>Totaal aantal geslaagde zoekpogingen: </strong> <?php echo $synSucces; ?> <br />
						<strong>Totaal aantal mislukte zoekpogingen: </strong> <?php echo $synFailed; ?> <br />
						<br /><br />
						<i><a href="#">Meer informatie...</a></i>
				</div>
			</div>
		</div>
	</div>
		<div class="row">
		<div class="col s12 m6 l12">
			<div class="card">
				<div class="card-content">
					<h4>Categorisatie</h4>
					<div class="divider"></div><br />
					<strong>Effectiviteit</strong>
						<div class="progress">
							<div class="determinate" style="width: <?php echo $catPercentage; ?>%"></div>
						</div>
						<div class="divider"></div><br />
						<strong>Totaal aantal zoekpogingen: </strong> <?php echo $catCount; ?><br />
						<strong>Totaal aantal geslaagde zoekpogingen: </strong> <?php echo $catSucces; ?> <br />
						<strong>Totaal aantal mislukte zoekpogingen: </strong> <?php echo $catFailed; ?> <br />
						<br /><br />
						<i><a href="#">Meer informatie...</a></i>
				</div>
			</div>
		</div>
	</div>
		<div class="row">
		<div class="col s12 m6 l12">
			<div class="card">
				<div class="card-content">
					<h4>Fuzzy Word Search</h4>
					<div class="divider"></div><br />
					<strong>Effectiviteit</strong>
						<div class="progress">
							<div class="determinate" style="width: <?php echo $fuzPercentage; ?>%"></div>
						</div>
						<div class="divider"></div><br />
						<strong>Totaal aantal zoekpogingen: </strong> <?php echo $fuzCount; ?><br />
						<strong>Totaal aantal geslaagde zoekpogingen: </strong> <?php echo $fuzSucces; ?> <br />
						<strong>Totaal aantal mislukte zoekpogingen: </strong> <?php echo $fuzFailed; ?> <br />
						<br /><br />
						<i><a href="#">Meer informatie...</a></i>
				</div>
			</div>
		</div>
	</div>
</div>
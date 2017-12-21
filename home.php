<?php
	//Import DB Connection
	include('lib/config.php');

	//Import Daily stats graph
	include('lib/graph/dagTotaal.php');
?>
<script type="text/javascript">
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart', 'bar']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: 'Totaal aantal zoektermen',
          is3D: 'true',
          width: 800,
          height: 600
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
</script>
<div class="container">
	<div class="row">
		<div class="col s12 m12 l12">
			<div class="card">
				<div class="card-content">
					<h1>Fonq zoekstatistiek</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m6 l12">
			<div class="card">
				<div class="card-content">
					<h4>Vandaag</h4>
					<div class="divider"></div><br />
					<h5>Totaal aantal zoekpogingen:
					<?php
					include('lib/config.php');
					try{
					        $current_date = strftime('%D');
					        $stmt  = $db->prepare("SELECT CAST(timestamp AS DATE) as timestamp, COUNT(searchterm) as totaal FROM log WHERE timestamp = ?");
					        $stmt->bindParam(1, $current_date);
					        
					        $stmt->execute();
					    }catch(PDOExceptions $e){
					        echo $e->getMessage();
					    }
					    
					    while ($row = $stmt->fetch()){
					        $totaal = $row["totaal"];
					        echo $totaal;
					    }

					try{
					        $stmt  = $db->prepare("SELECT count(searchterm) as totaal FROM log WHERE hassearchresult > 0 AND CAST(timestamp AS DATE) = ?");
					        $stmt->bindParam(1, $current_date);

					        $stmt->execute();
					    }catch(PDOExceptions $e){
					        echo $e->getMessage();
					    }
					    
					    while ($row = $stmt->fetch()){
					        $totaal = $row["totaal"];
					        echo "<br />Totaal aantal gevonden zoekpogingen: ". $totaal;
					    }

				    try{
					        $stmt  = $db->prepare("SELECT count(searchterm) as totaal FROM log WHERE hassearchresult = 0 AND CAST(timestamp AS DATE) = ?");
					        $stmt->bindParam(1, $current_date);

					        $stmt->execute();
					    }catch(PDOExceptions $e){
					        echo $e->getMessage();
					    }
					    
					    while ($row = $stmt->fetch()){
					        $totaal = $row["totaal"];
					        echo "<br />Totaal aantal niet gevonden zoekpogingen: ". $totaal;
					    }
					?>
					</h5>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 m6 l12">
			<div class="card">
				<div class="card-content">
					<h4>Trend aantal zoekpogingen</h4>
					<div class="divider"></div>
					<div id="chart_div"></div>
				</div>
			</div>
		</div>
	</div>
</div>
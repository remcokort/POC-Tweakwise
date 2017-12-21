<?php 
    //Import DB connection
    include('lib/config.php'); 

    $searchterm = $_GET['term'];

    try {
      /* select all the weekly tasks from the table googlechart */
      $result = $db->prepare('SELECT CAST(timestamp AS DATE) as timestamp, COUNT(hassearchresult) as amount FROM log WHERE searchterm = ? GROUP BY CAST(timestamp AS DATE)');
      $result->bindParam(1, $searchterm);
      $result->execute();

      $rows = array();
      $table = array();
      $table['cols'] = array(

        // Labels for your chart, these represent the column titles.

        array('label' => 'Datum', 'type' => 'string'),
        array('label' => 'Aantal', 'type' => 'number')

    );
        /* Extract the information from $result */
        foreach($result as $r) {

          $temp = array();

          // the following line will be used to slice the Pie chart

          $temp[] = array('v' => (string) $r['timestamp']); 

          // Values of each slice

          $temp[] = array('v' => (int) $r['amount']); 
          $rows[] = array('c' => $temp);
        }

    $table['rows'] = $rows;

    // convert data into JSON format
    $jsonTable = json_encode($table);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tweakwise Statistics</title>
        
        <!--Import Fonts-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Palanquin:200' rel='stylesheet' type='text/css'>
        
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        
        <!--Import stylesheets-->
        <link rel="stylesheet" type="text/css" href="css/style.css"/>

        <!--Import Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <!--Import Materialize JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

        <!--Import Google JS -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        
        <!--Graph script -->
        <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        function drawChart() {

          // Create our data table out of JSON data loaded from server.
          var data = new google.visualization.DataTable(<?=$jsonTable?>);
          var options = {
               title: 'Totaal aantal zoektermen',
              is3D: 'true',
              width: 1200,
              height: 400
            };
          // Instantiate and draw our chart, passing in some options.
          // Do not forget to check your div ID
          var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        }
        </script>
    </head>
    <body>
        <nav id="nav">
            <div class="nav-wrapper blue">
                <a href="index.php" class="brand-logo"><img src="img/logo.png" style="height: 60px;"></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php?target=home" data-target="home">Vandaag</a></li>
                    <li><a href="index.php?target=term" data-target="searched">Gezochte zoektermen</a></li>
                    <li><a href="index.php?target=kpi" data-target="kpi">KPI</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <h1>Zoekterm: <?php echo $_GET['term']; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <h4>Zoekgeschiedenis</h4>
                            <div class="divider"></div><br />
                            <div id="chart_div"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12">
                    <div class="card">
                        <div class="card-content">
                            <h4>Zoekpogingen</h4>
                            <div class="divider"></div><br />
                            <table class='responsive-table highlight'>
                                <thead>
                                    <tr>
                                    <th>Timestamp</th>
                                    <th>Zoekterm</th>
                                    <th>Zoekpoging geslaagd</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    </tr>
                                    <?php
                                        try{
                                            $stmt  = $db->prepare("SELECT * FROM log WHERE searchterm = ?");
                                            $stmt->bindParam(1, $searchterm);

                                            $stmt->execute();
                                        }catch(PDOExceptions $e){
                                            echo $e->getMessage();
                                        }

                                        while ($row = $stmt->fetch()){
                                            $searchterm = $row['searchterm'];
                                            $timestamp = $row["timestamp"];
                                            $hassearchresult = $row["hassearchresult"];

                                            if($hassearchresult == 1){
                                                $hassearchresult = "ja";
                                            }else{
                                                $hassearchresult = "nee";
                                            }

                                            echo "<tr>";
                                            echo "<td>". $timestamp. "</td>";
                                            echo "<td>". $searchterm. "</td>";
                                            echo "<td>". $hassearchresult. "</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
try {
      /* select all the weekly tasks from the table googlechart */
      $result = $db->query('SELECT CAST(timestamp AS DATE) as timestamp, count(searchterm) as amount FROM log GROUP BY CAST(timestamp AS DATE)');

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
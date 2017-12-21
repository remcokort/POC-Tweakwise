<?php 
    //Import DB connection
    include('lib/config.php'); 

    if(isset($_GET['target'])){
        $target = $_GET['target'];
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        
        <!--Import stylesheets-->
        <link rel="stylesheet" type="text/css" href="css/style.css"/>

        <!--Import Jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <!--Import Materialize JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

        <!--Import Google JS -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>

        <!--Import paging script -->
        <script type="text/javascript" src="js/paging.js"></script>

        <script type="text/javascript">
            var targetLoad = <?php echo $target ?>;
            container = $('#content');

            alert(targetLoad);

            if(targetLoad == "home"){
                container.load('home.php');
            }

            if(targetLoad == "term"){
                container.load('searched.php');
            }

            if(targetLoad == "kpi"){
                container.load('kpi.php');
            }

        </script>
        
    </head>
    <body>
        <?php include('lib/nav.php'); ?>
        <div id="content">
            <?php include('home.php'); ?>
        </div>
    </body>
</html>
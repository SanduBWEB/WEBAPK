<?php
session_start();
if(!isset($_SESSION['user_id'])){ //if login in session is not set$_SESSION['role'] == "superadmin"
    header("Location: /404.php");
}
$role = $_SESSION['role'];
if($role=="admin"){header("location: /404.php");}
elseif($role=="user"){header("location: /404.php");}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Chorme, FireFox, Opera -->
    <meta name="theme-color" content="#36A26B">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#36A26B">
    <!-- Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#36A26B">

    <?php  require_once '../include/adds.php' ?>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


    <title>Document</title>
</head>
<body>

<?php require_once 'adminHeader.php' ?>


<div class="row">
    <div class="col-md-1">
        <?php require_once 'adminSidebar.php' ?>
    </div>
    <div class="col-md-11">
            <div id="chartContainer" style="height: 500px; width: 100%;">
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <?php  require_once '../include/fadmin.php' ?>
    </div>
</div>




<script>
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title:{
                text: "Magazine si numarul de produse"
            },
            axisY: {
                includeZero: true
            },
            data: [{
                type: "column", //change type to bar, line, area, pie, etc
                //indexLabel: "{y}", //Shows y value on all Data Points
                indexLabelFontColor: "#5A5757",
                indexLabelFontSize: 10,
                indexLabelPlacement: "outside",
                dataPoints: [
                    { x: 10, y: 71 },
                    { x: 20, y: 55 },
                    { x: 30, y: 50 },
                    { x: 40, y: 65 },
                    { x: 50, y: 92, indexLabel: "\u2605 Cele mai multe" },
                    { x: 60, y: 68 },
                    { x: 70, y: 38 },
                    { x: 130, y: 21, indexLabel: "\u2691 Cele mai putine" }
                ]
            }]
        });
        chart.render();

    }
</script>
</body>
</html>

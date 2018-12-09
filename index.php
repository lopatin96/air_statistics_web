<?php

require 'vendor/autoload.php';


use Medoo\Medoo;

// Initialize
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'phpmyadmin',
    'server' => '192.168.1.7',
    'username' => 'phpmyadmin',
    'password' => '560492q'
]);

$data = $database->select('air_statistics', [
    'datetime',
    'temperature',
    'humidity'
]);

echo json_encode($data);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Air Statistics</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</head>
<body>
<canvas id="myChart"></canvas>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var chart = new Chart(ctx, {
// The type of chart we want to create
        type: 'line',

// The data for our dataset
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 25],
            }]
        },

// Configuration options go here
        options: {}
    });
</script>
</body>
</html>
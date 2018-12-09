<?php
$host = "127.0.0.1";
$username = "phpmyadmin";
$passwd = "560492q";
$dbname = "phpmyadmin";
$port = 3306;

// Create connection
$conn = new mysqli($host, $username, $passwd, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql = "SELECT * FROM air_statistics";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - datetime: " . $row["datetime"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

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
sdsd
<canvas id="myChart"></canvas>
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var chart = new Chart(ctx, {
// The type of chart we want to create
        type: 'line',

// The data for our dataset
        data: {
            labels: [<?php
                        while($row = $result->fetch_assoc()) {
                            echo $row["id"]. ", ";
                        }
                     ?>
            ],
            datasets: [{
                label: "My First dataset",
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [<?php
                        while($row = $result->fetch_assoc()) {
                            echo $row["temperature"]. ", ";
                        }
                       ?>
            }]
        },

// Configuration options go here
        options: {}
    });
</script>
</body>
</html>
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

$sql = "SELECT datetime, CONCAT(HOUR(datetime), ':', IF (MINUTE(datetime) < 10, '00', FLOOR(MINUTE(datetime)/10) * 10)) as time, AVG(`temperature`) as temperature, AVG(`humidity`) as humidity, FLOOR((TIMESTAMP(datetime) - TIMESTAMP(DATE(NOW()))) / 1000) as timestamp FROM `air_statistics` WHERE DATE(`datetime`) = DATE(NOW()) GROUP BY timestamp";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

//if ($result->num_rows > 0) {
//    // output data of each row
//    while($row = $data) {
//        echo "id: " . $row["id"]. " - datetime: " . $row["datetime"]. ", t:" . $row["temperature"] . ", h:" . $row["humidity"] . "<br>";
//    }
//} else {
//    echo "0 results";
//}


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
    let ctx = document.getElementById("myChart").getContext('2d');
    new Chart(ctx, {
        type: 'line',

        data: {
            labels: <?php echo json_encode($row['temperature'])?>,
            datasets: [
                {
                label: "Humidity",
                borderColor: 'rgb(72, 135, 247)',
                data: [<?php
                        $sql = "SELECT datetime, CONCAT(HOUR(datetime), ':', IF (MINUTE(datetime) < 10, '00', FLOOR(MINUTE(datetime)/10) * 10)) as time, AVG(`temperature`) as temperature, AVG(`humidity`) as humidity, FLOOR((TIMESTAMP(datetime) - TIMESTAMP(DATE(NOW()))) / 1000) as timestamp FROM `air_statistics` WHERE DATE(`datetime`) = DATE(NOW()) GROUP BY timestamp";
                        $result = $conn->query($sql);

                        while($row = $result->fetch_assoc()) {
                            echo  $row['humidity'] . ", ";
                        }
                        echo 0;
                       ?>
                ]
                },
                {
                    label: "Temperature",
                    borderColor: 'rgb(255, 99, 132)',
                    data: [<?php
                        $sql = "SELECT datetime, CONCAT(HOUR(datetime), ':', IF (MINUTE(datetime) < 10, '00', FLOOR(MINUTE(datetime)/10) * 10)) as time, AVG(`temperature`) as temperature, AVG(`humidity`) as humidity, FLOOR((TIMESTAMP(datetime) - TIMESTAMP(DATE(NOW()))) / 1000) as timestamp FROM `air_statistics` WHERE DATE(`datetime`) = DATE(NOW()) GROUP BY timestamp";
                        $result = $conn->query($sql);

                        while($row = $result->fetch_assoc()) {
                            echo  $row['temperature'] . ", ";
                        }
                        echo 0;
                        ?>
                    ]
                }
                ]
        },
        options: {}
    });
</script>
</body>
</html>
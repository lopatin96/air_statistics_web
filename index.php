<?php
$host = "127.0.0.1";
$username = "phpmyadmin";
$passwd = "560492q";
$dbname = "phpmyadmin";
$port = 3306;

$conn = new mysqli($host, $username, $passwd, $dbname, $port);

$sql = "SELECT datetime,
          CONCAT(HOUR(datetime), ':', IF (MINUTE(datetime) < 10, '00', FLOOR(MINUTE(datetime)/10) * 10)) as time,
          AVG(`temperature`) as temperature, AVG(`humidity`) as humidity,
          FLOOR((TIMESTAMP(datetime) - TIMESTAMP(DATE_ADD(DATE(NOW()), INTERVAL -24 HOUR))) / 1000) as timestamp
        FROM `air_statistics`
        WHERE datetime > DATE_ADD(DATE(NOW()), INTERVAL -24 HOUR)
        GROUP BY timestamp";
$result = $conn->query($sql);
$data = $result->fetch_all();

function arrayToJson($array, $column_id)
{
    $result = array();
    foreach ($array as $key => $value)
        array_push($result, $value[$column_id]);
    return json_encode($result);
}
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
    var char = new Chart(ctx, {
        type: 'line',

        data: {
            labels: <?php echo arrayToJson($data, 1); ?>,
            datasets: [
                {
                    label: "Humidity",
                    borderColor: 'rgb(72, 135, 247)',
                    data: <?php echo arrayToJson($data, 3); ?>
                },
                {
                    label: "Temperature",
                    borderColor: 'rgb(255, 99, 132)',
                    data: <?php echo arrayToJson($data, 2); ?>
                }
            ]
        },
        options: {}
    });

    setInterval(function () {
        chart.data.datasets = [];
        chart.update();
    }, 3000);
</script>
</body>
</html>
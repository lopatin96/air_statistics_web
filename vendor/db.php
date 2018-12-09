<?php
use Simplon\Mysql\PDOConnector;

$pdo = new PDOConnector(
    '192.168.1.7/phpmyadmin', // server
    'phpmyadmin',      // user
    '560492q',      // password
    'phpmyadmin'   // database
);

$pdoConn = $pdo->connect('utf8', []); // charset, options

//
// you could now interact with PDO for instance setting attributes etc:
// $pdoConn->setAttribute($attribute, $value);
//

$dbConn = new Mysql($pdoConn);
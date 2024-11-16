<?php
include "db_connection.php";


$sql = "CREATE DATABASE IF NOT EXISTS egyetem";
if ($con->query($sql) === TRUE) {
    echo "<br>Database created successfully";
} else {
    echo "<br>Error creating database: " . $con->error;
}


$con->select_db("egyetem");


$sql = "CREATE TABLE IF NOT EXISTS hallgtaok (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(255) NOT NULL,
    szak VARCHAR(255) NOT NULL,
    atlag DOUBLE NOT NULL
)";

if ($con->query($sql) === TRUE) {
    echo "<br>Table 'hallgtaok' created successfully";
} else {
    echo "<br>Error creating table 'hallgtaok': " . $con->error;
}


$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if ($con->query($sql) === TRUE) {
    echo "<br>Table 'users' created successfully";
} else {
    echo "<br>Error creating table 'users': " . $con->error;
}


$con->close();
?>

<?php
include "db_connection.php";

/*$nev = "Kis Lajos";
$szak = "GI";
$atlag = 8.50;
$sql = "INSERT INTO hallgtaok (nev,szak,atlag) values ('nev','szak','atlag')";
if($con->query($sql) === TRUE) {
    echo "<br>Table created successfully";
} else {
    echo "<br>Error creating table: " . $con->error;
}*/




$studentsData = array(
    array('John Doe', 'Informatika', 5.2),
    array('Alice Smith', 'Műszaki Informatika', 7.9),
    array('Bob Johnson', 'Gazdaságinformatika', 8.8),
    array('Eva Wilson', 'Matematika', 9.5),
    array('Mike Brown', 'Fizika', 5.0),
    array('Sarah Davis', 'Kémia', 3.7),
    array('David Lee', 'Biológia', 8.1),
    array('Linda Martinez', 'Informatika', 8.8),
    array('Tom Miller', 'Műszaki Informatika', 5.3),
    array('Karen Wilson', 'Gazdaságinformatika', 6.5)
);

foreach ($studentsData as $student) {
    $sql = "INSERT INTO hallgtaok (nev, szak, atlag) VALUES ('$student[0]', '$student[1]', $student[2])";
    if ($con->query($sql) === TRUE) {
        echo "<br>New record created successfully for $student[0]";
    } else {
        echo "<br>Error: " . $sql . "<br>" . $con->error;
    }
}

$con->close();

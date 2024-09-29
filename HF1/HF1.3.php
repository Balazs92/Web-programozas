<?php

$a = 5;
$b = 2;


$osszeg = $a + $b;
$kulombseg = $a - $b;
$szorzat = $a * $b;
$osztas = $a / $b;
$hatvanyozas = pow($a, $b);


echo "Az értékek: a = $a és b = $b.<br>";
echo "Összeadás: $a + $b = $osszeg<br>";
echo "Kivonás: $a - $b = $kulombseg<br>";
echo "Szorzás: $a * $b = $szorzat<br>";
echo "Osztás: $a / $b = $osztas<br>";
echo "$a hatványozva $b-re: $hatvanyozas";
?>

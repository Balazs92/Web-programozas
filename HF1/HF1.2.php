<?php
$seconds = 3605;


if (is_int($seconds)) {
    
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    $remainingSeconds = $seconds % 60;

    
    echo "<strong>Átalakított idő:</strong> ${hours} óra, ${minutes} perc, ${remainingSeconds} másodperc.";
} else {
    // Hibás input esetén üzenet
    echo "<strong>Hiba:</strong> A megadott érték nem egy egész szám!";
}
?>

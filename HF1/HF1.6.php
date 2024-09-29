<?php
function getSeasonIf($month) {
    if ($month == 12 || $month == 1 || $month == 2) {
        return "Tél";
    } elseif ($month >= 3 && $month <= 5) {
        return "Tavasz";
    } elseif ($month >= 6 && $month <= 8) {
        return "Nyár";
    } elseif ($month >= 9 && $month <= 11) {
        return "Ősz";
    } else {
        return "Érvénytelen hónap!";
    }
}


$month = 4;
echo "A $month hónaphoz tartozó évszak: " . getSeasonIf($month) . "<br>";

function getSeasonSwitch($month) {
    switch ($month) {
        case 12:
        case 1:
        case 2:
            return "Tél";
        case 3:
        case 4:
        case 5:
            return "Tavasz";
        case 6:
        case 7:
        case 8:
            return "Nyár";
        case 9:
        case 10:
        case 11:
            return "Ősz";
        default:
            return "Érvénytelen hónap!";
    }
}
echo "A $month hónaphoz tartozó évszak: " . getSeasonSwitch($month);
?>

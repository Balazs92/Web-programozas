<?php
function calculator($num1, $num2, $operation) {
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            if ($num2 == 0) {
                return "Hiba: 0-val való osztás!";
            }
            return $num1 / $num2;
        default:
            return "Hiba: Érvénytelen műveleti jel!";
    }
}


$num1 = 10;
$num2 = 2;
$operation = '/';
$result = calculator($num1, $num2, $operation);
echo "Eredmény: $result";
?>

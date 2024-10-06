<?php
echo "Feladat 1: <br>";

$color = "lightblue";

$generateMultiplicationTable = function($n) use ($color) {
    echo "<table border='1' cellspacing='1' cellpadding='10' style='border-collapse: collapse;'>";
    for ($i = 1; $i <= $n; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $n; $j++) {
            $result = $i * $j;
            
            if ($i == $j) {
                echo "<td style='background-color: $color;'>$result</td>";
            } else {
                echo "<td>$result</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
};


$generateMultiplicationTable(10);

echo "<br>";

echo "Feladat 2: <br>";

$orszagok = array(
    "Magyarország" => "Budapest", 
    "Románia" => "Bukarest",
    "Belgium" => "Brussels",
    "Ausztria" => "Vienna", 
    "Lengyelország" => "Warsaw"
);

foreach ($orszagok as $orszag => $fovaros) {
    echo "$orszag fővárosa <span style='color: red;'>$fovaros</span><br>";
}

echo "<br>";
echo "Feladat 3: <br>";

$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So")
);

foreach ($napok as $nyelv => $napok_listaja) {
    echo "$nyelv: ";
    
    
    foreach ($napok_listaja as $nap) {

        if ($nap == "K" || $nap == "Cs" || $nap == "Szo" || $nap == "Tu" || $nap == "Th" || $nap == "Sa" || $nap == "Di" || $nap == "Do" || $nap == "Sa") {
            echo "<strong>$nap</strong>, ";
        } else {
            echo "$nap, ";
        }
    }
    
echo "<br>";
}
echo "<br>";

echo "Feladat 4: <br>";
echo "Kiiratas klasszikusan: <br>";

function transform_classic($array, $mode) {
    $result = array();
    foreach ($array as $key => $value) {
        if ($mode == "lowercase") {
            $result[$key] = strtolower($value);
        } elseif ($mode == "uppercase") {
            $result[$key] = strtoupper($value);
        }
    }
    return $result;
}

$colors = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');
print_r(transform_classic($colors, "lowercase"));
echo "<br>";
print_r(transform_classic($colors, "uppercase"));

echo "<br>";
echo "<br>";

echo "Kiiratas array_mapp-el: <br>";

function transform_array_map($array, $mode) {
    if ($mode == "lowercase") {
        return array_map('strtolower', $array);
    } elseif ($mode == "uppercase") {
        return array_map('strtoupper', $array);
    }
    return $array;
}

$colors = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');
print_r(transform_array_map($colors, "lowercase"));
echo "<br>";
print_r(transform_array_map($colors, "uppercase"));
echo "<br>,<br>";

echo "Feladat 5: <br>";

$bevasrlolista = [
    ["nev" => "Kenyer", "mennyiseg" => 2, "egysegar" => 8.5],
    ["nev" => "Viz", "mennyiseg" => 1, "egysegar" => 2.5],
];

function elemHozzaadasa(&$lista, $nev, $mennyiseg, $egysegar) {
    $lista[] = ["nev" => $nev, "mennyiseg" => $mennyiseg, "egysegar" => $egysegar];
}

function elemEltavolitasa($lista, $nev) {
    foreach ($lista as $index => $elem) {
        if($elem["nev"] == $nev) {
            unset($lista[$index]);
            echo "$nev eltavolitva a listabol.<br>";
            return;
        }
    }
    echo "$nev nem talalhato a listan.<br>";
}

function listaKiirasa($lista) {
    if (empty($lista)) {
        echo "A bevásárlólista üres.\n";
    } else {
        echo "Bevásárlólista:\n";
        foreach ($lista as $elem) {
            echo "{$elem['nev']}: {$elem['mennyiseg']} db, Egységár: {$elem['egysegar']} Lei\n";
        }
    }
}

function osszkoltsegSzamitas($lista) {
    $osszkoltseg = 0;
    foreach ($lista as $elem) {
        $osszkoltseg += $elem['mennyiseg'] * $elem['egysegar'];
    }
    return $osszkoltseg;
}

elemHozzaadasa($bevasrlolista, "Tej", 3,1.2);
elemHozzaadasa($bevasrlolista, "Vaj",1,4);
echo "<br>";

echo "Lista kiirasa:<br>";
listaKiirasa($bevasrlolista);
echo "<br> <br>";

elemEltavolitasa($bevasrlolista,"Viz");
echo "<br> <br>";

echo "Lista kiirasa eltavolitas utan:";
echo "<br>";
listaKiirasa($bevasrlolista);
echo "<br> <br>";

echo "Osszkoltseg: " . osszkoltsegSzamitas($bevasrlolista);
?>

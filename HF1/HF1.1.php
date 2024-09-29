<?php
    $elements=[5,'5','05',12.3,'16.7','five','true',0xDECAFBAD,'10e200'];

    foreach ($elements as $element) {
        echo "Tipus: " . gettype($element) . '-';
    if (is_numeric($element)) {
        echo 'Igen numerikus';
    }else {
        echo 'Nem numerikus';
    }

    echo '<br>';
}
    ?>
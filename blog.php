<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Ejemplo básico PHP</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box" style="background-color: pink; font-weight:bold">
    <?php
    
    $prueba = array(1,4,5,6,7);
    foreach ($prueba as $value) {
        $value *= 2;
        echo $value;
    }

        
    ?>
</div>
<div class "box2" style="background-color: coral; font-weight: bold">
<?php

$algo = "hola";
$otraCosa = "qué tal";

function test() {
    global $algo, $otraCosa;
    echo $algo.", ".$otraCosa;
    echo "<br>";
    echo "<div style=\"font-size:4em;\">mariposa</div>";

}

test();

?>
</div>
</body>
</html>

<?php
// Mostramos la información según se haya pasado o no
if($haPasado === true) {
    echo('Has sacado el ' . echo $nombreCarta . ' de ' . echo $paloCarta . '. Llevas ' . echo $numTotalUser . ' punto/s\n');
    echo("Te has pasado de los 7 puntos, lo siento, has perdido");
}else {
    include("crear.php"); ?>


<br />
Has sacado el <?php echo $nombreCarta ?> de <?php echo $paloCarta ?>. Llevas <?php echo $numTotalUser ?> punto/s

<?php } ?>

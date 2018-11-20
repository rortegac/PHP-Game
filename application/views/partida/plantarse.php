<?php

// recuperamos todas las jugadas que ha realizado la máquina
for($i=0; $i < count($jugadasMaquina); $i++) {
    echo('La maquina ha sacado el ' . echo $jugadasMaquina[$i][0] . ' de ' . echo $jugadasMaquina[$i][1] . '. Lleva ' . echo $jugadasMaquina[$i][2] . ' punto/s\n');
}

// Pinta tus puntos obtenidos
echo("has conseguido " . $puntosUsuario . " puntos\n");
echo("La máquina ha conseguido " . $jugadasMaquina[count($jugadasMaquina)-1][2] . " puntos");

// Informa quien ha ganado
if($haGanado)
    echo("La máquina gana");
else
    echo("Enhorabuena, has ganado!");
?>
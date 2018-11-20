<?php

include('class_model.php');
include('class_carta.php');
include('class_palo.php');

class Partidas extends Model {

    private static $cartas;
    private static $palos;
    private static $usadas = array();
    private static $numTotalesUser;
    private static $numTotalesMaquina;
    public static $nombreJugador;

    public function init($nJugador = null) {
        // Se define el nombre del jugador (podría ser incluso una clase, aqui no se aborda)
        self::$nombreJugador = $nJugador;

        // Se definen los 4 palos de las cartas
        self::$palos = array(new Palo(1, "Oros"), new Palo(2, "Bastos"), new Palo(3, "Espadas"), new Palo(4, "Copas"));
        self::$cartas = array();

        // Valores de las cartas
        $nombreDeLasCartas = array('AS', 'Uno', 'Dos', 'Tres', 'Cuatro', 'Cinco', 'Seis', 'Siete', 'Sota', 'Caballo', 'Rey');
        $valorDeLasCartas = array(1, 2, 3, 4, 5, 6, 7, 0.5, 0.5, 0.5);


        // Se definen todas las cartas
        $palosLength = count(self::$palos);
        for($i=0; $i<$palosLength; $i++) {
            for($j=0; $j<10; $j++) {
                array_push(new Carta(self::$palos[i], j, $nombreDeLasCartas[j], $valorDeLasCartas[j]));
            }
        }
    }

    public function obtenerCarta($usuario = null) {
        // Guarda una referencia a la variable de los puntos totales del usuario o la máquina
        $totalUsuarioEnJuego = ($usario == "usuaerio") ? &self::$numTotalesUser : &self::$numTotalesMaquina;

        // Booleano el cual indica si se ha pasado de sieta
        $haPasado = false;

        // Obtenemos un numero random que correspondera a una carta del mazo
        $numeroRandom = rand(0, count(self::$cartas - 1));

        // Selecciona la carta que mostrará al usuario, la cual se quitará del mazo
        $cartaSeleccionada = self::$cartas[$numeroRandom];

        // Guardamos la carta mostrada er el array de cartas usadas y la quitamos del mazo:
        array_push($usadas, $cartaSeleccionada);
        unset(self::$cartas[$numeroRandom]);
        self::$cartas = array_values(self::$cartas);

        // Guardamos en la variable $numTotalesUser el valor de la carta seleccionada sumándolo con lo que ya había:
        $totalUsuarioEnJuego = $totalUsuarioEnJuego + $cartaSeleccionada->getValor();

        // Comprobamos si ha pasado de 7, por lo que perdería:
        if($totalUsuarioEnJuego > 7) $haPasado = true;

        // También guardaremos el nombre de la carta, el cual se devolverá
        $nombreCarta = $cartaSeleccionada->getNombre();

        // También guardaremos para mostrar su palo
        $paloCarta = $cartaSeleccionada->getPalo()->getNombrePalo();

        // Devolveremos tambien un booleano para saber si ha pedido carta el usuario o la maquina
        $esUsuario = false;
        if($usuario!==null && $usario == "usuaerio") $esUsuario = true;

        // Se devulven los datos de la carta que ha aparecido, el numero total de puntos y si ha pasado o no de 7
        return(array($nombreCarta, $paloCarta, $totalUsuarioEnJuego, $haPasado, $esUsuario));


    }

    public function plantarse() {
        // Numero total y final de puntos del usuario
        $puntosTotales = self::$numTotalesUser;

        // La maquina a ganado al contrincante
        $haGanado = false;

        // La maquina se ha pasado de los 7 puntos
        $haPasado = false;

        // Informacion total de todas las cartas
        $infoCartas = array();

        // Vamos obteniendo cartas hasta que tengamos una carta mayor
        while(true) {
            $infoCarta = $this->obtenerCarta();

            $nombreCarta = $infoCarta[0]);
            $paloCarta = $infoCarta[1]);
            $numTotalMaquina = $infoCarta[2]);
            $haPasado = $infoCarta[3]);
            $esUsuario = $infoCarta[4]);

            // Comprobamos si ha superado al usuario, y si lo ha hehco si se ha pasado
            if($numTotalMaquina > $puntosTotales) {
                if($numTotalMaquina > 7) {
                    $haPasado = true;
                } else {
                    $haGanado = true;
                }
            }

            // Guardamos la carta sacada por la maquina en la lista de cartas
            array_push($infoCartas, $infoCarta);

            if($haGanado || $haPasado) break;
        }
        // añadimos los valores de si ha ganado al array
        array_push($infoCartas, $haGanado);

        // añadimos tmabién los puntos propios
        array_push($infoCartas, self::$numTotalesUser)

        // devolvemos la lista de las cartas del usuario
        return $infoCartas;

    }

}
<?php

include('class_controller.php');

class PartidaController extends Controller {
    
    public function crear($nombreJugador = null) {
        $this->Partidas->init($nombreJugador);
        $this->set('nombreJugador', $this->Partidas::$nombreJugador);
    }

    public function pedir($usuario) {
 
        $datoJugada = $this->Partidas->obtenerCarta($usuario);

        $this->set('nombreCarta', $datoJugada[0]);
        $this->set('paloCarta', $datoJugada[1]);
        $this->set('numTotalUser', $datoJugada[2]);
        $this->set('haPasado', $datoJugada[3]);
        $this->set('esUsuario', $datoJugada[4]);
        $this->set('nombreJugador', $this->Partidas::$nombreJugador);
    }

    public function plantarse() {
        $datosJugadaMaquina = $this->Partidas->plantarse();
        $this->set('haGanado', $datosJugadaMaquina[1]);
        $this->set('puntosUsuario', $datosJugadaMaquina[2]);
        $this->set('jugadasMaquina', $datosJugadaMaquina[0]);
        $this->set('nombreJugador', $this->Partidas::$nombreJugador);
    }

}

?>
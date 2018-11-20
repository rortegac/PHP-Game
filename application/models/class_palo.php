<?php

class Palo {
    protected $intPalo;
    protected $strNombrePalo;

    public function __contruct($idpalo, $nombre) {
        $this->intPalo = $idpalo;
        $this->strNombrePalo = $nombre;
    }

    public function getNombrePalo() {return $this->strNombrePalo;}
}

?>
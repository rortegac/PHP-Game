<?php

    class Carta {
        // La carta debe de tener un palo
        protected $palo;

        // La carta debe de tener un numero
        protected $numero;

        // Cada carta debe de tener un nombre
        protected $nombre;

        // Cada carta debe de tener un valor
        protected $valor;

        public function __construct($palo, $numero, $nombre, $valor) {
            $this->palo = $palo;
            $this->numero = $numero;
            $this->nombre = $nombre;
            $this->valor = $valor;
        }

        public function getPalo() {return $this->palo;}
        public function getNumero() {return $this->Numero;}
        public function getNombre() {return $this->palo;}
        public function getValor() {return $this->palo;}
    }

?>
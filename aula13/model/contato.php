<?php

    class Contato {
        private $tipo;   
        private $valor;

        public function __construct($tipo, $valor) {
            $this->tipo = $tipo;
            $this->valor = $valor;
        }

        public function getTipo() {
            switch ($this->tipo) {
                case 1:
                    return "E-mail";
                case 2:
                    return "Telefone";
                default:
                    return "Outro";
            }
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        public function getValor() {
            return $this->valor;
        }

        public function setValor($valor) {
            $this->valor = $valor;
        }

        public function toString() {
            return $this->getTipo() . ": " . $this->getValor();
        }
    }
?>

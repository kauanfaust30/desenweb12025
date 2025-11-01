<?php

    class Pessoa {
        public $nome;
        public $sobrenome;
        public $cpf;
        public $dataInstancia;

        public function __construct() {
            $this->dataInstancia = date("d/m/Y H:i:s");
        }

        public function getNomeCompleto() {
            return $this->nome . " " . $this->sobrenome;
        }
    }
?>
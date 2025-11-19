<?php

    class Pessoa1 {
        private $nome;
        private $sobrenome;
        private $cpf;

        public function Nome($nome) {
            $this->nome = $nome;
        }

        public function Sobrenome($sobrenome) {
            $this->sobrenome = $sobrenome;
        }

        public function Cpf($cpf) {
            $this->cpf = $cpf;
        }

        public function getNomeCompleto() {
            return $this->nome . " " . $this->sobrenome;
        }
    }
?>
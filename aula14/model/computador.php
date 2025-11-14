<?php
    class computador {
        private $status;

        function ligar() {
            $this->status = "ligado";
        }

        function desligar() {
            $this->status = "desligado";
        }

        function getStatus() {
            return $this->status;
        }

    }
?>
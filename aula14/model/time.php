<?php
    require_once 'jogador.php';

    class Time {
        private $nome;
        private $anoFundacao;
        private $jogadores = array();

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getAnoFundacao() {
            return $this->anoFundacao;
        }

        public function setAnoFundacao($anoFundacao) {
            $this->anoFundacao = $anoFundacao;
        }

        public function addJogador($nome, $posicao , $dataNascimento) {
            $jogador = new Jogador();
            $jogador->setNome($nome);
            $jogador->setPosicao($posicao);
            $jogador->setDataNascimento($dataNascimento);
            
            array_push($this->jogadores, $jogador);
        }

        public function listaJogadores() {
            foreach ($this->jogadores as $jogador) {
                echo "Nome: " . $jogador->getNome() . "<br>";
                echo "Posição: " . $jogador->getPosicao() . "<br>";
                echo "Data de Nascimento: " . $jogador->getDataNascimento() . "<br><br>";
            }
        }

    }
?>
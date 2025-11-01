<?php
    namespace

    class Pessoa {
        private $nome;
        private $sobrenome;
        private $dataNascimento;
        private $cpfcnpj;
        private $tipo;
        private $telefone;
        private $endereco;

        public function __construct() {
            $this->inicializaClasse();
        }

        private function inicializaClasse() {
            $this->tipo = 1;
        }

        public function getNomeCompleto() {
            return $this->nome . " " . $this->sobrenome;
            
        }

        public function getIdade() {
            $dataAtual = new \DateTime();
            $dataNasc = new \DateTime($this->dataNascimento);
            $idade = $dataAtual->diff($dataNasc);
            return $idade->y;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getSobrenome() {
            return $this->$sobrenome;
        }

        public function setSobrenome($sobrenome) {
            $this-> sobrenome = $sobrenome;
        }

        public function getDataNascimento() {
            return $this->dataNascimento;
        }

        public function setDataNascimento($dataNascimento) {
            $this->dataNascimento = $dataNascimento;
        }

        public function getCpfCnpj() {
            return $this->cpfcnpj;
        }

        public function setCpfCnpj($cpfcnpj) {
            $this->cpfcnpj = $cpfcnpj;
        }

        public function getTipo() {
            switch ($this->tipo) {
                case 1:
                    return "Físico";
                case 2:
                    return "Jurídico";
                default:
                    return "Desconhecido";
            }
        }

        public function setTipo($tipo) {
            if ($tipo < 1 || $tipo > 2) {
                throw new Exception("Tipo inválido. Use 1 para Físico ou 2 para Jurídico.");
            }
            $this->tipo = $tipo;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function getEndereco() {
            return $this->endereco;
        }

        public function setEndereco($endereco) {
            $this->endereco = $endereco;
        }

    }
?>
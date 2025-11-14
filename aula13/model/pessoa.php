<?php
require_once 'contato.php';
require_once 'endereco.php';

class Pessoa {
    private $nome;
    private $sobrenome;
    private $dataNascimento;
    private $cpfcnpj;
    private $tipo;
    private $contatos = array();
    private $endereco; 

    public function __construct() {
        $this->tipo = 1; 
    }

    public function getNomeCompleto() {
        return $this->nome . " " . $this->sobrenome;
    }

    public function getIdade() {
        if (empty($this->dataNascimento)) {
            return null;
        }

        $dataAtual = new DateTime();
        $dataNasc = new DateTime($this->dataNascimento);
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
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
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
            throw new Exception("Tipo inválido. Use 1 (Físico) ou 2 (Jurídico).");
        }
        $this->tipo = $tipo;
    }

    public function addContato(Contato $contato) {
        $this->contatos[] = $contato;
    }

    public function getContatos() {
        return $this->contatos;
    }

    public function getContatosString() {
        if (empty($this->contatos)) {
            return "Nenhum contato cadastrado.";
        }

        $saida = "";

        foreach ($this->contatos as $contato) {
            $saida .= "- " . $contato->toString() . "<br>";
        }
        return $saida;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco(Endereco $endereco) {
        $this->endereco = $endereco;
    }

    public function toJSON() {
        $contatosArray = array_map(function($contato) {
            return array(
                "tipo" => $contato->getTipo(),
                "valor" => $contato->getValor()
            );
        }, $this->contatos);

        $dados = array(
            "nome" => $this->nome,
            "sobrenome" => $this->sobrenome,
            "dataNascimento" => $this->dataNascimento,
            "idade" => $this->getIdade(),
            "cpfcnpj" => $this->cpfcnpj,
            "tipo" => $this->getTipo(),
            "endereco" => ($this->endereco) ? $this->endereco->toString() : null,
            "contatos" => $contatosArray
        );

        return json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
?>

<?php
class Calculadora {
    private $a;
    private $b;

    public function somar() {
        return $this->a + $this->b;
    }

    public function subtrair() {
        return $this->a - $this->b;
    }

    public function multiplicar() {
        return $this->a * $this->b;
    }

    public function dividir() {
        try {   
            if ($this->b == 0) {
                throw new Exception("Divisão por zero não permitida.");
            }
            return $this->a / $this->b;
        } catch (Exception $e) {
            return "Erro: " . $e->getMessage();
        }
    }

    public function setA($a) {
        $this->a = $a;
    }

    public function setB($b) {
        $this->b = $b;
    }

}
    $calc = new Calculadora();
    $calc->setA(10);
    $calc->setB(5);  
?>
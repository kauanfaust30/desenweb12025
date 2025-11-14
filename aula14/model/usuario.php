<?php

    class Usuario {
        private $userName;
        private $userLogin;
        private $userPass;

        public function loadUsuario($userLogin) { 
            return true;
        }

        public function getUserName() {
            return $this->userName;
        }

        public function getUserLogin() {
            return $this->userLogin;
        }

        public function getUserPass() {
            return $this->userPass;
        }

        public function setUserName($userName) {
            $this->userName = $userName;
        }

        public function setUserLogin($userLogin) {
            $this->userLogin = $userLogin;
        }

        public function setUserPass($userPass) {
            $this->userPass = $userPass;
        }

        public function __construct($login, $senha) {
    $this->userLogin = $login;
    $this->userPass = $senha;
}

public function validaUsuario() {
    if ($this->userLogin === "admin" && $this->userPass === "1234") {
        $this->userName = "Administrador";
        return true;
    } else {
        return false;
    }
}
    }
?>
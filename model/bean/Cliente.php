<?php
    class Cliente {
        // Atributos
        private $idcliente;
        private $nome;
        private $clientecol;
        private $email;
        private $telefone;

        // Métodos
        public function getIdCliente() {
            return $this->idcliente;
        }

        public function setIdCliente($idcliente) {
            $this->idcliente = $idcliente;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getClienteCol() {
            return $this->clientecol;
        }

        public function setClienteCol($clientecol) {
            $this->clientecol = $clientecol;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->nome;
        }
    }
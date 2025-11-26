<?php
    class Venda {
        // Atributos
        private $idvenda;
        private $preco;
        private $data;
        private $cliente; // Associação com Cliente
        private $formaPagamento; // Associação com FormaPagamento
    

        // Métodos
        public function getIdvenda() {
            return $this->idvenda;
        }

        public function setIdvenda($idvenda) {
            $this->idvenda = $idvenda;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }

        public function getData() {
            return $this->data;
        }

        public function setData($data) {
            $this->data = $data;
        }


        // Getters e setters de cliente e formaPagamento

         public function getCliente() {
            return $this->cliente;
        }

         public function setCliente($cliente) {
            $this->cliente = $cliente;
        }

         public function getFormaPagamento() {
            return $this->formapagamento;
        }

         public function setFormaPagamento($formapagamento) {
            $this->formapagamento = $formapagamento;
        }


        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->preco;
        }
    }
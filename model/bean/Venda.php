<?php
    class Venda {
        // Atributos
        private $idvenda;
        private $preco;
        private $data;
        private $cliente_idcliente;
        private $forma_pagamento_idforma_pagamento;
        private $tipoProduto; // Associação com a classe TipoProduto

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

        public function getCliente_idcliente() {
            return $this->cliente_idcliente;
        }

        public function setCliente_idcliente($cliente_idcliente) {
            $this->cliente_idcliente = $cliente_idcliente;
        }

        public function getForma_pagamento_idforma_pagamento() {
            return $this->forma_pagamento_idforma_pagamento;
        }

        public function setForma_pagamento_idforma_pagamento($forma_pagamento_idforma_pagamento) {
            $this->forma_pagamento_idforma_pagamento = $forma_pagamento_idforma_pagamento;
        }

        // Get e set do atributo que faz associação (normal)
        public function getTipoProduto() {
            return $this->tipoProduto;
        }

        public function setTipoProduto($tipoProduto) {
            $this->tipoProduto = $tipoProduto;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->preco;
        }
    }
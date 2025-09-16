<?php
    class Produto_Venda {
        // Atributos
        private $produto_idproduto;
        private $venda_idvenda;

        // Métodos
        public function getProduto_idproduto() {
            return $this->produto_idproduto;
        }

        public function setProduto_idproduto($produto_idproduto) {
            $this->produto_idproduto = $produto_idproduto;
        }

        public function getVenda_idvenda() {
            return $this->venda_idvenda;
        }

        public function setVenda_idvenda($venda_idvenda) {
            $this->venda_idvenda = $venda_idvenda;
        }
        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->venda_idvenda;
        }
    }
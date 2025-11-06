<?php
    class Venda {
        // Atributos
        private $idproduto;
        private $preco;
        private $descricao;
        private $tamanho;
        private $categoria_idcategoria;
        // Associação com a classe TipoProduto

        // Métodos
        public function getIdproduto() {
            return $this->idproduto;
        }

        public function setIdproduto($idproduto) {
            $this->idproduto = $idproduto;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }

        public function getdescricao() {
            return $this->descricao;
        }

        public function setDescricao($descrciao) {
            $this->descricao = $descricao;
        }

        public function getTamanho() {
            return $this->tamanho;
        }

        public function setTamanho($tamanho) {
            $this->tamanho = $tamanho;
        }

        public function getCategoria_idcategoria() {
            return $this->categoria_idcategoria;
        }

        public function setCategoria_idcategoria($categoria_idcategoria) {
            $this->categoria_idcategoria = $categoria_idcategoria;
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
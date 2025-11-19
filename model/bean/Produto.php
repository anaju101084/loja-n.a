<?php
    class Produto {
        // Atributos
        private $idproduto;
        private $preco;
        private $descricao;
        private $tamanho;
        // Associação com a classe categoria
        private $categoria;


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

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getTamanho() {
            return $this->tamanho;
        }

        public function setTamanho($tamanho) {
            $this->tamanho = $tamanho;
        }

        // Get e set do atributo que faz associação (normal)
        public function getCategoria() {
            return $this->categoria;
        }

        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->descricao;
        }
    }
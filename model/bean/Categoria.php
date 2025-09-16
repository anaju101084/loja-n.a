<?php
    class Categoria {
        // Atributos
        private $idcategoria;
        private $descricao;

        // Métodos
        public function getIdCategoria() {
            return $this->idcategoria;
        }

        public function setIdCategoria($idcategoria) {
            $this->idcategoria = $idcatgoria;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->descricao;
        }
    }
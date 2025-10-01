<?php
    class BD {
        public static function getConexao() {
            $conn = new PDO(
                'mysql:host=localhost;dbname=bdlojaonline', 
                'root', 
                'root'
            );

            return $conn;
        }
    }
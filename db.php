<?php
    define('HOST', 'localhost');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('DB', 'wcadm');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possivel conectar');

    class Database{
        private $userName = "root";
        private $senha = "";

        public $conn;

        public function dbConnection(){
            $this->conn = null;
            try{

                $this->conn = new PDO('mysql:host=localhost;dbname=wcadm',
                $this->userName, $this->senha);


                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $this->conn;
        }
    }
?>
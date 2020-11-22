<?php
    require_once 'db.php';

    class Cliente{
        private $conn;

        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }

        public function runQuery($sql){
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function insert($nome, $item, $valor){
            try{
                $sql = "INSERT INTO wccompra(nome, item, valor)
                        VALUES(:nome, :item, :valor)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":nome", $nome);
                $stmt->bindparam(":item", $item);
                $stmt->bindparam(":valor", $valor);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        public function buy($nome, $item, $valor){
            try{
                $sql = "INSERT INTO wccompra(nome, item, valor)
                        VALUES(:nome, :item, :valor)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":nome", $nome);
                $stmt->bindparam(":item", $item);
                $stmt->bindparam(":valor", $valor);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }

        public function update($nome, $item, $valor, $id){
            try{
                $sql = "UPDATE wccompra
                        SET nome = :nome,
                        item = :item,
                        valor = :valor
                        WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":nome", $nome);
                $stmt->bindparam(":item", $item);
                $stmt->bindparam(":valor", $valor);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        
        }

        public function delete($id){
            try{
                $sql = "DELETE FROM wccompra where id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo("Error: ".$e->getMessage());
            }finally{
                $this->conn = null;
            }
        }
        public function redirect($url){
            header("Location: $url");
        }
    }
?>
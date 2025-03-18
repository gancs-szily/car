<?php

class DBVezerlo{
    private $conn=null;
    private $host="localhost";
    private $user="root";
    private $pw="";
    private $db="car";

    function __construct(){
        $this->connectDB();
        print('carPDO');
    }

    function connectDB(){
        try{
            $this->conn = new PDO("mysql:host={$this->host};
            dbname={$this->db};charset=utf8",
            $this->user,$this->pw);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("conn failed: ". $e->getMessage());
        }
    }

    function executeSelectQuery($query,$params=[]){
        try{
            $stmt=$this->conn->prepare($query);
            $stmt->execute($params);
            return$stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            die("conn failed: ". $e->getMessage());
        }
    }

    function closeDB(){
        $this->conn = null;
    }
}
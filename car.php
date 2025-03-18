<?php
require("dbvezerlo.php");

class Car{
    private $db;
    public function __construct(){
        $this->db=new DBController();
    }
    public function getAllCars(){
        $query = "SELECT c_id, c_desc, path FROM tbl_car";
        return $this->db->executeSelectQuery($query);
    }
    public function getCarsById($ct_id){
        $query="SELECT c_id,c_desc,path FROM tbl_car WHERE c_id = ?";
        return $this->db->executeSelectQuery($query,[$ct_id]);
    }
    public function getCarsByType($ct_desc){
        $query="SELECT c_id,c_desc,path,car_type.ct_desc 
        FROM tbl_car
        INNER JOIN car_type on car_type.ct_id=tbl_car.c_id
        WHERE car_type.ct_desc = ?";
        return $this->db->executeSelectQuery($query,[$ct_desc]);
    }
}
<?php
include("restKezelo.php");
include("car.php");

class carRestKezelo extends RestKezelo{
    function getAllcars(){
        $cars=new Car();
        $sorAdat=$cars->getAllCars();

        if(empty($sorAdat)){
            $statusCode = 404;
            $sorAdat=array('error'=>"No cars found");
        }else {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        $result['cars']=$sorAdat;
        $response=$this->encodeJson($result);
        $file_path="carsByType.json";
        $this->printfile($response,$file_path);
        echo $response;
    }

    function getcarsByID($c_id){
        $cars=new car();
        $sorAdat=$cars->getcarsByID($c_id);

        if(empty($sorAdat)){
            $statusCode = 404;
            $sorAdat=array('error'=>"No cars found by ID");
        }else {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        $result['carsById']=$sorAdat;
        $response=$this->encodeJson($result);
        $file_path="carsById.json";
        $this->printfile($response,$file_path);
        echo $response;
    }

    function getcarsByType($ct_desc){
        $cars=new car();
        $sorAdat=$cars->getcarsByType($ct_desc);

        if(empty($sorAdat)){
            $statusCode = 404;
            $sorAdat=array('error'=>"No cars found by this TYPE");
        }else {
            $statusCode=200;
        }
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        $result['carsByType']=$sorAdat;
        $response=$this->encodeJson($result);
        $file_path="carsByType.json";
        $this->printfile($response,$file_path);
        echo $response;
    }

    function getFault(){
        $statusCode=400;
        $this->sethttpFejlec($statusCode);
        header('Content-Type: application/json; charset=utf-8');
        $sorAdat=array('error'=>'Bad request');
        $result['Fault']=$sorAdat;

        $response=$this->encodeJson($result);
        $file_path="Fault.json";
        $this->printfile($response,$file_path);
        echo $response;
    }

    function encodeJson($responseData){
        return json_encode($responseData,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    function printfile($responseData,$file_path){
        file_put_contents($file_path,$responseData,LOCK_EX);
    }
}
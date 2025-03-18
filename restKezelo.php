<?php
class RestKezelo{
    private $httpVersion= "HTTP/1.1";
    public function setHttpFejlec($statuskod){
        $statusUzenet=$this->gethttpStatusUzenet($statuskod);
        header($this->httpVersion." ". $statuskod. " ".$statusUzenet);
        header("Content-Type: application/json; charset=utf-8");
    }

    public function gethttpStatusUzenet($statuskod){
        $httpStatus=array(
            200=>'OK',
            400=> 'Bad request',
            404=> 'Not FOund'
        );
        return ($httpStatus[$statuskod]);
    }
}
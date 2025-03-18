<?php
require_once ("carRestkezelo.php");
$view="";
if(isset($_GET['view'])){
    $view=$_GET['view'];
    switch ($view) {
        case 'all':
            $carrest= new carRestKezelo();
            $carrest->getAllcars();
            break;
            
        case 'single':
            $carrest= new carRestKezelo();
            $carrest->getcarsByID($_GET['c_id']);
            break;

        case 'tipus':
            $carrest= new carRestKezelo();
            $carrest->getcarsByType($_GET['ct_desc']);
            break;
        default:
            $carrest= new carRestKezelo();
            $carrest->getFault();
            break;
    }
}
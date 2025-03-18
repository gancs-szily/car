<?php
require_once "dbvezerlo.php";

class DBvez_test{
    public function tesztFuttat(){
        echo "teszt indítása <br>";

        $db= new DBvezerlo();

        if($this->csatlakozasTest($db)){
            echo "sikeres csatlakozás <br>";
        }else{
            echo "sikeretlen csatlakozás <br>";
        }

        if ($this->SelectQueryteszt($db))
        {
            echo "sikeres lekerdezes <br>";
        }
        else
        {
            echo "sikertelen lekerdezes <br>";
        }

        $db->closeDB();
    }

    private function csatlakozasTest($db){
        $informacio=new ReflectionClass($db);
        $tulajdonsag= $informacio->getProperty('conn');
        $tulajdonsag->setAccessible(true);
        return !is_null($tulajdonsag->getValue($db));
    }

    private function SelectQueryteszt($db){
        $eredmeny=$db->executeSelectQuery("SELECT * FROM `tbl_car` WHERE c_id=1");
         print_r($eredmeny);
         print("<br>");
         return is_array($eredmeny) && !empty($eredmeny) && isset($eredmeny[0]['c_type']) && $eredmeny[0]['c_type']==1;
    }
}
$teszt = new DBvez_test();
$teszt->tesztFuttat();
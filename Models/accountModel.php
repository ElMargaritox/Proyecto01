<?php

class accountModel extends Mysql{
    public function __construct(){
        parent::__construct();
    }

    /*
    public function setPlugin(string $name, string $description, string $image, string $price){
        $query_insert = "INSERT INTO pluginsdata(Name, Description, Image, Price) VALUES(?,?,?,?)";
        $arrData = array($name, $description, $image, $price);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }
    */

    public function GetLicence($licence, $password){
        $sql = "SELECT * FROM users WHERE Licence='$licence' AND Password='$password';";
        $request = $this->select($sql);
        return $request;
    }


}
?>
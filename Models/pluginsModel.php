<?php

class pluginsModel extends Mysql{
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

    public function GetPlugin($id){
        $sql = "SELECT * FROM pluginsdata WHERE id='$id';";
        $request = $this->select($sql);
        return $request;
    }

    /*
    public function updatePlugin($id, string $name, string $description, string $image, string $price){
        $sql = "UPDATE pluginsdata SET Name = ?, Description = ?, Image = ?, Price = ? WHERE Id='$id';";
        $arrData = array($name, $description, $image, $price);
        $request = $this->update($sql, $arrData);
        return $request;
    }
    */

    public function GetPlugins(){
        $sql = "SELECT * FROM pluginsdata";
        $request = $this->select_all($sql);
        return $request;
    }

    public function GetPluginsWithName($name){
        $sql = "SELECT * FROM pluginsdata WHERE Name LIKE '%$name%';";
        $request = $this->select_all($sql);
        return $request;
    }

    public function GetPluginsWithPrice($value){
        $sql = "SELECT * FROM pluginsdata WHERE Price <='$value';";
        $request = $this->select_all($sql);
        return $request;
    }

    /*
    public function delUser($id){
        $sql = "DELETE FROM pluginsdata WHERE Id = '$id'";
        $request = $this->select_all($sql);
        return $request;
    }
    */

}
?>
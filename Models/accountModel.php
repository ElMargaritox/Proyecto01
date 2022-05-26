<?php

class accountModel extends Mysql{
    public function __construct(){
        parent::__construct();
    }

    
    public function setPlugin(string $name, string $description, string $image, string $price){
        $query_insert = "INSERT INTO pluginsdata(Name, Description, Image, Price) VALUES(?,?,?,?)";
        $arrData = array($name, $description, $image, $price);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }

    public function setImage($id, string $name, string $description, string $image, string $price){
        $sql = "UPDATE pluginsdata SET Name = ?, Description = ?, Image = ?, Price = ? WHERE Id='$id';";
        $arrData = array($name, $description, $image, $price);
        $request = $this->update($sql, $arrData);
        return $request;
    }
    

    public function GetLicence($licence, $password){
        $sql = "SELECT * FROM users WHERE Licence='$licence' AND Password='$password';";
        $request = $this->select($sql);
        return $request;
    }

    public function GetPlugins(int $start, int $finally){
        $sql = "SELECT * FROM pluginsdata LIMIT $start,$finally;";
        $request = $this->select_all($sql);
        return $request;
    }

    public function removePlugin($id){
        $sql = "DELETE FROM pluginsdata WHERE Id = '$id'";
        $request = $this->select_all($sql);
        return $request;
    }


}
?>
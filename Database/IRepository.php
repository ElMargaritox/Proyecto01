<?php
interface IRepository{
    public function Create($table, $sql);
    public function Read($table);
    public function ReadWhere($table, $name);
    public function Update();
    public function Delete($table, $sql);
}
?>
<?php
$DB_TYPE = 'mysql';
$DB_HOST = 'localhost';
$DB_NAME = 'lesson8';
$USER = 'root';
$PW = '';

try {
    $connection = new PDO("$DB_TYPE:host=$DB_HOST;dbname=$DB_NAME", $USER, $PW);
    $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

    function prepareSQL($sql){
        global $conn;
        return $conn->prepare($sql);
    }
    function getData(){
        $sql = "SELECT * FROM category";
        $select = prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }

    function getOneData($data){
        $sql = "SELECT * FROM category WHERE id = :id";
        $select = prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }

    function createNewData($data){
        $sql = "INSERT INTO category (name) VALUES (:name)";
        $create = prepareSQL($sql);
        $create->execute($data);
    }

    function updateData($data){
        $sql = "UPDATE category SET name = :name WHERE id = :id";
        $update = prepareSQL($sql);
        $update->execute($data);
    }
    function deleteData($data){
        $sql = "DELETE FROM category WHERE id = :id";
        $update = prepareSQL($sql);
        $update->execute($data);
    }
?>
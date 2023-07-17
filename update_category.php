<?php
    require_once 'pdo_category.php';
    $id = ['id' => $_GET['id']];
    $name = $_POST['name'];
    $data = [
        'id' => $id['id'],
        'name' => $name
    ];
    updateData($data);
    header("Location: http://localhost/bai8/category.php");
?>
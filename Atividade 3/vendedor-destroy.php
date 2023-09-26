<?php 

if (isset($_GET['id'])) {

    require_once 'connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM vendedores WHERE id=?";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(1, $id);
    
    $stmt->execute();

    header("Location: vendedor-list.php");
    exit;
}
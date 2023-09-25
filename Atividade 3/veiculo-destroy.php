<?php 

if (isset($_GET['id'])) {

    require_once 'connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM veiculos WHERE id=?";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(1, $id);
    
    $stmt->execute();

    header("Location: veiculo-list.php");
    exit;
}
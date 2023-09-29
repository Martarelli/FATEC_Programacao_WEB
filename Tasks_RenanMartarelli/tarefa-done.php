<?php 

require_once 'connection.php';
require_once 'Status.php';
require_once 'Tarefa.php';

$id = $_GET['id'];

$dataConclusao = date("Y-m-d"); 
$status_id = 3;   
                
$sql = "UPDATE tarefas SET dataConclusao=?, status_id=? WHERE id=?";
$stmt = $conn->prepare($sql);

$stmt->bindParam(1, $dataConclusao);
$stmt->bindParam(2, $status_id);
$stmt->bindParam(3, $id);
  
$stmt->execute();
$conn = null;

header("Location: index.php");
exit;
?>
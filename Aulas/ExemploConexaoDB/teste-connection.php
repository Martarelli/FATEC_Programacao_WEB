<?php 

require_once('connection.php');

$str = "SELECT * from contatos";

$conn->beginTransaction();

$dados = $conn->query($str);

$conn->exec("INSERT INTO contatos(nome, email) VALUES ('João', 'joao@teste.com')");

$conn->exec("UPDATE contatos SET email = 'joaosilva@teste.com' WHERE nome = João");

//se tudo correu bem
$conn->commit();
//se não
$conn->rollback();



?>
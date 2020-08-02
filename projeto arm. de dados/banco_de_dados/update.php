<?php
session_start();
include_once 'conexao.php';
$id = $_SESSION['id'];

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);

$queryUpdate = $link->query("update tb_clientes set nome='$nome', email='$email', mensagem='$mensagem' where id='$id'");
$affect_rows= mysqli_affected_rows($link);

if($affect_rows > 0){
	header("Location:../consultas.php");
};

?>
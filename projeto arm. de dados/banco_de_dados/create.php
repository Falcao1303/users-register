<?php
	session_start();
	include_once 'conexao.php';

	$nome     = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	$email 	  = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);

	$querySelect = $link->query("select email from tb_clientes");
	$array_emails=[];

	while ($emails = $querySelect->fetch_assoc()):
		$emails_existentes = $emails['email'];
		array_push($array_emails, $emails_existentes);
	endwhile;

	if(in_array($email, $array_emails)):
	$_SESSION['msg'] = "<p class='center red-text'>".'E-mail já cadastrado'."</p>";
	header("Location:../");
	else:
		$queryInsert = $link->query("insert into tb_clientes values(default,'$nome','$email','$mensagem')");
		$affected_rows = mysqli_affected_rows($link);

		if($affected_rows > 0):
			$_SESSION['msg'] = "<p class='center green-text'>".'Cadastro efetuado com Sucesso!'."<br>";
			header ("Location:../");
		endif;
	endif;
	?>

 <?php 
session_start();
include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';
?>

<div class="row container">
	<div class="col s12">
		<h5 class="light">Edição de Registros</h5><hr>
	</div><!--cols12-->
</div><!--rowcontainer-->

<?php
  include_once 'banco_de_dados/conexao.php';
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  $_SESSION['id'] = $id;
  $querySelect = $link->query("select * from tb_clientes where id='$id'");

while($registros = $querySelect->fetch_assoc()){
	$nome = $registros['nome'];
	$email = $registros['email'];
	$mensagem = $registros['mensagem'];
}

?>

<!---Formulário de cadastro-->
		<div class="row container">
			<p>&nbsp;</p>
			<form action="banco_de_dados/update.php" method="post" class="col sl2">
				<fieldset class="formulario" style="padding:15px">
				 <legend><img src="imagens/person.png" alt="[imagem]" width="90"></legend>
				<h5 class="light center">Alteração</h5>

				<!--CAMPO-NOME-->
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="nome" id="nome" value="<?php echo $nome ?>" maxlength="40" required placeholder="Nome do Usuário"  autofocus>
					</div><!--inputfield-->

				<!--CAMPO-E-MAIL-->

					<div class="input-field col s12">
						<i class="material-icons prefix">email</i>
						<input type="text" name="email" id="email" value="<?php echo $email ?>" maxlength="50" required placeholder="E-mail do Usuário">
					</div><!--inputfield-->
			
				<!--CAMPO-MENSAGEM-->

					<div class="input-field col s12">
						<i class="material-icons prefix">chat_bubble_outline</i>
						<input type="text" name="mensagem" id="mensagem" value="<?php echo $mensagem ?>" maxlength="225" required placeholder="Mensagem">
					</div><!--inputfield-->

				<!--Botões-->
				<div class="input-field col s12">	
					<input type="submit" value="alterar" class="btn blue">
					<a href="consultas.php" class="btn red">Cancelar</a>
				</div>
				</fieldset>
			</form>
		</div><!---rowcontainer-->

 
<?php include_once 'includes/footer.inc.php';
?>

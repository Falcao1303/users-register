 <?php session_start() ?>
 <?php include_once 'includes/header.inc.php' ?>

 <?php include_once 'includes/menu.inc.php' ?>



		<!---Formulário de cadastro-->
		<div class="row container">
			<p>&nbsp;</p>
			<form action="banco_de_dados/create.php" method="post" class="col sl2">
				<fieldset class="formulario" style="padding:15px">
				 <legend><img src="imagens/person.png" alt="[imagem]" width="90"></legend>
				<h5 class="light center">Cadastro de Usuário</h5>

				<?php
				 if(isset($_SESSION['msg'])):
				 	echo $_SESSION['msg'];
				 	session_unset();
				 endif;
				?>

				<!--CAMPO-NOME-->
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input type="text" name="nome" id="nome" maxlength="40" required placeholder="Nome do Usuário"  autofocus>
					</div><!--inputfield-->

				<!--CAMPO-E-MAIL-->

					<div class="input-field col s12">
						<i class="material-icons prefix">email</i>
						<input type="text" name="email" id="email" maxlength="50" required placeholder="E-mail do Usuário">
					</div><!--inputfield-->
			
				<!--CAMPO-MENSAGEM-->

					<div class="input-field col s12">
						<i class="material-icons prefix">chat_bubble_outline</i>
						<input type="text" name="mensagem" id="mensagem" maxlength="225" required placeholder="Mensagem">
					</div><!--inputfield-->

				<!--Botões-->
				<div class="input-field col s12">	
					<input type="submit" value="cadastrar" class="btn blue">
					<input type="reset" value="limpar" class="btn red">
				</div>
				</fieldset>
			</form>
		</div><!---rowcontainer-->

<?php include_once 'includes/footer.inc.php'?>
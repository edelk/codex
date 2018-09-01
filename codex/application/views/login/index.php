<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="login-form">
	<h3>Codex</h3>
	<?php
		get_msg('msgerro');
		get_msg('msg_success');
	?>
	<form action="" class="" name="form-login" id="form-login" method="post">

		<!-- INPUT EMAIL -->
		<input type="email" name="login_email" value="" class="input-sistema" autocomplete="off" placeholder="E-mail" required>

		<!-- INPUT SENHA -->
		<input type="password" name="login_senha" value="" class="input-sistema" autocomplete="off" placeholder="Senha" required>
		
		<!-- BOTÃO ENVIAR -->
		<button form="form-login" type="submit" class="btn btn-success btn-lg btn-block">ENTRAR</button>
	</form>
</div>
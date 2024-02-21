<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inglês Aqui - Login</title>
      <link rel="icon" href="View/Imagens/icon.png" type="image/icon type">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			<link rel="stylesheet" type="text/css" href="\View\modules\LoginADM\login.css" />
</head>

<body class="form-v6">
	<div class="page-content">
		<div class="form-v6-content">
			<div class="form-left">
				<img src="/View/Imagens/fundo.png" width="484" height="643" alt="form">
			</div>
			<form class="form-detail" action="/login_adm/autenticar" method="post" id="login_adm">
				<br>
				<center><h1><font style="font-family: Corbel" color="black">Sessão Administrativa</font></h1></center>

				<div class="error" id="email-invalid-error">Dados Inválidos</div>
				<br><br>
				<div class="form-row">
					<input type="email" name="email" id="email" class="input-text" placeholder="Email" onchange="onChangeEmail() required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" required>
				</div>
				<br>

				<div class="form-row">
					<input type="password" name="password" id="password" class="input-text" placeholder="Senha" required>
				</div>	
				<br>
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Entrar" >
				</div>
		
			<div class="Voltar">
		     <center><p><a href="/"><font color="#020D2B">Voltar</a></p></font></center>
            </div>
			</form>

			<script src="View/modules/LoginADM/index.js"></script>
		</div>
	</div>
</body>
</html>
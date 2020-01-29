
<?php 
require_once("logica-usuario.php");
require_once("mostra-alerta.php");
 ?>

<!DOCTYPE html>
<html lang="pt">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width-device-width,initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="sie-edge" />
		<link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/loguin.css">
		<title>Login</title>
	</head>
	
	<body>
		
	<?php  mostraAlerta("danger"); ?>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
        </div>
        <div class="form-container sign-in-container">
            <form action="login.php" method="post">
                <h1>Login</h1>
                <span>Entre com o seu Login</span>
                <input type="email" placeholder="Email" name="email">
                <input type="password" placeholder="Password" name="senha">
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left"></div>
                <div class="overlay-panel overlay-right"> </div>
            </div>
        </div>
    </div>
</body>

</html>

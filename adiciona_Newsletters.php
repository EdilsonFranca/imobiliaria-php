<?php
require_once("banco_Newsletters.php");
require_once("class/Newsletter.php");
if ((isset($_POST["nome-newsletters"]) && !empty($_POST["nome-newsletters"]))&&(isset($_POST["email-newsletters"]) && !empty($_POST["email-newsletters"]))){
$newsletters = new Newsletter();
$newsletters->setNome($_POST['nome-newsletters']);
$newsletters->setEmail($_POST['email-newsletters']);
if (insere_Newsletters($conn,$newsletters)){
   ?>
   <p class="text-success text-center textAlert"> adicionado com sucesso!</p>
   <?php
   } else {
   $msg = mysqli_error($conexao);
   ?>
   <p class="text-danger text-center textAlert"> não foi adicionado: </p>
   <?php echo $msg;
 }
}
   ?>



<?php
 if(!isset($_SESSION)) { 
    session_start();
 }
 function mostraAlerta($tipo) {
	 if(isset($_SESSION[$tipo])) {
?>
	<p class="text-<?=$tipo?> text-center"><?= $_SESSION[$tipo]?></p>
<?php
		unset($_SESSION[$tipo]);
	 }
 }

 
<?php
$tem_erros=false;
if(isset($_POST['submit'])){
	include("validacao.php");
}
$array_css_da_pagina=array('header','footer','faleConosco','geral');
$array_js_da_pagina=array('particles.min','script');
$array_jquery_da_pagina=array('jquery.min');

include "cabecalho.php";?>
<div class="row manFaleConosco">
		<div id="particles-js"></div>
		<div class="col-sm-6" >
			<form action="" method="Post" id="form-contato" class="formularioFale" >
				<div class="divForm col-sm-12">
					<h3 class="text-center">Entre em contato</h3>
					<tr>
						<td><span class="label">Nome</span></td>
					<?php if ($tem_erros && isset($erros_validacao['nome'])): ?>
							<td>
								<span class="erro"><?=$erros_validacao['nome']?></span>
							</td>
					<?php endif?>
						<td>
							<input class="form-control" type="text" name="nome" id="nome" >
							<span class='msg-erro msg-nome'></span>
						</td>
					</tr>
					<tr>
						<td><span class="label">Sobre Nome</span></td>
					<?php if ($tem_erros && isset($erros_validacao['sobreNome'])): ?>
							<td>
								<span class="erro"><?=$erros_validacao['sobreNome']?></span>
							</td>
					<?php endif?>
						<td>
							<input class="form-control" type="text" name="sobreNome" id="sobreNome" >
							<span class='msg-erro msg-sobreNome'></span>
						</td>
					</tr>
					<tr>
						<td><span class="label">Email</span></td>
					<?php if ($tem_erros && isset($erros_validacao['email'])): ?>
							<td>
								<span class="erro"><?=$erros_validacao['email']?></span>
							</td>
					<?php endif?>
						<td>
							<input class="form-control" type="email" name="email" id="email" >
							<span class='msg-erro msg-email' ></span>
						</td>
					</tr>
					<tr>
						<td><span class="label">Tell</span></td>
					<?php if ($tem_erros && isset($erros_validacao['tell'])): ?>
							<span class="erro text"><?=$erros_validacao['tell']?></span>
					<?php endif?>
						<td>
							<input class="form-control phone" type="text" name="tell" id="tell">				
							<span class='msg-erro msg-tell'></span>
						</td>
                    </tr>
					<tr>
						<td><span class="label">Mensagem</span></td>
						<td>
							<textarea class="form-control" name="mensagem" id="mensagem"></textarea>
							<span class='msg-erro msg-mensagem'></span>
						</td>
					</tr>
					<tr>
						<td colspan="2">
						  <button id="btnButom" class="btn btn-primary btn-block" type="submit"  name="submit">enviar</button>
						</td>
					</tr>
			  </div>	
	    </form>
	</div>
</div>
</div>
<?php include"rodape.php"; ?>
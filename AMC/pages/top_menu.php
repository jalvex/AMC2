<?php
if (! isset($_SESSION['nome'])) // No caso de acesso direto a essa pagina sem fazer login, redireciona para tela de login.
    header("Location: ../index.html?op=err");
$uNome = $_SESSION['nome'];
?>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
				aria-expanded="false">
				<span class="sr-only"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span> <span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">AMC</a>
		</div>

		<!-- lista de elementos do menu  -->
		<!-- <div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<form class="navbar-form navbar-left" action="" enctype="multipart/form-data">
				<div class="form-group">
					<input type="text" class="form-control"
						placeholder="Consultar no xTTs">
				</div>
				<button type="submit" class="btn btn-default">Consultar</button>
			</form>

			<ul class="nav navbar-nav navbar-light">
				<li class="default" data-toggle="modal" data-toggle="tooltip"
				data-placement="top" title="Relatório de Linhas Desbloqueadas"
				data-backdrop="static" data-keyboard="false"
				data-target="#modalrelatorio"><a href="#">Cadastrar</a></li>
				<li class="default"><a href="#">Relatório</a></li>
			</ul> -->
			<form method="post" action="" id="logout" name="logout">
				<ul class="nav navbar-nav navbar-right">
        <?php  echo '<li><a><i spam class="fa fa-user-circle" aria-hidden="true"></i></span> '. $uNome .'</a></li>'; ?>
       <li><a href="logout.php"><i><span class="fa fa-sign-out"
								aria-hidden="true"></span></i> Sair</a></li>

				</ul>
			</form>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>

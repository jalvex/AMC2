<?php
header('Content-Type: text/html; charset=iso-8859-1');
error_reporting(E_ALL); // desabilita a exibição de erros
ini_set('display_errors', 1); // altere o parametro para 1 para exibir os erros

session_start(); // inicio da sessao
if (! isset($_SESSION['nome'])) // No caso de acesso direto a essa pagina sem fazer login, redireciona para tela de login.
    header("Location: ../index.html?op=err");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<noscript>
	<meta http-equiv="Refresh" content="5;   url=../index.html">
</noscript>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../imagens/favicon.ico">
<title>AMC</title>
<!-- Bootstrap core CSS -->
<link href="../api/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<link
	href="../api/bootstrap/assets/css/ie10-viewport-bug-workaround.css"
	rel="stylesheet">

<!-- css para formatação -->
<link href="../api/css/signin.css" rel="stylesheet">
<script src="../api/bootstrap/assets/js/ie-emulation-modes-warning.js"></script>
<link rel="stylesheet"
	href="../api/font-awesome/css/font-awesome.min.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

<style type="text/css">
div#site {
	margin: 15px;
	min-height: 400px;
	position: relative;
	max-width: px;
	width: 150px;
	background: #FAFAFA;
}

html, body {
	height: 60%;
}
</style>


<!-- Define as dimensões do conteiner -->
<style type="text/css">
.container {
	padding-right: 1px;
	padding-left: 1px;
	margin-right: auto;
	margin-left: 1px;
	width: 100%
}
</style>

<!-- adiciona o efeito de sombra ao quadro de funcionalidades -->
<style type="text/css">
.jumbotron {
	posistion: relative;
	z-index: 2;
	box-shadow: 0 8px 16px -6px black;
}
</style>

<!--  define as dimensões dos botões do quadro de funcionalidades -->
<style>
.mesmo-tamanho {
	width: 80%;
	white-space: normal;
	margin-top: 2px;
}
</style>

<!--  estilo da barra de navegação -->
<style type="text/css">
.navbar-default {
	background-color: #2c2c2f;
	border-color: #2c2c2f;
}

.navbar-default .navbar-brand {
	color: #dfd6d6;
}

.navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus
	{
	color: #615f5f;
}

.navbar-default .navbar-text {
	color: #dfd6d6;
}

.navbar-default .navbar-nav>li>a {
	color: #dfd6d6;
}

.navbar-default .navbar-nav>li>a:hover, .navbar-default .navbar-nav>li>a:focus
	{
	color: #615f5f;
}

.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover,
	.navbar-default .navbar-nav>.active>a:focus {
	color: #615f5f;
	background-color: #2c2c2f;
}

.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:hover,
	.navbar-default .navbar-nav>.open>a:focus {
	color: #615f5f;
	background-color: #2c2c2f;
}

.navbar-default .navbar-toggle {
	border-color: #2c2c2f;
}

.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus
	{
	background-color: #2c2c2f;
}

.navbar-default .navbar-toggle .icon-bar {
	background-color: #dfd6d6;
}

.navbar-default .navbar-collapse, .navbar-default .navbar-form {
	border-color: #dfd6d6;
}

.navbar-default .navbar-link {
	color: #dfd6d6;
}

.navbar-default .navbar-link:hover {
	color: #615f5f;
}

@media ( max-width : 767px) {
	.navbar-default .navbar-nav .open .dropdown-menu>li>a {
		color: #dfd6d6;
	}
	.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
		.navbar-default .navbar-nav .open .dropdown-menu>li>a:focus {
		color: #615f5f;
	}
	.navbar-default .navbar-nav .open .dropdown-menu>.active>a,
		.navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover,
		.navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus {
		color: #615f5f;
		background-color: #2c2c2f;
	}
}
</style>
<!-- define a cor de fundo -->
<style type="text/css">
html, body {
	height: 100%;
	background: #f6f6f6 !important;
}
</style>

<!-- INICIO função  envia os dados dos formularios  -->
<script type="text/javascript" src="../api/js/jquery-1.11.3.min.js"></script>

<script type="text/javascript">
	$(function() {

		$('#login').submit(function(event) {
			event.preventDefault();
			var formDados = new FormData($(this)[0]);
			$.ajax({
				url : 'proc/login.php',
				type : 'POST',
				data : formDados,
				cache : false,
				contentType : false,
				processData : false,
				beforeSend : function() { //Aqui adiciona a ação a ser executada antes de exibir o retorno 
					$("#divmsg").html("<br>");
				},
				success : function(data) {
					$('#resultado').html(data);
					$("#divCorpo").html("");
					$("#divmsg").html("" + data + "");
					//alert(data);
				},
				dataType : 'html'
			});
			return false;
		});
	});
</script>

<!-- FIM envia os dados do formulario  -->



</head>
<body>
	<noscript>
		Seu navegador não tem suporte ao JavaScript ou ele está desabilitado!
		<br> Você será redirecionado em 5 segundos...
	</noscript>
<?php include_once 'top_menu.php';?>
	<div id="site" style="width: 98%; height: 85%; position: relative;">
		<div class="container-fluid">
			<div id="header"></div>
<?php
/*
 * Array carrega as paginas de acordo com o valor da variavel link na barra de endereço
 * Ao criar uma nova pagina, incluir um novo indice na sequencia do array
 */
$link = addslashes($_GET['link']);
$pag[1] = 'main.php';

if (array_key_exists($link, $pag)) {
    if (! empty($link)) {
        if (file_exists($pag[$link])) {
            include $pag[$link];
        } else {
            include 'main.php';
        }
    } else {
        include 'main.php';
    }
} else {
    include 'main.php';
}
?>
		</div>
		<!-- /container -->
	</div>
	<!-- div site -->
	<script
		src="../api/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>
	<script src="../api/js/jquery.min.js"></script>
	<script src="../api/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>



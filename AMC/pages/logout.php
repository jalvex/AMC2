<?php
header('Content-Type: text/html; charset=iso-8859-1');
session_start(); // inicio da sessao
if (! isset($_SESSION['nome'])) // No caso de acesso direto a essa pagina sem fazer login, redireciona para tela de login.
    header("Location: ../index.html?op=err");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<noscript>
	<meta http-equiv="Refresh" content="1;   url=pages/erro.html">
</noscript>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="imagens/favicon.ico">
<title>AMC - Logout</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../imagens/favicon.ico">
<script src="../api/js/jquery.min.js"></script>
<link href="../api/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../api/bootstrap/css/bootstrap-theme.min.css"
	rel="stylesheet">
<link
	href="../api/bootstrap/assets/css/ie10-viewport-bug-workaround.css"
	rel="stylesheet">
<link href="../api/css/theme.css" rel="stylesheet">
<script src="../api/bootstrap/assets/js/ie-emulation-modes-warning.js"></script>
<script src="../api/bootstrap/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet"
	href="../api/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../api/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="../api/css/buttons.dataTables.min.css">
<script src="../api/bootstrap/js/bootbox.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/run_prettify.min.js"></script> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" /> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.9/js/bootstrap-dialog.min.js"></script> -->

<style type="text/css">
html, body {
	height: 100%;
	background: #f8f8f8 !important;
}
</style>
<link href="../api/css/signout.css" rel="stylesheet">
</head>
<body>
  <?php
/*
 * //funcao que gera log de acesso
 * function setLOGIN($ACTION) {
 *
 * //date_default_timezone_set('America/Sao_Paulo');
 *
 * $SESSAO = session_id();
 * $USUARIO = strtolower(substr( ($_SESSION['usu']),9));
 * $IP = $_SERVER['REMOTE_ADDR'];
 * $DATA = date("d/m/Y H:i:s");
 *
 * //Variaveis para conexao com banco
 * include("conexao.php");
 *
 * //Abre a conexao com banco
 * if (!$conn){
 * echo "Connection error";
 * exit;
 * }
 *
 * //Passa o insert a ser executado
 * $sql = "INSERT INTO TB_BLOCK_MSISDN_LOG (SESSION_ID,USER_LOGIN,USER_IP,DT_SESSION,ACTION) VALUES ('$SESSAO','$USUARIO','$IP',(to_date('$DATA','dd/mm/yyyy hh24:mi:ss')),'$ACTION')";
 *
 * //Executa o insert
 * $stmt = oci_parse($conn, $sql);
 * if (!$stmt) {
 * echo "Erro ao executar o insert";
 * session_destroy();
 * echo "<script>alert('Erro ao registrar o fim da sessão.');top.location.href='index.php';</script>";
 * exit;
 * }
 * oci_execute($stmt, OCI_DEFAULT); //executa o insert
 * oci_commit($conn); //commit do insert
 * oci_close($conn); //Fecha a conexao com banco
 *
 * }
 * //fim da funcao que gera log de acesso
 */
?>

 <!--  JavaScript necessarios para o funcionamento do BootStrap
 ================================================== -->
	<!-- Adicionados no final da pagina para acelerar o carregamento -->
	<!--<script>window.jQuery || document.write('<script src="bootstrap/assets/js/vendor/jquery.min.js"></script></script> -->
	<script src="../api/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="../api/bootstrap/assets/js/docs.min.js"></script>
	<!-- Necessario para IE10  -->
	<script
		src="../api/bootstrap/assets/js/ie10-viewport-bug-workaround.js"></script>

	<div class="container">
		<form class="form-signin">
			<br> <br> <br> <br> <br> <br> 
		</form>
	</div>

<?php
// session_start();//inicia a ssesao que esta aberta
/*
 * if ($_SESSION['nome'] == '')
 * {
 * header("Location: ../index.html?op=err");
 * }else{
 * setLOGIN('Logout realizado com sucesso');//registra o logout
 */
// Apaga todas as variáveis da sessão
$_SESSION = array();

// Mata a sessão, e apaga os cookies de sessão.
// Nota: Isto destruirá a sessão, e não apenas os dados!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

// destroid a sess�o
session_unset();
session_destroy();

// echo "<script>alert('Desconectado!');top.location.href='../';</script> ";
// }
?>

   <!-- EXIBE A MSG DE SESSÃO FINALIZADA -->
	<script src="../api/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- bootbox code -->
	<!--   <script src="../api/bootbox.min.js"></script> -->
	<script>
     bootbox.alert({
      size: "small",
      title: '<i class="fa fa-exclamation-triangle"></i> Desconectado',
      message: "Sess�o Finalizada!",
      callback: function(){
        var URL = "../";
        $(location.href=URL).attr('href',URL);
      }
    })
  </script>

</body>
</html>

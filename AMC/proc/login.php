<?php
header('Content-type: text/html; charset=iso-8859-1');
include_once '../config/ora_connect.php';
include  '../pages/include/function/antInjection.php';

$usuario = antInjection(trim(strtoupper($_POST['usu'])));
$statement = $pdo->query("select user_login,  user_name, count(user_login) as contador from tb_amc_user where user_login = '$usuario' group by user_login,  user_name");
$funcionario = $statement->fetch();
// var_dump($_POST);

$UserLogin = $funcionario['user_login'];
$UserName = $funcionario['user_name'];
$CountLogin = $funcionario['contador'];

if ($CountLogin == 0) {

    echo "<b><p class=" . "text-danger" . ">Dados invalidos!</p></b>";
} else {

    //  INICIO -- Conexão com o servidor de autenticação
    function valida_ldap($srv, $usr, $pwd)
    {
        $ldap_server = $srv;
        $auth_user = $usr;
        $auth_pass = $pwd;

        // Tenta se conectar com o servidor
        if (! ($conn = @ldap_connect($ldap_server))) {
            return FALSE;
        }

        //Faz a autenticação do servidor
        if (! ($bind = @ldap_bind($conn, $auth_user, $auth_pass))) {
            // se nao validar retorna false
            return FALSE;
        } else {
            // se validar retorna true
            return TRUE;
        }
    } // INICIO -- Conexão com o servidor de autenticação

    $dominio = "internal\\";
    $usuFiltrado = $_REQUEST['usu'];
    $usu = $dominio . filter_var($usuFiltrado, FILTER_SANITIZE_STRING);
    ;
    $senhaFiltrado = $_REQUEST['senha'];
    $senha = filter_var($senhaFiltrado, FILTER_SANITIZE_STRING);
    $ip_server = "10.168.40.36";

    if (valida_ldap($ip_server, $usu, $senha)) {
        // echo "usuario autenticado<br>";
        unset($_COOKIE); // limpa as variaveis de sessao
        /* Define o limitador de cache para 'private' */
        session_cache_limiter('private');
        session_cache_expire(30); // Define o limite de tempo do cache em 30 minutos
        session_start(); // Inicia a sessao
        session_regenerate_id(true); // gera um novo id de sessão
	$_SESSION["sessiontime"] = time(); // define o tempo de duracao da sessao)
        $_SESSION['nome'] = $UserName; // passa para a sessao o nome usuario
        $_SESSION['login'] = $UserLogin; // passa para a sessao o login usuario
        echo "<b><p class=" . "text-success" . ">Login realizado com sucesso!</p></b><script>top.location.href='pages/home.php?link=1';</script>"; // Direciona usuario para a pagina inicial
    } else {

        echo "<b><p class=" . "text-danger" . ">Dados invalidos!</p></b>";;
    }
}
?>
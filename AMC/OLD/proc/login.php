<?php
header('Content-type: text/html; charset=iso-8859-1');
$usuario = trim(strtoupper($_POST['usu']));
include_once '../config/ora_connect.php';
$statement = $pdo->query("select count(user_login)as user_login from tb_amc_user where user_login = '$usuario'");
$funcionario = $statement->fetch();
//var_dump($statement);


$UserLogin =  $funcionario['user_login'];

if ($UserLogin == 1){


  $usuario = $_POST['usu'];
  $senha = $_POST['senha'];
 
  //Endereco do servido AD IP ou nome
  $servidor_AD = "10.112.32.22";
       
  //Dominio
  $dominio = "internal.timbrasil.com.br";
 
  // Conexão com servidor AD. 
  $ad = ldap_connect($servidor_AD)
      or die("<span class="."uk-text-danger"."><b>Não foi possivel validar o acesso!</b></span>");
 
  // Versao do protocolo       
  ldap_set_option($ad, LDAP_OPT_PROTOCOL_VERSION, 3);
  // Usar as referencias do servidor AD, neste caso nao
  ldap_set_option($ad, LDAP_OPT_REFERRALS, 0);
       
  // Bind to the directory server.
  $bd = ldap_bind($ad, $usuario."@".$dominio, $senha )
      or die("<span class="."uk-text-danger"."><b>Dados Invalidos</b></span>");    
  if( $bd ){
    echo "<span class="."uk-text-success"."><b>Dados Validados com Sucesso!</b></span>";
  }else{
   // echo "Nao Conectado no servidor";
echo "<span class="."uk-text-danger"."><b>Dados Invalidos!</b></span>";
  }
   //Fecha conexao
  ldap_unbind($ad);
}else{
    echo "<span class="."uk-text-danger"."><b>Invalidos!</b></span>";
}
?>


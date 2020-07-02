<?php 
/*********************************************
Fun��o de valida��o no AD via protocolo LDAP
como usar:
valida_ldap("servidor", "dom�niousu�rio", "senha");
 
*********************************************/
 
function valida_ldap($srv, $usr, $pwd){
$ldap_server = $srv;
$auth_user = $usr;
$auth_pass = $pwd;
 
// Tenta se conectar com o servidor
if (!($connect = @ldap_connect($ldap_server))) {
return FALSE;
}
 
// Tenta autenticar no servidor
if (!($bind = @ldap_bind($connect, $auth_user, $auth_pass))) {
// se n�o validar retorna false
return FALSE;
} else {
// se validar retorna true
return TRUE;
}
 
}
 
// EXEMPLO do uso dessa fun��o
$server = "10.168.32.36"; //IP ou nome do servidor
$dominio = "@internal.timbrasil.com.br"; //Dominio Ex: @gmail.com
$user = "f8039846".$dominio;
$pass = "Vaiprala9@!";
 
if (valida_ldap($server, $user, $pass)) {
echo "usu�rio autenticado<br>";
} else {
echo "usu�rio ou senha inv�lida";
}
 




?>
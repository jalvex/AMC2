<?php 
/*********************************************
Funзгo de validaзгo no AD via protocolo LDAP
como usar:
valida_ldap("servidor", "domнniousuбrio", "senha");
 
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
// se nгo validar retorna false
return FALSE;
} else {
// se validar retorna true
return TRUE;
}
 
}
 
// EXEMPLO do uso dessa funзгo
$server = "10.168.32.36"; //IP ou nome do servidor
$dominio = "@internal.timbrasil.com.br"; //Dominio Ex: @gmail.com
$user = "f8039846".$dominio;
$pass = "Vaiprala9@!";
 
if (valida_ldap($server, $user, $pass)) {
echo "usuбrio autenticado<br>";
} else {
echo "usuбrio ou senha invбlida";
}
 




?>
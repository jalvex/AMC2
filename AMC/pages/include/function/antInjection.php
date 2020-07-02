<?php
function antInjection($sql)
{
//remove comandos sql
$sql = str_ireplace("update","",$sql);
$sql = str_ireplace("from","",$sql);
$sql = str_ireplace("select","",$sql);
$sql = str_ireplace("insert","",$sql);
$sql = str_ireplace("delete","",$sql);
$sql = str_ireplace("where","",$sql);
$sql = str_ireplace("or","",$sql);
$sql = str_ireplace("drop","",$sql);
$sql = str_ireplace("show","",$sql);
$sql = str_ireplace("table","",$sql);
$sql = str_ireplace("tables","",$sql);
$sql = str_ireplace('"',"'",$sql);
$sql = str_ireplace("--","",$sql);
$sql = str_ireplace("=","",$sql);
$sql = str_ireplace("==","",$sql);
$sql = htmlentities($sql, ENT_QUOTES);
$sql = trim($sql);//limpa espaços vazio
$sql = strip_tags($sql);//tira tags html e php
$sql = addslashes($sql);//Adiciona barras invertidas a uma string caso contenha caractere especial
$sql = stripslashes($sql);//remove barras invertidas

return $sql;
}

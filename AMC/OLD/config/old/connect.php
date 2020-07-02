<?php
// variaveis para a conexão com banco de dados
$host = "localhost";
$dbname = "changep1";
$username = "root";
$password = "";
 
// Passa os dados e tenta realizar a conexão
try{
    $con = new PDO("mysql:host={$host};dbname={$dbname}", $username,$password);
}
  
// No caso de erro ao realizar a conexao, exibe uma mensagem de erro
catch(PDOException $exception){
    echo "Erro de conexão: " . $exception->getMessage();
}
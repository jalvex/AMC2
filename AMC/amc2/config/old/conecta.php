<?php
include_once 'ora_connect.php';
$statement = $pdo->query("select user_login from tb_amc_user");
$funcionario = $statement->fetch();
echo $funcionario['user_login'];
echo "<br />";
echo $funcionario['user_login'];
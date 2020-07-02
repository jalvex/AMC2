<?php
$servidor = "localhost";
$banco = "changep1";
$usuarioDB = "root";
$senhaDB = "";
$porta = 3306;
$dsn = "mysql:hots=$servidor;port=$porta;dbname=$banco;charset=utf8";

$opcoes = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES => false
];

$pdo = new PDO($dsn, $usuarioDB, $senhaDB, $opcoes);


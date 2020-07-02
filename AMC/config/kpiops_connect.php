<?php
$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_EMULATE_PREPARES => false,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_CASE => PDO::CASE_LOWER
];
$servidor = "snelnx855";
$usuarioDB = "SXTTS01";
$senhaDB = "Timsmo!2019";
$service_name = "KPIOPSP2";
$sid = "KPIOPSP2";
$port = 1521;
$dbtns = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $servidor)(PORT = $port)) (CONNECT_DATA =
(SERVICE_NAME = $service_name) (SID = $sid)))";
$pdo = new PDO("oci:dbname=" . $dbtns . ";charset=utf8", $usuarioDB, $senhaDB, $options);

$statement = $pdo->query("SELECT * from TBR_HISTORICO_XTTS where id_ticket = 'RC20002099'");
$funcionario = $statement->fetch();

echo "Change: ".$funcionario['id_ticket'];
echo "<br>";
echo "Solicitante: ".$funcionario['nome_submitter'];





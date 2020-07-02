<?php
$options = [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_EMULATE_PREPARES => false,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_CASE => PDO::CASE_LOWER
];
$servidor = "snelnx855";
$usuarioDB = "xtts_select";
$senhaDB = "xtts_select_pwd@";
$service_name = "XTTSP11";
$sid = "XTTSP11";
$port = 1525;
$dbtns = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = $servidor)(PORT = $port)) (CONNECT_DATA =
(SERVICE_NAME = $service_name) (SID = $sid)))";
$pdo = new PDO("oci:dbname=" . $dbtns . ";charset=utf8", $usuarioDB, $senhaDB, $options);

$statement = $pdo->query("SELECT * from tbr_cm_change_management where id_year='RC19002270'");
$funcionario = $statement->fetch();

echo "Change: ".$funcionario['id_year'];





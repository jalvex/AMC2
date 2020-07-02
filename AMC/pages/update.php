<?php
header('Content-Type: text/html; charset=iso-8859-1');
$nmrc = utf8_encode(trim($_POST['nmrc']));
$prjCritico = utf8_encode($_POST['prj_change']);
$insp_monitoracao = utf8_encode($_POST['insp_monitoracao']);
$monitoraveis = utf8_encode($_POST['monitoraveis']);
$ha_sr = utf8_encode($_POST['ha_sr']);
$nmsr = utf8_encode(trim($_POST['nmsr']));
$motivo = utf8_encode($_POST['motivo']);
$ferramenta = utf8_encode($_POST['ferramenta']);
$obs1 = utf8_encode($_POST['obs1']);
$obs2 = utf8_encode($_POST['obs2']);
$mes_abertura = utf8_encode($_POST['mes_abertura']);
$tks_monitoring = utf8_encode($_POST['tks_monitoring']);
$escopo = utf8_encode($_POST['escopo']);

if($ha_sr == 0 && $nmsr == "")
{
	echo "<br /><div class='alert alert-warning'> <button type='button' class='close' data-dismiss='alert'><font color='black'><b>x</b></font></button><strong>Informe o n�mero da Service Request!</strong></div>";
	exit();
}

/*******************************************/
/* troca o c�digo da op��o por sim ou n�o */
/*****************************************/
switch ($prjCritico) {
	case "0":
	$prjCritico = "sim";
	break;
	case "1":
	$prjCritico = "n�o";
	break;
	default:
	$prjCritico = "";
}
switch ($insp_monitoracao) {
	case "0":
	$insp_monitoracao = "sim";
	break;
	case "1":
	$insp_monitoracao = "n�o";
	break;
	default:
	$insp_monitoracao = "";
}
switch ($monitoraveis) {
	case "0":
	$monitoraveis = "sim";
	break;
	case "1":
$monitoraveis = "n�o";
	break;
	default:
	$monitoraveis = "";
}
switch ($ha_sr) {
	case "0":
	$ha_sr = "sim";
	break;
	case "1":
	$ha_sr = "n�o";
	break;
	case "2":
	$ha_sr = "n�o imformado";
	break;
	case "3":
	$ha_sr = "n�o se aplica";
	break;
	default:
	$ha_sr = "";
}
switch ($motivo) {
	case "0":
	$motivo = "As monitora��es existentes j� contemplam a entrega em quest�o";
	break;
	case "1":
	$motivo = "N�o h� nenhuma altera��o de servi�o ou infraestrutura";
	break;
	case "2":
	$motivo = "n�o imformado";
	break;
	case "3":
	$motivo = "Em Branco";
	break;
	default:
	$motivo = "";
}
switch ($obs1) {
	case "0":
	$obs1 = "N�o h� o quadro de monitora��o";
	break;
	case "1":
	$obs1 = "N�o preencheu o campo Justificativa";
	break;
	case "2":
	$obs1 = "N�o preencheu o campo Monitor�veis (S/N)";
	break;
	case "3":
	$obs1 = "N�o preencheu o campo Motivo";
	break;
		case "4":
	$obs1 = "N�o preencheu os campos Motivo e Justificativa";
	break;
		case "5":
	$obs1 = "N�o preencheu os campos Monitora��o, Motivo e Justificativa";
	break;
		case "6":
	$obs1 = "Sem erros";
	break;
	default:
	$obs1 = "";
}
switch ($obs2) {
	case "0":
	$obs2 = "N�o cobrou a vers�o correta do formul�rio";
	break;
	case "1":
	$obs2 = "N�o cobrou o preenchimento do campo Justificativa";
	break;
	case "2":
	$obs2 = "N�o cobrou o preenchimento do campo motivo";
	break;
	case "3":
	$obs2 = "N�o preencheu o campo Motivo";
	break;
		case "4":
	$obs2 = "N�o cobrou o preenchimento dos campos Monitora��o,Motivo e Justificativa";
	break;
		case "5":
	$obs2 = "N�o cobrou o preenchimento dos campos Motivo e Justificativa";
	break;
		case "6":
	$obs2 = "Sem erros";
	break;
	default:
	$obs2 = "";
}
switch ($tks_monitoring) {
	case "0":
	$tks_monitoring= "sim";
	break;
	case "1":
	$tks_monitoring= "n�o";
	break;
	default:
	$tks_monitoring= "";
}
switch ($escopo) {
	case "0":
	$escopo = "sim";
	break;
	case "1":
	$escopo = "n�o";
	break;
	default:
	$escopo = "";
}

include_once '../config/ora_connect.php';
include  '../pages/include/function/antInjection.php';

$vlrc = antInjection(trim(strtoupper($nmrc)));
$statement = $pdo->query("select change from tb_amc_import_change where change ='$vlrc'");
$NmChange = $statement->fetch();

if($nmrc != $NmChange['change'])
{
	echo "<br /><div class='alert alert-warning'> <button type='button' class='close' data-dismiss='alert'><font color='black'><b>x</b></font></button><strong>N�o localizado!</strong></div>";
	exit();
}else{

	try {
		$pdo = new PDO("oci:dbname=" . $dbtns . ";charset=utf8", $usuarioDB, $senhaDB, $options);
	} catch (Exception $e) {
		die("Falha ao conectar com o banco de dados: " . $e->getMessage());
	}

	try {
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->beginTransaction();
		$pdo->exec("update tb_amc_import_change set PRJ_CHANGE_CRITICA = '".utf8_encode($prjCritico)."',INDISP_MONITORACAO = '".utf8_encode($insp_monitoracao)."', MONITORAVEIS = '".utf8_encode($monitoraveis)."', EXISTE_SR = '".utf8_encode($ha_sr)."', SERVICE_REQUEST = '".utf8_encode($nmsr)."', MOTIVO = '".utf8_encode($motivo)."', FERRAMENTA_MONITORACAO = '".utf8_encode($ferramenta)."', OBS1 = '".utf8_encode($obs1)."', OBS2 = '".utf8_encode($obs2)."', MES_ABERTURA = (select to_char(DATA_CRIACAO, 'mm') from tb_amc_import_change where change = '".utf8_encode($nmrc)."'), TASK_MONITORING = '".utf8_encode($tks_monitoring)."', ESCOPO_GARANTIA_MONITORACAO = '".utf8_encode($escopo)."'  where  CHANGE = '".utf8_encode($nmrc)."'");
		$pdo->commit();
		echo "<br /><div class='alert alert-success'> <button type='button' class='close' data-dismiss='alert'><font color='black'><b>x</b></font></button><strong>Dados inseridos com sucesso!</strong></div>";

	} catch (Exception $e) {
		$pdo->rollBack();
		echo "Falha: " . $e->getMessage();
	}
}
?>
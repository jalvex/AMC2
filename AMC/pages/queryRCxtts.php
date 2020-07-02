<?php
header('Content-Type: text/html; charset=iso-8859-1');
include 'include/function/antInjection.php';
$numChangeXtts = antInjection($_POST['changeXtts']);
$output = '';
include '../config/xttsp11_connect.php';

/*
                   $statement = $pdo->query("SELECT RCS.C536871151  Change, to_char(secs_to_date (RCS.C3), 'dd/mm/yyyy hh24:mi:ss') DTCRIACAO, RCS.c800005404 Status,
            RCS.C536871250  Tipo,RCS.C536870922  Servico,RCS.C536870921  SubServico,to_char(secs_to_date(RCS.c536870942), 'dd/mm/yyyy hh24:mi:ss') DTINICIO,
            to_char(secs_to_date(RCS.c536870943), 'dd/mm/yyyy hh24:mi:ss') DTFIM FROM T538 RCS where C536871151 ='".$numChangeXtts."'");
*/



$statement = $pdo->query("SELECT RCS.C536871151 Change,RCS.C536871243 Indis,RCS.c800005404 Status,
            lower(RCS.C536871250)  Tipo, to_char(secs_to_date (RCS.C3), 'dd/mm/yyyy hh24:mi:ss') DTCRIACAO, to_char(secs_to_date(RCS.c536870942), 'dd/mm/yyyy hh24:mi:ss') DTINICIO,
            to_char(secs_to_date(RCS.c536870943), 'dd/mm/yyyy hh24:mi:ss') DTFIM, lower(RCS.C536870922)  Servico, lower(RCS.C536870921)  SubServico,lower(RCS.c536870924) funcao,
            lower(RCS.c536871230) Origem, lower(RCS.c536871255) Acompanhamento, RCS.c536871246 DM, RCS.c536871247 SDNTIR, RCS.C536871117  Descricao,
            lower(RCS.c536870926) NOMESOLICITANTE, (SELECT lower(MAX(HIS.NOME_SUBMITTER)) FROM TBR_HISTORY_TABLE HIS WHERE HIS.ID_YEAR = RCS.C536871151 AND OPERATION_CODE = 'OP-SOLIC ANALISE CHANGE') SOLICITANTEANALISEMUD, lower(RCS.c536871173) AREASOLICITANTE
            FROM T538 RCS where C536871151 ='".$numChangeXtts."'");

                        $changes = $statement->fetchAll(PDO::FETCH_ASSOC);
if ($changes) {

$output .='
    <table class="w3-table-all w3-hoverable">
    <table id="tabRC" class="display table-striped table-bordered table-hover table-condensed table-responsive table-compact table-nowrap" style="width: 100%">

        <thead>
            <tr>
            <th><b>CHANGE</b></th>
	    <th><b>INDISPONIBILIDADE</b></th>
            <th><b>STATUS</b></th>
	    </tr>
	</thead>
		<tbody>

';

                        foreach ($changes as $change) {
if ($change['indis'] == "1") { $indis = "Não";} else { $indis = "Sim";};
if ($change['acompanhamento'] == "1") { $acompanhamento = "Não";} else { $acompanhamento = "Sim";};


    $output .= '
    <tr>
        <td>'.$change['change'].'</td>
        <td>'.$indis.'</td>
        <td>'.$change['status'].'</td>
	</tr><tr>
	<thead>
	<th><b>TIPO</b></th>
        <th><b>DATA CRIAÇÃO</b></th>
        <th><b>DATA INICIO</b></th>
	</thead>
	<td>'.utf8_decode($change['tipo']).'</td>
	<td>'.$change['dtcriacao'].'</td>
	<td>'.$change['dtinicio'].'</td>
    	</tr>
	</tr><tr>
	<thead>
	<th><b>DATA FIM</b></th>
        <th><b>SERVIÇO</b></th>
        <th><b>SUBSERVICO</b></th>
	</thead>
	<td>'.$change['dtfim'].'</td>
	<td>'.utf8_decode($change['servico']).'</td>
	<td>'.utf8_decode($change['subservico']).'</td>
	</tr><tr>
	<thead>
	<th><b>FUNÇÃO</b></th>
        <th><b>ORIGEM</b></th>
        <th><b>ACOMPANHAMENTO</b></th>
	</thead>
	<td>'.utf8_decode($change['funcao']).'</td>
	<td>'.utf8_decode($change['origem']).'</td>
	<td>'.$acompanhamento.'</td>
	</tr><tr>
	<thead>
	<th><b>DM</b></th>
        <th><b>SDN / TIR</b></th>
        <th><b>DESCRIÇÃO</b></th>
	</thead>
	<td>'.utf8_decode($change['dm']).'</td>
	<td>'.utf8_decode($change['sdntir']).'</td>
	<td>'.utf8_decode($change['descricao']).'</td>
	</tr><tr>
	<thead>
	<th><b>NOME SOLICITANTE</b></th>
        <th><b>SOLICITANTE ANÁLISE</b></th>
        <th><b>ÁREA SOLICITANTE</b></th>
	</thead>
	<td>'.ucfirst(utf8_decode($change['nomesolicitante'])).'</td>
	<td>'.ucfirst(utf8_decode($change['solicitanteanalisemud'])).'</td>
	<td>'.utf8_decode($change['areasolicitante']).'</td>
   </tr>
    ';
}
$output .= '</tbody> </table>';

echo $output;

}
else {
	echo "<div class='alert alert-warning'> <button type='button' class='close' data-dismiss='alert'><font color='black'><b>x</b></font></button><strong>Não localizado!</strong></div>";
}


?>



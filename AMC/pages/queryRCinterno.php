<?php
header('Content-Type: text/html; charset=iso-8859-1');
include 'include/function/antInjection.php';
$numChangeInteno = antInjection($_POST['interno']);
$output = '';
include '../config/ora_connect.php';

/*
                   $statement = $pdo->query("SELECT RCS.C536871151  Change, to_char(secs_to_date (RCS.C3), 'dd/mm/yyyy hh24:mi:ss') DTCRIACAO, RCS.c800005404 Status,
            RCS.C536871250  Tipo,RCS.C536870922  Servico,RCS.C536870921  SubServico,to_char(secs_to_date(RCS.c536870942), 'dd/mm/yyyy hh24:mi:ss') DTINICIO,
            to_char(secs_to_date(RCS.c536870943), 'dd/mm/yyyy hh24:mi:ss') DTFIM FROM T538 RCS where C536871151 ='".$numChangeInteno."'");
*/



            $statement = $pdo->query("SELECT change Change,indisponibilidade Indis,status Status,
              lower(tipo)  Tipo, to_char(data_criacao, 'dd/mm/yyyy hh24:mi:ss') DTCRIACAO, to_char(data_inicio, 'dd/mm/yyyy hh24:mi:ss') DTINICIO,
              to_char(data_fim, 'dd/mm/yyyy hh24:mi:ss') DTFIM, lower(servico)  Servico, lower(subservico)  SubServico,lower(funcao) funcao,
              lower(origem) Origem, lower(acompanhamento) Acompanhamento, demanda DM, sdntir SDNTIR,descricao  Descricao,
              lower(solicitante) NOMESOLICITANTE, solicitante_analise SOLICITANTEANALISEMUD, lower(area_solicitante) AREASOLICITANTE,
              prj_change_critica prjchange,
              indisp_monitoracao indismoni,
              monitoraveis, existe_sr, service_request sr, motivo, ferramenta_monitoracao ferramenta, obs1, obs2, mes_abertura, task_monitoring
              FROM tb_amc_import_change  where  change ='".$numChangeInteno."'");

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
                <thead>
                <th><b>CHANGE CRITICA/NOVO PROJ</b></th>
                <th><b>INDISP DA MONITORAÇÃO</b></th>
                <th><b>MONITORAVEIS</b></th>
                </thead>
                <td>'.ucfirst(utf8_decode($change['prjchange'])).'</td>
                <td>'.ucfirst(utf8_decode($change['indismoni'])).'</td>
                <td>'.utf8_decode($change['monitoraveis']).'</td>
                <thead>
                <th><b>HÁ SR</b></th>
                <th><b>NUM SR</b></th>
                <th><b>MOTIVO</b></th>
                </thead>
                <td>'.ucfirst(utf8_decode($change['existe_sr'])).'</td>
                <td>'.ucfirst(utf8_decode($change['sr'])).'</td>
                <td>'.utf8_decode($change['motivo']).'</td>
                <thead>
                <th><b>FERRAMENTA</b></th>
                <th><b>OBS1</b></th>
                <th><b>OBS2</b></th>
                </thead>
                <td>'.ucfirst(utf8_decode($change['ferramenta'])).'</td>
                <td>'.ucfirst(utf8_decode($change['obs1'])).'</td>
                <td>'.ucfirst(utf8_decode($change['obs2'])).'</td>
                <thead>
		<th><b>MÊS DE ABERTURA</b></th>
                <th><b>TK MONITORING</b></th>
		<th><b>ESCOPO DE GARANTIA DA MONITORACÃO</b></th>
                </thead>
                <td>'.ucfirst(utf8_decode($change['mes_abertura'])).'</td>
                <td>'.ucfirst(utf8_decode($change['task_monitoring'])).'</td>
                <td>'.ucfirst(utf8_decode($change['escopo'])).'</td>
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



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Lista</title>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="../api/css/style.css" media="screen"/>

<script src="../api/datatables/js/jquery.min.js"></script>
<script src="../api/datatables/js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" href="../api/datatables/css/jquery.dataTables.min.css">
<script src="../api/datatables/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="../api/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../api/datatables/css/dataTables.bootstrap.min.css">
<script src="../api/datatables/js/dataTables.responsive.min.js"></script>
<script src="../api/datatables/js/responsive.bootstrap.min.js"></script>

<!-- INICIO - ativa os boto?s para exportar os dados da tabela  -->
<script src="../api/datatables/js/dataTables.buttons.min.js"></script>
<script src="../api/datatables/js/jszip.min.js"></script>
<script src="../api/datatables/js/pdfmake.min.js"></script>
<script src="../api/datatables/js/vfs_fonts.js"></script>
<script src="../api/datatables/js/buttons.html5.min.js"></script>
<script src="../api/datatables/js/buttons.print.min.js"></script>

<!-- ajusta o tamanho da fonte da tabela  -->
  <style type="text/css"> 
   th { font-size: 13px; }
   td { font-size: 12px; }
 </style>

</head>
<body>
<div id="loader"></div>

<table id="lista" class="display nowrap table-striped table-bordered table-hover table-condensed table-responsive table-compact" style="width: 100%" >
       <?PHP
    include '../config/ora_connect.php';

    echo "<thead>";
    echo "<tr>";
    echo '<th>CHANGE</th>';
    echo '<th>INDISP</th>';
    echo '<th>STATUS</th>';
    echo '<th>TIPO</th>';
    echo '<th>DT.CRIAÇÃO</th>';
    echo '<th>DT.INICIO</th>';
    echo '<th>DT.FIM</th>';
    echo '<th>SERVIÇO</th>';
    echo '<th>SUBSERVIÇO</th>';
    echo '<th>FUNÇÃO</th>';
    echo '<th>ORIGEM</th>';
    echo '<th>ACOMP</th>';
    echo '<th>DM</th>';
    echo '<th>SDNTIR</th>';
    echo '<th>DESCRIÇÃO</th>';
    echo '<th>NOME SOLICITANTE</th>';
    echo '<th>SOLICITANTE ANÁLISE</th>';
    echo '<th>ÁREA SOLICITANTE</th>';
    echo '<th>CH CRITICA/PROJ</th>';
    echo '<th>INDSP DA MONITORACAO</th>';
    echo '<th>MONITORAVEIS</th>';
    echo '<th>HÁ SR</th>';
    echo '<th>NUM SR</th>';
    echo '<th>MOTIVO</th>';
    echo '<th>FERRAMENTA</th>';
    echo '<th>OBS1</th>';
    echo '<th>OBS2</th>';
    echo '<th>MES ABERTURA</th>';
    echo '<th>TK MONITORING</th>';
    echo '<th>ESCOPO G. MONITORACAO</th>';
    echo "</tr>";
    echo "</thead>";
    ?>
                       <tbody>
                         <?php

                        // Passa a query a ser executada
                        $statement = $pdo->query("SELECT change Change,indisponibilidade Indis,status Status,
            lower(tipo)  Tipo, to_char(data_criacao, 'dd/mm/yyyy hh24:mi:ss') DTCRIACAO, to_char(data_inicio, 'dd/mm/yyyy hh24:mi:ss') DTINICIO,
            to_char(data_fim, 'dd/mm/yyyy hh24:mi:ss') DTFIM, lower(servico)  Servico, lower(subservico)  SubServico,lower(funcao) funcao,
            lower(origem) Origem, lower(acompanhamento) Acompanhamento, demanda DM, sdntir SDNTIR,descricao  Descricao,
            lower(solicitante) NOMESOLICITANTE, solicitante_analise SOLICITANTEANALISEMUD, lower(area_solicitante) AREASOLICITANTE,
             prj_change_critica prjchange,
            indisp_monitoracao indismoni,
            monitoraveis, existe_sr, service_request sr, motivo, ferramenta_monitoracao ferramenta, obs1, obs2, mes_abertura, task_monitoring, escopo_garantia_monitoracao escopo
            FROM tb_amc_import_change  where trunc(data_criacao) >= trunc(sysdate)-'30' order by trunc(data_criacao)");
                        $changes = $statement->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($changes as $change) {
                            echo '<tr> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo $change['change'];
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            if ($change['indis'] == "1") { echo "Não";} else { echo "Sim";};
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo utf8_decode($change['status']);
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo utf8_decode($change['tipo']);;
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ($change['dtcriacao']);
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo $change['dtinicio'];
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo $change['dtfim'];
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo utf8_decode($change['servico']);
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo utf8_decode($change['subservico']);
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo utf8_decode($change['funcao']);
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo utf8_decode($change['origem']);
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            if ($change['acompanhamento'] == "1") { echo "Não";} else { echo "Sim";};
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo utf8_decode($change['dm']);
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo utf8_decode($change['sdntir']);
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo utf8_decode($change['descricao']);
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['nomesolicitante']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['solicitanteanalisemud']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['areasolicitante']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['prjchange']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['indismoni']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['monitoraveis']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['existe_sr']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['sr']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['motivo']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['ferramenta']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['obs1']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['obs2']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['mes_abertura']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['task_monitoring']));
                            echo '</td> <td class="col-xs-2 col-sm-2 col-md-2 col-lg-2">';
                            echo ucfirst(utf8_decode($change['escopo']));
                            echo '</td> </tr>';
                        }

                        ?>
                      </tbody>
    </table>
    <!-- carrega o loading -->
        <script type="text/javascript">
        // Este evendo é acionado após o carregamento da página
        jQuery(window).load(function() {
            //Após a leitura da pagina o evento fadeOut do loader é acionado.
            jQuery("#loader").delay(0).fadeOut("slow");
        });
    </script>

<!-- propriedades dos botões e  definição de quais colunas que serão exportadas para excel -->
    <script type="text/javascript">
    $('#lista').DataTable( {
        dom: "<'row'<'form-inline' <'col-sm-6'B>> <'col-sm-6'f>>"+"<rt>" +"<'row'<'form-inline'" +" <'col-sm-6 col-md-6 col-lg-6'l>" +"<'col-sm-6 col-md-6 col-lg-6'p>>>",// 'Bfrtip',
        buttons: [

               {
                   extend:    'excelHtml5',
                   exportOptions: {
                      columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17 ]
                  },
                text:      '<i class="fa fa-file-excel-o fa-2x"></i>',
                titleAttr: 'Excel'
          }
        ],
        "language": {"url": "../api/datatables/media/language/pt-br.lang"},
        "sPaginationType": "simple_numbers",
        "scrollY": 420,
        "scrollX": true
    } );
   </script>
</body>
</html>


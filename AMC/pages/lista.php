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
    include '../config/xttsp11_connect.php';

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
    echo "</tr>";
    echo "</thead>";
    ?>
                       <tbody>
                         <?php

                        // Passa a query a ser executada
                        $statement = $pdo->query("SELECT RCS.C536871151 Change,RCS.C536871243 Indis,RCS.c800005404 Status,
            lower(RCS.C536871250)  Tipo, to_char(secs_to_date (RCS.C3), 'dd/mm/yyyy hh24:mi:ss') DTCRIACAO, to_char(secs_to_date(RCS.c536870942), 'dd/mm/yyyy hh24:mi:ss') DTINICIO,
            to_char(secs_to_date(RCS.c536870943), 'dd/mm/yyyy hh24:mi:ss') DTFIM, lower(RCS.C536870922)  Servico, lower(RCS.C536870921)  SubServico,lower(RCS.c536870924) funcao,
            lower(RCS.c536871230) Origem, lower(RCS.c536871255) Acompanhamento, RCS.c536871246 DM, RCS.c536871247 SDNTIR, RCS.C536871117  Descricao,
            lower(RCS.c536870926) NOMESOLICITANTE, (SELECT lower(MAX(HIS.NOME_SUBMITTER)) FROM TBR_HISTORY_TABLE HIS WHERE HIS.ID_YEAR = RCS.C536871151 AND OPERATION_CODE = 'OP-SOLIC ANALISE CHANGE') SOLICITANTEANALISEMUD, lower(RCS.c536871173) AREASOLICITANTE
            FROM T538 RCS where trunc(secs_to_date (RCS.C3)) >= trunc(sysdate)-'30' order by trunc(secs_to_date (RCS.C3))");
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

<?php
header('Content-Type: text/html; charset=iso-8859-1');
include 'include/function/antInjection.php';
$numChange = antInjection($_POST['change']);
$output = '';
include '../config/ora_connect.php';

$statement = $pdo->query("SELECT change Change,indisponibilidade Indis,status Status,
  lower(tipo)  Tipo, to_char(data_criacao, 'dd/mm/yyyy hh24:mi:ss') DTCRIACAO, to_char(data_inicio, 'dd/mm/yyyy hh24:mi:ss') DTINICIO,
  to_char(data_fim, 'dd/mm/yyyy hh24:mi:ss') DTFIM, lower(servico)  Servico, lower(subservico)  SubServico,lower(funcao) funcao,
  lower(origem) Origem, lower(acompanhamento) Acompanhamento, demanda DM, sdntir SDNTIR,descricao  Descricao,
  lower(solicitante) NOMESOLICITANTE, solicitante_analise SOLICITANTEANALISE, lower(area_solicitante) AREASOLICITANTE,prj_change_critica prjchange, indisp_monitoracao indismoni,
  monitoraveis, existe_sr, service_request sr, motivo, ferramenta_monitoracao ferramenta, obs1, obs2, mes_abertura, task_monitoring
  FROM tb_amc_import_change where change ='".$numChange."'");

$changes = $statement->fetchAll(PDO::FETCH_ASSOC);
if ($changes) {

 foreach ($changes as $change) {
  if ($change['indis'] == "1") { $indis = "Não";} else { $indis = "Sim";};
  if ($change['acompanhamento'] == "1") { $acompanhamento = "Não";} else { $acompanhamento = "Sim";};


  $output .= '
  <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
  <div class="bootstrap-iso">
  <div class="container-fluid">
  <div class="row">

  <div class="col-sm-12">
  <form class="form-horizontal" name="atualizaChange" id="atualizaChange" method="POST" action="" enctype="multipart/form-data" >
  <div class="form-group "> <!-- INICIO GRUPO -->
  <div class="col-sm-4">
  <label  for="CHange">Change</label>
  <input type="text" class="form-control"  name="change" size="20" maxlength="13" id="change" value="'.$change['change'].'" readonly>
  </div>

  <div class="col-sm-4">
  <label  for="indisponibilidade">Indisponibilidade</label>
  <input type="text" class="form-control"  size="20" maxlength="11" name="indisponibilidade" id="indisponibilidade" value="'.$indis.'" readonly>
  </div>

  <div class="col-sm-4">
  <label  for="status">Status</label>
  <input type="text" class="form-control"  size="20" maxlength="11" name="status" id="status" value="'.$change['status'].'" readonly>
  </div>
  </div> <!-- FIM GRUPO -->

  <div class="form-group "> <!-- INICIO GRUPO -->
  <div class="col-sm-4">
  <label  for="tipo">Tipo</label>
  <input type="text" class="form-control"  name="tipo" size="20" maxlength="13" id="tipo" value="'.$change['tipo'].'" readonly>
  </div>

  <div class="col-sm-4">
  <label  for="data_criacao">Data Criação</label>
  <input class="form-control"  size="20" maxlength="11" name="data_criacao" id="data_criacao" type="text" value="'.$change['dtcriacao'].'"readonly>
  </div>

  <div class="col-sm-4">
  <label  for="data_inicio">Data Inicio</label>
  <input class="form-control"  size="20" maxlength="11" name="data_inicio" id="data_inicio" type="text" value="'.$change['dtinicio'].'" readonly>
  </div>
  </div> <!-- FIM GRUPO -->
  <div class="form-group "> <!-- INICIO GRUPO -->
  <div class="col-sm-4">
  <label  for="data_fim">Data Fim</label>
  <input type="text" class="form-control"  name="data_fim" size="20" maxlength="13" id="data_fim" value="'.$change['dtfim'].'" readonly>
  </div>

  <div class="col-sm-4">
  <label  for="servico">Serviço</label>
  <input class="form-control"  size="20" maxlength="11" name="servico" id="servico" type="text" value="'.$change['servico'].'" readonly>
  </div>

  <div class="col-sm-4">
  <label  for="subservico">Sub Servico</label>
  <input class="form-control"  size="20" maxlength="11" name="subservico" id="subservico" type="text" value="'.$change['subservico'].'" readonly>
  </div>
  </div> <!-- FIM GRUPO -->
  <div class="form-group "> <!-- INICIO GRUPO -->
  <div class="col-sm-4">
  <label  for="funcao">Função</label>
  <input type="text" class="form-control"  name="funcao" size="20" maxlength="13" id="funcao" value="'.$change['funcao'].'" readonly>
  </div>

  <div class="col-sm-4">
  <label  for="origem">Origem</label>
  <input class="form-control"  size="20" maxlength="11" name="origem" id="origem" type="text" value="'.utf8_decode($change['origem']).'" readonly>
  </div>

  <div class="col-sm-4">
  <label  for="acompanhamento">Acompanhamento</label>
  <input type="text" class="form-control"  size="20" maxlength="11" name="acompanhamento" id="acompanhamento" value="'.utf8_decode($change['acompanhamento']).'" readonly>
  </div>
  </div> <!-- FIM GRUPO -->
  <div class="form-group "> <!-- INICIO GRUPO -->
  <div class="col-sm-4">
  <label  for="dm">DM</label>
  <input type="text" class="form-control"  name="dm" size="20" maxlength="13" id="dm" value="'.utf8_decode($change['dm']).'" readonly>
  </div>

  <div class="col-sm-4">
  <label  for="sdntir">SDN/TIR</label>
  <input class="form-control"  size="20" maxlength="11" name="sdntir" id="sdntir" value="'.utf8_decode($change['sdntir']).'" readonly>
  </div>

  <div class="col-sm-4">
  <label  for="descricao">Descrição</label>
  <input class="form-control"  size="20" maxlength="11" name="descricao" id="descricao" value="'.utf8_decode($change['descricao']).'" readonly>
  </div>
  </div> <!-- FIM GRUPO -->
  <div class="form-group "> <!-- INICIO GRUPO -->
  <div class="col-sm-4">
  <label  for="nome_solicitante">Nome do Solicitante</label>
  <input type="text" class="form-control"  name="nome_solicitante" size="20" maxlength="13" id="nome_solicitante" value="'.ucfirst(utf8_decode($change['nomesolicitante'])).'" readonly>
  </div>

  <div class="col-sm-4">
  <label  for="solicitante_analise">Solicitante da Análise</label>
  <input class="form-control"  size="20" maxlength="11" name="solicitante_analise" id="solicitante_analise" value="'.ucfirst(utf8_decode($change['solicitanteanalise'])).'" readonly>
  </div>

  <div class="col-sm-4">
  <label  for="area_solicitante">Área do Solicitante</label>
  <input class="form-control"  size="20" maxlength="11" name="area_solicitante" id="area_solicitante" value="'.ucfirst(utf8_decode($change['areasolicitante'])).'" readonly>
  </div>
  </div> <!-- FIM GRUPO -->
  <div class="form-group "> <!-- INICIO GRUPO -->
  <div class="col-sm-4">
  <label  for="prj_change">Novo Projeto/Change Critica</label>
  <select class="form-control" name="prj_change"  id="prj_change">
  <option value="">Selecione</option>
  <option value="0">Sim</option>
  <option value="1">Não</option>
  </select>

  </div>

  <div class="col-sm-4">
  <label  for="insp_monitoracao">Indisponibilidade da Monitoração</label>
  <select class="form-control" name="insp_monitoracao"  id="insp_monitoracao">
  <option value="">Selecione</option>
  <option value="0">Sim</option>
  <option value="1">Não</option>
  </select>
  </div>

  <div class="col-sm-4">
  <label  for="monitoraveis">Monitoraveis</label>
  <select class="form-control" name="monitoraveis"  id="monitoraveis">
  <option value="">Selecione</option>
  <option value="0">Sim</option>
  <option value="1">Não</option>
  </select>
  </div>
  </div> <!-- FIM GRUPO -->
  <div class="form-group "> <!-- INICIO GRUPO -->
  <div class="col-sm-4">
  <label  for="ha_sr">Há SR</label>
  <select class="form-control" name="ha_sr"  id="ha_sr">
  <option value="">Selecione</option>
  <option value="0">Sim</option>
  <option value="1">Não</option>
  <option value="2">Não Informado</option>
  <option value="3">Não se aplica</option>
  </select>
  </div>

  <div class="col-sm-4">
  <label  for="num_sr">Número da SR</label>
  <input class="form-control"  size="20" maxlength="11" name="num_sr" id="num_sr" pattern="SR[0-9]{11}$">
  </div>

  <div class="col-sm-4">
  <label  for="motivo">Motivo</label>
  <select class="form-control" name="motivo"  id="motivo">
  <option value="">Selecione</option>
  <option value="0">As monitorações existentes já contemplam a entrega em questão</option>
  <option value="1">Não há nenhuma alteração de serviço ou infraestrutura</option>
  <option value="2">Não Informado</option>
  <option value="3">Em Branco</option>
  </select>
  </div>
  </div> <!-- FIM GRUPO -->
  <div class="form-group "> <!-- INICIO GRUPO -->
  <div class="col-sm-4">
  <label  for="ferramenta">Ferramenta de Monitoração</label>
  <input type="text" class="form-control"  name="ferramenta" size="20" maxlength="13" id="ferramenta">
  </div>

  <div class="col-sm-4">
  <label  for="obs1">OBS1</label>
  <select class="form-control" name="obs1"  id="obs1">
  <option value="">Selecione</option>
  <option value="0">Não há o quadro de monitoração</option>
  <option value="1">Não preencheu o campo Justificativa</option>
  <option value="2">Não preencheu o campo Monitoráveis (S/N)</option>
  <option value="3">Não preencheu o campo Motivo</option>
  <option value="4">Não preencheu os campos Motivo e Justificativa</option>
  <option value="5">Não preencheu os campos Monitoração, Motivo e Justificativa</option>
  <option value="6">Sem erros</option>
  </select>
  </div>

  <div class="col-sm-4">
  <label  for="obs2">OBS2</label>
  <select class="form-control" name="obs2"  id="obs2">
  <option value="">Selecione</option>
  <option value="0">Não cobrou a versão correta do formulário</option>
  <option value="1">Não cobrou o preenchimento do campo Justificativa</option>
  <option value="2">Não cobrou o preenchimento do campo Motivo</option>
  <option value="3">Não preencheu o campo Motivo</option>
  <option value="4">Não cobrou o preenchimento dos campos Monitoração, Motivo e Justificativa</option>
  <option value="5">Não cobrou o preenchimento dos campos Motivo e Justificativa</option>
  <option value="6">Sem erros</option>
  </select>
  </div>
  </div> <!-- FIM GRUPO -->
  <div class="form-group "> <!-- INICIO GRUPO -->
  <div class="col-sm-4">
  <label  for="mes_abertura">Mes de Abertura da Change</label>
  <input type="text" class="form-control"  name="mes_abertura" size="20" maxlength="13" id="mes_abertura" readonly>
  </div>

  <div class="col-sm-4">
  <label  for="tks_monitoring">Task para Monitoring</label>
  <select class="form-control" name="tks_monitoring"  id="tks_monitoring">
  <option value="">Selecione</option>
  <option value="0">Sim</option>
  <option value="1">Não</option>
  </select>
  </div>
  </div> <!-- FIM GRUPO -->

  <div class="page-header">
  <div id="divBtnRelatorio" class="pull-right">
  <br>
  <button type="reset" class="btn btn-default"><font color="#000000">update</font></button>
  <button type="submit" class="btn btn-default">Salvar</button>
  </div>
  </div>
  </form>
  <div id="divCorpoRelatorio"></div>
  </div>
  </div>
  </div>
  </div>
  ';
}


echo $output;

}
else {
  echo "<div class='alert alert-warning'> <button type='button' class='close' data-dismiss='alert'><font color='black'><b>x</b></font></button><strong>Não localizado!</strong></div>";
}


?>



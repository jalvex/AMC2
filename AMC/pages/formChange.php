<?php
//if (!isset($_SESSION["sessao"])) // No caso de acesso direto a essa pagina sem fazer login, redireciona para tela de login.
  //header("Location: index.php?op=err");
//$dia=date('d-m-Y');
?>

<head>
	<!-- mascara para os campos data  -->
	<script>
		function mascara(i,t){
			var v = i.value;

			if(isNaN(v[v.length-1])){
				i.value = v.substring(0, v.length-1);
				return;
			}

			if(t == "data"){
				i.setAttribute("maxlength", "10");
				if (v.length == 2 || v.length == 5) i.value += "-";
			}
		}
	</script>
</head>
<body>
	<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
	<div class="bootstrap-iso">
		<div class="container-fluid">
			<div class="row">

				<div class="col-sm-12">
					<form class="form-horizontal" name="relatorio" id="relatorio" method="POST" action="home.php?link=3" enctype="multipart/form-data">
						<div class="form-group "> <!-- INICIO GRUPO -->
							<div class="col-sm-4">
								<label  for="CHange">Change</label>
								<input type="text" class="form-control"  name="change" size="20" maxlength="13" id="change" readonly>
							</div>

							<div class="col-sm-4">
								<label  for="indisponibilidade">Indisponibilidade</label>
								<input type="text" class="form-control"  size="20" maxlength="11" name="indisponibilidade" id="indisponibilidade" readonly>
							</div>

							<div class="col-sm-4">
								<label  for="status">Status</label>
								<input type="text" class="form-control"  size="20" maxlength="11" name="status" id="status" readonly>
							</div>
						</div> <!-- FIM GRUPO -->

						<div class="form-group "> <!-- INICIO GRUPO -->
							<div class="col-sm-4">
								<label  for="tipo">Tipo</label>
								<input type="text" class="form-control"  name="tipo" size="20" maxlength="13" id="tipo" readonly>
							</div>

							<div class="col-sm-4">
								<label  for="data_criacao">Data Criação</label>
								<input class="form-control"  size="20" maxlength="11" name="data_criacao" id="data_criacao" type="text" readonly>
							</div>

							<div class="col-sm-4">
								<label  for="data_inicio">Data Inicio</label>
								<input class="form-control"  size="20" maxlength="11" name="data_inicio" id="data_inicio" type="text" readonly>
							</div>
						</div> <!-- FIM GRUPO -->
						<div class="form-group "> <!-- INICIO GRUPO -->
							<div class="col-sm-4">
								<label  for="data_fim">Data Fim</label>
								<input type="text" class="form-control"  name="data_fim" size="20" maxlength="13" id="data_fim" readonly>
							</div>

							<div class="col-sm-4">
								<label  for="servico">Serviço</label>
								<input class="form-control"  size="20" maxlength="11" name="servico" id="servico" type="text" readonly>
							</div>

							<div class="col-sm-4">
								<label  for="subservico">Sub Servico</label>
								<input class="form-control"  size="20" maxlength="11" name="subservico" id="subservico" type="text" readonly>
							</div>
						</div> <!-- FIM GRUPO -->
						<div class="form-group "> <!-- INICIO GRUPO -->
							<div class="col-sm-4">
								<label  for="funcao">Função</label>
								<input type="text" class="form-control"  name="funcao" size="20" maxlength="13" id="funcao" readonly>
							</div>

							<div class="col-sm-4">
								<label  for="origem">Origem</label>
								<input class="form-control"  size="20" maxlength="11" name="origem" id="origem" type="text" readonly>
							</div>

							<div class="col-sm-4">
								<label  for="acompanhamento">Acompanhamento</label>
								<input type="text" class="form-control"  size="20" maxlength="11" name="acompanhamento" id="acompanhamento" readonly>
							</div>
						</div> <!-- FIM GRUPO -->
						<div class="form-group "> <!-- INICIO GRUPO -->
							<div class="col-sm-4">
								<label  for="dm">DM</label>
								<input type="text" class="form-control"  name="dm" size="20" maxlength="13" id="dm" readonly>
							</div>

							<div class="col-sm-4">
								<label  for="sdntir">SDN/TIR</label>
								<input class="form-control"  size="20" maxlength="11" name="sdntir" id="sdntir" readonly>
							</div>

							<div class="col-sm-4">
								<label  for="descricao">Descrição</label>
								<input class="form-control"  size="20" maxlength="11" name="descricao" id="descricao" readonly>
							</div>
						</div> <!-- FIM GRUPO -->
						<div class="form-group "> <!-- INICIO GRUPO -->
							<div class="col-sm-4">
								<label  for="nome_solicitante">Nome do Solicitante</label>
								<input type="text" class="form-control"  name="nome_solicitante" size="20" maxlength="13" id="nome_solicitante" readonly>
							</div>

							<div class="col-sm-4">
								<label  for="solicitante_analise">Solicitante da Análise</label>
								<input class="form-control"  size="20" maxlength="11" name="solicitante_analise" id="solicitante_analise" readonly>
							</div>

							<div class="col-sm-4">
								<label  for="area_solicitante">Área do Solicitante</label>
								<input class="form-control"  size="20" maxlength="11" name="area_solicitante" id="area_solicitante" readonly>
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
								<button type='reset' class='btn btn-default'><font color='#000000'>Limpar</font></button>
								<button type="submit" class="btn btn-default">Cadastrar</button>
							</div>
						</div>
					</form>
					<div id="divCorpoRelatorio"></div>
				</div>
			</div>
		</div>
	</div>
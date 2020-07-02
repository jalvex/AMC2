

<!-- Inicio do conteudo da pagina -->

	<!-- Inicio do Container -->
	<div class="row">
		<div class="col-lg-1 col-md-2 col-sm-2 col-xs-4">
			<!-- Inicio da coluna quadro de funcionalidades -->
			<div class="well well-sm">
				<!-- Inicio do quadro de funcionalidades -->
				<div id="centraliza" align="center">
					<div class="row" align="center">
						<button type="button"
							class="btn btn-default active btn-lg mesmo-tamanho"
							aria-label="Cadastrar Monitoramento" data-toggle="modal"
							data-toggle="tooltip" data-placement="top"
							title="Auditar" data-backdrop="static"
							data-keyboard="false" data-target="#modalAuditar">
							<i class="fa fa-file fa-2x" aria-hidden="true"></i><br /> <font
								size="1">Auditar</font>
						</button>
					</div>
					<div class="row">
						<button type="button"
							class="btn btn-default active btn-lg mesmo-tamanho"
							aria-label="Consultar SR" data-toggle="modal"
							data-toggle="tooltip" data-placement="top"
							title="Consultar SR" data-backdrop="static"
							data-keyboard="false" data-target="#modalSR">
							<i class="fa fa-search fa-2x" aria-hidden="true"></i><br /> <font
								size="1">AMC</font>
						</button>
					</div>
					<div class="row">
						<button type="button"
							class="btn btn-default active btn-lg mesmo-tamanho"
							aria-label="Consultar RC" data-toggle="modal"
							data-toggle="tooltip" data-placement="top"
							title="Consultar RC" data-backdrop="static"
							data-keyboard="false" data-target="#modalRC">
							<i class="fa fa-search fa-2x" aria-hidden="true"></i><br /> <font
								size="1">xTTs</font>
						</button>
					</div>
					<div class="row">
						<button type="button"
							class="btn btn-default active btn-lg mesmo-tamanho"
							aria-label="Consultar Linha" data-toggle="modal"
							data-toggle="tooltip" data-placement="top"
							title="historico" data-backdrop="static"
							data-keyboard="false" data-target="#modalconsulta">
							<i class="fa fa-history fa-2x" aria-hidden="true"></i><br /> <font
								size="1">Histórico</font>
						</button>
					</div>
					<div class="row">
						<button type="button"
							class="btn btn-default active btn-lg mesmo-tamanho"
							aria-label="Consultar Linha" data-toggle="modal"
							data-toggle="tooltip" data-placement="top"
							title="Consultar Linha" data-backdrop="static"
							data-keyboard="false" data-target="#modalconsulta">
							<i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i><br /> <font
								size="1">Indicadres</font>
						</button>
					</div>
				</div>
			</div>
			<!-- Fim do quadro de funcionalidades -->
		</div>
		<!-- Fim da coluna do quadro de funcionalidades -->
		<div class="col-lg-11 col-md-10 col-sm-10 col-xs-11">
			<!-- Inicio da coluna da lista de changes -->
			<div id="conteudo">

				<!-- INICIO exibe lista de changes -->
     <?php
include 'changeImportada.php'
    ?>

    </div>
			<!-- Fim exibe lista de changes -->
		</div>
		<!-- Fim da coluna da lista de changes  -->
<?php 
//inclui a biblioteca que carrega as janelas modais
include 'include/LibModal.php';
?>

	</div>
	<!-- Fim da linha do quadro de funcionalidades -->

<!-- Fim do Conteiner -->
<!-- Fim do conteudo da pagina -->

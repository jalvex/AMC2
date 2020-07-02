

<!-- Inicio do conteudo da pagina -->
<div class="container">
	<!-- Inicio do Container -->
	<div class="row">
		<!-- Inicio da linha quadro de funcionalidades -->
		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
			<!-- Inicio da coluna quadro de funcionalidades -->
			<div class="jumbotron">
				<!-- Inicio do quadro de funcionalidades -->
				<div class="row">
					<!-- Inicio da primeira linha da lista de funcionalidades obs:limite de 12 colunas-->
					<div class="col-md-4" align="center">
						<button type="button"
							class="btn btn-primary active btn-lg mesmo-tamanho"
							aria-label="Consultar Linha" data-toggle="modal"
							data-toggle="tooltip" data-placement="top"
							title="Consultar Linha" data-backdrop="static"
							data-keyboard="false" data-target="#modalCadastrar">
							<i class="fa fa-file fa-2x" aria-hidden="true"></i><br /> <font
								size="2">Cadastrar Monitoramento</font>
						</button>
					</div>
					<div class="col-md-4" align="center">
						<button type="button"
							class="btn btn-primary active btn-lg mesmo-tamanho"
							aria-label="Consultar Linha" data-toggle="modal"
							data-toggle="tooltip" data-placement="top"
							title="Consultar Linha" data-backdrop="static"
							data-keyboard="false" data-target="#modalconsulta">
							<i class="fa fa-search fa-2x" aria-hidden="true"></i><br /> <font
								size="2">Consultar<br> xTTs</font>
						</button>
					</div>
					<div class="col-md-4" align="center">
						<button type="button"
							class="btn btn-primary active btn-lg mesmo-tamanho"
							aria-label="Consultar Linha" data-toggle="modal"
							data-toggle="tooltip" data-placement="top"
							title="Consultar Linha" data-backdrop="static"
							data-keyboard="false" data-target="#modalconsulta">
							<i class="fa fa-history fa-2x" aria-hidden="true"></i><br /> <font
								size="2">Consultar Histórico</font>
						</button>
					</div>
				</div>
				<!-- Fim da primeira linha da lista de funcionalidades -->
				<br /> <br />
				<div class="row">
					<!-- Inicio da segunda linha de funcionalidades obs:limite de 12 colunas -->
					<div class="col-md-4" align="center"></div>
					<div class="col-md-4" align="center">
						<button type="button"
							class="btn btn-primary active btn-lg mesmo-tamanho"
							aria-label="Consultar Linha" data-toggle="modal"
							data-toggle="tooltip" data-placement="top"
							title="Consultar Linha" data-backdrop="static"
							data-keyboard="false" data-target="#modalconsulta">
							<i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i><br /> <font
								size="2">Consultar Indicadres</font>
						</button>
					</div>
				</div>
				<!-- Fim da segunda linha da lista de funcionalidades -->
			</div>
			<!-- Fim do quadro de funcionalidades -->
		</div>
		<!-- Fim da coluna do quadro de funcionalidades -->
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
			<!-- Inicio da coluna do quadro de bloqueios -->
			<div id="status">
				<!-- INICIO exibe status -->
     <?php
    var_dump($_SESSION);
    echo "<br>";
    echo "sessão";
    echo "status" . session_status();
    echo "<br>";
    echo "login: " . $_SESSION['login'];
    echo "<br>";
    echo "Nome: " . $_SESSION['nome'];
    echo "<br>";
    echo "hora: " . $_SESSION["sessiontime"];
    echo "<br>";
    echo session_id();
    echo "<br>";
    // session_unset();
    // session_destroy();
    echo "status: " . session_status();
    ?>
    </div>
			<!-- Fim exibe status -->
		</div>
		<!-- Fim da  coluna do quadro de bloqueios / status EMA -->
	</div>
	<!-- Fim da linha do quadro de funcionalidades -->
</div>
<!-- Fim do Conteiner -->
<!-- Fim do conteudo da pagina -->

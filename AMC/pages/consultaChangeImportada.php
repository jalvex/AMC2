<?php
if (!isset($_SESSION['nome'])) // No caso de acesso direto a essa pagina sem fazer login, redireciona para tela de login.
{
  header("Location: ../index.php?op=err");
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />

  <link rel="stylesheet" href="../api/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../api/css/jquery.dataTables.min.css"></script>
  <link rel="stylesheet" href="../api/css/buttons.dataTables.min.css"></script>
  <script type="text/javascript" src="../api/js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="../api/js/jquery.form.js"></script>
  <script src="../api/js/jquery.js"></script>
  <script src="../api/js/jquery.form.js"></script>
  <script src="../api/js/jquery-1.9.1.js"></script>
  <script src="../api/js/jquery-ui.js"></script>

  <!-- INICIO envia os dados do formulario consulta -->
  <script type="text/javascript">
    $(function(){

     $('#atualizaChange').submit(function(event){
      event.preventDefault();
      var formeDados = new FormData($(this)[0]);
      $.ajax({
       url:'update.php',
       type:'POST',
       data:formeDados,
       cache:false,
       contentType:false,
       processData:false,
      beforeSend: function () { //Aqui adiciona o loader
       $("#divmsg").html(""),
       $("#divBotao").html("<br><button type='reset' class='btn btn-default'><font color='#000000' disabled>Limpar</font></button> <button type='submit' class='btn btn-primary' disabled>Salvar</button>"),
       $("#divCorpo").html("<br /><i class='fa fa-spinner fa-pulse fa-2x fa-fw'></i><strong>...aguarde!</strong>");
     },
     success:function(data){
       $('#resultado').html(data),
       $("#divBotao").html("<br><button type='reset' class='btn btn-default'><font color='#000000'>Limpar</font></button> <button type='submit' class='btn btn-primary'>Salvar</button>"),
       $("#divCorpo").html(""),
       $("#divmsg").html(data);
     },
     fail:function(data)
     {
      $('#resultado').html("Algo de errado aconteceu");
      $("#divcorpo").html("");
      $("#divmsg").html("Algo de errado aconteceu");
    },
    dataType:'html'
  });
      return false;
    });
   });
 </script><!-- FIM envia os dados do formulario consulta  -->

 <!--<div class="container theme-showcase" role="main"> container-->



  <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
  <div class="bootstrap-iso">
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-12">
          <form class="form-horizontal" name="atualizaChange" id="atualizaChange" method="POST" action="" enctype="multipart/form-data">
            <div class="form-group "> <!-- INICIO GRUPO -->
              <div class="col-sm-4">
                <label  for="nmrc">N�mero da Change</label>
                <input type="text" class="form-control"  size="20" maxlength="11" name="nmrc" id="nmrc" pattern="RC[0-9]{08}$">
              </div>
              <div class="col-sm-4">
                <label  for="prj_change">Novo Projeto/Change Critica</label>
                <select class="form-control" name="prj_change"  id="prj_change">
                  <option value="">Selecione</option>
                  <option value="0">Sim</option>
                  <option value="1">N�o</option>
                </select>
              </div>
              <div class="col-sm-4">
                <label  for="insp_monitoracao">Indisponibilidade da Monitora��o</label>
                <select class="form-control" name="insp_monitoracao"  id="insp_monitoracao">
                  <option value="">Selecione</option>
                  <option value="0">Sim</option>
                  <option value="1">N�o</option>
                </select>
              </div>
            </div> <!-- FIM GRUPO -->
            <div class="form-group "> <!-- INICIO GRUPO -->
              <div class="col-sm-4">
                <label  for="monitoraveis">Monitoraveis</label>
                <select class="form-control" name="monitoraveis"  id="monitoraveis">
                  <option value="">Selecione</option>
                  <option value="0">Sim</option>
                  <option value="1">N�o</option>
                </select>
              </div>
              <div class="col-sm-4">
                <label  for="ha_sr">H� SR</label>
                <select class="form-control" name="ha_sr"  id="ha_sr">
                  <option value="">Selecione</option>
                  <option value="0">Sim</option>
                  <option value="1">N�o</option>
                  <option value="2">N�o Informado</option>
                  <option value="3">N�o se aplica</option>
                </select>
              </div>
              <div class="col-sm-4">
                <label  for="nmsr">N�mero da SR</label>
                <input type="text" class="form-control"  size="20" maxlength="11" name="nmsr" id="nmsr" pattern="SR[0-9]{08}$">
              </div>
            </div> <!-- FIM GRUPO -->
            <div class="form-group "> <!-- INICIO GRUPO -->
              <div class="col-sm-4">
                <label  for="motivo">Motivo</label>
                <select class="form-control" name="motivo"  id="motivo">
                  <option value="">Selecione</option>
                  <option value="0">As monitora��es existentes j� contemplam a entrega em quest�o</option>
                  <option value="1">N�o h� nenhuma altera��o de servi�o ou infraestrutura</option>
                  <option value="2">N�o Informado</option>
                  <option value="3">Em Branco</option>
                </select>
              </div>
              <div class="col-sm-4">
                <label  for="ferramenta">Ferramenta de Monitora��o</label>
                <input type="text" class="form-control"  name="ferramenta" size="20" maxlength="13" id="ferramenta">
              </div>
              <div class="col-sm-4">
                <label  for="obs1">OBS1</label>
                <select class="form-control" name="obs1"  id="obs1">
                  <option value="">Selecione</option>
                  <option value="0">N�o h� o quadro de monitora��o</option>
                  <option value="1">N�o preencheu o campo Justificativa</option>
                  <option value="2">N�o preencheu o campo Monitor�veis (S/N)</option>
                  <option value="3">N�o preencheu o campo Motivo</option>
                  <option value="4">N�o preencheu os campos Motivo e Justificativa</option>
                  <option value="5">N�o preencheu os campos Monitora��o, Motivo e Justificativa</option>
                  <option value="6">Sem erros</option>
                </select>
              </div>
            </div> <!-- FIM GRUPO -->
            <div class="form-group "> <!-- INICIO GRUPO -->
              <div class="col-sm-4">
                <label  for="obs2">OBS2</label>
                <select class="form-control" name="obs2"  id="obs2">
                  <option value="">Selecione</option>
                  <option value="0">N�o cobrou a vers�o correta do formul�rio</option>
                  <option value="1">N�o cobrou o preenchimento do campo Justificativa</option>
                  <option value="2">N�o cobrou o preenchimento do campo Motivo</option>
                  <option value="3">N�o preencheu o campo Motivo</option>
                  <option value="4">N�o cobrou o preenchimento dos campos Monitora��o, Motivo e Justificativa</option>
                  <option value="5">N�o cobrou o preenchimento dos campos Motivo e Justificativa</option>
                  <option value="6">Sem erros</option>
                </select>
              </div>
              <div class="col-sm-4">
                <label  for="tks_monitoring">Task para Monitoring</label>
                <select class="form-control" name="tks_monitoring"  id="tks_monitoring">
                  <option value="">Selecione</option>
                  <option value="0">Sim</option>
                  <option value="1">N�o</option>
                </select>
              </div>
<div class="col-sm-4">
                <label  for="escopo">Escopo de Garantia da monitora��o</label>
                <select class="form-control" name="escopo"  id="escopo">
                  <option value="">Selecione</option>
                  <option value="0">Sim</option>
                  <option value="1">N�o</option>
                </select>
              </div>

            </div> <!-- FIM GRUPO -->
            <div class="page-header">
              <div id="divBotao" class="pull-right">
                <br>
                <button type="reset" class="btn btn-default"><font color="#000000">Limpar</font></button>
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
		<div class="col-sm-6"id="divCorpo"></div>
              <div class="col-sm-6"id="divmsg"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>


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

<script type="text/javascript"><!-- INICIO envia os dados do formulario  -->

  $(function(){

   $('#consultaRCInterno').submit(function(event){
    event.preventDefault();
    var formeDados = new FormData($(this)[0]);
    $.ajax({
     url:'queryRCinterno.php',
     type:'POST',
     data:formeDados,
     cache:false,
     contentType:false,
     processData:false,
      beforeSend: function () { //Aqui adiciona o loader
       $("#divmsgRC").html(""),
       $("#divBtnConsultaRC").html("<input type='text' class='form-control' required='required' name='interno' size='20' maxlength='13' id='interno' pattern='RC[0-9]{08}$' placeholder='Número da RC'> <button type='submit' id='button' class='btn btn-primary disabled'>Consultar</button>"),
       $("#divCorpoRC").html("<br /><i class='fa fa-spinner fa-pulse fa-2x fa-fw'></i><strong>...aguarde!</strong>"); 
     }, 
     success:function(data){
       $('#resultadoRC').html(data),
       $("#divBtnConsultaRC").html("<input type='text' class='form-control' required='required' name='interno' size='20' maxlength='13' id='interno' pattern='RC[0-9]{08}$' placeholder='Número da RC'> <button type='submit' id='button' class='btn btn-primary'>Consultar</button>"),
       $("#divCorpoRC").html(""),
       $("#divmsgRC").html("<br />"+data);
   },
   fail:function(data)
   {
    $('#resultadoRC').html("Algo de errado aconteceu");
    $("#divCorpoRC").html("");
    $("#divmsgRC").html("Algo de errado aconteceu");
        },
        dataType:'html'
      });
    return false;
  });
 });
</script><!-- FIM envia os dados do formulario  -->

 <!--<div class="container theme-showcase" role="main"> container-->

 <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
 <div class="bootstrap-iso">
   <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <form class="form-inline" name="consultaRCInterno" id="consultaRCInterno" method="POST" action="" enctype="multipart/form-data" >
         <div id="divBtnConsultaRC"class="form-group">
          <input type="text" class="form-control" required="required" name="interno" size="20" maxlength="13" id="interno" pattern="RC[0-9]{08}$" placeholder="Número da RC">
           <button type="submit" id="button" class="btn btn-primary">Consultar</button>
        </div>
      </form>
        <div id="divmsgRC"></div>
      <div id="divCorpoRC"></div>
    </div>
  </div>
  <!--  </div> container-->
</div>
</div>
</body>
</html>


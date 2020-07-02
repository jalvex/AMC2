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

   $('#consultaSR').submit(function(event){
    event.preventDefault();
    var formeDados = new FormData($(this)[0]);
    $.ajax({
     url:'queryChangeImportada.php',
     type:'POST',
     data:formeDados,
     cache:false,
     contentType:false,
     processData:false,
      beforeSend: function () { //Aqui adiciona o loader
       $("#divmsg2").html(""),
       $("#divBtnConsulta").html("<label  for='numSR'>Número da SR</label> <input type='text' class='form-control' required='required' name='sr' size='20' maxlength='13' id='sr' pattern='RC[0-9]{08,11}$' placeholder='Número da Service Request'> <button type='reset' class='btn btn-default disabled'><font color='#000000'>Limpar</font></button> <button type='submit' id='button' class='btn btn-primary disabled'>Consultar</button>"),
       $("#divCorpo2").html("<i class='fa fa-spinner fa-pulse fa-2x fa-fw'></i><strong>...aguarde!</strong>"); 
     }, 
     success:function(data){
       $('#resultado2').html(data),
       $("#divBtnConsulta").html("<label  for='numSR'>Número da SR</label> <input type='text' class='form-control' required='required' name='sr' size='20' maxlength='13' id='sr' pattern='RC[0-9]{08,11}$' placeholder='Número da Service Request'> <button type='reset' class='btn btn-default'><font color='#000000'>Limpar</font></button> <button type='submit' id='button' class='btn btn-primary'>Consultar</button>"),
       $("#divCorpo2").html(""),
       $("#divmsg2").html("<br />"+data);
      //alert(data);
   },
   fail:function(data)
   {
    $('#resultado2').html(data);
    $("#divCorpo2").html("");
    $("#divmsg2").html("Algo de errado aconteceu");
          //alert(data);
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
        <form class="form-inline" name="consultaSR" id="consultaSR" method="POST" action="" enctype="multipart/form-data" >
         <div id="divBtnConsulta"class="form-group">
          <label  for="numSR">Número da SR</label>
          <input type="text" class="form-control" required="required" name="nmrcinterno " size="20" maxlength="13" id="nmrcinterno" pattern="RC[0-9]{08,11}$" placeholder="Número da Service Request">
          <button type="reset" class="btn btn-default"><font color="#000000">Limpar</font></button>
          <button type="submit" id="button" class="btn btn-primary">Consultar</button>
        </div>
        <br />
        <div id="divmsg2"></div>
      </form>
      <div id="divCorpo2"></div>
    </div>
  </div>
  <!--  </div> container-->
</div>
</div>
</body>
</html>


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
       <div class="form-group ">
        <div class="col-sm-6">
          <label  for="Numero da Linha">Campo 1</label>
          <input type="text" class="form-control"  name="MSISDN" size="20" maxlength="13" id="MSISDN" pattern="55[0-9]{11}$" placeholder="Campoa">
        </div>

        <div class="col-sm-6">
          <label  for="COD.Bloqueio">Campo 2</label>
          <input class="form-control"  size="20" maxlength="11" name="CD_BLOCK" id="CD_BLOCK" pattern="[0-9]{0,11}$" placeholder="Campoa" type="text"/>
        </div>

      </div>
      <div class="form-group ">
        <div class="col-sm-6">
          <label  for="Chamado Infoguard">Campo 3</label>
          <input type="text" class="form-control"  name="NM_INFOGUARD" size="20" maxlength="11" id="NM_INFOGUARD" placeholder="Campo">
        </div>

        <div class="col-sm-6">
          <label  for="usuario">Campo 4</label>
          <input class="form-control"  size="20" maxlength="19" name="USER_LOGIN" id="USER_LOGIN"  placeholder="Campo" type="text"/>
        </div>
      </div>

      <div class="form-group ">
        <div class="col-sm-6">
          <label  for="Protocolo/SR">Campo 5</label>
          <input type="text" class="form-control"  name="NM_SR_PTC" size="20" maxlength="11" id="NM_SR_PTC" placeholder="Campo">
        </div>

        <div class="col-sm-6">
         <label  for="nm_status">Campo 6</label>
         <select class="form-control" name="NM_STATUS"  id="NM_STATUS" >
          <option value="">Selecione</option>
          <option value="sucesso">Sucesso</option>
        </select>
      </div>
    </div>

    <div class="form-group ">
     <div class="col-sm-6">
      <label  for="dt_initial">Periodo: de </label>
      <input onkeypress="mascara(this, 'data')" class="form-control"  size="20" maxlength="10" name="DT_INITIAL" id="DT_INITIAL" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}$" placeholder="dd-mm-aaaa"  onBlur="return valData(this.value)" type="text"/>
    </div>

    
    <div class="col-sm-6">
      <label  for="dt_final">Periodo: até </label>
      <input onkeypress="mascara(this, 'data')" class="form-control"  size="20" maxlength="10" name="DT_FINAL" id="DT_FINAL" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}$" placeholder="dd-mm-aaaa" onBlur="return valData(this.value)" type="text"/>
    </div>
  </div>


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
<!-- INICIO modal cadastro -->
<div class="modal fade" id="modalAuditar" role="dialog">
  <div class="modal-dialog  modal-lg">
    <!-- conteudo Modal -->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-window-close-o" aria-hidden="true"></i></button>
        <h4 class="modal-title"><i class="fa fa-file" aria-hidden="true"></i> Dados da Change</h4>
      </div>
      <div class="modal-body">
        <?php
        include_once 'consultaChangeImportada.php';
        ?>
      </div>
    </div>
  </div>
</div> <!-- FIM modal cadastro -->

               <!--INICIO - Modal RC Interno -->
                <div id="modalSR" class="modal fade">
                  <div class="modal-dialog modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-window-close-o" aria-hidden="true"></i></span></button>
                     <h4 class="modal-title"><i class="fa fa-search" aria-hidden="true"></i> AMC - Consultar Change</h4>
                   </div>
                   <div class="modal-body" id="detalheInterno">
                    <?php include_once 'consultaRCinterno.php'; ?>
                   </div>
                   <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                   </div>
                 </div>
               </div>
             </div>
            <!--FIM - Busca Modal SR -->

                <!--INICIO - Busca Modal RC -->
                <div id="modalRC" class="modal fade">
                  <div class="modal-dialog modal-lg">
                   <div class="modal-content">
                    <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-window-close-o" aria-hidden="true"></i></span></button>
                     <h4 class="modal-title"><i class="fa fa-search" aria-hidden="true"></i> xTTs - Consultar Change</h4>
                   </div>
                   <div class="modal-body" id="detalhextts">
			<?php include_once 'consultaRCxtts.php'; ?>
                   </div>
                 </div>
               </div>
             </div>
            <!--FIM - Busca Modal RC -->
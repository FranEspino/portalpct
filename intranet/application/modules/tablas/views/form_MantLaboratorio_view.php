<script> 
$(function(){        
	var options = {
		target:        '#div_capa_pagina', 
		beforeSubmit:  showRequest,  
		success:       showResponse  
	};
		$('#frm_mant').ajaxForm(options);  
		$('#ModalMante').modal('show');
		$('#laboratorio').focus();		
	});	
function showRequest(formData, jqForm){		
		$('#btnguardar').html('Grabando...');
		$("#btnguardar").attr("disabled","disabled"); 
	};
function showResponse(responseText, statusText){
	$('#ModalMante').modal('hide');
	if ($('.modal-backdrop').is(':visible')){
	  $('body').removeClass('modal-open'); 
	  $('.modal-backdrop').remove(); 
	};
};
</script>      

<div class="modal container fade" id="ModalMante" role="dialog"> 
<form id="frm_mant" class="" name="frm_" action="<?php  echo base_url() ?>tablas/laboratorio/mantLaboratorio" method="post">
<div class="modal-dialog ui-front">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="alert-heading" id="myModalLabel"><i class="fa fa-edit"></i> <?php  echo $titulofrm; ?></h4>
            </div>
            <div class="modal-body padding-7">
            <div class="smart-form">
				<?php 			
				$editar = '';
				if(isset($laboratorio))
				{	if($laboratorio){ 							 
					$editar = 'SI';
					}
				}
				?>				
                <div class="panel panel-default ">
                <fieldset >    
                
                <section>
                    <div class="row">
                        <label class="label col col-3">Laboratorio</label>
                        <div class="col col-9">
                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                <input autofocus type="text" id="laboratorio" name="laboratorio" maxlength="100" value="<?php  echo ($editar == 'SI')? $laboratorio->laboratorio:'';  ?>" required >                               
                            </label>
                        </div>
                    </div>
                </section>               
                
                </fieldset>                

            </div>
            </div>
            </div>
            <div class="modal-footer">
                <button title="Cancelar" type="button" class="btn btn-default" data-dismiss="modal">
                   Cancelar
                </button>
                <button title="Guardar" type="submit" class="btn btn-primary" id="btnguardar" name="btnguardar" >
                   <span class="glyphicon glyphicon-floppy-disk"></span> Guardar
                </button>
                <!--Campos ocultos-->
                <input type="hidden"  name="laboratorio_id" value="<?php  echo ($editar == 'SI')? $laboratorio->laboratorio_id :'';  ?>"> 
                
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </form> 
</div><!-- /.modal -->
<?php
	$this->load->view('mi-script.php');
?>
 
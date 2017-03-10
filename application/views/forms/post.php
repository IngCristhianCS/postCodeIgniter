<?php $abrirAlert='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$cerrarAlert='</div>'; 
 
	if (isset($datos)) {
		$pTitulo = $datos['title'];
		$pCuerpo = $datos['body'];
		$pId=$datos['id'];
	}else{
		$pTitulo = '';
		$pCuerpo = '';
		$pId='';
	}
	$form = array(
		'class'=>'col-md-12',
		'onsubmit'=>'enviarForm('.$pId.')',
		'id'=>'formPostEnviar',
		'method'=>'post' 
	);
	$titulo = array(
		'name' => 'titulo' , 
		'class' => 'validate form-control',
		'value' => $pTitulo
	);
	$cuerpo = array(
		'name' => 'cuerpo',
		'class' => 'validate form-control',
		'value' => $pCuerpo
	 );
	$attributes = array('class' => 'btn btn-success waves-effect waves-light');
?>



<?= form_open('',$form)?>
  <div class="row">
    <div class="input-field col-md-12">        	
		<?= form_label('Titulo:','titulo',array("class"=>"col-sm-2 control-label"))?>
      	<?=form_input($titulo) ?>
		<?= form_error('titulo', $abrirAlert, $cerrarAlert); ?>
    </div>
  </div>
  <div class="row">
    <div class="input-field col-md-12">
    	<?= form_label('Redacta Post:','cuerpo', array("class"=>"col-sm-2 control-label"))?> 
		<?= form_textarea($cuerpo) ?>
		<?= form_error('cuerpo', $abrirAlert, $cerrarAlert); ?>			
    </div>
  </div>
  <div class="row">
    <div class="input-field col-md-12">
    	<?= form_submit(null,'Enviar',$attributes) ?>
    </div>
  </div>
<?= form_close()?>
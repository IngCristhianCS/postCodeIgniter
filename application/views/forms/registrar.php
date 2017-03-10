<?php $abrirAlert='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$cerrarAlert='</div>'; 
 
	if (isset($datos)) {
		$uNombre = $datos['nombre'];
		$uPat = $datos['a_pat'];
		$uMat = $datos['a_mat'];
		$uEmail = $datos['email'];
		$uId=$datos['id'];
	}else{
		$uNombre = '';
		$uPat = '';
		$uMat = '';
		$uEmail = '';
		$uId='';
	}
	$form = array(
		'class'=>'col-md-12',
		'onsubmit'=>'registrarForm('.$uId.')',
		'id'=>'formRegistrarEnviar',
		'method'=>'post' 
	);
	$nombre = array(
		'name' => 'nombre' , 
		'class' => 'validate form-control',
		'value' => $uNombre
	);
	$aPat = array(
		'name' => 'aPat' , 
		'class' => 'validate form-control',
		'value' => $uPat
	);
	$aMat = array(
		'name' => 'aMat' , 
		'class' => 'validate form-control',
		'value' => $uMat
	);
	$email = array(
		'type'  => 'email',
		'name' => 'email',
		'class' => 'validate form-control',
		'value' => $uEmail
	 );
	$password = array(
		'name' => 'password', 
		'placeholder' => '**********',
		'class' => 'form-control'
	);
	$password_confirm = array(
		'name' => 'password_confirm', 
		'placeholder' => '**********',
		'class' => 'form-control'
	);
	$attributes = array('class' => 'btn btn-success waves-effect waves-light');
?>
<?= form_open('', $form); ?>
	<div class="row">
		<div class="input-field col-md-12">        	
			<?= form_label('Nombre:','nombre',array("class"=>"col-sm-2 control-label"))?>
		  	<?=form_input($nombre) ?>
			<?= form_error('nombre', $abrirAlert, $cerrarAlert); ?>
		</div>
	</div>
	<div class="row">
		<div class="input-field col-md-12">
			<?= form_label('Apellido Paterno:','aPat', array("class"=>"col-sm-2 control-label"))?> 
			<?= form_input($aPat) ?>
			<?= form_error('aPat', $abrirAlert, $cerrarAlert); ?>			
		</div>
	</div>
	<div class="row">
		<div class="input-field col-md-12">
			<?= form_label('Apellido Materno:','aMat', array("class"=>"col-sm-2 control-label"))?> 
			<?= form_input($aMat) ?>
			<?= form_error('aMat', $abrirAlert, $cerrarAlert); ?>			
		</div>
	</div>
	<div class="row">
		<div class="input-field col-md-12">
			<?= form_label('Correo Electronico', 'email'); ?>
        	<?= form_input($email) ?>
        	<?= form_error('email', $abrirAlert, $cerrarAlert); ?>
        </div>
    </div>
    <div class="row">
		<div class="input-field col-md-12">
			<?= form_label('Contraseña', 'password') ?>
            <?= form_password($password) ?>
            <?= form_error('password', $abrirAlert, $cerrarAlert); ?>
		</div>
	</div>
	<div class="row">
		<div class="input-field col-md-12">
			<?= form_label('Repetir Contraseña', 'password_confirm') ?>
            <?= form_password($password_confirm) ?>
            <?= form_error('password_confirm', $abrirAlert, $cerrarAlert); ?>
		</div>
	</div>
	<div class="row">
		<div class="input-field col-md-12">
			<?= form_submit(null,'Enviar',$attributes) ?>
		</div>
	</div>
<?= form_close(); ?>
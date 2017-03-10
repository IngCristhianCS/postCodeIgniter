<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Codeigniter</title>

	<!-- bootstrap CSS -->
	<link rel="stylesheet" href="/plugins/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="/plugins/bootstrap-4.0.0-alpha.6-dist/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="<?= base_url()?>public/css/login.min.css">	
	<script src="/plugins/bootstrap-material-design-master/js/jquery-3.1.1.min.js"></script>
	<script src="/plugins/bootstrap-material-design-master/js/tether.min.js"></script>
    <!-- alertify CSS-->
    <link rel="stylesheet" href="/plugins/alertify/css/alertify.css">

	<!-- bootstrap js -->
	<script src="/plugins/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js" ></script>

    <!-- mis scripts-->
    <script src="<?= base_url()?>public/js/registrar.min.js"></script>

    <!-- alertify JS-->
    <script src="/plugins/alertify/alertify.min.js"></script>
</head>
<body>

	<div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
			<?php $abrirAlert='<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
				$cerrarAlert='</div>';
            	$email = array(
            		'type'  => 'email',
            		'name' => 'email_login',
            		'placeholder' => 'Ingrese Correo Electronico' ,
            		'class' => 'form-control',
            		'autofocus' => 'true'
            	);
            	$password = array(
            		'name' => 'password_login', 
            		'placeholder' => '**********',
            		'class' => 'form-control'
            	);
            ?>
            <?= form_open('', array('class' => 'form-signin' ))?>
            	<?= form_label('Correo Electronico', 'email_login'); ?>
            	<?= form_input($email) ?>
            	<?= form_error('email_login', $abrirAlert, $cerrarAlert); ?>	
            	<?= form_label('Contraseña', 'password_login') ?>
            	<?= form_password($password) ?>
            	<?= form_error('password_login', $abrirAlert, $cerrarAlert); ?>
                <div id="remember" class="checkbox">
                    <label>
                    	<?= form_checkbox('', 'remember-me' , false); ?> Remember me
                    </label>
                </div>
                <?= form_submit('', 'Ingresar',array('class' => 'btn btn-primary btn-block btn-signin')) ?>
            <?= form_close() ?>
            <a href="#" onclick="registrar()" class="forgot-password">
                Registrarse
            </a>
        </div>
        <div class="modal fade bs-example-modal-lg" id="modalFormRegistrar" tabindex="-1" role="dialog" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >Registrar</h4>
              </div>
              <div class="modal-body" id="formRegistrar">

              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>
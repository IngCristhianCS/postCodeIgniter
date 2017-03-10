<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent:: __construct();
		$this->load->library('session');
		$this->load->model('user_model');
    	$this->load->helper('url');
    	$this->load->helper('form');
    	$this->load->library('form_validation');

		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
		$this->form_validation->set_message('is_unique','El %s ya esta en uso');
	}
	public function index()
	{	
		$this->form_validation->set_rules('password_login', 'Contraseña', 'required');
    	$this->form_validation->set_rules('email_login', 'Correo Electronico', 'required');
		if ($this->form_validation->run() === FALSE)
	    {	        
	    	$this->load->view('forms/login');
	    }
	    else
	    {	    
	        if($this->user_model->validarLogueo()){
				$user = $this->user_model->validarLogueo();
				
				$userSession = array(
					'id' => $user['id'],
			        'nombre'  => $user['nombre'],
			        'logged_in' => true
				);

				$this->session->set_userdata($userSession);
				redirect('posts','refresh');
			}else{
				$this->load->view('forms/login');
			}
	    }
	}
	public function destroy()
	{
		$this->session->sess_destroy();
		redirect('/','refresh');
	}
	public function register()
	{
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
    	$this->form_validation->set_rules('aPat', 'Apellido Paterno', 'required');
    	$this->form_validation->set_rules('aMat', 'Apellido Materno', 'required');
    	$this->form_validation->set_rules('password', 'Contraseña', 'required');
		$this->form_validation->set_rules('password_confirm', 'Contraseña', 'required|matches[password]');
    	$this->form_validation->set_rules('email', 'Correo Electronico', 'required|valid_email|is_unique[users.email]');
		if ($this->form_validation->run() === FALSE)
	    {	        
	    	$this->load->view('forms/registrar');
	    }
	    else
	    {
	    	if ($this->user_model->set_user()) {
	    		print "correcto";
	    	} else {
	    		print "incorrecto";
	    	}
	    	
	    }
	}
}
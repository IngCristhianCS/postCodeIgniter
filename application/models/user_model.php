<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	private $tabla;
	function __construct()
	{
		parent::__construct();
		$this->tabla='users';
	}
	public function validarLogueo()
	{
		$query = $this->db->select('*')
			->from('users')
			->where('password', $this->input->post('password_login'))
			->where('email', $this->input->post('email_login'))
			->get()
			->row_array();
		return $query;
	}
	public function set_user()
	{
		$data = array('id' => null,'nombre' => $this->input->post('nombre'),'a_pat' =>$this->input->post('aPat'), 'a_mat' => $this->input->post('aMat'),'email' => $this->input->post('email'), 'password'=> $this->input->post('password') 
		);
		return $this->db->insert($this->tabla, $data);
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */

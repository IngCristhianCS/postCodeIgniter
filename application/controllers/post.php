<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();		
		$this->load->helper('mihelper');		
    	$this->load->helper('url');	
		$this->load->helper('form');
    	$this->load->library('form_validation');
    	$this->load->model('post_model');	
		$this->load->library('session');
		$this->form_validation->set_rules('titulo', 'Titulo', 'required');
    	$this->form_validation->set_rules('cuerpo', 'Cuerpo', 'required');
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
    	if(!$this->session->has_userdata('logged_in')){
			redirect('/','refresh');
		}
	}

	private function cargarTemplate($cuerpo,$datos=null)
	{
		$data['datos']=$datos;
		$this->load->view('headers/cabecera');		
		$this->load->view($cuerpo , $data);
		$this->load->view('headers/pie');
	}
	public function cargarForm($cuerpo,$datos=null)
	{
		$data['datos']=$datos;
		$this->load->view($cuerpo , $data);
	}
	public function index()
	{
		$posts = $this->post_model->get_posts();
		$this->cargarTemplate('tbls/posts',$posts);
	}
	public function create()
	{
		if ($this->form_validation->run() === FALSE)
	    {	        
	    	$this->cargarForm('forms/post');
	    }
	    else
	    {	    	
	        if ($this->post_model->set_post()) {
	        	print 'correcto';
	        } else {
	        	print 'incorrecto';
	        }
	    }
	}
	public function edit($id)
	{	
		if ($this->form_validation->run() === FALSE)
	    {	
	    	$this->cargarForm('forms/post',$this->post_model->get_posts($id));	    	
	    }
	    else
	    {	    	
	        if ($this->post_model->update_post($id)) {
	        	print 'correcto';
	        } else {
	        	print 'incorrecto';
	        }
	        //redirect('/posts','refresh');
	    }
		
	}
	public function destroy($id)
	{
		print $this->post_model->remove_post($id);
	}
	public function all()
    {
        $list = $this->post_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $posts) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $posts->title;
            $row[] = $posts->body;
            $row[] = '<i class="fa fa-remove btn btn-danger" onclick="eliminar('.$posts->id.',\''.$posts->title.'\')" data-post="'.$posts->title.'" data-id="'.$posts->id.'"></i>';
            $row[] = '<i class="fa fa-pencil btn btn-primary" onclick="cargarForm('.$posts->id.')" ></i>';
 
            $data[] = $row;
        }
 
        $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $this->post_model->count_all(),
                    "recordsFiltered" => $this->post_model->count_filtered(),
                    "data" => $data,
                );
        echo json_encode($output);
    }
}
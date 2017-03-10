<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

    var $table = 'posts';
    var $column_order = array(null, 'title','body'); //set column field database for datatable orderable
    var $column_search = array('id','title','body'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 

    public function __construct()
    {
            parent::__construct();
    }
    public function get_posts($id=null)
    {
    	if ($id==null) {
            $query = $this->db->select('id','title','body')->order_by('id','ASC')->get('posts');
        	return $query->result_array();
        }

        $query = $this->db->get_where('posts', array('id' => $id));
        return $query->row_array();
    	
    }
	public function set_post()
	{
        $data = array(
            'title' => $this->input ->post('titulo'), 
            'body' => $this->input ->post('cuerpo'),
            'created_at' => null ,
            'updated_at' => null
        );
	    return $this->db->insert('posts', $data);
	}
    public function update_post($id)
    {
        $data = array(
            'title' => $this->input ->post('titulo'), 
            'body' => $this->input ->post('cuerpo')
        );
        return $this->db
            ->set('title' , $this->input ->post('titulo'))
            ->set('body' ,$this->input ->post('cuerpo'))
            ->where('id', $id)
            ->update('posts');
    }
    public function remove_post($id)
    {
        return $this->db->delete('posts',array('id' => $id));
    }
    private function _get_datatables_query()
    {
         
        $this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
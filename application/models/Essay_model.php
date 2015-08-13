<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Essay_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function get_essay($id = null)
	{
		$this->db->select('*');
		if(isset($id))
			$this->db->where('id',$id);
	
		$query = $this->db->get('tbl_essay');

		return $query->result();
	}

	public function get_keywords($ids = null)
	{
		$this->db->select('*');
		$this->db->from('tbl_keywords');
		if(isset($ids))
		{
			$this->db->where_in('essay_id', $ids);
		}

		$query = $this->db->get();

		return $query->result();
	}

	public function get_essay_with_keywords($id=null)
	{
		$this->db->select('*');
		$this->db->from('tbl_essay');
		$this->db->join('tbl_keywords', 'tbl_essay.id = tbl_keywords.essay_id');
		$this->db->where('tbl_essay.id',$id);

		$query = $this->db->get();

		return $query->result();

	}
}

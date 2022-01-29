<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Family_model extends CI_Model {
	//Save Head
	public function head_save($data)
	{
		$this->db->insert('head', $data);
		return $this->db->insert_id();
	}

	//Save Members
	public function member_save($data)
	{
		return $this->db->insert_batch('member', $data);
	}

	//Heads list
	public function head_list()
	{
		$this->db->select('head.*, COUNT(member.id) as members');
		$this->db->join('member', 'member.head=head.id', 'left');
		$this->db->group_by('member.head');
		return $this->db->get('head')->result_array();
	}

	//Members By Head
	public function member_by_head($head)
	{
		$this->db->select('*, DATE_FORMAT(dob, "%d-%m-%Y") as dob');
		return $this->db->get_where('member', array('head' => $head))->result_array();
	}
}

<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model{

	public function insert_employee($data){

		$this->db->insert('employees', $data);
		$id = $this->db->insert_id();
		
		return (isset($id)) ? $id : FALSE;
	}


	public function get_employees(){

		$query = $this->db->get('employees');

		return $query->result_array();
	}


	public function get_employees_limit($limit = 100, $offset = 0){

		$query = $this->db->get('employees', $limit, $offset);

		return $query->result_array();
	}

	public function get_num_employees(){

		return $this->db->count_all('employees');
	}


	public function get_employee_by_id($employee_id){

		$this->db->where('id', $employee_id);
		$query = $this->db->get('employees');

		return $query->row_array();
	}


	public function update_employee($data, $employee_id){

		$this->db->where('id', $employee_id);
		$this->db->update('employees', $data);
	}


}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_manage extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('employee_model');
	}


	/************************************************************************
	**** PUBLIC METHODS
	************************************************************************/

	/*
	 * Add employee to database
	*/
	public function add(){

		// Page data to be passed to form view
		$this->data['page_title'] = 'Add';
		$this->data['action_url'] = base_url() . 'employee_manage/add';
		$this->data['submit_value'] = 'Add Employee';

		// Set forms default values
		$this->_reset_form();

		// Check for POST action
		if(isset($_POST) && !empty($_POST)){

			// Collect data from form
			$this->_collect_post_data();

			// Set validation rules
			$this->_validate_form();

			if ($this->form_validation->run() == true){
				// Form Validated OK
				$this->employee_model->insert_employee($this->data['form']);
				$this->data['message'] = 'Employee added OK.';
				$this->_reset_form();
			}
			else{
				// Validation failed - pass data back to view
				$this->data['message'] = validation_errors();
			}
		}

		// Load views
		$this->load->view('header', $this->data);
		$this->load->view('employee_manage_form_view', $this->data);
		$this->load->view('footer');
	}


	/*
	 * Make ammends to employee information
	 * @param int $page_num - Pagination(SQL offset value) for table from employee_list
	 * @param int $employee_is - Employee ID
	*/
	public function edit($page_num = 1, $employee_id = null){

		// Redirect if no employee id is supplied
		if(is_null($employee_id)){

			redirect('/employee_manage/employee_list/', 'refresh');
		}

		// Page data to be passed to form view
		$this->data['page_title'] = 'edit';
		$this->data['action_url'] = base_url() . 'employee_manage/edit/' . $page_num . '/' . $employee_id;
		$this->data['submit_value'] = 'Update Employee';

		// Set forms default values
		$this->_reset_form();

		// Check for POST action
		if(isset($_POST) && !empty($_POST)){

			// Collect data from form
			$this->_collect_post_data();

			// Set validation rules
			$this->_validate_form();

			if ($this->form_validation->run() == true){
				// Form Validated OK
				$this->employee_model->update_employee($this->data['form'], $employee_id);

				// Redirect back to the employye list page with correct pagination value
				redirect('/employee_manage/employee_list/' . $page_num . '/' . $employee_id, 'refresh');
			}
			else{
				// Validation failed - pass data back to view
				$this->data['message'] = validation_errors();
			}
		}
		else{
			// Get employee information from database
			$this->data['form'] = $this->employee_model->get_employee_by_id($employee_id);
		}

		// Load views
		$this->load->view('header', $this->data);
		$this->load->view('employee_manage_form_view', $this->data);
		$this->load->view('footer');
	}			

	/*
	 * Lists a table of employees
	 * @param int $page_num - Pagination(SQL offset value) for table from employee_list
	 * @param int $employee_is - Employee ID
	*/
	public function employee_list($page_num = 0, $employee_id = null){

		// Set the employee id to be viewed
		$this->data['display_id'] = $employee_id;

		// Set the page number to be displayed
		$this->data['page_num'] = $page_num;

		// Set number of table rowa
		$config['total_rows'] = $this->employee_model->get_num_employees();
		$config['per_page'] = 10;

		// Set Title
		$this->data['page_title'] = 'Employees';

		// Get employees from employee model
		$this->data['employees'] = $this->employee_model->get_employees_limit($config['per_page'], $page_num);

		// Pagination
		$this->load->library('pagination');

		$config['base_url'] = base_url() . 'employee_manage/employee_list/';
		
		$this->pagination->initialize($config);

		$this->data['pagination'] = $this->pagination->create_links();

		// Load Views
		$this->load->view('header', $this->data);
		$this->load->view('employee_list_view', $this->data);
		$this->load->view('footer');
	}


	/************************************************************************
	**** PRIVATE METHODS
	************************************************************************/

	private function _reset_form(){

		$this->data['form'] = array(

			'first_name'		=> '',
			'last_name'			=> '',
			'telephone'			=> '',
			'house_name_number'	=> '',
			'street'			=> '',
			'town'				=> '',
			'city'				=> '',
			'post_code'			=> '',
			'active_status'		=> 'true'
		);
	}


	private function _validate_form(){

			$this->form_validation->set_rules('first_name', 'First Name', 'required|max_length[32]|xss_clean');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required|max_length[32]|xss_clean');
			$this->form_validation->set_rules('telephone', 'Telephone', 'max_length[16]|xss_clean');
			$this->form_validation->set_rules('house_name_number', 'House Name/Number', 'max_length[32]|xss_clean');
			$this->form_validation->set_rules('street', 'Street', 'max_length[32]|xss_clean');
			$this->form_validation->set_rules('town', 'Town', 'max_length[32]|xss_clean');
			$this->form_validation->set_rules('city', 'City', 'max_length[32]|xss_clean');
			$this->form_validation->set_rules('post_code', 'Post Code', 'max_length[8]|xss_clean');		
	}


	private function _collect_post_data(){

		$this->data['form'] = array(

			'first_name'		=> $this->input->post('first_name'),
			'last_name'			=> $this->input->post('last_name'),
			'telephone'			=> $this->input->post('telephone'),
			'house_name_number'	=> $this->input->post('house_name_number'),
			'street'			=> $this->input->post('street'),
			'town'				=> $this->input->post('town'),
			'city'				=> $this->input->post('city'),
			'post_code'			=> $this->input->post('post_code'),
			'active_status'		=> $this->input->post('active_status')	
		);

		// Process 'active_status' checkbox to produce boolean
		if($this->data['form']['active_status'] == 'on'){

			$this->data['form']['active_status'] = 1;
		}
		else{

			$this->data['form']['active_status'] = 0;
		}
	}
}
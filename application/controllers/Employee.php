<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct() { 
		parent::__construct(); 
		$this->load->model('Employeemodel');
		$this->load->model('Commonmodel');
	}

	public function index() {
		$data['page_title'] = 'Fragomen | Employee';
        $data['employee_active'] ="nav-active";
		$data['page'] = 'employee/employeeList';
		$this->load->view('page', $data);
	}

	public function employee_list(){
		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$isdeleted = $this->input->post('isdeleted');

		$totalData = $this->Employeemodel->all_active_employees_count($isdeleted);

		$totalFiltered = $totalData; 

		if (empty($this->input->post('search')['value'])) {            
			$employees = $this->Employeemodel->all_active_employees($limit, $start, $isdeleted);
		}
		else {
			$search = trim($this->input->post('search')['value']);  
			$employees =  $this->Employeemodel->employee_search($limit,$start,$search, $isdeleted);
			$totalFiltered = $this->Employeemodel->employee_search_count($search, $isdeleted);
		}

		$data = array();
		if (!empty($employees)) {
			foreach ($employees as $employee) {
				$update_url = URL."employee/update/".$employee->id."";
				$edit_disabled = '';
				if ($employee->isdeleted) {
					$edit_disabled = 'disabled';
				}

				$action = '<div class="d-flex">';

				if (!$employee->isdeleted) {
					$action .= '
					  	<a href="'.$update_url.'" class="btn btn-outline-complete mr-1" name="editButton" 
					  		data-id="'.$employee->id.'"
					  	>
					 	 	Edit
					  	</a>';
				}
				  	
				if ($employee->isdeleted) {
					$action .= '
				  	<button class="btn btn-outline-complete" style="width: 90px;" id= "activate"  data-id="'.$employee->id.'">
				  		Activate
				  	</button>';
				} else {
					$action .= '
				  	<button id= "deactivate" class="btn btn-outline-complete"  data-id="'.$employee->id.'">
				  		Delete
				  	</button>';
				} 	
			  	$action .= '</div>';

				$nestedData['fullname'] = $employee->fullname;
				$nestedData['email'] = $employee->email;
				$nestedData['usercode'] = $employee->usercode;
				$nestedData['designation'] = $employee->designation;
				$nestedData['dateofjoining'] = $employee->dateofjoining;
				$nestedData['Action'] = $action;
				$nestedData['isdeleted'] = $employee->isdeleted;

				$data[] = $nestedData;

			}
		}

		$json_data = array(
			"draw"            => intval($this->input->post('draw')),  
			"recordsTotal"    => intval($totalData),  
			"recordsFiltered" => intval($totalFiltered), 
			"data"            => $data   
		);

		echo json_encode($json_data); 
	}

	public function add() { 
		$data['page_title'] = 'Fragomen | Add Employee';
        $data['add_emp_active'] ="nav-active";
		$data['page_type'] = 'Add';
		$data['page'] = 'employee/employee';
		$this->load->view('page', $data);
	}

	public function record_insert($type, $id =''){
		$username = $this->input->post('username');
		$usercode = $this->input->post('usercode');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$designation = $this->input->post('designation');
		$dateofjoining = $this->input->post('dateofjoining');
		$location = $this->input->post('location');
		// echo'<pre>'; print_r($_POST);die;
		$data['username'] = $username;
		$data['fullname'] = $username;
		$data['email'] = $email;
		$data['address'] = $address;
		$data['designation'] = $designation;
		$data['dateofjoining'] = $dateofjoining;
		$data['location']= $location;
		$data['usercode']= $usercode;


		$isadmin = $isnotify = 0;

		if (isset($_POST['isadmin'])) {
			$isadmin = 1;
		}
		if (isset($_POST['isnotify'])) {
			$isnotify = 1;
		}

		$data['isadmin'] = $isadmin;
		$data['isnotify'] = $isnotify;

		// echo '<pre>'; print_r($data);die;

		if ($type == 'add') {

			$record['isdeleted'] = 0;
			$record['deletedby'] = 0;

			$usercode_check  = $this->Commonmodel->duplicate_check('user','usercode', $usercode);
			if ($usercode_check) {
				$this->session->set_flashdata("message_type", "error");	
				$this->session->set_flashdata("message", "This employee code already registered in the system");
				redirect('employee/add');
			} 

			$email_check  = $this->Commonmodel->duplicate_check('user','email', $email);
			if ($email_check) {
				$this->session->set_flashdata("message_type", "error");	
				$this->session->set_flashdata("message", "This email address already registered in the system");
				redirect('employee/add');
			} 

			$data['loggedincount'] = 0;
			$pass = $this->GenerateStrongPassword();

			$hash = md5($pass);
			$data['password'] = $hash;	
			$this->Commonmodel->insert('user', $data);

			$this->user_password_email($email, $pass, $usercode);

			$this->session->set_flashdata("message_type", "success");	
			$this->session->set_flashdata("message", "Employee has been added");
			redirect('employee');
			// echo '<pre>'; print_r($data);die;
		} else {
			$usercode_check  = $this->Commonmodel->duplicate_check('user','usercode', $usercode, 'id', $id);
			if ($usercode_check) {
				$this->session->set_flashdata("message_type", "error");	
				$this->session->set_flashdata("message", "This employee code already registered in the system");
				redirect('employee/update/'.$id);
			} 

			$email_check  = $this->Commonmodel->duplicate_check('user','email', $email, 'id', $id);
			if ($email_check) {
				$this->session->set_flashdata("message_type", "error");	
				$this->session->set_flashdata("message", "This email address already registered in the system");
				redirect('employee/update/'.$id);
			} 

			$this->Commonmodel->update('user', 'id', $id, $data);

			$this->session->set_flashdata("message_type", "success");	
			$this->session->set_flashdata("message", "Employee has been updated");
			redirect('employee');
		}
	}


	public function user_password_email($email, $pass, $usercode){
		$message = "<p>Your account for EPaySlip Management System has been setup by your administrator and ready for your use.

			Now you can View/Print your salary slips online using this system. Your user name and password is as follows:

			</p>

				<p>Username: $usercode</p>

				<p>Password: $pass</p>

				<p>Please <a href='https://slip.logisticasaan365.com/'>click here</a to log in. Alternatively copy and paste the URL: https://slip.logisticasaan365.com/ in your browser.</p>

				<p>Best Regards,</p>

				<p><b>EPaySlips Management System Team</b></p>

				</br>

				<p>NOTE: This is an auto generated email from an administered email box. Should you have an questions concerning this email, please contact Fragomen Finance Team.</p>

				";

				$args = array(
				    'from' => from_email,
				    'title' => 'NEW USER ACCOUNT Welcome to EPaySlips Management System',
				    'to' => $email,
				    'subject' => 'NEW USER ACCOUNT Welcome to EPaySlips Management System',
				    'message' => $message,
				);
				$this->Commonmodel->mail($args);
	}

	function GenerateStrongPassword($length = 8, $add_dashes = false, $available_sets = 'luds'){
	    $sets = array();

	    if(strpos($available_sets, 'l') !== false)$sets[] = 'abcdefghjkmnpqrstuvwxyz';
	    if(strpos($available_sets, 'u') !== false)$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	    if(strpos($available_sets, 'd') !== false)$sets[] = '0123456789';
	    if(strpos($available_sets, 's') !== false)$sets[] = '!@#$%&*?';

	    $all = $password = '';
	    foreach($sets as $set){ $password .= $set[array_rand(str_split($set))]; $all .= $set;   }
	    $all = str_split($all);
	    for($i = 0; $i < $length - count($sets); $i++)  $password .= $all[array_rand($all)];
	    $password = str_shuffle($password);
	    if(!$add_dashes)    return $password;
	    $dash_len = floor(sqrt($length));
	    $dash_str = '';

	    while(strlen($password) > $dash_len){
	        $dash_str .= substr($password, 0, $dash_len) . '-';
	        $password = substr($password, $dash_len);
	    }

	    $dash_str .= $password;
	    return $dash_str;

	}

	public function update($id) { 
		$data['page_title'] = 'Fragomen | Update Employee';
		$data['id'] = $id;
		$data['page_type'] = 'Update';
		$data['page'] = 'employee/employee';
		$this->load->view('page', $data);
	}
	public function update_employee_isdeleted(){
		$id = $this->input->post('id');
		$isdeleted = $this->input->post('isdeleted');
		$this->Commonmodel->update('user', 'id', $id, array('isdeleted' => $isdeleted));

		$result = array('success' => true);
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}
	public function dashboard() { 
		$data['page_title'] = 'Fragomen | Dashboard';
        $data['dashboard_active'] ="nav-active";
		$data['page'] = 'dashboard';
		$this->load->view('page', $data);
	}
	public function profile() {
		$data['page_title'] = 'Fragomen | Profile';

        $data['page'] = 'employee/profile';
        $this->load->view('page', $data);
    }

    public function change_password() {
		$data['page_title'] = 'Fragomen | Change Password';
        $data['add_emp_active'] ="nav-active";
    	$data['employee'] = $_SESSION['employee'];
    	$data['page'] = 'employee/changePassword';
    	$this->load->view('page', $data);
    }

    public function change_password_authenticate() {
    	$id = $this->input->post('id');
    	$oldpassword = md5(($this->input->post('oldpassword')));
    	$password = md5(($this->input->post('password')));
		$user = $_SESSION['employee'];

    	if ($user->password == $oldpassword) {

    	    $newPassword  =	$password;
    	    $data['loggedincount'] = ($user->loggedincount + 1);
    	    $data['lastloggedindate'] = date('Y-m-d');
    		$data['password'] = $newPassword;

    		$this->Commonmodel->update('user', 'id', $user->id, $data);

    		$user = $this->Commonmodel->getRows(array('returnType' => 'single', 'conditions' => array('id' => $user->id)), 'user');

    	    $_SESSION['employee'] = $user;
    	    $_SESSION['user_id'] = $user->id;
    	    $_SESSION['is_admin'] = $user->isadmin;
    	    // $_SESSION['changepassword'] = NULL;

    	    $this->session->set_flashdata("message_type", "success");	
    		$this->session->set_flashdata("message", "Password Change Successfully!");
    	    redirect('employee/dashboard');
    	} else {
    		$this->session->set_flashdata("message_type", "error");	
    		$this->session->set_flashdata("message", "Old password did not match!");
    		redirect('employee/change_password');
    	}
    }
}

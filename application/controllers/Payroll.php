<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends CI_Controller {

	public function __construct() { 
		parent::__construct(); 
		$this->load->model('Payrollmodel');
		$this->load->model('Commonmodel');

		if (!isset($_SESSION['user_id'])) {
			redirect('login');
		}
	}

	public function index() {
		$data['page_title'] = 'Fragomen | Payroll Management';
        $data['payroll_active'] ="nav-active";
		$data['page'] = 'payroll/payrollList';
		$this->load->view('page', $data);
	}

	public function payroll_list(){
		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$month = $this->input->post('month');
		$search = $this->input->post('search');
		if ($month != "") {
			$month = month_year_custom($month);
		}

		$totalData = $this->Payrollmodel->all_employee_active_payroll_count($month);

		$totalFiltered = $totalData; 

		if ($search == "") {            
			$payrolls = $this->Payrollmodel->all_employee_active_payroll($limit, $start, $month);
		}
		else {
			$payrolls =  $this->Payrollmodel->employee_payroll_search($limit,$start,$search, $month);
			$totalFiltered = $this->Payrollmodel->employee_payroll_search_count($search, $month);
		}

		$data = array();
		if (!empty($payrolls)) {
			foreach ($payrolls as $payroll) {
				$view_url = URL."payroll/view/".md5($payroll->id)."";
				// $action = '<center class="">';
				$action = '
				  	<a href="' . $view_url . '" target="_blank" class="btn btn-outline-complete" style="width: 90px;" id="view"  data-id="'.$payroll->id.'">
				  		View
				  	</a>';

			  	// $action .= '</center>';

				$nestedData['employeecode'] = $payroll->employeecode;
				$nestedData['salarymonth'] = $payroll->salarymonth;
				$nestedData['workingdays'] = $payroll->workingdays;
				$nestedData['grosssalary'] = $payroll->grosssalary;
				$nestedData['basicsalary'] = $payroll->basicsalary;
				$nestedData['totalexpense'] = $payroll->totalexpense;
				$nestedData['netsalary'] = $payroll->netsalary;
				$nestedData['Action'] = $action;

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

	public function payroll_month() {
		$data['page_title'] = 'Fragomen | Payroll Month';
        $data['payroll_month_active'] ="nav-active";
		$data['page'] = 'payroll/payrollMonthList';
		$this->load->view('page', $data);
	}

	public function payroll_month_list(){
		$limit = $this->input->post('length');
		$start = $this->input->post('start');
		$isdeleted = $this->input->post('isdeleted');
		$month = $this->input->post('month');
		if ($month != "") {
			$month = month_year_custom($month);
		}

		$totalData = $this->Payrollmodel->all_active_payroll_count($isdeleted, $month);

		$totalFiltered = $totalData; 

		if (empty($this->input->post('search')['value'])) {            
			$payrolls = $this->Payrollmodel->all_active_payroll($limit, $start, $isdeleted, $month);
		}
		else {
			$search = trim($this->input->post('search')['value']);  
			$payrolls =  $this->Payrollmodel->payroll_search($limit,$start,$search, $isdeleted, $month);
			$totalFiltered = $this->Payrollmodel->payroll_search_count($search, $isdeleted, $month);
		}

		$data = array();
		if (!empty($payrolls)) {
			foreach ($payrolls as $payroll) {
				$update_url = URL."employee/update/".$payroll->id."";
				// $action = '<center class="">';
				  	
				if ($payroll->isdeleted) {
					$action = '
				  	<button class="btn btn-outline-complete" style="width: 90px;" id= "activate"  data-id="'.$payroll->id.'">
				  		Activate
				  	</button>';
				} else {
					$action = '
				  	<button id= "deactivate" class="btn btn-outline-complete"  data-id="'.$payroll->id.'">
				  		Delete
				  	</button>';
				} 	
			  	// $action .= '</center>';

				$nestedData['filename'] = $payroll->filename;
				$nestedData['salarymonth'] = $payroll->salarymonth;
				$nestedData['date'] = $payroll->date;
				$nestedData['Action'] = $action;

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

	public function update_payroll_isdeleted(){
		$id = $this->input->post('id');
		$isdeleted = $this->input->post('isdeleted');
		$this->Commonmodel->update('payroll', 'id', $id, array('isdeleted' => $isdeleted));

		$result = array('success' => true);
		$this->output->set_content_type('application/json')->set_output(json_encode($result));
	}

	public function view($id) { 
		$data['page_title'] = 'Fragomen | Payroll View';
		$data['payroll_active'] ="nav-active";
		$data['page_title'] = 'Pay Slip';
		$data['page'] = 'payroll/salarySlip';
		$result = $this->Payrollmodel->get_emp_payroll($id);
		$data['result'] = $result;
		$data['id'] = $id;

		if(!$_SESSION['is_admin']) {
			$session_usercode = $_SESSION['employee']->usercode;
			$salary_usercode = $result['usercode'];
			if ($session_usercode != $salary_usercode) {
				redirect('payroll');
			}
		}

		$this->load->view('page', $data);
	}

	public function salary_pdf($id) { 
		$data['page_title'] = 'Pay Slip';
		$result = $this->Payrollmodel->get_emp_payroll($id);
		$data['result'] = $result;

		if(!$_SESSION['is_admin']) {
			$session_usercode = $_SESSION['employee']->usercode;
			$salary_usercode = $result['usercode'];
			if ($session_usercode != $salary_usercode) {
				redirect('payroll');
			}
		}
		$this->load->view('payroll/salarySlipPDF', $data);
	}

	public function add() { 
		$data['page_title'] = 'Fragomen | Add Payroll';
        $data['add_payroll_active'] ="nav-active";
		$data['page_type'] = 'Add';
		$data['page'] = 'payroll/addPayroll';
		$this->load->view('page', $data);
	}

	public function add_payroll() {

		$this->db->trans_start();
		// dd($_POST);
		$file=$_FILES["fileUpload"]["name"];

		$record = array();
		$record['filename'] = $file;
	    $record['salarymonth'] = month_year_custom($_POST['salarymonth']);
		$record['date'] = date('Y-m-d');
		$record['isdeleted'] = 0;
		// $record['deletedby'] = 0;


		$payrollid = $this->Commonmodel->insert('payroll', $record);

		$filename=	 $_FILES["fileUpload"]["tmp_name"];
	    $handle = fopen($filename,"r");
	 	$line = 1;
		while (($data = fgetcsv($handle, 10000, ',')) !== FALSE) {
			//print_r($data);
			// foreach($data as $key => $value) {

				if ($line != 1) {

					// $keys[$key] = $value;
			        $record = array();

			        $employeeCode = $data[1];

				    $record['payrollid'] =  $payrollid;
					$record['employeecode'] = $employeeCode;	
					$record['grosssalary'] =  $data[8];
					$record['branch'] =  $data[5];
					$record['department'] =  $data[6];
					$record['basicsalary'] =  $data[9];
					$record['housingallowance'] =  $data[10];
					$record['transport'] =  $data[11];
					$record['airfare'] =  $data[12];
					$record['other'] =  $data[13];
					$record['workingdays'] =  $data[14];
					$record['salaryarrears'] =  $data[15];
					$record['bonus'] =  $data[16];
					$record['expenseclaims'] =  $data[17];
					$record['otherdeduction'] =  $data[18];
					$record['advancehousingallowance'] =  $data[19];
					$record['otherpayables'] =  $data[20];
					$record['totalexpense'] =  $data[21];
					$record['netsalary'] =  $data[22];
					$record['paymentmethod'] =  $data[23];
					$record['bankcode'] =  $data[24];
					$record['bankaccountnumber'] =  $data[25];
					$record['instructions'] =  $data[26];
					$record['paydate'] =  date('Y-m-d');
					$record['isdeleted'] = 0;

					// dd($record);
					$user_exist = $this->Commonmodel->getRows(array('returnType' => 'count', 'conditions' => array('usercode' => $employeeCode)), 'user');
					if ($user_exist) {
			            $this->Commonmodel->insert('payrolldetails', $record);
						
					} else {
						$this->session->set_flashdata("message_type", "error");	
						$error_msg = $employeeCode." does not exist please add employee firts before add payroll.";
						$this->session->set_flashdata("message", $error_msg);
						redirect('payroll/add');
					}

					$user = $this->Commonmodel->getRows(array('returnType' => 'single', 'conditions' => array('usercode' => $employeeCode)), 'user');

			        if (isset($_POST['notify_to_all']) || $user->isnotify ) {
		            	$userName = $user->fullname;

		            	$message = "</p>
							<p>This is to inform you that your Salary for the current month has been transferred to your bank account. To view the Salary Slip, please log in <a href='https://slip.logisticasaan365.com/'>here</a>.</p>
							<p>Best Regards,</p>
							<p>Fragomen Finance team</p>";

						$args = array(
						    'from' => from_email,
						    'title' => 'Salary Transfer EPaySlips Management System',
						    'to' => $user->email,
						    'subject' => 'Salary Transfer EPaySlips Management System',
						    'message' => $message,
						);
						$this->Commonmodel->mail($args);
				    }
				}

			// }

			$line++;
		}

		$this->db->trans_complete();

		$this->session->set_flashdata("message_type", "success");	
		$this->session->set_flashdata("message", "Payroll added successfully!");
		redirect('payroll');

	}
}

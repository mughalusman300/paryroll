<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() { 
		parent::__construct(); 
		// $this->load->model('Loginmodel');
		$this->load->model('Commonmodel');

	}

	public function index() {
		$data['page_title'] = 'Fragomen | Login';
		if (isset($_SESSION['user_id'])){ 
			redirect('employee/dashboard');
		} else {
			session_destroy();
			$data['forgot_password'] = false;
			$this->load->view('login', $data);
		}
	}

	public function authenticate() {
		$usercode = $this->security->xss_clean($this->input->post('username'));
		$password = md5(($this->input->post('password')));
		$user = $this->Commonmodel->getRows(array('returnType' => 'single', 'conditions' => array('usercode' => $usercode, 'password' => $password )), 'user');


		if ($user) {
		// echo '<pre>'; print_r($user);die;
			if ($user->loggedincount == null || $user->loggedincount == 0) {
				$_SESSION['change_password'] = $user;
				redirect('login/change_password');
			} else {
				$_SESSION['security'] = $user;
				redirect('login/security');
			}
		} else {
			$this->session->set_flashdata("message_type", "error");	
			$this->session->set_flashdata("message", "Invalid user name or password!");
			redirect('login');

		}

	}

	public function security() {
		$data['page_title'] = 'Fragomen | Security';
		if(isset($_SESSION['security'])) {
			$this->load->view('security');
		}	 else {
			redirect('login');
		}
	}

	public function authenticate_security() {
		$security = $_SESSION['security'];
		$favoritecar = md5(($this->input->post('favoritecar'))); 
		if ($favoritecar == $security->favoritecar) {
			$_SESSION['user_id'] = $security->id;
			 $_SESSION['is_admin'] = $security->isadmin;

			$data['lastloggedindate'] = date('Y-m-d');
			$data['loggedincount'] = ($security->loggedincount + 1);
			$this->Commonmodel->update('user', 'id', $security->id, $data);

			$_SESSION['employee'] = $security;
			redirect('employee/dashboard');
		} else {
			$this->session->set_flashdata("message_type", "error");	
			$this->session->set_flashdata("message", "Invalid answer!");
			redirect('login/security');
		}
		// echo '<pre>'; print_r($_SESSION['security']);die;
	}

	public function change_password($usercode = '' ,$verificationcode = '') {
		$data['page_title'] = 'Fragomen | Change Password';

		if ($usercode !='' || $verificationcode !='') {
			$user = $this->Commonmodel->getRows(array('returnType' => 'single', 'conditions' => array('usercode' => $usercode, 'verificationcode' => $verificationcode)), 'user');

			if ($user) {
				$_SESSION['password_rest'] = $user;
			} else {
				if (isset($_SESSION['employee'])) {
					redirect('employee/dashboard');
				} else {
					redirect('login');
				}				
			}

		}
		// dd($_SESSION);
		if (isset($_SESSION['password_rest'])) { 
			$data['change_password'] = $_SESSION['password_rest'];
			$data['only_password']  = false;
			$data['old_password']  = false;
			$this->load->view('changePassword', $data);
		} elseif (isset($_SESSION['change_password'])) {

			$data['change_password'] = $_SESSION['change_password'];
			$data['only_password']  = false;
			$data['old_password']  = true;
			$this->load->view('changePassword', $data);

		} else if ($_SESSION['employee']) {

			$data['change_password'] = $_SESSION['employee'];
			$data['only_password']  = true;
			$data['old_password']  = true;
			$this->load->view('changePassword', $data);

		}	 else {
			redirect('login');
		}
	}

	public function change_password_authenticate() {
		// dd($_POST);
		$id = $this->input->post('id');
		$oldpassword = md5(($this->input->post('oldpassword')));
		$password = md5(($this->input->post('password')));
		if (isset($_POST['favoritecar']) ) {
			$favoritecar = md5(($this->input->post('favoritecar')));
		}
		if (isset($_SESSION['password_rest'])) {
			$user = $_SESSION['password_rest'];
			// unset($_SESSION['password_rest']);
		} elseif (isset($_SESSION['change_password'])) {
			$user = $_SESSION['change_password'];
		} else {
			$user = $_SESSION['employee'];
		}

		if ($user->password == $oldpassword || isset($_SESSION['password_rest'])) {
			if (isset($_SESSION['password_rest'])) {
				unset($_SESSION['password_rest']);
			}
		    $newPassword  =	$password;
		    $data['loggedincount'] = ($user->loggedincount + 1);
		    $data['lastloggedindate'] = date('Y-m-d');
			$data['password'] = $newPassword;
			if (isset($_POST['favoritecar']) ) {
				$data['favoritecar'] = $favoritecar;
				$data['verificationcode'] = '';
			}
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
			redirect('login/change_password');
		}
	}

	public function change_car() {
		$data['page_title'] = 'Change Car';
        $data['contactus_active'] ="nav-active";
		$data['employee'] = $_SESSION['employee'];
		$data['page'] = 'changeCar';
		$this->load->view('page', $data);
	}

	public function change_car_authenticate() {
		$id = $this->input->post('id');
		$old_favoritecar = md5(($this->input->post('old_favoritecar')));
		$favoritecar = md5(($this->input->post('favoritecar')));
		$user = $_SESSION['employee'];

		if ($user->favoritecar == $old_favoritecar) {
			$data['favoritecar'] = $favoritecar;
			$this->Commonmodel->update('user', 'id', $user->id, $data);

		    $this->session->set_flashdata("message_type", "success");	
			$this->session->set_flashdata("message", "Favourite Car updated Successfully!");

			$user = $this->Commonmodel->getRows(array('returnType' => 'single', 'conditions' => array('id' => $user->id)), 'user');

			$_SESSION['employee'] = $user;
		    redirect('employee/dashboard');
		} else {
			$this->session->set_flashdata("message_type", "error");	
			$this->session->set_flashdata("message", "Old favorite car did not match!");
			redirect('change-car');
		}
	}

	public function logout(){
		session_destroy();
		redirect(base_url(''));
	}

	public function forgot_password(){
		$data['page_title'] = 'Fragomen | Forgot Password';
		if (isset($_SESSION['user_id'])){ 
			redirect('employee/dashboard');
		} else {
			// session_destroy();
			$data['forgot_password'] = true;
			$this->load->view('login', $data);
		}
	}

	public function forgot_password_authenticate() {
		$email = $this->input->post('email');
		// dd($email);
		if($email != '') {
			$user = $this->Commonmodel->getRows(array('returnType' => 'single', 'conditions' => array('email' => $email)), 'user');
			if ($user) {
				$verificationcode = md5(rand(10,100));
				$this->Commonmodel->update('user', 'id', $user->id, array('verificationcode' => $verificationcode));
				$this->send_reset_email($email, $user->usercode, $verificationcode);

				$this->session->set_flashdata("message_type", "success");	
				$this->session->set_flashdata("message", "An email has been sent to $email with instructions on how to reset the password");
				redirect('login');
			} else {
				$this->session->set_flashdata("message_type", "error");	
				$this->session->set_flashdata("message", "User is not registered!");
				redirect('login/forgot_password');

			}

		} else {
			redirect('login/forgot_password');
		}
	}

	public function send_reset_email($email, $usercode, $verificationcode) {
		$url = URL.'login/change_password/'.$usercode.'/'.$verificationcode;

		$message = "<p>
						To Reset You Password <a href='{$url}'>Click Here</a></h3><br/><br/><br/><p>or copy the below link<br/>{$url}</p>
					</p>

			<p>A Password reset request has been generated using your email address for the EPaySlips Management System. If you have deliberately generated this request, and wish to Reset your password please <a href='{$url}'>Click Here.</a></p>
			<p>Alternatively copy the below link in your browser:<br/>{$url} </p>

			<p>If you have received this email in error, please ignore.</p>
			<p>Best Regards,</p>
				<p>
					<b>EPaySlips Management System Team</b>
				</p>
				</br>
				<p>
					NOTE: This is an auto generated email from an administered email box. Should you have an questions concerning this email, please contact Fragomen Finance Team.
				</p>
		";

		$args = array(
		    'from' => from_email,
		    'title' => 'PASSWORD RESET EaySlips Management System',
		    'to' => $email,
		    'subject' => 'PASSWORD RESET EaySlips Management System',
		    'message' => $message,
		);
		$this->Commonmodel->mail($args);
	}

}

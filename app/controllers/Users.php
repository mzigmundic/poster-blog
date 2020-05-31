<?php

class Users extends Controller {

	public function __construct() {
		$this->userModel = $this->model('User');
	}

	public function register() {
		
		// Check for POST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			// Process form
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$data = [
				'name' => trim($_POST['name']),
				'email' => trim($_POST['email']),
				'password' => trim($_POST['password']),
				'password_confirm' => trim($_POST['password_confirm']),
				'name_error' => '',
				'email_error' => '',
				'password_error' => '',
				'password_confirm_error' => ''
			];

			// Validate Name
			if (empty($data['name'])) {
				$data['name_error'] = 'Please enter your name';
			}

			// Validate Email
			if (empty($data['email'])) {
				$data['email_error'] = 'Please enter your email';
			} elseif ($this->userModel->findUserByEmail($data['email'])) {
				// Check email
				$data['email_error'] = 'User with that mail already exists';
			}

			// Validate Password
			if (empty($data['password'])) {
				$data['password_error'] = 'Please enter password';
			} elseif (strlen($data['password']) < 6) {
				$data['password_error'] = 'Password has to be at least 6 characters long';
			}
			if (empty($data['password_confirm'])) {
				$data['password_confirm_error'] = 'Please Confirm password';
			} elseif ($data['password'] != $data['password_confirm']) {
					$data['password_confirm_error'] = 'Passwords do not match';
			}

			// Make sure there are no errors
			if (empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['password_confirm_error'])) {
				
				// Validated
				// Hash the password
				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

				// Register User
				if ($this->userModel->register($data)) {
					flash('register_success', 'You are registered and can log in');
					redirect('users/login');
				} else {
					die('Something went wrong');
				}
			} else {

				// If there are errors
				$this->view('users/register', $data);
			}
		} else {

			// Init data
			$data = [
				'name' => '',
				'email' => '',
				'password' => '',
				'password_confirm' => '',
				'name_error' => '',
				'email_error' => '',
				'password_error' => '',
				'password_confirm_error' => ''
			];

			// Load view
			$this->view('users/register', $data);
		}
	}

	public function login() {

		// Check for POST
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			// Process form
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			$data = [
				'email' => trim($_POST['email']),
				'password' => trim($_POST['password']),
				'email_error' => '',
				'password_error' => '',
			];

			// Validate Email
			if (empty($data['email'])) {
				$data['email_error'] = 'Please enter your email';
			}

			// Validate Password
			if (empty($data['password'])) {
				$data['password_error'] = 'Please enter your password';
			}

			// Check for user email
			if ($this->userModel->findUserByEmail($data['email'])) {
				// User found

			} else {
				$data['email_error'] = 'No user found';
			}

			// Make sure there are no errors
			if (empty($data['email_error']) && empty($data['password_error'])) {
				
				// Validated
				// Check and set logged in user
				$loggedInUser = $this->userModel->login($data['email'], $data['password']);

				if ($loggedInUser) {
					
					// Create session
					$this->createUserSession($loggedInUser);
				} else {

					$data['password_error'] = 'Password incorect';
					$this->view('users/login', $data);
				}
			} else {
				$this->view('users/login', $data);
			}

		// if there is no POST
		} else {

			// Init data
			$data = [
				'email' => '',
				'password' => '',
				'email_error' => '',
				'password_error' => '',
			];

			// Load view
			$this->view('users/login', $data);
		}
	}

	public function createUserSession($user) {
		$_SESSION['user_id'] = $user->id;
		$_SESSION['user_email'] = $user->email;
		$_SESSION['user_name'] = $user->name;
		redirect('pages/index');
	}

	public function logout() {
		unset($_SESSION['user_id']);
		unset($_SESSION['user_email']);
		unset($_SESSION['user_name']);
		session_destroy();
		redirect('users/login');
	}

	
}
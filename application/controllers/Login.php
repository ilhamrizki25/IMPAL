<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        //load the required libraries and helpers for login
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        
        //load the Login Model
        $this->load->model('LoginModel', 'login');
    }

    public function index() {
        //check if the user is already logged in 
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            //if yes redirect to welcome page
            redirect(base_url().'welcome');
        }
        //if not load the login page
        $this->load->view('login/landing');
    }

    public function doLogin() {
        //get the input fields from login form
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        
        //send the email pass to query if the user is present or not
        $check_login = $this->login->checkLogin($email, $password);
        $check_user = $this->login->checkLoginUsername($email,$password);

        //if the result is query result is 1 then valid user
        if ($check_login) {
            //if yes then set the session 'loggin_in' as true
            $data_session = array(
				'Email' => $email,
				'logged_in' => TRUE
			);
            $this->session->set_userdata($data_session);
            redirect(base_url().'Account');
        } elseif ($check_user){
            $newemail = $this->login->get_Email($email);
            $data_session = array(
				'Email' => $newemail->Email,
				'logged_in' => TRUE
			);
            $this->session->set_userdata($data_session);
            redirect(base_url().'Account');
        }else {
            $data_session = array(
				'Email' => "",
				'logged_in' => FALSE
            );
            //if no then set the session 'logged_in' as false
            $this->session->set_userdata($data_session);
            
            //and redirect to login page with flashdata invalid msg
            $this->session->set_flashdata('msg', 'Email / Password Invalid');
            redirect(base_url().'Login');            
        }
    }

    public function logout() {
        //unset the logged_in session and redirect to login page
        $this->session->unset_userdata('logged_in');
        redirect(base_url().'login');
    }

}

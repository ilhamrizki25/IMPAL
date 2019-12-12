<?php

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        //load the required helpers and libraries
        $this->load->helper('url');
        $this->load->library(['form_validation', 'session']);
        $this->load->database();
        
        //load our Register model here
        $this->load->model('RegisterModel', 'register');
    }

    //registration form page
    public function index() {
        //check if the user is already logged in 
        //if yes redirect to the welcome page
        $logged_in = $this->session->userdata('logged_in');
        if($logged_in){
            //if yes redirect to welcome page
            redirect(base_url().'welcome');
        }
        //load the register page views
        $this->load->view('login/Register');
    }

    //register validation and logic
    public function doRegister() {
        // set the form validation here
        $this->form_validation->set_rules('name', 'name', 'required|min_length[3]');
        $this->form_validation->set_message('is_unique', 'Email atau Username already exists.');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.Email]');
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[user.Username]|min_length[3]');
        $this->form_validation->set_rules('password1', 'password1', 'required|min_length[4]');
        $this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]');
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('answer', 'Answer', 'required');


        //if the above validation fails, redirect to register page
        //with vaildation_errors();
        if ($this->form_validation->run() == FALSE) {
            //set the validation errors in flashdata (one time session)
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url() . 'register');
        } else {
            // if not get the input values
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $user = $this->input->post('username');
            $password = md5($this->input->post('password1'));
            $pertanyaan = $this->input->post('question');
            $jawaban = $this->input->post('answer');
            

            $data = [
                'Email' => $email , 'Username' => $user, 'Password' => $password, 'Nama' => $name, 'Pertanyaan' => $pertanyaan, 'Jawaban' => $jawaban
            ];

            //pass the input values to the register model
            $insert_data = $this->register->add_user($data);

            //if data inserted then set the success message and redirect to login page
            if ($insert_data) {
                $this->session->set_flashdata('msg', 'Successfully Register, Login now!');
                redirect(base_url() . 'login');
            }
        }
    }

}

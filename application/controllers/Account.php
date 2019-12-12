<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->library(['form_validation','session']);
        $this->load->database();
        $this->load->model('AccountModel','account');
        $this->load->model('EquipmentModel','equipment');
    }
    public function index(){
        $logged_in = $this->session->userdata('logged_in');
        if(!$logged_in){
            redirect(base_url().'Login');
        }
        $email = $this->session->userdata('Email');
        $checkaccount = $this->account->checkaccount($email);
        if($checkaccount){
            redirect(base_url().'Welcome');
        }
        $this->load->view('header');
        $this->load->view('account/newaccount_page');
        $this->load->view('footer');   
    }
    public function new(){
        $email = $this->session->userdata('Email');
        $this->form_validation->set_message('is_unique', 'IGN already exists.');
        $this->form_validation->set_rules('ign', 'IGN', 'required|is_unique[account.IGN]');
        if ($this->form_validation->run() == FALSE) {
            //set the validation errors in flashdata (one time session)
            $this->session->set_flashdata('msg', validation_errors());
            redirect(base_url() . 'Account');
        }
        $ign = $this->input->post('ign');
        $data = [
            'IGN' => $ign , 'Gold' => 500, 'Gem' => 100, 'jPet' => 0, 'Email' => $email
        ];
        $save = $this->account->save($data);
        if ($save) {
            $this->session->set_flashdata('msg', 'Successfully Register IGN');
            redirect(base_url() . 'Welcome');
        }

    }
    public function list(){
        $email = $this->session->userdata('Email');
        $data['judul'] = 'list character';
		$data['account'] = $this->account->getAllbyId($email);
		$this->load->view('templates/header', $data);
		$this->load->view('account/accountlist', $data);
		$this->load->view('templates/footer');
    }
    public function add(){
        $email = $this->session->userdata('Email');
        $data['judul'] = 'Form Tambah Character';

		//from library form_validation, set rules for nama, nim, email = required
		$this->form_validation->set_message('is_unique', 'IGN already exists.');
        $this->form_validation->set_rules('ign', 'IGN', 'required|is_unique[account.IGN]');


		//conditon in form_validation, if user input form = false, then load page "tambah" again
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view("account/tambah");
			$this->load->view('templates/footer');
		}else{
            $ign = $this->input->post('ign');
            $data = [
                'IGN' => $ign , 'Gold' => 500, 'Gem' => 100, 'jPet' => 0, 'Email' => $email
            ];
            $save = $this->account->save($data);
			$this->session->set_flashdata('flash','added success');
			redirect('Account/list');
		}
    }
    public function shop(){
        $email = $this->session->userdata('Email');
        $data['judul'] = 'SHOP';
		$data['equiment'] = $this->equipment->getAll();
		$this->load->view('templates/header', $data);
		$this->load->view('shop/shoplist', $data);
		$this->load->view('templates/footer');
    }
    public function delete($ign){
		$this->account->deletecharacter($ign);
		$this->session->set_flashdata('flash', 'dihapus');
		redirect('Account/list');
	}
}

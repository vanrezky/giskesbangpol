<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->helper('skripsi');
		//$this->load->model('Suratmasuk_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in')=="")
		{
		
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('app/login');
				
			}
			else
			{
				$dt['username'] 	= $this->input->post('username');
				$dt['password'] 	= $this->input->post('password');
				
				//$dt['mst_tapel'] = $this->db->get('tapel');


				$this->app_login_model->getLoginData($dt);

			}
		}
		else if($this->session->userdata('logged_in')!="" && $this->session->userdata('level')=="Admin")
		{
			redirect('template');
		}
	}


	public function logout(){
        $this->session->sess_destroy();
        redirect('dashboard');
    }

}

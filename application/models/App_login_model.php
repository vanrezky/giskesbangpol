<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class App_Login_Model extends CI_Model {


	public function getLoginData($data)

	{

		$login['username'] = $data['username'];
		$login['password'] = md5($data['password']);

		$cek = $this->db->get_where('user', $login);

		if($cek->num_rows()>0)
		{
			foreach($cek->result() as $qad)
			{
				$sess_data['logged_in'] 	= 'yesGetMeLoginBaby';
				$sess_data['id_user'] 		= $qad->id_user;
				$sess_data['username'] 		= $qad->username;
				$sess_data['nama_lengkap'] 	= $qad->nama_lengkap;
				$sess_data['level'] 		= $qad->level;				

				$this->session->set_userdata($sess_data);
			}
			if($this->session->userdata('logged_in')!="" && $this->session->userdata('level')=="Admin")
			{
				redirect('template');
			} 
			else if($this->session->userdata('logged_in')!="" && $this->session->userdata('level')=="Operator")
			{
				redirect('operator/dashboard_operator');
			}
		}
		else
		{
			$this->session->set_flashdata('result_login','<div class="alert alert-danger" role="alert"> Maaf, kombinasi username dan password yang anda masukkan tidak valid dengan database kami.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('dashboard');
		}
	}

}


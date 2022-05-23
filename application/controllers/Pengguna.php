<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper('skripsi_helper');
		$this->load->model('Pengguna_model');
        $this->load->library(array('googlemaps'));

	}
 
	public function index() {
         if($this->session->userdata('logged_in')!="")
    {


       $d['pengguna'] = $this->Pengguna_model->tampil_data();
		$this->load->view('app/pengguna',$d);

    }
            else
    {
      redirect('dashboard/logout');
    }
  }


    public function tambah()
    {
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('level')=="Admin")
        {
            $d['id_param'] = "";
            $d['username'] = ""; 
            $d['password'] = ""; 
            $d['nama_lengkap'] = "";
            $d['level'] = "";        

            $d['st'] = "tambah";

            $this->load->view('app/tambah',$d);

        }
        else
        {
            redirect('pengguna');
        }
    }

    public function edit()
    {
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('level')=="Admin")
        {
            $id['id_user'] = $this->uri->segment(4);
            $q = $this->db->get_where("user",$id);
            $d = array();
            foreach($q->result() as $dt)
            {

                $d['id_param'] = $dt->id_user;
                $d['username'] = $dt->username; 
                //$d['no_kontrol'] = ""; 
                $d['password'] = $dt->password; 
                $d['nama_lengkap'] = $dt->nama_lengkap;
                
                $d['level'] = $dt->level;     
            }   

                $d['st'] = "edit";

                $d['mst_ruang'] = $this->db->get('ruang');
                $this->load->view('pengguna/edit',$d);

        }
        else
        {
            redirect('pengguna');
        }
    }

    public function hapus($id) 
    {
        $row = $this->Pengguna_model->get_by_id($id);

        if ($row) {
            $this->Pengguna_model->delete($id);
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(site_url('pengguna'));
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data tidak ditemukan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(site_url('pengguna'));
        }
    }

	public function simpan()
    {
        if($this->session->userdata('logged_in')!="" && $this->session->userdata('level')=="Admin")
        {
           
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
         

            
            $id['id_user'] = $this->input->post("id_param");
            $st_frame = $this->input->post("frame");
            
            if ($this->form_validation->run() == FALSE)
            {
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $q = $this->db->get_where("user",$id);
                    $d = array();
                    foreach($q->result() as $dt)
                    {
                        $d['id_param'] = $dt->id_user;
                        $d['username'] = $dt->username; 
                        //$d['no_kontrol'] = ""; 
                        $d['password'] = $dt->password; 
                        $d['nama_lengkap'] = $dt->nama_lengkap;
                        
                        $d['level'] = $dt->level;  

                    }

                    $d['st'] = "edit";
                    $d['mst_ruang'] = $this->db->get('user');

                    $this->load->view('pengguna/edit',$d);
                }
                else if($st=="tambah")
                {
                    $d['id_param'] = "";
                    $d['username'] = ""; 
                    //$d['no_kontrol'] = ""; 
                    $d['password'] = ""; 
                    $d['nama_lengkap'] = "";
                   
                    $d['level'] = "";  

                    $d['st'] = "tambah";

                    $d['mst_ruang'] = $this->db->get('user');

                    $this->template->load('pengguna/tambah',$d);
                }
            }
            else
            {
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $upd['username'] = $this->input->post('username');
                    $upd['password'] = MD5($this->input->post('password'));
                    $upd['nama_lengkap'] = $this->input->post('nama_lengkap');
                    
                    $upd['level'] = $this->input->post('level');
                   

                                     
                    $this->db->update("user",$upd,$id);
                    
                
                    redirect('pengguna');
                }
                else if($st=="tambah")
                {
                    $in['username'] = $this->input->post('username');
                    $in['password'] = MD5($this->input->post('password'));
                    $in['nama_lengkap'] = $this->input->post('nama_lengkap');
                    
                    $in['level'] = $this->input->post('level');
                   
                    
                    $this->db->insert("user",$in);
                    
                    redirect('pengguna');
                }
            
            }
        }
        else
        {
            redirect('pengguna');
        }
    }

}

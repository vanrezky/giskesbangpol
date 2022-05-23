<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Kontak_model');
			
}


	public function index()
	{
	$data['kontak'] = $this->Kontak_model->tampil_data();

		$this->load->view('kontak',$data);
	}

	public function baca()
  {
        if($this->session->userdata('logged_in')!="" )
        {
            $id['id'] = $this->uri->segment(3);
            $q = $this->db->get_where("kontak",$id);
            $d = array();

            foreach($q->result() as $dt)
            {
                $d['id_param'] = $dt->id;
                $d['nama'] = $dt->nama;       
                $d['email'] = $dt->email;
                $d['subject'] = $dt->subject;
                $d['pesan'] = $dt->pesan;
                
            }        

               // $d['tampil'] = $this->db->query("SELECT a.id,a.nama_organisasi,a.foto,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=b.id_jenis");
                
                
                $this->load->view('baca_kontak',$d);
        }
        else
        {
            redirect(site_url('dashboard'));
        }
    }

    public function hapus($id) 
    {
        $row = $this->Kontak_model->get_by_id($id);

        if ($row) {
            $this->Kontak_model->delete($id);
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(site_url('lokasi'));
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data tidak ditemukan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(site_url('lokasi'));
        }
    }
}


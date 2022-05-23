<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_organisasi extends CI_Controller {


	public function __construct(){
		parent::__construct();

		//$this->load->helper('dikdas');
		$this->load->model('Jenis_model');

	}

	public function index() {

    if($this->session->userdata('logged_in')!="")
    {


		$data['data_jenis'] = $this->Jenis_model->tampil_data();
		$this->load->view('jenis/data_jenis',$data);
	}
    else
    {
      redirect('dashboard/logout');
    }
  }


	public function tambah()
    {

            $d['id_param'] = "";
            $d['jenis_organisasi'] = "";
            $d['keterangan'] = "";  
            $d['foto'] = "";

            $d['st'] = "tambah";

            //$d['mst_poli'] = $this->db->get('tbl_poli');

             $this->load->view('jenis/tambah_jenis',$d);

    }

    public function ubah()
    {
        if($this->session->userdata('logged_in')!="" )
        {
            $id['id_jenis'] = $this->uri->segment(3);
            $q = $this->db->get_where("jenis_organisasi",$id);
            $d = array();

            foreach($q->result() as $dt)
            {
                $d['id_param'] = $dt->id_jenis;
                $d['jenis_organisasi'] = $dt->jenis_organisasi;
                $d['keterangan'] = $dt->keterangan;
                $d['foto'] = $dt->foto;


            }

                $d['st'] = "edit";


                $this->load->view('jenis/ubah_jenis',$d);
        }
        else
        {
            redirect(site_url('jenis_organisasi'));
        }
    }

    public function hapus($id) 
    {
        $row = $this->Jenis_model->get_by_id($id);

        if ($row) {
            $this->Jenis_model->delete($id);
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(site_url('jenis_organisasi'));
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data tidak ditemukan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(site_url('jenis_organisasi'));
        }
    }

    public function simpan()
    {
        if($this->session->userdata('logged_in')!="" )
        {

            
            $this->form_validation->set_rules('jenis_organisasi', 'Jenis organisasi', 'trim|required');


            
            $id['id_jenis'] = $this->input->post("id_param");
            $st_frame = $this->input->post("frame");
            
            if ($this->form_validation->run() == FALSE)
            {
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $q = $this->db->get_where("jenis_organisasi",$id);
                    $d = array();
                    foreach($q->result() as $dt)
                    {
                        $d['id_param'] = $dt->id_jenis;
                        $d['jenis_organisasi'] = $dt->jenis_organisasi;
                        $d['keteranan'] = $dt->keterangan;  
                        $d['foto'] = $dt->foto;

                        $d['st'] = "edit";

                    }
                        $d['st'] = $st;

                        $this->load->view('jenis/tambah_jenis',$d);
                }
                else if($st=="tambah")
                {
                    $d['id_param'] = "";
                    $d['jenis_organisasi']= "";
                    $d['keterangan'] = "";  
                    $d['foto'] = "";     
                    
                    $d['st'] = $st;


                    $this->load->view('jenis/tambah_jenis',$d);
                }
            }
            else
            {
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $upd['jenis_organisasi'] = $this->input->post('jenis_organisasi');
                    $upd['keterangan'] = $this->input->post('keterangan');
                    $upd['foto'] = $this->input->post('foto');

                    
                    $this->db->update("jenis_organisasi",$upd,$id);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect(site_url('data_jenis'));
                }
                else if($st=="tambah")
                {
                    $in['jenis_organisasi'] = $this->input->post('jenis_organisasi');
                    $in['keterangan'] = $this->input->post('keterangan');
                    //$in['foto'] = $this->input->post('foto');

               if(!empty($_FILES['userfile']['name']))
          {
            $acak=rand(00000000000,99999999999);
            $bersih=$_FILES['userfile']['name'];
            $nm=str_replace(" ","_","$bersih");
            $pisah=explode(".",$nm);
            $nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
            $nama_murni=date('Ymd-His');
            $ekstensi_kotor = $pisah[1];
            
            $file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
            $file_type_baru = strtolower($file_type);
            
            $ubah=$nama_murni; //tanpa ekstensi
            $n_baru = $ubah.'.'.$file_type_baru;
            
            $config['upload_path']  = "./assets/file_jenis/";
            $config['allowed_types']= 'gif|jpg|png|jpeg|pdf';
            $config['file_name'] = $n_baru;
            $config['max_size']     = '0';
            $config['max_width']    = '0';
            $config['max_height']   = '0';
         
            $this->load->library('upload', $config);
         
            if ($this->upload->do_upload("userfile")) {
              $data   = $this->upload->data();
         
              /* PATH */
              $source             = "./assets/file_jenis/".$data['file_name'] ;
              $destination_thumb  = "./assets/file_jenis/thumb/" ;
              $destination_medium = "./assets/file_jenis/medium/" ;
         
              // Permission Configuration
              chmod($source, 0777) ;
         
              /* Resizing Processing */
              // Configuration Of Image Manipulation :: Static
              $this->load->library('image_lib') ;
              $img['image_library'] = 'GD2';
              $img['create_thumb']  = TRUE;
              $img['maintain_ratio']= TRUE;
         
              /// Limit Width Resize
              $limit_medium   = 425 ;
              $limit_thumb    = 220 ;
         
              // Size Image Limit was using (LIMIT TOP)
              $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
         
              // Percentase Resize
              if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                $percent_medium = $limit_medium/$limit_use ;
                $percent_thumb  = $limit_thumb/$limit_use ;
              }
         
              //// Making THUMBNAIL ///////
              $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
              $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
         
              // Configuration Of Image Manipulation :: Dynamic
              $img['thumb_marker'] = '';
              $img['quality']      = '100%' ;
              $img['source_image'] = $source ;
              $img['new_image']    = $destination_thumb ;
         
              // Do Resizing
              $this->image_lib->initialize($img);
              $this->image_lib->resize();
              $this->image_lib->clear() ;
         
              ////// Making MEDIUM /////////////
              $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
              $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
         
              // Configuration Of Image Manipulation :: Dynamic
              $img['thumb_marker'] = '';
              $img['quality']      = '100%' ;
              $img['source_image'] = $source ;
              $img['new_image']    = $destination_medium ;
              
              $in['foto'] = $data['file_name'];
         
              // Do Resizing
              $this->image_lib->initialize($img);
              $this->image_lib->resize();
              $this->image_lib->clear() ;
            }
          }
                                    
                                    
                    $this->db->insert("jenis_organisasi",$in);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect(site_url('jenis_organisasi'));
                }
            
            }
        }
        else
        {
            redirect(site_url('dashboard_admin'));
        }
    }

}

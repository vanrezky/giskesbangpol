<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Lokasiorganisasi_model');
    $this->load->library(array('googlemaps','session','form_validation','pagination'));

    
    
    //$this->load->library('googlemaps');

  }

  public function index() {
     if($this->session->userdata('logged_in')!="")
    {

      $data['lokasi'] = $this->Lokasiorganisasi_model->tampil_data();

$d = array();
    $d['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_organisasi,a.nama_pemimpin,a.alamat,a.telp,a.foto,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=b.id_jenis");
   
    $this->load->view('lokasi/lokasi',$d);


  }

    else
    {
      redirect('dashboard/logout');
    }
  }

    public function export()
  {
    if($this->session->userdata('logged_in')!="" )
    {
      $id_organisasi = $this->session->userdata('id_organisasi');

      $d['awal'] = $this->db->query("SELECT * FROM lokasi_organisasi WHERE id_organisasi='$id_organisasi' GROUP BY id_organisasi");

      //$d['data_pd'] = $this->db->query("SELECT *,TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS umur FROM sekolah a, siswa b, agama c, jurusan d, tingkat e WHERE a.npsn=b.npsn AND b.id_agama = c.id_agama AND b.id_jurusan = d.id_jurusan AND b.kode_siswa=b.kode_siswa AND b.id_tingkat=e.id_tingkat AND a.npsn='$npsn' AND b.id_tapel='$id_tapel' AND b.id_status=1 GROUP BY b.kode_siswa ORDER BY b.id_tingkat,b.nama_siswa ASC");
      
      $this->load->view('lokasi/export',$d);
    }
    else
    {
      redirect('lokasi');
    }
  }


    public function lsm() {
     if($this->session->userdata('logged_in')!="") 
    {

    $data = array();
      $data['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_organisasi,a.foto,a.nama_pemimpin,a.foto,a.telp,a.alamat,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=2 GROUP BY a.id_organisasi");

   
    $this->load->view('lokasi/data_lsm',$data);


  }

    else 
    {
      redirect('dashboard/logout');
    }
  }

public function yayasan() {
     if($this->session->userdata('logged_in')!="") 
    {

    $data = array();
      $data['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_organisasi,a.foto,a.nama_pemimpin,a.foto,a.telp,a.alamat,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=4 GROUP BY a.id_organisasi");

   
    $this->load->view('lokasi/data_yayasan',$data);


  }

    else 
    {
      redirect('dashboard/logout');
    }
  }

public function perkumpulan() {
     if($this->session->userdata('logged_in')!="") 
    {

    $data = array();
      $data['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_organisasi,a.foto,a.nama_pemimpin,a.foto,a.telp,a.alamat,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=3 GROUP BY a.id_organisasi");

   
    $this->load->view('lokasi/data_perkumpulan',$data);


  }

    else 
    {
      redirect('dashboard/logout');
    }
  }

public function ormas() {
     if($this->session->userdata('logged_in')!="") 
    {

    $data = array();
      $data['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_organisasi,a.foto,a.nama_pemimpin,a.foto,a.telp,a.alamat,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=1 GROUP BY a.id_organisasi");

   
    $this->load->view('lokasi/data_ormas',$data);


  }

    else 
    {
      redirect('dashboard/logout');
    }
  }

public function detail_data()
    {
        if($this->session->userdata('logged_in')!="" )
        {
            $id['id_organisasi'] = $this->uri->segment(3);
            $q = $this->db->get_where("lokasi_organisasi",$id);
            $d = array();

            foreach($q->result() as $dt)
            {
                $d['id_param'] = $dt->id_organisasi;
                $d['nama_organisasi'] = $dt->nama_organisasi;       
                $d['nama_pemimpin'] = $dt->nama_pemimpin;
                $d['id_jenis'] = $dt->id_jenis;
                $d['latitude'] = $dt->latitude;
                $d['longitude'] = $dt->longitude;
                $d['alamat'] = $dt->alamat;
                $d['telp'] = $dt->telp;
                $d['foto'] = $dt->foto;
                $config['map_div_id'] = "map-add";
                $config['map_height'] = "250px";
                $config['center'] = $dt->latitude.','.$dt->longitude;
                $config['zoom'] = '14';
                $config['map_height'] = '300px;';
                $this->googlemaps->initialize($config);

                $marker = array();
                $marker['position'] = $dt->latitude.','.$dt->longitude;
                $marker['draggable'] = false;
                $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
                $this->googlemaps->add_marker($marker);
                $d['map'] = $this->googlemaps->create_map();

            }
             

                $d['st'] = "edit";
                

                $d['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_organisasi,a.foto,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=b.id_jenis");
                
                $d['mst_jenis']=$this->db->get('jenis_organisasi');

                $this->load->view('lokasi/detail_data',$d);
        }
        else
        {
            redirect(site_url('dashboard'));
        }
    }


  public function tambah()
    {

    

            $d['id_param'] = "";
            $d['nama_organisasi'] = "";       
            $d['nama_pemimpin'] = "";
            $d['id_jenis'] = "";
            $d['latitude'] = "";
            $d['longitude'] = "";
            $d['alamat'] = "";
            $d['telp'] = "";
            $d['foto'] = "";
            $d['st'] = "tambah";
            

            $d['mst_jenis']=$this->db->get('jenis_organisasi');
            $config = array();
            $config['onboundschanged'] = 'if (!centreGot) {
              var mapCentre = map.getCenter();
              marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()),

              });
            }
            centreGot = true;';               
            $config['map_div_id'] = "map-add";
            $config['map_height'] = "250px";
            $config['center'] = 'auto';
            $config['zoom'] = '12';
            $config['map_height'] = '600px;';
            $config['onclick'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';

            $this->googlemaps->initialize($config);

            $marker = array();
            $marker['draggable'] = true;
            $marker['animation'] = 'blank';
            $marker['infowindow_content'] = '<div class="media">';
            $marker['infowindow_content'] .= '<p>Posisi Kamu Sekarang</p>';

            $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
            $this->googlemaps->add_marker($marker);
            $d['map'] = $this->googlemaps->create_map();

$this->load->view('lokasi/tambah',$d);

  }

    public function ubah()
    {
        if($this->session->userdata('logged_in')!="" )
        {
            $id['id_organisasi'] = $this->uri->segment(3);
            $q = $this->db->get_where("lokasi_organisasi",$id);
            $d = array();

            //$p['lokasi_organisasi'] = $this->Peta_model->getLokasi($param);


            foreach($q->result() as $dt)
            {
                $d['id_param'] = $dt->id_organisasi;
                $d['nama_organisasi'] = $dt->nama_organisasi;       
                $d['nama_pemimpin'] = $dt->nama_pemimpin;
                $d['id_jenis'] = $dt->id_jenis;
                $d['latitude'] = $dt->latitude;
                $d['longitude'] = $dt->longitude;
                $d['alamat'] = $dt->alamat;
                $d['telp'] = $dt->telp;
                $d['foto'] = $dt->foto;


               $config['map_div_id'] = "map-add";
               $config['map_height'] = "250px";
               $config['center'] = $dt->latitude.','.$dt->longitude;
               $config['zoom'] = '14';
               $config['map_height'] = '300px;';
               $this->googlemaps->initialize($config);

              $marker = array();
              $marker['position'] = $dt->latitude.','.$dt->longitude;
              $marker['draggable'] = true;
              $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
              $this->googlemaps->add_marker($marker);
              $d['map'] = $this->googlemaps->create_map();

            }
             

                $d['st'] = "edit";
                

                $d['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_organisasi,a.foto,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=b.id_jenis");

                $d['mst_jenis']=$this->db->get('jenis_organisasi');

            

                $this->load->view('lokasi/ubah',$d);
        }
        else
        {
            redirect(site_url('dashboard'));
        }
    }

    public function hapus($id) 
    {
        $row = $this->Lokasiorganisasi_model->get_by_id($id);

        if ($row) {
            $this->Lokasiorganisasi_model->delete($id);
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(site_url('lokasi'));
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Data tidak ditemukan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect(site_url('lokasi'));
        }
    }

    public function simpan()
    {
        if($this->session->userdata('logged_in')!="" )
        {
            
            $this->form_validation->set_rules('nama_organisasi', 'Nama Organisasi', 'trim|required');


            
            $id['id_organisasi'] = $this->input->post("id_param");
            $st_frame = $this->input->post("frame");
            
            if ($this->form_validation->run() == FALSE)
            {
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $q = $this->db->get_where("lokasi_organisasi",$id);
                    $d = array();
                    foreach($q->result() as $dt)
                    {
                        $d['id_param'] = $dt->id_organisasi;
                        $d['nama_organisasi'] = $dt->nama_organisasi;       
                        $d['nama_pemimpin'] = $dt->nama_pemimpin;
                        $d['id_jenis'] = $dt->id_jenis;
                        $d['latitude'] = $dt->latitude;
                        $d['longitude'] = $dt->longitude;
                        $d['alamat'] = $dt->alamat;
                        $d['telp'] = $dt->telp;
                        $d['foto'] = $dt->foto;
                        $d['st'] = "edit";

                    }
                        $d['st'] = $st;

                        $this->load->view('lokasi',$d);
                }
                else if($st=="tambah")
                {
                    $d['id_param'] = "";
                    $d['nama_pemimpin'] = "";
                    $d['jenis_organisasi'] = "";
                    $d['latitude'] = "";
                    $d['longitude'] = "";
                    $d['alamat'] = "";
                    $d['telp'] = "";
                    $d['foto'] = "";      
                    
                    $d['st'] = $st;



                    $this->load->view('tambah',$d);
                }
            }
            else
            {
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $upd['nama_organisasi'] = $this->input->post('nama_organisasi');
                    $upd['nama_pemimpin'] = $this->input->post('nama_pemimpin');
                    $upd['id_jenis'] = $this->input->post('id_jenis');
                    $upd['latitude'] = $this->input->post('latitude');
                    $upd['longitude'] = $this->input->post('longitude');
                    $upd['alamat'] = $this->input->post('alamat');
                    $upd['telp'] = $this->input->post('telp');
                    $upd['tanggal_update'] = date('Y-m-d');
                    //$upd['foto'] = $this->input->post('foto');
                   
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
            
            $config['upload_path']  = "./assets/file_foto/";
            $config['allowed_types']= 'gif|jpg|png|jpeg|pdf';
            $config['file_name'] = $n_baru;
            $config['max_size']     = '0';
            $config['max_width']    = '0';
            $config['max_height']   = '0';
         
            $this->load->library('upload', $config);
         
            if ($this->upload->do_upload("userfile")) {
              $data   = $this->upload->data();
         
              /* PATH */
              $source             = "./assets/file_foto/".$data['file_name'] ;
              $destination_thumb  = "./assets/file_foto/thumb/" ;
              $destination_medium = "./assets/file_foto/medium/" ;
         
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
              
              $upd['foto'] = $data['file_name'];
         
              // Do Resizing
              $this->image_lib->initialize($img);
              $this->image_lib->resize();
              $this->image_lib->clear() ;
            }
          }

                    $this->db->update("lokasi_organisasi",$upd,$id);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect(site_url('lokasi'));
                }
                else if($st=="tambah")
                {
                    $in['nama_organisasi'] = $this->input->post('nama_organisasi');
                    $in['nama_pemimpin'] = $this->input->post('nama_pemimpin');
                    $in['id_jenis'] = $this->input->post('id_jenis');
                    $in['latitude'] = $this->input->post('latitude');
                    $in['longitude'] = $this->input->post('longitude');
                    $in['alamat'] = $this->input->post('alamat');
                    $in['telp'] = $this->input->post('telp');
                    $in['tanggal_update'] = date('Y-m-d');
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
            
            $config['upload_path']  = "./assets/file_foto/";
            $config['allowed_types']= 'gif|jpg|png|jpeg|pdf';
            $config['file_name'] = $n_baru;
            $config['max_size']     = '0';
            $config['max_width']    = '0';
            $config['max_height']   = '0';
         
            $this->load->library('upload', $config);
         
            if ($this->upload->do_upload("userfile")) {
              $data   = $this->upload->data();
         
              /* PATH */
              $source             = "./assets/file_foto/".$data['file_name'] ;
              $destination_thumb  = "./assets/file_foto/thumb/" ;
              $destination_medium = "./assets/file_foto/medium/" ;
         
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
                                    
                    $this->db->insert("lokasi_organisasi",$in);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect(site_url('lokasi'));
                }
            
            }
        }
        else
        {
            redirect(site_url('template'));
        }
    }

}

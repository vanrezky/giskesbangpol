<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Lokasiorganisasi_model');
		$this->load->library(array('googlemaps'));
			
}


public function index()
    {
        $d['lokasi'] = $this->Lokasiorganisasi_model->tampil_data();
        //$d['lokasi'] = $this->db->query("SELECT * FROM lokasi_organisasi ORDER BY id_organisasi ASC Limit 7 ");

    $data = array();
    $data['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_organisasi,a.foto,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=b.id_jenis");

            $this->data['title'] = "SISTEM INFORMASI GIS";
        $config['center'] = 'auto';
        $config['zoom'] = 'auto';
        $config['map_height'] = '900';

        $config['styles'] = array(
            array(
                "name"=>"Businesses", 
                "definition"=> array(
                    array(
                        "featureType"=>"poi", 
                        "elementType" => 
                        "business", 
                        "stylers"=> array(
                            array(
                                "visibility"=>"off"
                            )
                        )
                    )
                )
            )
        );
        $this->googlemaps->initialize($config);
        foreach($this->searchQuery() as $key => $value) :
        $marker = array();
        $marker['position'] = "{$value->latitude}, {$value->longitude}";
        $marker['animation'] = 'DROP';
        $marker['infowindow_content'] = '<div class="media" style="width:400px;">';
        $marker['infowindow_content'] .= '<div class="media-left">';
        $marker['infowindow_content'] .= '<img src="'.base_url("assets/file_foto/{$value->foto}").'" class="media-object" style="width:150px">';
        $marker['infowindow_content'] .= '</div>';
        $marker['infowindow_content'] .= '<div class="media-body">';
        $marker['infowindow_content'] .= '<h4 class="media-heading">'.$value->nama_organisasi.'</h4>';
        $marker['infowindow_content'] .= '<p>Nama Pemimpin : <strong>'.$value->nama_pemimpin.'</strong></p>';
        $marker['infowindow_content'] .= '<p>Latitude : <strong>'.$value->latitude.'</strong></p>';
        $marker['infowindow_content'] .= '<p>Longitude : <strong>'.$value->longitude.'</strong></p>';
        $marker['infowindow_content'] .= '<p>Telepon : <strong>'.$value->telp.'</strong></p>';
        $marker['infowindow_content'] .= '<a href="#"  class="btn find_route_button">Find a Route</a>';
        $marker['icon'] = base_url("assets/dist/icon/villa.png");

        $this->googlemaps->add_marker($marker);
        endforeach;
        
        $d['map'] = $this->googlemaps->create_map();
        $this->load->view('front-end', $d);
        
        }

    public function searchQuery()
    {
        $this->db->select('lokasi_organisasi.*, jenis_organisasi.id_jenis as category');

        $this->db->join('jenis_organisasi', 'lokasi_organisasi.id_jenis = jenis_organisasi.id_jenis', 'left');

        if($this->input->get('q') != '')
            $this->db->like('lokasi_organisasi.nama_organisasi', $this->input->get('q'));

        $this->db->where('lokasi_organisasi.latitude !=', NULL)
                 ->where('lokasi_organisasi.longitude !=', NULL);

        return $this->db->get("lokasi_organisasi")->result();
    }


	public function kontak()
	{
		$d['id_param'] = "";
        $d['nama'] = "";       
        $d['email'] = "";
        $d['subject'] = "";
        $d['pesan'] = "";
        $d['st'] = "tambah";

		$this->load->view('front_end/kontak',$d);

	}

    public function simpan()
    {
            
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required');


            
            $id['id'] = $this->input->post("id_param");
            $st_frame = $this->input->post("frame");
            
            if ($this->form_validation->run() == FALSE)
            {
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $q = $this->db->get_where("kontak",$id);
                    $d = array();
                    foreach($q->result() as $dt)
                    {
                        $d['id_param'] = $dt->id;
                        $d['nama'] = $dt->nama;
                        $d['email'] = $dt->email;
                        $d['subject'] = $dt->subject;    
                        $d['pesan'] = $dt->pesan;
                        $d['st'] = "edit";

                    }
                        $d['st'] = $st;

                        $this->load->view('front_end/kontak',$d);
                }
                else if($st=="tambah")
                {
                    $d['id_param'] = "";
                    $d['nama']= "";
                    $d['email'] = "";  
                    $d['subject'] = "";     
                    $d['pesan'] = "";
                    $d['st'] = $st;


                    $this->load->view('front_end/kontak',$d);
                }
            }
            else
            {
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $upd['nama'] = $this->input->post('nama');
                    $upd['email'] = $this->input->post('email');
                    $upd['subject'] = $this->input->post('subject');
                    $upd['pesan'] = $this->input->post('pesan');
                                    
                    $this->db->update("kontak",$upd,$id);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect(site_url('beranda/kontak'));
                }
                else if($st=="tambah")
                {
                    $in['nama'] = $this->input->post('nama');
                    $in['email'] = $this->input->post('email');
                    $in['subject'] = $this->input->post('subject');
                    $in['pesan'] = $this->input->post('pesan');
                    $in['tgl_masuk'] = date('Y-m-d');
                    //$in['foto'] = $this->input->post('foto');
                                    
                    $this->db->insert("kontak",$in);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Terima kasih telah memberikan feedback <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect(site_url('beranda/kontak/'));
                }
            
            }
        }

public function tentang()
{
	$config['map_div_id'] = "map-add";
	    $config['map_height'] = "250px";
	    $config['center'] = '0.5141334,101.3711352';
	    $config['zoom'] = '12';
	    $config['map_height'] = '600px;';
	    $this->googlemaps->initialize($config);

	    $marker = array();
	    $marker['position'] = '0.5137908,101.3711354';
	    $marker['draggable'] = false;
	    $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
	    $marker['animation'] = 'DROP';
		$marker['infowindow_content'] = '<div class="media" style="width:400px;">';
		$marker['infowindow_content'] .= '<div class="media-left">';
		$marker['infowindow_content'] .= '<img src="'.base_url("assets/dist/img/1.png").'" class="media-object" style="width:150px">';
		$marker['infowindow_content'] .= '</div>';
		$marker['infowindow_content'] .= '<div class="media-body">';
		$marker['infowindow_content'] .= '<h4 class="media-heading">Kesbangpol KotaPekanbaru</h4>';
		$marker['infowindow_content'] .= '<p>Nama Pemimpin : <strong>M.Yusuf</strong></p>';
		$marker['infowindow_content'] .= '<p>Telepon : <strong>082268262017</strong></p>';
	    $marker['icon'] = base_url("assets/dist/icon/hostel.png");
	    $this->googlemaps->add_marker($marker);
	    $d['map'] = $this->googlemaps->create_map();

	    $this->load->view('front_end/tentang',$d);
}


	public function datalsm()
	{
		//$d['lokasi'] = $this->Lokasiorganisasi_model->tampil_data();
		//$d['lokasi'] = $this->db->query("SELECT * FROM lokasi_organisasi ORDER BY id_organisasi ASC Limit 7 ");

		$data = array();
    	$data['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_organisasi,a.foto,a.nama_pemimpin,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=1 GROUP BY a.id_organisasi");
    	$data['template'] = $this->db->query("SELECT COUNT(IF(id_jenis=1,0,null)) AS jml_ormas,COUNT(IF(id_jenis=2,0,null)) AS jml_lsm FROM lokasi_organisasi");

		$this->load->view('front_end/datalsm', $data);
		
		}


	public function dataormas()
	{
		//$d['lokasi'] = $this->Lokasiorganisasi_model->tampil_data();
		//$d['lokasi'] = $this->db->query("SELECT * FROM lokasi_organisasi ORDER BY id_organisasi ASC Limit 7 ");

	$data = array();
    	$data['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_organisasi,a.foto,a.nama_pemimpin,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=2 GROUP BY a.id_organisasi");

		$this->load->view('front_end/dataormas', $data);
		
		}

    public function datayayasan()
    {
        //$d['lokasi'] = $this->Lokasiorganisasi_model->tampil_data();
        //$d['lokasi'] = $this->db->query("SELECT * FROM lokasi_organisasi ORDER BY id_organisasi ASC Limit 7 ");

    $data = array();
        $data['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_organisasi,a.foto,a.nama_pemimpin,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=4 GROUP BY a.id_organisasi");

        $this->load->view('front_end/datayayasan', $data);
        
        }

    public function dataperkumpulan()
    {
        //$d['lokasi'] = $this->Lokasiorganisasi_model->tampil_data();
        //$d['lokasi'] = $this->db->query("SELECT * FROM lokasi_organisasi ORDER BY id_organisasi ASC Limit 7 ");

    $data = array();
        $data['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_organisasi,a.foto,a.nama_pemimpin,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=3 GROUP BY a.id_organisasi");

        $this->load->view('front_end/dataperkumpulan', $data);
        
        }

		public function detail_data()
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
                $config['zoom'] = '13';
                $config['map_height'] = '400px;';
                $config['directions'] = true;
    			$config['directionsMode'] = "DRIVING";
    			$config['trafficOverlay'] = TRUE;
                //$config['directionsStart'] = 'auto';
	            //$config['directionsEnd'] = $dt->latitude.','.$dt->longitude;
	            $config['directionsDraggable']= FALSE;
	            $config['directionsDivID'] = 'directionsDiv';
                $this->googlemaps->initialize($config);

                $marker = array();
                $marker['position'] = $dt->latitude.','.$dt->longitude;
                $marker['draggable'] = false;
                $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
                $marker['animation'] = 'DROP';
				$marker['infowindow_content'] = '<div class="media" style="width:400px;">';
				$marker['infowindow_content'] .= '<div class="media-left">';
                $marker['icon'] = base_url("assets/dist/icon/villa.png");
                $marker['infowindow_content'] .= '<img src="'.base_url("assets/file_foto/{$dt->foto}").'" class="media-object" style="width:150px">';
				$marker['infowindow_content'] .= '</div>';
				$marker['infowindow_content'] .= '<div class="media-body">';
				$marker['infowindow_content'] .= '<h4 class="media-heading">'.$dt->nama_organisasi.'</h4>';
				$marker['infowindow_content'] .= '<p>Nama Pemimpin : <strong>'.$dt->nama_pemimpin.'</strong></p>';
				//$marker['infowindow_content'] .= '<a class="btn btn-primary" id= >Find a Route </a>';
		        $this->googlemaps->add_marker($marker);
                $d['map'] = $this->googlemaps->create_map();

            }
             

                $d['st'] = "edit";
                

                $d['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_pemimpin,a.telp,a.nama_organisasi,a.alamat,a.latitude,a.longitude,a.foto,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=b.id_jenis");
                
                $d['mst_jenis']=$this->db->get('jenis_organisasi');

                $this->load->view('front_end/detail_data',$d);
	}


			public function direction()
    {
    	$id['id_organisasi'] = $this->uri->segment(3);
            $q = $this->db->get_where("lokasi_organisasi",$id);
            $d = array();

            foreach($q->result() as $dt)
            {
                $d['id_param'] = $dt->id_organisasi;
                $d['nama_organisasi'] = $dt->nama_organisasi;
                $config['map_div_id'] = "map-add";
                $config['map_height'] = "700px";
                $config['center'] = $dt->latitude.','.$dt->longitude;
                $config['zoom'] = '13';
                $config['directions'] = true;
    			$config['directionsMode'] = "DRIVING";
    			$config['trafficOverlay'] = TRUE;
                $config['directionsStart'] = 'auto';
	            $config['directionsEnd'] = $dt->latitude.','.$dt->longitude;
	            $config['directionsDraggable']= FALSE;
	            $config['directionsDivID'] = 'directionsDiv';
                $this->googlemaps->initialize($config);

                $marker = array();
                $marker['position'] = $dt->latitude.','.$dt->longitude;
                $marker['draggable'] = false;
                $marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
                $marker['animation'] = 'DROP';
                $marker['icon'] = base_url("assets/dist/icon/villa.png");
				//$marker['infowindow_content'] .= '<a class="btn btn-primary" id= >Find a Route </a>';
		        $this->googlemaps->add_marker($marker);
                $d['map'] = $this->googlemaps->create_map();

            }
             

                $d['st'] = "edit";
                

                $d['tampil'] = $this->db->query("SELECT a.id_organisasi,a.nama_pemimpin,a.telp,a.nama_organisasi,a.alamat,a.latitude,a.longitude,a.foto,b.id_jenis,b.jenis_organisasi FROM lokasi_organisasi a, jenis_organisasi b WHERE a.id_jenis=b.id_jenis");
                
                $d['mst_jenis']=$this->db->get('jenis_organisasi');

                $this->load->view('front_end/direction',$d);
	}
}
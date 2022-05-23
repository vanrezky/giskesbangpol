<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Lokasiorganisasi_model');
		$this->load->library(array('googlemaps','session'));
		

	
}

	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$this->data['title'] = "SISTEM INFORMASI GIS";
		$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['styles'] = array(
		  	array(
		  		"name"=>"No Businesses", 
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
		$marker['icon'] = base_url("assets/dist/icon/villa.png");
		$this->googlemaps->add_marker($marker);
		endforeach;

		$this->googlemaps->initialize($config);

		$d['map'] = $this->googlemaps->create_map();

		$d['template'] = $this->db->query("SELECT COUNT(IF(id_jenis=1,0,null)) AS jml_ormas,COUNT(IF(id_jenis=2,0,null)) AS jml_lsm,COUNT(IF(id_jenis=4,0,null)) AS jml_yys,COUNT(IF(id_jenis=3,0,null)) AS jml_pkl FROM lokasi_organisasi");

		$this->load->view('template', $d);
		
		}
		else
		{
			redirect('dashboard/logout');
		}

	}

	public function searchQuery()
	{
		$this->db->select('lokasi_organisasi.*, jenis_organisasi.id_jenis as category');

		$this->db->join('jenis_organisasi', 'lokasi_organisasi.id_jenis = jenis_organisasi.id_jenis', 'left');

		switch ($this->input->get('price')) 
		{
		}

		if( is_array(@$this->input->post('categories')) )
			$this->db->where_in('hotelCategories.category_id', $this->input->post('categories'));

		$this->db->group_by('lokasi_organisasi.id_organisasi');

		if($this->input->get('q') != '')
			$this->db->like('lokasi_organisasi.nama_organisasi', $this->input->get('q'));

		$this->db->where('lokasi_organisasi.latitude !=', NULL)
				 ->where('lokasi_organisasi.longitude !=', NULL);

		return $this->db->get("lokasi_organisasi")->result();
	}
}

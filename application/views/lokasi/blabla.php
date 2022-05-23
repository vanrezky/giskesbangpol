<?php
public function simpan()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('level')=="Admin")
		{
			//$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			//$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			//$d['instansi'] = $this->config->item('nama_instansi');
			//$d['credit'] = $this->config->item('credit_aplikasi');
			//$d['alamat'] = $this->config->item('alamat_instansi');
			
			//$this->form_validation->set_rules('no_agendamasuk', 'No Agenda Surat', 'trim|required');
			$this->form_validation->set_rules('tgl_suratmasuk', 'Tanggal Surat Masuk', 'trim|required');
			$this->form_validation->set_rules('no_suratmasuk', 'No Surat Masuk', 'trim|required');
			$this->form_validation->set_rules('asal_surat', 'Asal Surat', 'trim|required');			
			$this->form_validation->set_rules('no_agendamasuk', 'no agenda masuk', 'required|trim|required|callback_valid_idn');
			//$this->form_validation->set_rules('nomor_sk_pangkat', 'Nomor SK Pangkat', 'trim|required');
			/**$this->form_validation->set_rules('tanggal_sk_pangkat', 'Tanggal SK Pangkat', 'trim|required');
			$this->form_validation->set_rules('id_jabatan', 'Jabatan', 'trim|required');
			$this->form_validation->set_rules('id_unit_kerja', 'Unit Kerja', 'trim|required');
			$this->form_validation->set_rules('id_satuan_kerja', 'Satuan Kerja', 'trim|required');
			$this->form_validation->set_rules('id_sub_unitkerja', 'id_sub_unitkerja Kerja', 'trim|required');
			$this->form_validation->set_rules('nomor_sk_jabatan', 'Nomor SK Jabatan', 'trim|required');
			$this->form_validation->set_rules('tanggal_sk_jabatan', 'Tanggal SK Jabatan', 'trim|required');**/

			
			$id['id_suratmasuk'] = $this->input->post("id_param");
			$st_frame = $this->input->post("frame");
			
			if ($this->form_validation->run() == FALSE)
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$q = $this->db->get_where("surat_masuk",$id);
					$d = array();
					foreach($q->result() as $dt)
					{
						$d['id_param'] = $dt->id_suratmasuk;
						$d['no_agendamasuk'] = $dt->no_agendamasuk;
						$d['asal_surat'] = $dt->asal_surat; 
						$d['no_suratmasuk'] = $dt->no_suratmasuk;
						$d['perihal_suratmasuk'] = $dt->perihal_suratmasuk;
						$d['tgl_suratmasuk'] = $dt->tgl_suratmasuk;
						$d['foto'] = $dt->foto;
						$d['catatan'] = $dt->catatan;



						$d['st'] = "edit";

					}

					$d['st'] = $st;

					$this->template->load('dashboard_admin/template','dashboard_admin/surat_masuk/ubah',$d);
				}
				else if($st=="tambah")
				{
					$d['id_param'] = "";
					$d['no_agendamasuk'] = ""; 
					//$d['no_kontrol'] = ""; 
					$d['asal_surat'] = ""; 
					$d['no_suratmasuk'] = "";
					$d['perihal_suratmasuk'] = "";
					$d['tgl_suratmasuk'] = "";
					$d['tgl_suratditerima'] = date('Y-m-d');
					$d['foto'] = "";
					$d['catatan'] = "";

					$d['st'] = "tambah";

					$d['maxkode_surat'] = $this->Kode_model->get_kode_surat(); 
					$this->template->load('dashboard_admin/template','dashboard_admin/surat_masuk/tambah',$d);
				}
			}
			else
			{
				$st = $this->input->post('st');
				if($st=="edit")
				{
					$upd['no_agendamasuk'] = $this->input->post('no_agendamasuk');
					//$upd['no_kontrol'] = $this->input->post('no_kontrol');
					$upd['asal_surat'] = $this->input->post('asal_surat');
					$upd['no_suratmasuk'] = $this->input->post('no_suratmasuk');
					$upd['perihal_suratmasuk'] = $this->input->post('perihal_suratmasuk');
					$upd['tgl_suratmasuk'] = $this->input->post('tgl_suratmasuk');
					$upd['tgl_suratditerima'] = $this->input->post('tgl_suratditerima');
					$upd['tgl_prosesnaik'] = $this->input->post('tgl_prosesnaik');	
					$upd['catatan'] = $this->input->post('catatan');	
					$upd['id_ruang'] = $this->input->post('id_ruang');	
					$upd['tahun'] = date('Y');

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
						
						$ubah=$acak.'-'.$nama_murni; //tanpa ekstensi
						$n_baru = $ubah.'.'.$file_type_baru;
						
						$config['upload_path']	= "./assets/file_surat/";
						$config['allowed_types']= 'gif|jpg|png|jpeg|pdf';
						$config['file_name'] = $n_baru;
						$config['max_size']     = '0';
						$config['max_width']  	= '0';
						$config['max_height']  	= '0';
				 
						$this->load->library('upload', $config);
				 
						if ($this->upload->do_upload("userfile")) {
							$data	 	= $this->upload->data();
				 
							/* PATH */
							$source             = "./assets/file_surat/".$data['file_name'] ;
							$destination_thumb	= "./assets/file_surat/thumb/" ;
							$destination_medium	= "./assets/file_surat/medium/" ;
				 
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
					
					$this->db->update("surat_masuk",$upd,$id);
					
				
					header("location:".base_url()."surat_masuk/index"."");
				}
				else if($st=="tambah")
				{
					$in['no_agendamasuk'] = $this->input->post('no_agendamasuk');
					$in['asal_surat'] = $this->input->post('asal_surat');
					$in['no_suratmasuk'] = $this->input->post('no_suratmasuk');
					$in['perihal_suratmasuk'] = $this->input->post('perihal_suratmasuk');
					$in['tgl_suratmasuk'] = $this->input->post('tgl_suratmasuk');
					$in['tgl_suratditerima'] = date('Y-m-d');
					$in['catatan'] = $this->input->post('catatan');
					//$in['id_ruang'] = $this->input->post('id_ruang');
					$in['id_user'] = $this->session->userdata('id_user');	
					$in['tahun'] = date('Y');

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
						
						$config['upload_path']	= "./assets/file_surat/";
						$config['allowed_types']= 'gif|jpg|png|jpeg|pdf';
						$config['file_name'] = $n_baru;
						$config['max_size']     = '0';
						$config['max_width']  	= '0';
						$config['max_height']  	= '0';
				 
						$this->load->library('upload', $config);
				 
						if ($this->upload->do_upload("userfile")) {
							$data	 	= $this->upload->data();
				 
							/* PATH */
							$source             = "./assets/file_surat/".$data['file_name'] ;
							$destination_thumb	= "./assets/file_surat/thumb/" ;
							$destination_medium	= "./assets/file_surat/medium/" ;
				 
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
					
					$this->db->insert("surat_masuk",$in);
					
					redirect('admin/surat_masuk');
				}
			
			}
		}
		else
		{
			redirect('admin/surat_masuk');
		}
	}
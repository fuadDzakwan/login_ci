<?php	
defined('BASEPATH') OR exit('No direct script access allowed');

        class User extends CI_Controller
        {

        	public function __construct()
        	{
        		parent::__construct();
        		is_logged_in();
        	}
            
            public function index()
            {
                $data['user'] = $this->db->get_where('user',[
                    'email' => $this->session->userdata('email')])->row_array();
                $data['tittle'] = 'Beranda Ku';
                $this->load->view('templates/user_header',$data);
                $this->load->view('templates/user_sidebar',$data);
                $this->load->view('templates/user_topbar',$data);
                $this->load->view('user/index',$data);
                $this->load->view('templates/user_footer');
            }

            public function edit()
            {
                $data['tittle'] = 'Edit Profile';
            	$data['user'] = $this->db->get_where('user',[
                    'email' => $this->session->userdata('email')])->row_array();

            	$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

            	if ( $this->form_validation->run() == false ) 
            	{
            		
	                $this->load->view('templates/user_header',$data);
	                $this->load->view('templates/user_sidebar',$data);
	                $this->load->view('templates/user_topbar',$data);
	                $this->load->view('user/edit',$data);
	                $this->load->view('templates/user_footer');	

            	} 
            	else 
            	{
            		$name = $this->input->post('name');
            		$email = $this->input->post('email');

            		// cek img upload
            		$upload_image = $_FILES['image']['name'];

            		// ci library
            		if ( $upload_image ) {
            			$config['allowed_types'] = 'jpg|png';
            			$config['max_size']		 = '2048';
            			$config['upload_path']	 = './assets/img/profile/';

            			// load
            			$this->load->library('upload',$config);

            			// success
            			if ( $this->upload->do_upload('image') ) {

            				// delete old image but not default image
            				$old_image = $data['user']['image'];
            				if ( $old_image != 'default.jpg' ) {
            					unlink(FCPATH . 'assets/img/profile/' . $old_image);
            				}

            				// new image
            				$new_image = $this->upload->data('file_name');
            				$this->db->set('image',$new_image);
            			} 
            			else 
            			{
            				echo $this->upload->display_errors();
            			}
            		}
            		
            		$this->db->set('name', $name);	
            		$this->db->where('email', $email);
            		$this->db->update('user');

            		$this->session->set_flashdata('Message','<div class="alert alert-success" role="alert">Profile Updated!</div>');
            		redirect('user');
            	}

            }

        }	          
	
	
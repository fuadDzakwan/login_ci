<?php	
defined('BASEPATH') OR exit('No direct script access allowed');

    /**
         * 
         */
        class Menu extends CI_Controller
        {
        	public function __construct()
        	{
        		parent::__construct();
        		is_logged_in();
        	}
            
            public function index()
            {
                $data['user'] = $this->db->get_where('user',
               		['email' => $this->session->userdata('email')])->row_array();

                $data['menu'] = $this->db->get('user_menu')->result_array();

                $this->form_validation->set_rules('menu','Menu','required');

                if ( $this->form_validation->run() == false) {
                	
                	$data['tittle'] = 'Menu Management';
	                $this->load->view('templates/user_header',$data);
	                $this->load->view('templates/user_sidebar',$data);
	                $this->load->view('templates/user_topbar',$data);
	                $this->load->view('menu/index',$data);
	                $this->load->view('templates/user_footer');	
                }
                	else {

                		$this->db->insert('user_menu',['menu' => $this->input->post('menu')]);
            			$this->session->set_flashdata('Message','<div class="alert alert-success" role="alert">New Menu Added!</div>');
						redirect('menu');
                	}

                
            }

            public function submenu()
            {

            	$data['tittle'] = 'Submenu Management';
            	$data['user'] = $this->db->get_where('user',
               		['email' => $this->session->userdata('email')])->row_array();
                $this->load->model('Menu_Model','menu'); // menggunakan alias

                $data['subMenu'] = $this->menu->getSubMenu();
                $data['menu'] = $this->db->get('user_menu')->result_array();

                $this->form_validation->set_rules('tittle','Tittle','required');
                $this->form_validation->set_rules('menu_id','Menu','required');
                $this->form_validation->set_rules('url','URL','required');
                $this->form_validation->set_rules('icon','Icon','required');

                if ( $this->form_validation->run() == false ) {
                	
	                	$this->load->view('templates/user_header',$data);
			            $this->load->view('templates/user_sidebar',$data);
			            $this->load->view('templates/user_topbar',$data);
			            $this->load->view('menu/submenu',$data);
			            $this->load->view('templates/user_footer'); 
                }
                	else {

                		$data = [

                			'tittle' => $this->input->post('tittle'),
                			'menu_id' => $this->input->post('menu_id'),
                			'url' => $this->input->post('url'),
                			'icon' => $this->input->post('icon'),
                			'is_active' => $this->input->post('is_active')
                		];

                		$this->db->insert('user_sub_menu',$data);
                		$this->session->set_flashdata('Message','<div class="alert alert-success" role="alert">New Submenu Added!</div>');
						redirect('menu/submenu');
                	}

                
            }














        }	          
	
<?php	
defined('BASEPATH') OR exit('No direct script access allowed');

    /**
         * 
         */
        class Menu extends CI_Controller
        {
            
            public function index()
            {
                $data['user'] = $this->db->get_where('user',
               		['email' => $this->session->userdata('email')])->row_array();

                $data['menu'] = $this->db->get('user_menu')->result_array();

                $data['tittle'] = 'Menu Management';
                $this->load->view('templates/user_header',$data);
                $this->load->view('templates/user_sidebar',$data);
                $this->load->view('templates/user_topbar',$data);
                $this->load->view('menu/index',$data);
                $this->load->view('templates/user_footer');
            }













        }	          
	
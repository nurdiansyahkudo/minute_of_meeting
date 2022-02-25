<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url', 'form', 'session');
        $this->load->model('User_model');

        // Load form validation library
        $this->load->library('form_validation');
    }    

    public function index()
    {
        $data['title'] = 'Login MoM';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');

        if($this->session->userdata('is_login')==TRUE)
          {
          redirect('MoM','refresh');
          }
    }
    
    public function login()
    {
        
        $this->form_validation->set_rules('nik', 'Nik', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
    	
            if($this->User_model->nik_check()->num_rows()==1) {
            
               $db=$this->User_model->nik_check()->row();

               if(password_verify($this->input->post('password'),$db->password)) {
  
                       $data_login=array('is_login'=>TRUE,
                                'nik'   => $db->nik,
                                'password' => $db->password);
               
                       $this->session->set_userdata($data_login);
                       redirect('MoM/dashboard','refresh');
  
                          } else {
                              
                            $_SESSION['pesan'] = "Login Gagal";
                          
                            $this->session->mark_as_flash('pesan');
                            redirect('Auth','refresh');
  
                          }
  
            } else { // jika username tidak terdaftar!
             
             $this->session->set_flashdata('pesan', 'Login gagal: username salah!');
             redirect('Auth','refresh');
  
            }
  
      } else { 
  
          redirect('Auth');
      }  
    }

    public function logout() {

        // Removing session data
        $this->session->sess_destroy();
        redirect('Auth','refresh');
    }
}

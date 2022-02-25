<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoM extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url','session');
        $this->load->model('Mom_model');
        // ini_set('display_errors','off');
        
    }

    public function dashboard()
	{
        $data['title'] = 'Dashboard';
        $data['dash'] = $this->Mom_model->dash_issue();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
		$this->load->view('input_mom/dashboard');
        $this->load->view('templates/footer');
	}

    public function index() // Meeting List
    {

          $data['title'] = 'Meeting List';
          $data['meet'] = $this->Mom_model->read();
    
          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('input_mom/index', $data);
          $this->load->view('templates/footer');

    }

    public function meeting_issues($id)
    {
        $data['id'] = $id;

        $data['title'] = 'Issues';
        $data['issue'] = $this->Mom_model->read_issue($id);
        $data['listIssue'] = $this->Mom_model->list_issue($id);
        //var_dump($data);exit;
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input_mom/issues', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() // Input Data Meeting
    {
          $data['title'] = 'Input MoM';
          $data['site'] = $this->Mom_model->getSite();
          $data['type'] = $this->Mom_model->getType();
          $data['chair'] = $this->Mom_model->getChair();
          $data['venue'] = $this->Mom_model->getVenue();
          $data['notulen'] = $this->Mom_model->getNotulen();
          $data['entrant'] = $this->Mom_model->getEntrant();

          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('input_mom/tambah', $data);
          $this->load->view('templates/footer');
    }

    public function addIssues($id) // Input Issues
    {
          $data['data'] = $this->Mom_model->get_row($id)->row();

          $data['title'] = 'Add Issues';
          $data['id'] = $id;
          $data['pic'] = $this->Mom_model->getPIC($data['data']->site);

          $this->load->view('templates/header', $data);
          $this->load->view('templates/sidebar', $data);
          $this->load->view('templates/topbar', $data);
          $this->load->view('input_mom/add_issues', $data);
          $this->load->view('templates/footer');
    }

    public function simpandata() // Tombol Submit Form Input
    {
        if(isset($_POST["submit"])){
            
            $hasil = $this->Mom_model->create();
            // var_dump($hasil);exit;
            if($hasil){
                $this->Mom_model->send_mail();
                $_SESSION['pesan'] = "Ditambah";
            }
            else {
                $_SESSION['pesan'] = "Salahsimpan";
            }

            $this->session->mark_as_flash('pesan');
        }
        redirect('MoM');
    }

    public function simpanissue($id) // Tombol Submit Form add issues
    {
        if(isset($_POST["submit_issue"])){
            
            $hasil = $this->Mom_model->createIssue($id);
            // var_dump($hasil);exit;
        }
        redirect('MoM/meeting_issues/'.$id);
    }

    public function tambahpeserta() // Tombol Tambah Peserta
    {

        if(isset($_POST["addlist"])){
            
            $hasil = $this->Mom_model->addPeserta();
        }

    }

    public function hapusdata($id) // Hapus Data Meeting List
    {
        $hasil = $this->Mom_model->delete($id);
            if($hasil){
                $_SESSION['pesan'] = "Dihapus";
            }
            else {
                $_SESSION['pesan'] = "Salahhapus";
            }
            
            $this->session->mark_as_flash('pesan');
        redirect('MoM');
    }

    public function editdata($id) // Edit Data Meeting
    {
        $data['data'] = $this->Mom_model->get_row($id)->row();

        //var_dump($data);exit;
        
        $data['title'] = 'Edit Meeting';
        $data['site'] = $this->Mom_model->getSite();
        $data['type'] = $this->Mom_model->getType($data['data']->site);
        $data['chair'] = $this->Mom_model->get_pemimpin($data['data']->site);
        $data['venue'] = $this->Mom_model->get_venue($data['data']->site);
        $data['notulen'] = $this->Mom_model->get_notulen($data['data']->site);
        $data['entlist'] = $this->Mom_model->list_entrant($id);
        $data['entrant'] = $this->Mom_model->getEntrant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input_mom/edit', $data);
        $this->load->view('templates/footer');
        
            
    }

    public function edit_issue($id) // Edit issue
    {
        $data['issues'] = $this->Mom_model->get_issue($id)->row();
        $data['data'] = $this->Mom_model->get_row($id)->row();
        //var_dump($data['issues']);exit;
        
        $data['title'] = 'Edit Issue';
        $data['id'] = $id;
        $data['pic'] = $this->Mom_model->getPIC($data['data']->site);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input_mom/edit_issues', $data);
        $this->load->view('templates/footer');
        
            
    }

    public function detaildata($id) // Form Detail Meeting
    {
        $data['data'] = $this->Mom_model->get_row($id)->row();

        //var_dump($data);exit;
        
        $data['title'] = 'Meeting Details';
        $data['site'] = $this->Mom_model->getSite();
        $data['chair'] = $this->Mom_model->get_pemimpin($data['data']->site);
        $data['venue'] = $this->Mom_model->get_venue($data['data']->site);
        $data['notulen'] = $this->Mom_model->get_notulen($data['data']->site);
        $data['entlist'] = $this->Mom_model->list_entrant($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('input_mom/details', $data);
        $this->load->view('templates/footer');
        
            
    }

    public function updatedata($id) // Tombol Update pada Form Edit
    {
        if(isset($_POST["update"])){
            
            $hasil = $this->Mom_model->edit($id);
            if($hasil){
                $_SESSION['pesan'] = "Diubah";
            }
            else {
                $_SESSION['pesan'] = "Salahubah";
            }

            $this->session->mark_as_flash('pesan');
        }
        redirect('MoM');
        
    }

    public function updateIssue($id) // Tombol Update pada Form Edit issue
    {
        if(isset($_POST["updateIssue"])){
            
            $hasil = $this->Mom_model->edit_issue($id);
            if($hasil){
                $_SESSION['pesan'] = "Diubah";
            }
            else {
                $_SESSION['pesan'] = "Salahubah";
            }

            $this->session->mark_as_flash('pesan');
        }
        redirect('MoM/meeting_issues/'.$id);
        
    }

    public function hapusEntrant($id) // Tombol Delete pada Tabel Peserta
    {
        $hasil = $this->Mom_model->deleteEnt($id);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function get_pemimpin(){
        $id = $this->input->post('id');
        $data = $this->Mom_model->get_pemimpin($id);
        echo json_encode($data);
    }

    public function get_meet(){
        $id = $this->input->post('id');
        $data = $this->Mom_model->get_meet($id);
        echo json_encode($data);
    }

    public function get_venue(){
        $id = $this->input->post('id');
        $data = $this->Mom_model->get_venue($id);
        echo json_encode($data);
    }

    public function testemail() {
        $this->Mom_model->send_mail();
    }

}

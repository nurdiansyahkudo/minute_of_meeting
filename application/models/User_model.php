<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function getPass()
   {
        $this->db->where('password', $password);
        $query = $this->db->get('db_auth.users');
   }

    public function getUser()
   {
        $nik = $this->input->post('nik');

        $this->db->where('nik', $nik);
        $query = $this->db->get('db_auth.users');
   }

   public function nik_check()
   {
        return $this->db->get_where('db_auth.users',array('nik' => $this->input->post('nik')));
   }
}

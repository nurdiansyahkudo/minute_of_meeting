<?php

class Mom_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function read() // Cek lagi
    {
        $this->db->order_by('meeting_name'); 
        return $this->db->get('db_mom.tb_mom')->result_array(); 
    }

    public function read_issue($id) // Cek lagi
    {
        $this->db->select('tb_issues.*, employee."EmployeeName"');
        $this->db->from('db_mom.tb_issues');
        $this->db->join('db_mom.msemployee employee', 'employee.EmployeeID = tb_issues.pic');
        $this->db->where('tb_issues.meet_ID', $id);
        $this->db->order_by('tb_issues.id_issue', 'desc');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function dash_issue() // Cek lagi
    {
        $this->db->select('tb_issues.*, employee."EmployeeName"');
        $this->db->from('db_mom.tb_issues');
        $this->db->join('db_mom.msemployee employee', 'employee.EmployeeID = tb_issues.pic');
        $this->db->order_by('tb_issues.id_issue', 'desc');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function list_entrant($id) // Cek lagi
    {
        $this->db->select('"entrant"."entrant_nik", "entrant"."entrant_id", "employee"."EmployeeName"'); 
        $this->db->from('db_mom.tb_entrant entrant');
        $this->db->join('db_mom.msemployee employee', 'employee.EmployeeID = entrant.entrant_nik');
        $this->db->where('entrant.meetID', $id);
        $this->db->order_by('employee.EmployeeName');
        $query = $this->db->get();
        // var_dump($query->result());exit;

        return $query->result_array();
    }

    public function list_issue($id) //CEK LAGI
    {
        $this->db->select('"issue"."id_issue", "employee"."EmployeeName"'); 
        $this->db->from('db_mom.tb_issues issue');
        $this->db->join('db_mom.msemployee employee', 'issue.pic = employee.EmployeeID');
        $this->db->where('issue.meet_ID', $id);
        $this->db->order_by('employee.EmployeeName');
        $query = $this->db->get();
        // var_dump($query->result());exit;
        $data = array();
        if($query !== FALSE && $query->num_rows() > 0){
            $data = $query->result_array();
        }       
        return $data;
    }

    public function create() // Cek lagi
    {
        $jobsite = $this->input->post('jobsite');
        $meeting = $this->input->post('nama_meet');
        $tempat = $this->input->post('tempat');
        $link = $this->input->post('linkzoom');
        $tanggal = $this->input->post('tanggal');
        $wkt_start = $this->input->post('start');
        $wkt_end = $this->input->post('end');
        $pemimpin = $this->input->post('leader');
        $notulen = $this->input->post('notulen');
        $agenda = $this->input->post('agenda');
        $note = $this->input->post('notes');
        $isOnline = $this->input->post('isOnline');
        $snack = $this->input->post('snack');

        $listPeserta = $this->input->post('peserta');

        $data = [
            'site' => $jobsite,
            'meeting_name' => $meeting,
            'venue' => $tempat,
            'link' => $link,
            'meeting_date' => $tanggal,
            'meeting_start' => $wkt_start,
            'meeting_end' => $wkt_end,
            'chair' => $pemimpin,
            'notulen' => $notulen,
            'agenda' => $agenda,
            'notes' => $note,
            'is_online' => $isOnline,
            'snack' => $snack,
        ];

            try {
                $this->db->insert('db_mom.tb_mom', $data);
                $newMeetId = $this->db->insert_id();
    
                $this->addPeserta($newMeetId, $listPeserta);
    
                return true;
            }
            catch(Exception $e) {
                return false;
            }
        
    }

    public function createIssue($id) // Cek lagi
    {
        $issue = $this->input->post('issues');
        $act = $this->input->post('action');
        $out = $this->input->post('output');
        $pic = $this->input->post('pic');
        $tgl = $this->input->post('duedate');
        $status = $this->input->post('status');


        $data = [
            'issues' => $issue,
            'action' => $act,
            'output' => $out,
            'pic' => $pic,
            'due_date' => $tgl,
            'status' => $status,
            'meet_ID' => $id
        ];

            try {
                $status = $this->db->insert('db_mom.tb_issues', $data);
                // var_dump($status, $this->db->last_query());
                return true;
            }
            catch(Exception $e) {
                echo $e->getMessage();
                return false;
            }

        // exit;
        
    }

    public function addPeserta($meetId, $listPeserta) //
    {
        foreach ($listPeserta as $val) {
            try {
                $data = [
                    'meetID' => $meetId,
                    'entrant_nik' => $val
                ];

                $this->db->insert('db_mom.tb_entrant', $data);
                
            }
            catch(Exception $e) {
                
            }
            
        }
        
    }

    public function delete($id) //Cek lagi
    {
        try {
            $this->db->where('meetID', $id);
            $this->db->delete('db_mom.tb_entrant');

            $this->db->where('meet_id', $id);
            $this->db->delete('db_mom.tb_mom');
            
            return true;
        }
        catch(\Exception $e) {
            // return false;
        }
    }

    public function deleteEnt($id) //Cek lagi
    {
        try {
            $this->db->where('entrant_id', $id);
            $this->db->delete('db_mom.tb_entrant');
            
            return true;
        }
        catch(\Exception $e) {
            // return false;
        }
    }

    public function get_row($id = null)
    {   

        $this->db->from('db_mom.tb_mom');
        if ($id != null) {
            $this->db->where('meet_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_issue($id = null)
    {   

        $this->db->from('db_mom.tb_issues');
        if ($id != null) {
            $this->db->where('meet_ID', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function edit($id) //Cek lagi
    {
        $jobsite = $this->input->post('jobsite');
        $meeting = $this->input->post('nama_meet');
        $tempat = $this->input->post('tempat');
        $tanggal = $this->input->post('tanggal');
        $wkt_start = $this->input->post('start');
        $wkt_end = $this->input->post('end');
        $pemimpin = $this->input->post('leader');
        $notulen = $this->input->post('notulen');
        $agenda = $this->input->post('agenda');
        $note = $this->input->post('notes');
        $isOnline = $this->input->post('isOnline');

        $listPeserta = $this->input->post('peserta');

        $data = [
            'site' => $jobsite,
            'meeting_name' => $meeting,
            'venue' => $tempat,
            'meeting_date' => $tanggal,
            'meeting_start' => $wkt_start,
            'meeting_end' => $wkt_end,
            'chair' => $pemimpin,
            'notulen' => $notulen,
            'agenda' => $agenda,
            'notes' => $note,
            'is_online' => $isOnline,
        ];

        try {
            $this->db->where('meet_id', $id);
            $this->db->update('db_mom.tb_mom', $data);

            $this->addPeserta($id, $listPeserta);

            return true;
        }
        catch(Exception $e) {
            return false;
        }
        return ($this->db->affected_rows() > 0);
    }

    public function edit_issue($id) // Cek lagi
    {
        $issue = $this->input->post('issues');
        $act = $this->input->post('action');
        $out = $this->input->post('output');
        $pic = $this->input->post('pic');
        $tgl = $this->input->post('duedate');
        $status = $this->input->post('status');
        $actdate = $this->input->post('actdate');

        $data = [
            'pic' => $pic,
            'status' => $status,
            'action_date' => $actdate
        ];

        try {
            $this->db->where('meet_ID', $id);
            $this->db->update('db_mom.tb_issues', $data);
            // var_dump($data, $id);
        }
        catch(Exception $e) {
            echo $e->getMessage();
            
            // return false;
        }
        return ($this->db->affected_rows() > 0);
        // exit;
    }

    public function getSite()
    {
        $this->db->order_by("siteID", "asc");
        return $this->db->get('db_mom.mssite')->result();
    }

    public function getType()
    {
        $this->db->order_by("meet_type_id", "asc");
        return $this->db->get('db_mom.msmeet')->result();
    }

    public function getVenue()
    {
        $this->db->order_by("site_id", "asc");
        return $this->db->get('db_mom.msvenue')->result();
    }
    
    public function getChair()
    {
        $this->db->order_by("EmployeeName", "asc"); 
        return $this->db->get('db_mom.msemployee')->result();
    }

    public function getNotulen()
    {
        $this->db->order_by("EmployeeName", "asc"); 
        return $this->db->get('db_mom.msemployee')->result();
    }

    public function getEntrant() //Cek lagi
    {
        $this->db->order_by("EmployeeName", "asc"); 
        return $this->db->get('db_mom.msemployee')->result();
    }

    public function getPIC($id) //Cek lagi
    {
        $this->db->from('db_mom.msemployee');
        $this->db->where('SiteId',$id); 
        $this->db->order_by('EmployeeName');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_pemimpin($id){
        $this->db->from('db_mom.msemployee');
        $this->db->where('SiteId',$id); 
        $this->db->order_by('EmployeeName');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_meet($id){
        $this->db->from('db_mom.relation_meet_type_site');
        $this->db->where('site',$id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_venue($id){
        $this->db->from('db_mom.msvenue');
        $this->db->where('site_id',$id);
        $query = $this->db->get();

        return $query->result();
    }

    public function get_notulen($id){
        $this->db->from('db_mom.msemployee');
        $this->db->where('SiteId',$id); 
        $this->db->order_by('EmployeeName');
        $query = $this->db->get();

        return $query->result();
    }

    public function get_entrant($id){
        $this->db->from('db_mom.msemployee');
        $this->db->where('SiteId',$id); 
        $this->db->order_by('EmployeeName');
        $query = $this->db->get();

        return $query->result();
    }

    public function send_mail()
    {
        //$snack = $this->input->post('snack');
        $from_email = 'nurdiansyah192@gmail.com';
        $to_email = 'dhanatrisna1987@gmail.com';
        
        $this->load->library('email'); // load email library
        $this->email->from($from_email, 'Nurdiansyah');
        $this->email->to($to_email, 'GA');
        $this->email->message('Test');
        //$this->email->message($snack);

        $result = $this->email->send();

        var_dump($result, $this->email);
    }
}

   

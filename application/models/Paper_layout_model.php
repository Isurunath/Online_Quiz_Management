<?php

class Paper_layout_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insert($data){
        $this->db->insert('assignment_layout', $data);
        if($this->db->affected_rows() > 0)
            return true; // to the controller
        else
            return false;
    }

    function get_layout()
    {
        $this->db->select("paper_id,batch_no,paper_type,added_date,single_choice,multiple_choice,short_answer,true_false,from_date,to_date");
        $this->db->from('assignment_layout');
        $query = $this->db->get();
        return $query->result();
    }

    function editLayout($id,$data)
    {
        $this->db->where('paper_id', $id);
        $this->db->update('assignment_layout', $data);

        if($this->db->affected_rows() > 0)
            return true; // to the controller
        else
            return false;
    }
}
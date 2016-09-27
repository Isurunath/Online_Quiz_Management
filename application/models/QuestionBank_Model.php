<?php

class QuestionBank_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insert($data){
        $this->db->insert('questionbank', $data);
        if($this->db->affected_rows() > 0)
            return true; // to the controller
        else
            return false;
    }
}

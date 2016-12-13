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

    function update($data,$ID){
        $this->db->where('id', $ID);
        $this->db->update('questionbank', $data);
        
        if($this->db->affected_rows() > 0)
            return true; // to the controller
        else
            return false;
    }

    function delete($ID){
        $this->db->where('id', $ID);
        $this->db->delete('questionbank');
        
        if($this->db->affected_rows() > 0)
            return true; // to the controller
        else
            return false;
    }

    function getQuestions(){
        $query = $this->db->get('questionbank');
        $q_result = $query->result();
        return $q_result;
    }

    function getQuestion($id){

        $this -> db -> select('*');
        $this -> db -> from('questionbank');
        $this -> db -> where('questiontype_id', $id);
        $this -> db -> limit(1);
        $query = $this -> db -> get();
        if($query -> num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
}

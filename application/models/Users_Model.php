<?php

class Users_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function insert($data){
        $this->db->insert('users', $data);
        if($this->db->affected_rows() > 0)
            return true; // to the controller
        else
            return false;
    }

    function updatePassword($pw,$id)
    {
        $sql = "UPDATE users SET password='$pw' WHERE user_id='$id' ";
        $this->db->query($sql);
        if($this->db->query($sql))
            return true; // to the controller
        else
            return false;
    }

    function login($email, $password)
    {
        $this -> db -> select('*');
        $this -> db -> from('users');
        $this -> db -> where('email', $email);
        $this -> db -> where('password', $password);
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

    function getProfileDetails($id)
    {
        $this -> db -> select('*');
        $this -> db -> from('profile');
        $this -> db -> where('prof_user_id', $id);
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

    //Function for the check email exist
    public function email_exists($value)
    {
        $this -> db -> select('*');
        $this -> db -> from('users');
        $this->db->where('email', $value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getusers(){
        $query = $this->db->get('users');
        $q_result = $query->result();
        return $q_result;
    }
    
    public function get_lecturers()
    {
        $this->db->select("user_id,user_name,email");
        $this->db->from('users');
        $this->db->where('user_type', 'LECTURER');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_students()
    {
        $this->db->select("user_id,user_name,email");
        $this->db->from('users');
        $this->db->where('user_type', 'STUDENT');
        $query = $this->db->get();
        return $query->result();
    }
}

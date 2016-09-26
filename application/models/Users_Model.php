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

    function login($email, $password)
    {
        $this -> db -> select('*');
        $this -> db -> from('users');
        $this -> db -> where('user_name', $email);
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

    //Function for the check email exist
    public function email_exists($value)
    {
        $this -> db -> select('*');
        $this -> db -> from('users');
        $this->db->where('email', $value);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }
}

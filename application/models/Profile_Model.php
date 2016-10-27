<?php

class Profile_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function updateProPic($id){
        $sql = "UPDATE profile SET isProPic=1 WHERE prof_user_id='$id' ";
        $this->db->query($sql);
        if($this->db->query($sql))
            return true; // to the controller
        else
            return false;
    }

}

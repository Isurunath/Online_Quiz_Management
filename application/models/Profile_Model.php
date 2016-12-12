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

    function updateBasic($id,$fname,$lname,$gender,$date,$month,$year)
    {
        $dob = $year."-".$month."-".$date;
        $sql = "UPDATE profile SET fname='$fname', lname='$lname', birthDate='$date', birthMonth='$month', birthYear='$year', dob='$dob', gender='$gender' WHERE prof_user_id='$id' ";
        $this->db->query($sql);
        if($this->db->query($sql))
            return true; // to the controller
        else
            return false;
    }

    function updateContact($id,$add1,$add2,$city,$phone)
    {
        $sql = "UPDATE profile SET address_l1='$add1', address_l2='$add2', city='$city', phone='$phone' WHERE prof_user_id='$id' ";
        $this->db->query($sql);
        if($this->db->query($sql))
            return true; // to the controller
        else
            return false;
    }

    function updateCourse($id,$course,$batch,$time,$yr)
    {
        $batch = "Batch ".$batch;
        //echo $yr;
        $sql = "UPDATE profile SET course='$course', batch='$batch', batch_time='$time', graduating_yr='$yr' WHERE prof_user_id='$id' ";
        $this->db->query($sql);
        if($this->db->query($sql))
            return true; // to the controller
        else
            return false;
    }

    function updateAbout($id,$about)
    {
        $sql = "UPDATE profile SET about_me='$about' WHERE prof_user_id='$id' ";
        $this->db->query($sql);
        if($this->db->query($sql))
            return true; // to the controller
        else
            return false;
    }

}

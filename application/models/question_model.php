<?php

/**
 * Created by PhpStorm.
 * User: Chameera_Intern
 * Date: 9/21/2016
 * Time: 1:00 PM
 */
class question_model extends CI_Model
{
    function getquestions($questionType) {
        $this->db->select('*');
        $this->db->where('questiontype_id', $questionType);
        $query = $this->db->get('questionbank');
        return $query->result_array();//<---- returns you an array
    }

    function getpaperLayout() {
        $this->db->select('top 1 *');
       // $this->db->where('questiontype_id', $questionType);
        $query = $this->db->get('assignment_layout');
        return $query->result_array();//<---- returns you an array
    }

}
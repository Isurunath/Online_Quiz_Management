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
        $data1=array();
        $this->db->select('*');
        $this->db->where('questiontype_id', $questionType);
        $query = $this->db->get('questionbank');

        foreach($query->result() as $row) {
            $data1['question'][] = $row->question;
            $data1['answer'] [] = $row->answer;
        }

        return $data1;//<---- returns you an array
    }

    function getpaperLayout($no) {
        $this->db->select('*');
        $this->db->where('paper_id', $no);
        $query = $this->db->get('assignment_layout');
        return $query->row();//<---- returns you an array
    }

}
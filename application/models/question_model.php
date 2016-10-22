<?php

/**
 * Created by PhpStorm.
 * User: Chameera/'
 * Date: 9/21/2016
 * Time: 1:00 PM
 */
class question_model extends CI_Model
{
    function getquestions($questionType) {
        $data1=array();
        $this->db->select('*');
        $this->db->where('questiontype_id', $questionType);
        $this->db->order_by('rand()');
        $query = $this->db->get('questionbank');

        foreach($query->result() as $row) {
            $data1['question'][] = $row->question;
            $data1['mcq1'] [] = $row->answer;
            $data1['mcq2'] [] = $row->mcq2;
            $data1['mcq3'] [] = $row->mcq3;
            $data1['mcq4'] [] = $row->mcq4;
            $data1['id'] [] = $row->id;

        }

        return $data1;//<---- returns you an array
    }

    function getpaperLayout($curDate) {
        $this->db->select('*');
        $this->db->where('from_date <=', $curDate);
        $this->db->where('to_date >=', $curDate);
        $query = $this->db->get('assignment_layout');
        return $query->row();//<---- returns you an array
    }



}
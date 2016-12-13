<?php
/**
 * Created by PhpStorm.
 * User: Nipuni
 * Date: 09/11/2016
 * Time: 12:49 AM
 */

class MarkingSchememodel extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function searchMarkingSchemeID($paperID){
        $this->db->select('markingSchemeID');
        $this->db->from('markingscheme');
        $this->db->where('paperID',$paperID);

        $query=$this->db->get();

        if($query!=NULL){
            return $query->result();
        }else{
            return false;
        }

    }

    function getMarkingScheme($mrkngschmID){
        $this->db->select('question,answer,marks');
        $this->db->from('answerbank');
        $this->db->where('markingSchemeID',1);

        $query=$this->db->get();
        $data['results']=$query->result();

        $markingScheme=array();
        $i=0;

        foreach($data['results'] as $result){
            $markingScheme[$i]['question'] =  $result->question;
            $markingScheme[$i]['answer'] =  $result->answer;
            $markingScheme[$i]['marks'] =  $result->marks;

            $i++;
        }

        return $markingScheme;

    }

    function getMarkingSchemeAnswers($mrkngschmID){
        $this->db->select('answer');
        $this->db->from('answerbank');
        $this->db->where('markingSchemeID',1);

        $query=$this->db->get();
        $data['results']=$query->result();

        $markingSchemeAnswers=array();
        $i=0;

        foreach($data['results'] as $result){
            $markingSchemeAnswers[$i] =  $result->answer;

            $i++;
        }

        return $markingSchemeAnswers;

    }

    function updateStatus($paperID,$marks){
        $data=array(
            'paperID' => $paperID,
            'status' => 'marked',
            'marks' => $marks
        );

        $this->db->replace('download',$data);
    }

}


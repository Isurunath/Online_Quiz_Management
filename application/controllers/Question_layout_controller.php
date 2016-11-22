<?php

/**
 * Created by PhpStorm.
 * User: Nipuni
 * Date: 09/25/2016
 * Time: 3:42 AM
 * file name : Question_layout_controller.php
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question_layout_controller
{
    //index function

    function index(){
        $this->load->view('QuestionMCQ');
    }

    // function fetch data from form
    function  InsertQuestion(){

        $this->load->helper('url');
        $this->load->model('Question_layout_model');

        //set validation rules
        $this->form_validation->set_rules('questiontype','Question Type','callback_combo_check');

        if($this->form_validation->run()== FALSE){
            //fail validation
            $this->load->view('QuestionPaperLayout');
        }else{
            //pass validation
            $data=array(
           //'questiontype_id' => $_POST['qtype'],
                'queID' => $_POST['qid'],
                'typeID' => $_POST['typeid'],
                'question'=> $_POST['mcqquestion'],
                'answer' => $_POST['mcqans'],
                'marks' => $_POST['mcqmarks'],
                'noOfOptions' => $_POST['options'],
                'option1' => $_POST['op1'],
                'option2' => $_POST['op2'],
                'option3' => $_POST['op3'],
                'option4' => $_POST['op4'],
                'option5' => $_POST['op5'],
                'option6' => $_POST['op6']
            );

            $result = $this->Question_layout_model->addQuestion($data);

            if($result)
            {
                //display success message
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Question details added to Database!!!</div>');
                redirect('hello/load_qbank?r=sucess');
            }
            else
            {
                echo "Something went wrong";
            }
        }

    }

    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->datebase();
        $this->load->library('form_validation');

        //load the Question_layout_model
        $this->load->model('Ouestion_layout_model');

    }
}
?>
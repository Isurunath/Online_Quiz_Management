<?php

class QuestionBank extends CI_controller{

	public function index(){
		$this->load->view('Question');
	}

	public function AddQuestion(){
		$this->load->helper('url');
		$this->load->model('QuestionBank_Model');

		$data = array(
                'questiontype_id' => $_POST['qtype'],
                'question' => $_POST['question'],
                'answer' => $_POST['answer'],
                'mcq1' => $_POST['mcq1'],
                'mcq2' => $_POST['mcq2'],
                'mcq3' => $_POST['mcq3'],
                'mcq4' => $_POST['mcq4'],

            );

            //Transferring data to Model
            $result = $this->QuestionBank_Model->insert($data);
            if($result)
            {
                redirect('hello/load_qbank?r=sucess');
            }
            else
            {
                echo ":(";
            }
	}
}
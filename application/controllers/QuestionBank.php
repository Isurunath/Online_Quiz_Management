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
                redirect('hello/load_qbank?r=success');
            }
            else
            {
                redirect('hello/load_qbank?r=fail');
            }
    }

    public function AddMultiQuestion(){
        $this->load->helper('url');
        $this->load->model('QuestionBank_Model');

        $answer;
        $checks = array('1' => 'chk1','2' => 'chk2','3' => 'chk3','4' => 'chk4','5' => 'chk5' );
        foreach ($checks as $key => $value) {
            if($_POST[$value])
                $answer = $answer.$key;
        }

        $data = array(
                'questiontype_id' => $_POST['qtype'],
                'question' => $_POST['question'],
                'answer' => $_POST['answer'],
                'mcq1' => $_POST['mcq1'],
                'mcq2' => $_POST['mcq2'],
                'mcq3' => $_POST['mcq3'],
                'mcq4' => $_POST['mcq4'],
                'multianw' => $answer,
            );

            //Transferring data to Model
            $result = $this->QuestionBank_Model->insert($data);
            if($result)
            {
                redirect('hello/load_qbank?r=success');
            }
            else
            {
                redirect('hello/load_qbank?r=fail');
            }
    }

}
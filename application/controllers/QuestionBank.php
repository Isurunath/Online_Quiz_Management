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

    public function EditMultiQuestion(){
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

            $ID = $_POST['id'];

            //Transferring data to Model
            $result = $this->QuestionBank_Model->update($data,$ID);
            if($result)
            {
                redirect('QuestionBank/viewQuestions');
            }
            else
            {
                redirect('QuestionBank/viewQuestions');
            }
    }

    public function viewQuestions(){

        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');

        if(isset($this->session->userdata['logged_in'])) {

            $lecturer = ($this->session->userdata['logged_in']['username']);
            $this->load->model('QuestionBank_Model');

            /*$this->data['posts'] = $this->Paper_layout_model->get_layout();
            $this->load->view('admin/view_paper_layout', $this->data);*/

            $data = array(
                'questions' => $this->QuestionBank_Model->getQuestions(),
                'lecname' => $lecturer
            );
            $this->load->view('admin/manageQbank',$data);
        }

    }

    public function EditQuestion(){
        $this->load->helper('url');
        $this->load->model('QuestionBank_Model');

        $ID = $_POST['id'];

        if(isset($_POST['update'])){
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
            $result = $this->QuestionBank_Model->update($data,$ID);
            if($result)
            {
                redirect('QuestionBank/viewQuestions');
            }
            else
            {
                redirect('QuestionBank/viewQuestions');
            }
        }elseif(isset($_POST['delete'])){
            $result = $this->QuestionBank_Model->delete($ID);
            if($result)
            {
                redirect('QuestionBank/viewQuestions');
            }
            else
            {
                redirect('QuestionBank/viewQuestions');
            }
        }
    }


    // public function getdata(){

    //     $name = $this->input->post('fullname');
    //     echo 'Hello'.$name;

        // $this->load->helper('url');
        // $this->load->model('QuestionBank_Model');

        // $datal =  $_POST['type'];

        // $data['question'] = $this->QuestionBank_Model->getQuestion($datal);
        // $this->load->view('admin/manageQbank',$data);
    //}
    // public function ajax_call() {
    //     $data = array(
    //         'ajax_id' => $this->input->post('id')
    // );
    // }

}
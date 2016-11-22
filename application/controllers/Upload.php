<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->library('session');
        if(isset($this->session->userdata['logged_in'])) {
            $student_id = $this->session->userdata['profile_data']['prof_user_id'];
            $this->load->model('question_model');
            $resPaperDownload = $this->question_model->getpaperDownloadforStudent($student_id);
            if($resPaperDownload) {
                $downloadDetails = array(
                    'layout_id' => $resPaperDownload->layout_id,
                    'student_id' => $student_id,
                    'download_date' => $resPaperDownload->download_date,
                    'download_time' => $resPaperDownload->download_time,
                    'error' => ""
                );
                $this->load->library('session');
                $this->load->helper('url');
                $this->load->view('header/head1');
                $this->load->view('paper/upload_form',$downloadDetails);
            }
        }
        else{
            $this->load->helper('url');
            $this->load->view('login/new_login');
        }
    }

    public function do_upload()
    {

        $this->load->library('session');
        if(isset($this->session->userdata['logged_in'])) {
            $student_id = $this->session->userdata['profile_data']['prof_user_id'];
            $this->load->model('question_model');
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 10000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $resPaperDownload = $this->question_model->getpaperDownloadforStudent($student_id);
                if ($resPaperDownload) {
                    $downloadDetails = array(
                        'layout_id' => $resPaperDownload->layout_id,
                        'student_id' => $student_id,
                        'download_date' => $resPaperDownload->download_date,
                        'download_time' => $resPaperDownload->download_time,
                        'error' => $this->upload->display_errors()
                    );
                    // $error = array('error' => $this->upload->display_errors());
                    $this->load->helper('url');
                    $this->load->view('header/head1');
                    $this->load->view('paper/upload_form', $downloadDetails);

                }
            } else {


                    $data = array('upload_data' => $this->upload->data());
                    $this->load->helper('url');
                    $this->load->view('header/head1');
                    $this->load->view('paper/upload_success', $data);
                    $this->load->view('footer/footer1');

            }
        }
        else{
            $this->load->helper('url');
            $this->load->view('login/new_login');
        }
    }

    public function upload() {

        $this->load->library('session');
        if(isset($this->session->userdata['logged_in']))
        {

            if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $targetPath = getcwd() . './answer_upload/';
            $targetFile = $targetPath . $fileName ;
            move_uploaded_file($tempFile, $targetFile);
            // if you want to save in db,where here
            // with out model just for example
            // $this->load->database(); // load database
            // $this->db->insert('file_table',array('file_name' => $fileName));
             $this->load->helper('url');
                $this->load->view('header/head1');
                $this->load->view('paper/upload_success', $data);

            }
        }
        else{
            $this->load->helper('url');
            //$this->load->view('header/head1');
            $this->load->view('login/new_login');
        }
    }





}
?>
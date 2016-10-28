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
        $this->load->helper('url');
        $this->load->view('header/head1');
        $this->load->view('paper/upload_form', array('error' => ' ' ));
    }

    public function do_upload()
    {
        $this->load->library('session');
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 10000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->helper('url');
            $this->load->view('header/head1');
            $this->load->view('paper/upload_form', $error);
            $this->load->view('footer/footer1');
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $this->load->helper('url');
            $this->load->view('header/head1');
            $this->load->view('paper/upload_success', $data);
            $this->load->view('footer/footer1');
        }
    }
}
?>
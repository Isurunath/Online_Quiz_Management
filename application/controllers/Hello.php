<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {

    public function index(){
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->view('header/head1');
        $this->load->view('banner/banner1');
        $this->load->view('details/details');
        $this->load->view('footer/footer1');
    }

    public function login()
    {
        $this->load->helper('url');
        $this->load->view('login/new_login');
    }

    public function load_register()
    {
        $this->load->helper('url');
        $this->load->view('login/new_register');
    }

    public function admin()
    {
        $this->load->helper('url');
        $this->load->view('admin/home');
    }

    public function load_layout()
    {
        $this->load->helper('url');
        $this->load->library('session');

        if(isset($this->session->userdata['logged_in'])) {

            $lecturer = ($this->session->userdata['logged_in']['username']);
            $data['lecname']=$lecturer;

            $this->load->view('admin/paper_layout',$data);
        }
    }

    public function load_qbank()
    {
        $this->load->helper('url');
        $this->load->library('session');

        if(isset($this->session->userdata['logged_in'])) {

            $lecturer = ($this->session->userdata['logged_in']['username']);
            $data['lecname']=$lecturer;

            $this->load->view('admin/qbank',$data);
        }
    }

    public function load_papermarking()
    {
        $this->load->helper('url');
        $this->load->library('session');

        if(isset($this->session->userdata['logged_in'])) {

            $lecturer = ($this->session->userdata['logged_in']['username']);
            $data['lecname']=$lecturer;
            $total=0;

            $this->load->view('paperMarking/papermarking',$total);
        }
    }


    public function load_profile()
    {
        $this->load->library('session');
        $this->load->helper('url');

        $this->load->model('Paper_layout_model');

        $batch = ($this->session->userdata['profile_data']['batch']);

        $data['assignments'] = $this->Paper_layout_model->get_examsProfile($batch);
        //print_r($data);

        $this->load->view('header/head1');
        $this->load->view('profile/profile',$data);
    }

    public function load_about()
    {
        $this->load->helper('url');
        $this->load->view('about_us/about');
    }

    public function load_addlecturers(){
        $this->load->helper('url');
        $this->load->library('session');

        if(isset($this->session->userdata['logged_in'])) {

            $lecturer = ($this->session->userdata['logged_in']['username']);
            $data['lecname']=$lecturer;

            $this->load->view('admin_1/addlecturers',$data);
        }
    }

    public function load_admin_panel()
    {
        $this->load->helper('url');
        $this->load->library('session');

        if(isset($this->session->userdata['logged_in'])) {

            $lecturer = ($this->session->userdata['logged_in']['username']);
            $data['lecname']=$lecturer;

            $this->load->view('admin_1/home',$data);
        }
    }

    public function load_viewusers(){
        $this->load->helper('url');
        $this->load->view('admin/viewusers');
    }


    public function forgot_password(){
        $this->load->helper('url');
        $this->load->view('login/resetPW');
    }




}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {

    public function index(){
        $this->load->helper('url');
        $this->load->view('header/head1');
        //$this->load->view('login/login');
        $this->load->view('banner/banner1');
        $this->load->view('details/details');
        $this->load->view('footer/footer1');
        //$this->load->view('home/home');
    }

    public function login()
    {
        $this->load->helper('url');
        $this->load->view('login/new_login');
    }

    public function admin()
    {
        $this->load->helper('url');
        $this->load->view('admin/home');
    }

    public function load_layout()
    {
        $this->load->helper('url');
        $this->load->view('admin/paper_layout');
    }

    public function load_qbank()
    {
        $this->load->helper('url');
        $this->load->view('admin/qbank');
    }
}
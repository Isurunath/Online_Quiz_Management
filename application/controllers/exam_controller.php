<?php

/**
 * Created by PhpStorm.
 * User: viran pravinda
 * Date: 10/25/2016
 * Time: 6:35 PM
 */
class exam_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->helper('form');
    }

    public function upcoming_exams()
    {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Paper_layout_model');

        $this->data['posts'] = $this->Paper_layout_model->get_exams();
        $this->load->view('Upcoming/upcoming_exams', $this->data);
    }
}
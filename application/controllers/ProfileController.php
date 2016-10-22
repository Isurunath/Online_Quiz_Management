<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session','form_validation');
        $this->load->model('Users_Model');
    }


}


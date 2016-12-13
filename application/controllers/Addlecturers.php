<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Addlecturers extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
    }

    public function Register()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Users_Model');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[profile.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required',array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin_1/addlecturers');
        }

        else
        {
            $type = 'LECTURER';
            $data = array(
                'fname' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => MD5($_POST['password']),
                'user_type' => $type,
            );

            //Transferring data to Model
            $result = $this->Users_Model->insert($data);

            if($result)
            {
                redirect('hello/load_addlecturers?r=success');
            }
            else
            {
                redirect('hello/load_addlecturers?r=fail');
            }

        }
    }
}
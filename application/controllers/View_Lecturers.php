<?php

/**
 * Created by PhpStorm.
 * User: viran pravinda
 * Date: 11/17/2016
 * Time: 2:46 PM
 */
class View_Lecturers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
    }

    public function view_lecturers()
    {
        $this->load->helper('url');
        $this->load->database();
        $this->load->library('session');

        if(isset($this->session->userdata['logged_in'])) {

            $lecturer = ($this->session->userdata['logged_in']['username']);
            $this->load->model('Users_Model');

            /*$this->data['posts'] = $this->Paper_layout_model->get_layout();
            $this->load->view('admin/view_paper_layout', $this->data);*/

            $data = array(
                'posts' => $this->Users_Model->get_lecturers(),
                'lecname' => $lecturer
            );
            $this->load->view('admin_1/view_lecturers', $data);
        }
    }

    public function delete_lecturer()
    {
        $this->load->helper('url');
        $this->load->model('Users_Model');

        $id=$_POST['test'];

        $result = $this->Users_Model->delete_Lecturer($id);

        if ($result) {
            redirect('View_Lecturers/view_lecturers');
        } else {
            redirect('View_Lecturers/view_lecturers');
        }
    }
}
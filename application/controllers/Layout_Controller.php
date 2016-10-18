<?php

class Layout_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->helper('form');
    }

    //to add a layout to database
    public function addLayout()
    {
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->model('Paper_layout_model');

        //$batch=$_POST['batchNo'];
        $type=$_POST['paperType'];
        $single=$_POST['single'];
        $multiple=$_POST['multiple'];
        $short=$_POST['shortAnswer'];
        $tf=$_POST['trueFalse'];
        $CurDate=Date('Y/m/d');
        $fromdate=$_POST['datepicker1'];
        $todate=$_POST['datepicker2'];


        $tot=$single+$multiple+$short+$tf;

        /*$this->form_validation->set_rules('paperType','Paper type','trim|required',array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('single','Single Choice','trim|required');
        $this->form_validation->set_rules('multiple','Multiple Choice','trim|required');
        $this->form_validation->set_rules('shortAnswer','Short Answer','trim|required');
        $this->form_validation->set_rules('trueFalse','True/false','trim|required');
        $this->form_validation->set_rules('datepicker1','Downloadable(from date)','trim|required');
        $this->form_validation->set_rules('datepicker2','Downloadable(to date)','trim|required');*/

       /* if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/paper_layout');
        }*/

        //Check paper type is assignment and total no. of questions is 20
        if($type == 'Assignment' && ($tot<20 || $tot>20))
        {
                $data['message'] = 'Number of questions should be exactly 20 for an assignment';
                $this->load->view('admin/paper_layout', $data);
        }

        //Check paper type is question paper and total no.of questions is 30
        elseif($type == 'Question Paper' && ($tot<30 || $tot>30))
        {
                $data['message'] = 'Number of questions should be exactly 30 for a question paper';
                $this->load->view('admin/paper_layout', $data);
        }

        //check from date is greater than than the to date
        elseif($fromdate > $todate)
        {
            $data['message'] = 'Dates should be compatible with each other';
            $this->load->view('admin/paper_layout', $data);
        }

        //check whether the from date is smaller than the current date
        elseif($fromdate < $CurDate)
        {
            $data['message'] = 'From date must exceed the current date';
            $this->load->view('admin/paper_layout', $data);
        }

        else
        {
            $data=array(
                'batch_no'=>$_POST['batchNo'],
                'paper_type' => $_POST['paperType'],
                'added_date' => date('Y-m-d H:i:s', now()),
                'single_choice' => $_POST['single'],
                'multiple_choice' => $_POST['multiple'],
                'short_answer' => $_POST['shortAnswer'],
                'true_false' => $_POST['trueFalse'],
                'from_date' => $_POST['datepicker1'],
                'to_date' => $_POST['datepicker2']
            );

            $result = $this->Paper_layout_model->insert($data);

            if($result)
            {
                $data['message1']='Data successfully inserted';
                $this->load->View('admin/paper_layout',$data);
            }

            else
            {
                $this->load->View('admin/paper_layout');
            }
        }

    }

    public function View_layout()
    {
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Paper_layout_model');

        $this->data['posts'] = $this->Paper_layout_model->get_layout();
        $this->load->view('admin/view_paper_layout', $this->data);
    }
	
	public function edit_profile()
	{
		$this->load->helper('url');
		$this->load->View('admin/admin_profile');
	}

    public function editLayout()
    {
        $this->load->helper('url');
        $this->load->model('Paper_layout_model');

        $type=$_POST['paperType'];
        $single=$_POST['single'];
        $multiple=$_POST['multiple'];
        $short=$_POST['short'];
        $tf=$_POST['true'];
        $fromdate=$_POST['datepicker1'];
        $todate=$_POST['datepicker2'];
        $CurDate=Date('Y/m/d');

        $tot=$single+$multiple+$short+$tf;

        if($type == 'Assignment' && ($tot<20 || $tot>20))
        {
            //$data['message'] = 'Number of questions should be exactly 20 for an assignment';
            redirect('Layout_Controller/View_layout');
        }

        elseif($type == 'Question Paper' && ($tot<30 || $tot>30))
        {
            redirect('Layout_Controller/View_layout');
        }

        elseif($fromdate > $todate)
        {
            redirect('Layout_Controller/View_layout');
        }

        //check whether the from date is smaller than the current date
        elseif($fromdate < $CurDate)
        {
            redirect('Layout_Controller/View_layout');
        }

        else
        {
            $id = $_POST['paper_id'];

            $data = array(
                'batch_no' => $_POST['batchNo'],
                'paper_type' => $_POST['paperType'],
                'single_choice' => $_POST['single'],
                'multiple_choice' => $_POST['multiple'],
                'short_answer' => $_POST['short'],
                'true_false' => $_POST['true'],
                'from_date' => $_POST['datepicker1'],
                'to_date' => $_POST['datepicker2']
            );

            $result = $this->Paper_layout_model->editLayout($id, $data);

            if ($result) {
                //$this->load->View('login/new_login');
                //$this->load->View('admin/home');
                redirect('Layout_Controller/View_layout');
            } else {
                redirect('Layout_Controller/View_layout');
            }
        }
    }
	
	
}
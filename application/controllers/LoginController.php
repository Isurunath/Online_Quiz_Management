<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
    }

    public function register()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Users_Model');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required',array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login/new_register');
        }

        else
        {
            $data = array(
                'user_name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => MD5($_POST['password']),
            );

            //Transferring data to Model
            $result = $this->Users_Model->insert($data);
            if($result)
            {
                $this->load->view('header/head1');
                $this->load->view('banner/banner1');
                $this->load->view('details/details');
                $this->load->view('footer/footer1');
                //echo "done";
            }
            else
            {
                $message = 'Something went Wrong!';
                $this->load->view('login/new_register',$message);
                //echo ":(";
            }
        }
    }

    public function login()
    {

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Users_Model');

        $this->form_validation->set_rules('email_login', 'Email', 'trim|required',
                                            array
                                            (
                                                'required'      => 'You have not provided %s.'
                                            ));
        $this->form_validation->set_rules('password_login','Password','trim|required',array('required'=> 'Enter your %s.'));

        if($this->form_validation->run() == FALSE )
        {
            $this->load->view('login/new_login');
        }
        else
        {
            $email_l = $_POST['email_login'];
            $password_l = md5($_POST['password_login']);

            $result  = $this->Users_Model->login($email_l,$password_l);
            if($result)
            {
                $session_data=array(
                        'email'=>$result[0]->email,
                        'username'=>$result[0]->user_name,
                        'user_type' =>$result[0]->user_type,
                   );
                $this->session->set_userdata('logged_in',$session_data);

                if($result[0]->user_type == "ADMIN")
                {
                    $this->load->helper('url');
                    $this->load->view('admin/home');
                }
                else {
                    $profileDetails = $this->Users_Model->getProfileDetails($result[0]->user_id);
                    if ($profileDetails) {
                        $session_data_profile = array(
                            'prof_user_id' => $profileDetails[0]->prof_user_id,
                            'fname' => $profileDetails[0]->fname,
                            'lname' => $profileDetails[0]->lname,
                            'dob' => $profileDetails[0]->dob,
                            'add1' => $profileDetails[0]->address_l1,
                            'add2' => $profileDetails[0]->address_l2,
                            'city' => $profileDetails[0]->city,
                            'gender' => $profileDetails[0]->gender,
                            'phone' => $profileDetails[0]->phone,
                            'sYear' => $profileDetails[0]->graduating_yr,
                            'eYear' => $profileDetails[0]->started_yr,
                            'course' => $profileDetails[0]->course,
                            'batch' => $profileDetails[0]->batch,
                            'isProPic' => $profileDetails[0]->isProPic,
                        );

                        $this->session->set_userdata('profile_data', $session_data_profile);
                    }

                    /*$this->load->helper('url');
                    $this->load->view('header/head1');
                    $this->load->view('profile/profile');*/
                }

                $this->load->view('header/head1');
                $this->load->view('banner/banner1');
                $this->load->view('details/details');
                $this->load->view('footer/footer1');

                /*echo "successful";
                  echo '<pre>'; print_r($profileDetails); echo '</pre>';;
                  echo $email_l;
                  echo $password_l;*/
            }
            else
            {
                $data['message'] = 'Invalid username password combination';
                $this->load->view('login/new_login',$data);

                /*echo "Fail";
                echo $result;
                echo $email_l;
                echo $password_l;*/
            }
        }
    }

    //function is used when the time email does not exist.
    public function email_does_not_exists($value)
    {
        $this->load->model('Users_Model');
        return !($this->Users_Model->email_exists($value));
    }

    public function logout()
    {
        $this->load->library('session');
        $this->session->unset_userdata('profile_data');
        $this->session->unset_userdata('logged_in');
        $this->load->helper('url');
        $this->load->view('header/head1');
        $this->load->view('banner/banner1');
        $this->load->view('details/details');
        $this->load->view('footer/footer1');
    }

}


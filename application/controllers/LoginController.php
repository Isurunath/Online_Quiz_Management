<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
    }

    //
    public function register()
    {
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Users_Model');
        $this->load->library('session');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required',array('required' => 'You must provide a %s.'));
        $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login/new_register');
            echo "Failed";
        }

        else
        {
            $data = array(
                'user_name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => MD5($_POST['password']),
                'user_type' => 'STUDENT'
            );

            //Transferring data to Model
            $result = $this->Users_Model->insert($data);
            $insert_id = $this->db->insert_id();
            if($result)
            {
                $session_data=array(
                    'email'=>$_POST['email'],
                    'username'=>$_POST['name'],
                    'user_type' =>'STUDENT',
                );
                $this->session->set_userdata('logged_in',$session_data);

                $profileDetails = $this->Users_Model->getProfileDetails($insert_id);
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
                        'sYear' => $profileDetails[0]->started_yr,
                        'eYear' => $profileDetails[0]->graduating_yr,
                        'course' => $profileDetails[0]->course,
                        'batch' => $profileDetails[0]->batch,
                        'isProPic' => $profileDetails[0]->isProPic,
                        'about_me' => $profileDetails[0]->about_me,
                        'email' => $profileDetails[0]->email,
                        'date' => $profileDetails[0]->birthDate,
                        'month' => $profileDetails[0]->birthMonth,
                        'year' => $profileDetails[0]->birthYear,
                        'bt' => $profileDetails[0]->batch_time
                    );

                    $this->session->set_userdata('profile_data', $session_data_profile);
                }

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
                                                'required' => 'You have not provided %s.'
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
                            'sYear' => $profileDetails[0]->started_yr,
                            'eYear' => $profileDetails[0]->graduating_yr,
                            'course' => $profileDetails[0]->course,
                            'batch' => $profileDetails[0]->batch,
                            'isProPic' => $profileDetails[0]->isProPic,
                            'about_me' => $profileDetails[0]->about_me,
                            'email' => $profileDetails[0]->email,
                            'date' => $profileDetails[0]->birthDate,
                            'month' => $profileDetails[0]->birthMonth,
                            'year' => $profileDetails[0]->birthYear,
                            'bt' => $profileDetails[0]->batch_time
                        );

                        $this->session->set_userdata('profile_data', $session_data_profile);
                    }

                    /*$this->load->helper('url');
                    $this->load->view('header/head1');
                    $this->load->view('profile/profile');*/

                    $this->load->view('header/head1');
                    $this->load->view('banner/banner1');
                    $this->load->view('details/details');
                    $this->load->view('footer/footer1');
            }



                /*echo "successful";
                  echo '<pre>'; print_r($profileDetails); echo '</pre>';;
                  echo $email_l;
                  echo $password_l;*/

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

    public function viewusers(){

        $this->load->helper('url');
        $this->load->model('Users_Model');
        $data['users'] = $this->Users_Model->getusers();
        $this->load->view('admin/viewusers',$data);
    }

    public function passwordResetLoad()
    {
        $this->load->helper(array('form','url'));
        $this->load->model('Users_Model');
        $this->load->library('session');

        $form_data = $this->input->post();
        //print_r($form_data);
        if($form_data['email'] != null)
        {
            //echo "yes";
            $email = $form_data['email'];
            $result  = $this->Users_Model->email_exists($email);
            if($result) {

                //generate a random password and update the database
                $user_id = $result[0]->user_id;
                $e_mail = $result[0]->email;
                $this->session->set_userdata('reset_userID',$e_mail);
                $code = rand(1000,9999);
                //echo $user_id." ".$code;

                $result  = $this->Users_Model->updatePassword(md5($code),$user_id);

                //sending the code via email
                $email_config = Array(
                    'protocol'  => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => '465',
                    'smtp_user' => 'netexam.sliit@gmail.com',
                    'smtp_pass' => '0772068870s',
                    'mailtype'  => 'html',
                    'starttls'  => true,
                    'newline'   => "\r\n"
                );

                $this->load->library('email',$email_config);

                $this->email->from('netexam.sliit@gmail.com', 'Tryit Exams');
                $this->email->to($email);

                $this->email->subject('Password Reset');
                $this->email->message('Your password reset code is '.$code.'. Use this code as your password from now on. You can change your password in your profile.');

                $this->email->send();

                $this->load->view('login/resetPW_email');
            }
            else{
                //echo "yes2";
                $data['message'] = "Your email address is not in Tryit system.";
                $this->load->view('login/resetPW_email_error',$data);
            }
        }
        else
        {
           // echo "error";
            //echo "yes3";
            $data['message'] = "Please enter your email address.";
            $this->load->view('login/resetPW_email_error',$data);
        }
    }

    public function resetLogin()
    {
        $this->load->helper(array('form','url'));
        $this->load->model('Users_Model');
        $this->load->library('session');

        if(isset($this->session->userdata['reset_userID']))
        {
            $password_r= md5($_POST['FP_password']);
            $id = $this->session->userdata['reset_userID'];

            $result  = $this->Users_Model->login($id,$password_r);
            if($result)
            {
                $session_data=array(
                    'email'=>$result[0]->email,
                    'username'=>$result[0]->user_name,
                    'user_type' =>$result[0]->user_type,
                );
                $this->session->set_userdata('logged_in',$session_data);

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
                        'sYear' => $profileDetails[0]->started_yr,
                        'eYear' => $profileDetails[0]->graduating_yr,
                        'course' => $profileDetails[0]->course,
                        'batch' => $profileDetails[0]->batch,
                        'isProPic' => $profileDetails[0]->isProPic,
                        'about_me' => $profileDetails[0]->about_me,
                        'email' => $profileDetails[0]->email,
                        'date' => $profileDetails[0]->birthDate,
                        'month' => $profileDetails[0]->birthMonth,
                        'year' => $profileDetails[0]->birthYear,
                        'bt' => $profileDetails[0]->batch_time
                    );

                    $this->session->set_userdata('profile_data', $session_data_profile);
                }
                $this->load->view('header/head1');
                $this->load->view('banner/banner1');
                $this->load->view('details/details');
                $this->load->view('footer/footer1');
            }
            else
            {
                $this->load->view('login/resetPW');
            }
        }
        else
        {
            echo "failed";
        }
    }

}


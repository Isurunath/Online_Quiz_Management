<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileController extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session','form_validation');
        $this->load->model('Users_Model');
        $this->load->model('Profile_Model');
    }

    public function viewPicChange()
    {
        $data = $this->session->userdata['profile_data']['isProPic'];
        $id = $this->session->userdata['profile_data']['prof_user_id'];
        $this->load->view('profile/changeProPic',$data,$id);
    }

    public function viewEditProfile()
    {
        $this->load->view('profile/editProfile');
    }

    public function updateBasic()
    {
        $this->load->library('form_validation');
        $this->load->model('Users_Model');
        $this->load->library('session');

        $id = $this->session->userdata['profile_data']['prof_user_id'];
        $form_data = $this->input->post();


            $fname = $form_data['first_name'];
            $lname = $form_data['last_name'];
            $gender = $form_data['gender'];
            $date = $form_data['date'];
            $month = $form_data['month'];
            $year = $form_data['year'];

            //echo $fname;
            $result  = $this->Profile_Model->updateBasic($id,$fname,$lname,$gender,$date,$month,$year);
            if($result) {
                $this->sessionReset();

                $this->load->view('profile/editProfile');
                //echo "successfull";
            }
            else{
                echo "failed";
            }
    }

    public function updateContact()
    {
        $this->load->library('form_validation');
        $this->load->model('Users_Model');
        $this->load->library('session');

        $id = $this->session->userdata['profile_data']['prof_user_id'];
        $form_data = $this->input->post();


        $add1 = $form_data['address1'];
        $add2 = $form_data['address2'];
        $city = $form_data['city'];
        $phone = $form_data['phone'];

        //echo $add1;
        $result  = $this->Profile_Model->updateContact($id,$add1,$add2,$city,$phone);
        if($result) {
            $this->sessionReset();

            $this->load->view('profile/editProfile');
            //echo "successfull";
        }
        else{
            echo "failed";
        }
    }

    public function updateCourse()
    {
        $this->load->library('form_validation');
        $this->load->model('Users_Model');
        $this->load->library('session');

        $id = $this->session->userdata['profile_data']['prof_user_id'];
        $form_data = $this->input->post();


        $course = $form_data['course'];
        $batch = $form_data['batch'];
        $time = $form_data['batch_time'];
        $yr = $form_data['grad_yr'];

        //echo $add1;
        $result  = $this->Profile_Model->updateCourse($id,$course,$batch,$time,$yr);
        if($result) {
            $this->sessionReset();

            $this->load->view('profile/editProfile');
            //echo "successfull";
        }
        else{
            echo "failed";
        }
    }


    public function updateAbout()
    {
        $this->load->library('form_validation');
        $this->load->model('Users_Model');
        $this->load->library('session');

        $id = $this->session->userdata['profile_data']['prof_user_id'];
        $form_data = $this->input->post();

        $about = $form_data['about'];

        //echo $add1;
        $result  = $this->Profile_Model->updateAbout($id,$about);
        if($result) {
            $this->sessionReset();

            $this->load->view('profile/editProfile');
            //echo "successfull";
        }
        else{
            echo "failed";
        }
    }

    public function loadSidePanel()
    {
        $this->load->view('profile/updatedProfile');
    }

    public  function sessionReset()
    {
        $id = $this->session->userdata['profile_data']['prof_user_id'];

        $this->session->unset_userdata('profile_data');
        $profileDetails = $this->Users_Model->getProfileDetails($id);
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
    }

    public function do_upload()
    {
        //echo "test1";
        if(isset($this->session->userdata['profile_data']))
        {
            $id = $this->session->userdata['profile_data']['prof_user_id'];

            $config = array(
                'upload_path' => "./Profile_Pictures/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "768",
                'max_width' => "1024",
                'file_name' => $id.".jpg"
            );

            $this->load->library('upload', $config);
            if($this->upload->do_upload())
            {
                //echo "test2";
                $result  = $this->Profile_Model->updateProPic($id);
                if($result) {
                    //echo "test3";
                    //unset the previous profile data session
                    $this->session->unset_userdata('profile_data');

                    $profileDetails = $this->Users_Model->getProfileDetails($id);
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
                            'about_me' => $profileDetails[0]->about_me,
                            'email' => $profileDetails[0]->email,
                            'date' => $profileDetails[0]->birthDate,
                            'month' => $profileDetails[0]->birthMonth,
                            'year' => $profileDetails[0]->birthYear,
                            'bt' => $profileDetails[0]->batch_time
                        );

                        $this->session->set_userdata('profile_data', $session_data_profile);

                        //loading the view
                        $data = array('upload_data' => $this->upload->data());

                        //echo '<pre>'; print_r($data); echo '</pre>';
                        $this->load->view('header/head1');
                        $this->load->view('profile/profile', $data);
                    }
                }

                /*echo "successful";
                echo '<pre>'; print_r($data); echo '</pre>';*/
            }
            else
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('header/head1');
                $this->load->view('profile/profile', $error);


                //echo "fails";
                //echo '<pre>'; print_r($error); echo '</pre>';
            }
        }
        else
        {
            $this->load->view('profile/profile');
        }
    }

    public function checkPassword()
    {
        $this->load->library('form_validation');
        $this->load->model('Users_Model');
        $this->load->library('session');

        $id = $this->session->userdata['profile_data']['prof_user_id'];
        $form_data = $this->input->post();
        $cPassword = md5($form_data['cpw']);

        $result  = $this->Users_Model->checkPassword($id,$cPassword);
        //print_r($result);
        if($result) {
            echo "true";
        }
        else{
            echo "false";
        }
    }

    public function updatePassword()
    {
        $this->load->library('form_validation');
        $this->load->model('Users_Model');
        $this->load->library('session');

        $id = $this->session->userdata['profile_data']['prof_user_id'];
        $form_data = $this->input->post();
        $nPassword = md5($form_data['npw']);

        $result  = $this->Users_Model->updatePassword($nPassword,$id);
        //print_r($result);
        if($result) {
            $this->sessionReset();
            $this->load->view('profile/editProfile');
        }
        else{
            echo "failed";
        }
    }
}


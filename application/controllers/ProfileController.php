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

    public function do_upload()
    {
        //echo "test1";
        if(isset($this->session->userdata['profile_data']))
        {
            $id = $this->session->userdata['profile_data']['prof_user_id'];
            $config = array(
                'upload_path' => "./Profile_Picture/",
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


                /*echo "fails";
                echo '<pre>'; print_r($error); echo '</pre>';*/
            }
        }
        else
        {
            $this->load->view('profile/profile');
        }
    }
}


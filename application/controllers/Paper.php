<?php

/**
 * Created by PhpStorm.
 * User: Chameera_Intern
 * Date: 9/21/2016
 * Time: 11:50 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Paper extends CI_Controller
{
    public function paperlayout()
    {
        $this->load->library('session');
        if(isset($this->session->userdata['logged_in']))
        {

            $batch = $this->session->userdata['profile_data']['batch'];
            $student_id = $this->session->userdata['profile_data']['prof_user_id'];
            if($batch == '' or $batch == null)
            {
                $message['mas'] = "Your Batch is not set. Please go to Edit Profile and update your batch";
                $this->load->library('session');
                $this->load->helper('url');
                $this->load->view('header/head1');
                $this->load->view('paper/NoPaperToday', $message);
                $this->load->view('footer/footer1');

            }
            else {
                $this->load->model('question_model');
                $resPaperLayout = $this->question_model->getpaperLayout(date("Y-m-d"), $batch);
                if ($resPaperLayout) {
                    $data['single_choice'] = $resPaperLayout->single_choice;
                    $data['true_false'] = $resPaperLayout->true_false;
                    $data['multiple_choice'] = $resPaperLayout->multiple_choice;
                    $data['short_answer'] = $resPaperLayout->short_answer;
                    $qpwd = $resPaperLayout->quiz_password;
                    $pwd_frompage = $this->input->get('quiz_pwd');

                    $resPaperDownload = $this->question_model->getpaperDownload($resPaperLayout->paper_id, $student_id);
                    if ($resPaperDownload) {

                        $message['mas'] = "You have already Download the paper once";
                        $this->load->library('session');
                        $this->load->helper('url');
                        $this->load->view('header/head1');
                        $this->load->view('paper/NoPaperToday', $message);
                        $this->load->view('footer/footer1');
                    } else {
                        if ($qpwd == $pwd_frompage) {


                            $this->load->helper('url');
                            $this->load->model('question_model');
                            $data['qestiontype_id'] = $this->question_model->getquestions(1);//result of your query is stored in this ($data['progcategoryid']) variable
                            $data['gettruefalse'] = $this->question_model->getquestions(2);
                            $data['getmultiple'] = $this->question_model->getquestions(3);
                            $data['getshortanswer'] = $this->question_model->getquestions(4);
                            //$this->load->view('paper/paper', $data);

                            //convert to pdf
                            $pdfFilePath = FCPATH . "/downloads/reports/aaaa.pdf";
                            $html = $this->load->view('paper/paper', $data, true); // render the view into HTML
                            $this->load->library('pdf');
                            $pdf = $this->pdf->load();
                            $pdf->useActiveForms = true;
                            $pdf->SetFooter($_SERVER['HTTP_HOST'] . '|{PAGENO}|' . date(DATE_RFC822)); // Add a footer for good measure 😉
                            $pdf->WriteHTML($html); // write the HTML into the PDF
                            $pdf->Output(); // save to file because we can
                            chmod($pdfFilePath, 0777);

                            $downloadDetails = array(
                                'layout_id' => $resPaperLayout->paper_id,
                                'student_id' => $student_id,
                                'batch_no' => $batch,
                                'download_date' => date("Y-m-d"),
                                'download_time' => date("h:i:sa"),
                            );
                            $this->question_model->insert_paperDownload($downloadDetails);
                        } else {
                            $data['message'] = 'Invalin Quiz Password';
                            $this->load->helper('url');
                           // $this->load->view('header/head1');
                            $this->load->view('paper/downloadPage', $data);
                            $this->load->view('footer/footer1');
                        }
                    }
                } else {
                    $message['mas'] = "Today you don't have any paper :-)";
                    $this->load->library('session');
                    $this->load->helper('url');
                    $this->load->view('header/head1');
                    $this->load->view('paper/NoPaperToday', $message);
                    $this->load->view('footer/footer1');
                }
            }
        }
        else{
            $this->load->helper('url');
            //$this->load->view('header/head1');
            $this->load->view('login/new_login');
        }

    }

    public function downloadPage() {
        $this->load->library('session');
       // if(isset($this->session->userdata['logged_in'])) {
          //  $data['$email'] = ($this->session->userdata['logged_in']['email']);
         //   $data['$username'] = ($this->session->userdata['logged_in']['username']);
         //   $data['$type'] = ($this->session->userdata['logged_in']['user_type']);
      //  $data1['dd'] =($this->session->userdata['logged_in']['username']);

            //result of your query is stored in this ($data['progcategoryid']) variable
            //  $this->load->view('paper/paper', $data);
            $this->load->helper('url');
            //$this->load->view('header/head1');
            //$this->load->view('login/login');
            //$this->load->view('banner/banner1');
            $this->load->view('paper/downloadPage');
            //$this->load->view('footer/footer1');
       // }
    }

}
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

        $this->load->model('question_model');
        $resPaperLayout = $this->question_model->getpaperLayout(1);
        if($resPaperLayout){
            $data['single_choice']=$resPaperLayout->single_choice;
            $data['true_false']=$resPaperLayout->true_false;
            $data['multiple_choice']=$resPaperLayout->multiple_choice;
        }

        $this->load->helper('url');
        $this->load->model('question_model');
        $data['qestiontype_id'] = $this->question_model->getquestions(1);//result of your query is stored in this ($data['progcategoryid']) variable
        $data['gettruefalse']= $this->question_model->getquestions(2);
        $data['getmultiple']= $this->question_model->getquestions(3);
        //$this->load->view('paper/paper', $data);

       //convert to pdf
        $pdfFilePath = FCPATH."/downloads/reports/aaaa.pdf";
        $html = $this->load->view('paper/paper', $data, true); // render the view into HTML
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->useActiveForms = true;
        $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure 😉
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $pdf->Output(); // save to file because we can
        chmod($pdfFilePath,0777);


    }

    public function downloadPage() {
        //result of your query is stored in this ($data['progcategoryid']) variable
        //  $this->load->view('paper/paper', $data);
        $this->load->helper('url');
        $this->load->view('header/head1');
        //$this->load->view('login/login');
        //$this->load->view('banner/banner1');
        $this->load->view('paper/downloadPage');
        $this->load->view('footer/footer1');
    }

}
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
        $this->load->helper('url');
        $this->load->model('question_model');
        $data['qestiontype_id'] = $this->question_model->getquestions(1);//result of your query is stored in this ($data['progcategoryid']) variable
      //  $this->load->view('paper/paper', $data);
        $pdfFilePath = FCPATH."/downloads/reports/aaaa.pdf";

        $html = $this->load->view('paper/paper', $data, true); // render the view into HTML

        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->useActiveForms = true;
        $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure 😉
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $pdf->Output(); // save to file because we can



    }

    public function getpaperLayout() {
        $this->load->model('question_model');
        $data['layout'] = $this->question_model->getpaperLayout();//result of your query is stored in this ($data['progcategoryid']) variable
        //  $this->load->view('paper/paper', $data);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: Nipuni
 * Date: 09/20/2016
 * Time: 12:39 AM
 */
include 'vendor\autoload.php';
include APPPATH . 'libraries\fpdf\fpdf.php';
use Smalot\PdfParser\Parser;
defined('BASEPATH') OR exit('No direct script access allowed');

class MarkingSchemecontroller extends CI_Controller{

    public function index(){
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');

        if($this->form_validation->run()==FALSE){
            $this->load->view('papermarking');
        }


        $this->load->view('paperMarking/papermarking',['answersheet']);

        $downloadDetails = array(
            'error' => " "
        );

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->view('paperMarking/papermarking',$downloadDetails);
    }

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->helper('form');
    }

    //search the compatible marking scheme
    public function searchMarkingScheme(){
        $this->load->helper();
        $this->load->database();
        $this->load->model('MarkingSchememodel');

        $paperID=$_POST['answersheet'];

        if(isset($_POST['answersheet'])){
            $markngID=$this->MarkingSchememodel->searchMarkingSchemeID($paperID);
            $this->load->view('papermarking',$markngID);
        }
        else
        {
            echo 'Error';
        }
    }



    //load the whole marking scheme according to the marking scheme id
    private function getMarkingScheme(){
        $this->load->helper();
        $this->load->database();
        $this->load->model('MarkingSchememodel');

        $paperID=$_POST['answersheet'];

        if(isset($_POST['answersheet'])) {
            $markngID = $this->MarkingSchememodel->searchMarkingSchemeID($paperID);
        }

        $data = $this->MarkingSchememodel->getMarkingScheme($markngID);

        return $data;

    }

    //load the answers in the marking scheme according to the marking scheme id
    private function getMarkingSchemeAnswers(){
        $this->load->helper();
        $this->load->database();
        $this->load->model('MarkingSchememodel');

        $paperID=$_POST['answersheet'];

        if(isset($_POST['answersheet'])) {
            $markngID = $this->MarkingSchememodel->searchMarkingSchemeID($paperID);


            $data = $this->MarkingSchememodel->getMarkingSchemeAnswers($markngID);
        }

        return $data;

    }

    //convert the uploaded pdf into a text file(it is necessary in the procees of marking the answer sheet )
    private function convertAnswerSheet(){

        $fileName=$_POST['answersheet'];

        if(isset($_POST['answersheet'])) {
            $pdfFile="uploads/" . $fileName;//here
            $fileName = explode(".",$fileName);
            $textFile="$fileName[0]" . ".txt";

            // Parse pdf file and build necessary objects.
            $parser = new Parser();
            $pdf    = $parser->parseFile($pdfFile);

            // Retrieve all pages from the pdf file.
            $pages  = $pdf->getPages();

            // Loop over each page to extract text.
            foreach ($pages as $page) {
                if (file_exists($textFile)) {
                    $fh = fopen($textFile, 'a');
                } else {
                    $fh = fopen($textFile, 'w');
                }
                //write the output into a text file
                // Loop over each page to extract text.
                foreach ($pages as $page) {
                    fwrite($fh,$page->getText());
                }
                fclose($fh);

            }
            return $textFile;

        }else{
            echo 'Cant open the file';
        }


    }


    //get the student answers extract from the text file which is created using uploaded answer sheet
    private function getStudenAnswers(){

            $txtFile = $this->convertAnswerSheet();

            $file = fopen("$txtFile", "r");
            $i = 0;
            $stuAns = array();

            if ($file) {
                while (!feof($file)) {
                    $str = fgets($file);

                    //extract student answers from the text file
                    if (preg_match('#^Answer-#', $str) === 1) {
                        $str1=explode('-',$str);
                        $stuAns[$i] = $str1[1];
                        $i++;
                    }
                }
            }

            fclose($file);

            return $stuAns;

    }

    //compare student answers with answers in the marking scheme
    public function compareAnswers(){

            $markingScheme = $this->getMarkingSchemeAnswers();

            $studentAns = $this->getStudenAnswers();

            $marksAndQus = $this->getMarkingScheme();

            $finalOutput = array();


        //return var_dump($marksAndQus);
        //return var_dump($studentAns[0]);

            for ($i = 0; $i < sizeof($markingScheme); $i++) {
                if (strcmp($markingScheme[$i],$studentAns[$i])> 0) {
                    $finalOutput[$i]['question'] = $marksAndQus[$i];
                    $finalOutput[$i]['stuAns'] = $studentAns[$i];
                    $finalOutput[$i]['answer'] = $markingScheme[$i];
                    $finalOutput[$i]['marks'] = 0.0;
                    $finalOutput[$i]['status'] = false;
                } else {
                    $finalOutput[$i]['question'] = $marksAndQus[$i];
                    $finalOutput[$i]['stuAns'] = $studentAns[$i];
                    $finalOutput[$i]['answer'] = $markingScheme[$i];
                    $finalOutput[$i]['marks'] = 1.0;
                    $finalOutput[$i]['status'] = true;
                }

            }

            return $finalOutput;

    }

    //calculate total marks
    private function calcTotalMarks(){

            $finalResults = $this->compareAnswers();

            $total=0;

            for ($i = 0; $i < sizeof($finalResults); $i++) {
                $marks=$finalResults[$i]['marks'];
                //return var_dump($marks);
                $total= $total + $marks;
            }
            $data=array('total'=>$total);
            $this->load->view('paperMarking/papermarking',$data);

    }

    //process of paper marking
    public  function processPaperMarking()
    {

        $file = $_FILES['answersheet'];

        if(empty($file)){

            $message='File Doesnt Exists.Please Check Again.';
            $this->load->view('paperMarking/papermarking',$message);

        }else {

            $fileName = $file['name'];
            $_POST['answersheet'] = $fileName;
            $_POST['pdfFile'] = $file;

            move_uploaded_file($_FILES['answersheet']['tmp_name'], "uploads/" . $_FILES['answersheet']['name']);


            $finalOutput = $this->compareAnswers();
            unlink(explode('.', $fileName)[0] . ".txt");
            $this->load->view('paperMarking/paperReview');
            //return var_dump($finalOutput);
        }


    }

    //Create a review of the paper and generate a pdf to show the review of the paper
    public function createReview(){
        $this->load->library('fpdf');
        $file = $_FILES['answersheet'];

        if(is_null($file)){

            $message='File Doesnt Exists.Please Check Again.';
            $this->load->view('paperMarking/paperReview',$message);

        }else {

            $fileName = $file['name'];
            $_POST['answersheet'] = $fileName;
            $_POST['pdfFile'] = $file;

            move_uploaded_file($_FILES['answersheet']['tmp_name'], "uploads/" . $_FILES['answersheet']['name']);

            unlink(explode('.', $fileName)[0] . ".txt");
        }

            $finalResults= $this->compareAnswers();
            $data=array('final_Results'=> $finalResults);
            $this->load->view('paperMarking/paperReview',$data);


            //create a FPDF object
            $pdf = new FPDF();

            //set document properties
            $pdf->SetTitle('Review Of The Paper');

            //set font for the entire document
            $pdf->SetFont('Helvetica', 'B', 20);
            $pdf->SetTextColor(0, 0, 0);

            //set up a page
            $pdf->AddPage('P');
            $pdf->SetDisplayMode(real, 'default');

            //setting headers to the table
            $pdf->Cell(90, 12, 'Question', 1);
            $pdf->Cell(90, 12, 'Your Answer', 1);
            $pdf->Cell(90, 12, 'Correct Answer', 1);
            $pdf->Cell(90, 12, 'Marks', 1);


            //print the output in the pdf & printing all the keys and values one by one
            for ($i = 0; $i < 10; $i++) {
                $pdf->Ln();

                if ($finalResults[$i]['status'] === true) {
                    $pdf->Cell(90, 12, $finalResults[$i]['question'], 1);
                    $pdf->SetTextColor(0, 128, 0);
                    $pdf->Cell(90, 12, $finalResults[$i]['stuAns'], 1);
                    $pdf->Cell(90, 12, $finalResults[$i]['answer'], 1);
                    $pdf->SetTextColor(0, 0, 0);
                    $pdf->Cell(90, 12, $finalResults[$i]['marks'], 1);

                } else {
                    $pdf->Cell(90, 12, $finalResults[$i]['question'], 1);
                    $pdf->SetTextColor(139, 0, 0);
                    $pdf->Cell(90, 12, $finalResults[$i]['stuAns'], 1);
                    $pdf->SetTextColor(0, 128, 0);
                    $pdf->Cell(90, 12, $finalResults[$i]['answer'], 1);
                    $pdf->SetTextColor(0, 0, 0);
                    $pdf->Cell(90, 12, $finalResults[$i]['marks'], 1);
                }

            }

            $pdf->Ln();
            $pdf->Cell(90, 12, 'Total Marks ='.$this->calcTotalMarks(), 1);



            //Output the document

            $review = explode('.', $fileName)[0] . "Review.pdf";
            $pdf->Output($review,'I');

            //return var_dump($finalResults);
        /*}else{
            $message='Something went wrong.Please check again.';
            $this->load->view('paperMarking/papermarking',$message);
        }
        */

    }




    public  function getFinalOutput()
    {

        $file = $_FILES['answersheet'];

        if (empty($file)) {

            $message = 'File Doesnt Exists.Please Check Again.';
            $this->load->view('paperMarking/papermarking', $message);

        } else {

            $fileName = $file['name'];
            $_POST['answersheet'] = $fileName;
            $_POST['pdfFile'] = $file;

            move_uploaded_file($_FILES['answersheet']['tmp_name'], "uploads/" . $_FILES['answersheet']['name']);


            $finalOutput = $this->compareAnswers();
            unlink(explode('.', $fileName)[0] . ".txt");



        }
    }

    public function loadReview()
    {
            $this->load->library('session');
            $this->load->helper('url');

           // $file=$_FILES['answersheet'];

            if(!empty($_FILES['answersheet'])){
                $this->load->view('paperMarking/paperReview');
            }else{
                $msg='You Have To Upload An Answer Sheet';
                $this->load->view('paperMarking/papermarking',$msg);
            }

        }


    public function checkUpload()
    {

        $this->load->library('session');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 10000;
            $config['max_width'] = 1024;
            $config['max_height'] = 768;

            $this->load->library('upload', $config);
            $file = $_FILES['answersheet'];

            if (!empty($file)) {

                    $downloadDetails = array(
                        'error' => $this->upload->display_errors()
                    );
                    // $error = array('error' => $this->upload->display_errors());
                    $this->load->helper('url');
                    $this->load->view('paperMarking/papermarking', $downloadDetails);


            }
    }
    }




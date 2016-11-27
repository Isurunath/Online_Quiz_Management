<?php
/**
 * Created by PhpStorm.
 * User: Nipuni
 * Date: 09/20/2016
 * Time: 12:39 AM
 */
include 'vendor/autoload.php';
include 'libraries/fpdf.php';

class MarkingSchemecontroller extends CI_Controller{

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
            return $markngID;
        }else{
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

        $data = array(
            'results' => $this->MarkingSchememodel->getMarkingScheme($markngID)
        );

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
        }

        $data = array(
            'results' => $this->MarkingSchememodel->getMarkingSchemeAnswers($markngID)
        );

        return $data;

    }

    //convert the uploaded pdf into a text file(it is necessary in the procees of marking the answer sheet )
    private function convertAnswerSheet(){
        $fileName=$_POST['answersheet'];

        if(isset($_POST['answersheet'])) {
            $pdfFile="$fileName.pdf";
            $textFile="$fileName.txt";

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
                fwrite($fh, $page->getText());
                fclose($fh);

            }
            return $textFile;
        }else{
            echo 'Error';
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
                        $stuAns[$i] = $str;
                        $i++;
                    }
                }
            }

            fclose($txtFile);

            return $stuAns;

    }

    //compare student answers with answers in the marking scheme
    private function compareAnswers(){

            $markingScheme = array(
                $this->getMarkingSchemeAnswers()
            );
            $studentAns = array(
                $this->getStudenAnswers()
            );
            $marksAndQus = array(
                $this->getMarkingScheme()
            );
            $finalOutput = array();

            for ($i = 0; $i < sizeof($markingScheme); $i++) {
                if ($markingScheme[$i] === $studentAns[$i]) {
                    $finalOutput[$i]['question'] = $marksAndQus[$i][0];
                    $finalOutput[$i]['stuAns'] = $studentAns[$i];
                    $finalOutput[$i]['answer'] = $markingScheme[$i];
                    $finalOutput[$i]['marks'] = $marksAndQus[$i][2];
                    $finalOutput[$i]['status'] = true;
                } else {
                    $finalOutput[$i]['question'] = $marksAndQus[$i][0];
                    $finalOutput[$i]['stuAns'] = $studentAns[$i];
                    $finalOutput[$i]['answer'] = $markingScheme[$i];
                    $finalOutput[$i]['marks'] = 0.0;
                    $finalOutput[$i]['status'] = false;
                }
            }

            return $finalOutput;

    }

    //calculate total marks
    public function calcTotalMarks(){

            $finalResults = $this->compareAnswers();

            $total = 0;

            for ($i = 0; $i < sizeof($finalResults); $i++) {
                $total = $total + $finalResults[$i]['marks'];
            }

            return $total;

    }

    //Create a review of the paper and generate a pdf to show the review of the paper
    public function createReview(){

        $paperID=$_POST['answersheet'];

        if(isset($_POST['answersheet'])) {

            $finalResults = $this->compareAnswers();

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
            for ($i = 0; $i < count($finalResults); $i++) {
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

            //Output the document
            $review = $paperID . " " . 'Review' . 'pdf';
            $pdf->Output($review, 'I');
        }else{
            echo 'Error';
        }

    }


    //process of paper marking
    public  function processPaperMarking(){

        $finalOutput[] = $this->compareAnswers();

        if(!empty($finalOutput)){
            return true;
        }else{
            return false;
        }

    }


}
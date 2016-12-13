<!DOCTYPE HTML>
<html>
<head>
    <title>Tryit</title>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <?php
    $this->load->view("admin/references");
    ?>



</head>
<body>
<?php

function FileChecker($path)
{
    if (!file_exists($path)) {
        echo 'That file does not exists.';
    }
}

echo validation_errors();

?>


<div class="page-container">
    <!--/content-inner-->
    <div class="left-content">
        <div class="inner-content">
            <!--//outer-wp-->
            <div class="outter-wp">
                <!--/sub-heard-part-->
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">
                        <li><a href="<?php echo site_url('hello/admin'); ?>">Home</a></li>
                        <li class="active">Paper Marking</li>
                    </ol>
                </div>
                <!--/sub-heard-part-->

                <!--/forms-->
                <div class="forms-main">

                    <!--/forms-inner-->
                    <div class="forms-inner">
                        <!--/set-2-->
                        <div class="set-1">
                            <div class="graph-2 general">
                                <h3 class="inner-tittle two">Paper Marking Process</h3>

                                <div class="grid-1">
                                    <div class="form-body">
                                        <form method="post" onSubmit="window.location.reload()" name="form_layout" action="<?php echo site_url ('MarkingSchemecontroller/processPaperMarking'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="selector1" class="col-sm-2 control-label">Upload The Answer Sheet :</label>
                                                <div class="col-sm-1">
                                                    <input type="file" placeholder="Answer Sheet" class="btn btn-primary" style="margin-right: 300px" name="answersheet" id="answersheet" size = "10" title="Upload Anwer Sheet"/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-sm-8">
                                                    <br>
                                                    <button type="submit" class="btn btn-default" style="margin-right: 300px" name="markPaper" id="markPaper" title="To Start The Paper Marking Process" onclick="<?php echo site_url('MarkingSchemecontroller/processPaperMarking');?>">Click To Start The Paper Marking Process</button>
                                                </div>
                                            </div>
                                        </form>


                                            <form method="post" onSubmit="window.location.reload()" name="form_layout" action="<?php echo site_url ('MarkingSchemecontroller/loadReview'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                <div class="form-group">
                                                    <div class="col-sm-8">
                                                        <?php
                                                        if(isset($_POST['answersheet'])){
                                                            if(!isset($_FILES['answersheet']) || $_FILES['answersheet']['error']==UPLOAD_ERR_NO_FILE) {
                                                                echo "Error No File Selected.Please Select A File";
                                                            }
                                                        }

                                                        ?>
                                                        <br>
                                                        &nbsp;&nbsp;
                                                        <button type="submit" class="btn btn-default" style="margin-right: 300px" name="review" id="review" title="To Review The Paper" onclick="<?php echo site_url('MarkingSchemecontroller/loadReview');?>">Review Of The Paper</button>
                                                    </div>
                                                </div>
                                            </form>


                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--//set-2-->

                    </div>
                    <!--//forms-inner-->
                </div>
                <!--//forms-->
            </div>
            <!--//outer-wp-->
            <!--footer section start-->
            <footer>
                <p>&copy 2016 Tryit . All Rights Reserved | Design by SEP_WE_013</a></p>
            </footer>
            <!--footer section end-->
        </div>
    </div>
    <!--//content-inner-->

    <?php
    $this->load->View("admin/sidebar");
    ?>

    <div class="clearfix"></div>
</div>

</body>
</html>


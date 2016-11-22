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
<div class="page-container">
    <!--/sidebar-menu-->
    <div class="sidebar-menu">
        <?php
        $this->load->view("admin/sidebar");

        function FileChecker($path)
        {
            if (!file_exists($path)) {
                echo 'That file does not exists.';
            }
        }

        ?>
    </div>
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

                <div class="forms-main">

                    <!--/forms-inner-->
                    <div class="forms-inner">
                        <!--/set-2-->
                        <div class="set-1">
                            <div class="graph-2 general">
                                <h3 class="inner-tittle two">Paper Marking</h3>
                                <div class="grid-1">
                                    <!-- <div class="col-sm-12">   -->
                                    <form class="form" action="<?php echo base_url(); ?>MarkingSchemecontroller/processPaperMarking" method="post">

                                        <label for="name" class="col-sm-2 control-label">Upload The Answer Sheet :</label>
                                        <input type="file" placeholder="Answer Sheet" class="btn btn-primary" name="anwersheet" id="answersheet" size = "20"/>
                                        <br>
                                        <label for="name" class="col-sm-2 control-label">Search Compatible Marking Scheme :</label>
                                        <input type="text" placeholder="Compatible Marking Scheme" name="mrknschmName" id="mrknschmName" value="<?php echo base_url()?>MarkingSchemecontroller/searchMarkingScheme()"/>
                                        <button type="button"  name="searchMarkngSchm" id="searchMarkngSchm" formaction="<?php echo base_url()?>MarkingSchemecontroller/searchMarkingScheme()">Search Marking Scheme</button>
                                        <br>
                                        <button type="button" name="markPaper" id="markPaper" formaction="<?php echo base_url()?>MarkingSchemecontroller/processPaperMarking()">Mark Paper</button>
                                        <button type="button" name="review" id="review" formaction="<?php echo base_url()?>MarkingSchemecontroller/createReview()">Review Of The Paper</button>
                                        <br>
                                        <label for="marks" class="col-sm-2 control-label">Total Marks :</label>
                                        <input type="text" placeholder="Total Marks" name="totmarks" id="totmarks"/>

                                    </form>

                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>


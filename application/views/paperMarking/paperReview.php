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
    <!--/content-inner-->
    <div class="left-content">
        <div class="inner-content">
            <!--//outer-wp-->
            <div class="outter-wp">
                <!--/sub-heard-part-->
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">
                        <li><a href="<?php echo site_url('hello/admin'); ?>">Home</a></li>
                        <li class="active">Review Of The Paper</li>
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
                                <h3 class="inner-tittle two">Review</h3>

                                <div class="grid-1">
                                    <div class="form-body" style="color: #0b0b0b">
                                        <form method="post" onSubmit="window.location.reload()" name="form_layout" action="<?php echo site_url ('MarkingSchemecontroller/createReview'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <table style='padding-left:10px; color: #0b0b0b' >
                                                <tr>
                                                    <th><h3><b>Question</b></h3></th>
                                                    <th><h3><b>Your Answer</b></h3></th>
                                                    <th><h3><b>Correct Answer</b></h3></th>
                                                    <th><h3><b>Marks</b></h3></th>
                                                </tr>
                                                <tr>
                                                    <th>What does SQL stand for?</th>
                                                    <th>Structured Query Language</th>
                                                    <th>Structured Query Language</th>
                                                    <th>1</th>
                                                </tr>
                                                <tr>
                                                    <th>Which SQL statement is used to extract data from a database?</th>
                                                    <th>SELECT</th>
                                                    <th>SELECT</th>
                                                    <th>1</th>
                                                </tr>
                                                <tr>
                                                    <th>Which SQL statement is used to update data in a database</th>
                                                    <th>UPDATE</th>
                                                    <th>UPDATE</th>
                                                    <th>1</th>
                                                </tr>
                                                <tr>
                                                    <th>Which SQL statement is used to delete data from a database?</th>
                                                    <th>DELETE</th>
                                                    <th>DELETE</th>
                                                    <th>1</th>
                                                </tr>
                                                <tr>
                                                    <th>Which SQL statement is used to insert new data in a database?</th>
                                                    <th>INSERT INTO</th>
                                                    <th>INSERT INTO</th>
                                                    <th>1</th>
                                                </tr>
                                                <tr>
                                                    <th>With SQL, how do you select a column named "FirstName" from a table named "Persons"?</th>
                                                    <th>SELECT FirstName FROM Persons</th>
                                                    <th>SELECT FirstName FROM Persons</th>
                                                    <th>1</b></h3></th>
                                                </tr>
                                                <tr>
                                                    <th>With SQL, how do you select all the columns from a table named "Persons"?</th>
                                                    <th>SELECT * FROM Persons</th>
                                                    <th>SELECT * FROM Persons</th>
                                                    <th>1</th>
                                                </tr>
                                                <tr>
                                                    <th>With SQL, how do you select all the records from a table named "Persons" where the value of the column "FirstName" is "Peter"?</th>
                                                    <th>SELECT * FROM Persons WHERE FirstName='Peter</th>
                                                    <th>SELECT * FROM Persons WHERE FirstName='Peter</th>
                                                    <th>1</th>
                                                </tr>
                                                <tr>
                                                    <th>With SQL, how do you select all the records from a table named "Persons" where the value of the column "FirstName" starts with an "a"?</th>
                                                    <th>SELECT * FROM Persons WHERE FirstName LIKE 'a%'</th>
                                                    <th>SELECT * FROM Persons WHERE FirstName LIKE 'a%'</th>
                                                    <th>1</th>
                                                </tr>
                                                <tr>
                                                    <th>Which SQL keyword is used to sort the result-set?</th>
                                                    <th>ORDER BY</th>
                                                    <th>ORDER BY</th>
                                                    <th>1</th>
                                                </tr>


                                                <br><br>

                                                <?php
                                                    $total=0;

                                                    //for($i=0;$i<10;$i++){
                                                        //$total=array_sum($final_Results[i]['marks']);
                                                    //}

                                                ?>
                                                <tr><tb><?php echo "Total Marks :10";?></tb>
                                                </tr>
                                                </table>

                                                <div class="form-group">
                                                    <div class="col-sm-8">
                                                        <br>
                                                        &nbsp;&nbsp;
                                                        <button type="submit" class="btn btn-default" style="margin-right: 300px" name="review" id="review" title="Download the PDF of Paper Review" onclick="<?php echo site_url ('MarkingSchemecontroller/createReview'); ?>">PDF Version - Review Of The Paper</button>
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


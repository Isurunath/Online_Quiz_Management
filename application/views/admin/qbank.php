<!DOCTYPE HTML>
<html>
<head>
    <title>Tryit</title>

    <?php
        $this->load->view("admin/references");
    ?>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
        $(function() {
            $( "#datepicker1" ).datepicker({ minDate: -100, maxDate: "+0D" });
            $("#datepicker1").datepicker("setDate",new Date());
            $( "#datepicker1" ).datepicker( "option", "dateFormat", "dd/mm/yy");
        });

        $(function() {
            $( "#datepicker2" ).datepicker({ minDate: -100, maxDate: "+0D" });
            $("#datepicker2").datepicker("setDate",new Date());
            $( "#datepicker2" ).datepicker( "option", "dateFormat", "dd/mm/yy");
        });
    </script>

    <script>
        function submitLayout() {
            if(document.getElementById) {
                document.form_layout.reset();
            }
        }

        $(document).ready(function () {
          $('.group').hide();
          $('#selectMe').change(function () {
            $('.group').hide();
            $('#'+$(this).val()).show();
          })
        });

        function doconfirm()
        {
            job=confirm("Are you sure to Add this Question?");
            if(job!=true)
            {
                return false;
            }
        }
    </script>

</head>
<body>
<div class="page-container">

    <!--/sidebar-menu-->
    <div class="sidebar-menu">
        <?php
            $this->load->view("admin/sidebar");
        ?>
    </div>


    <!--/content-inner-->
    <div class="left-content">
        <div class="inner-content">
            <!--//outer-wp-->
            <div class="outter-wp">
                <!--/sub-heard-part-->
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">
                        <li><a href="<?php echo site_url('hello/admin'); ?>">Home</a></li>
                        <li class="active">Add Questions</li>
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
                                <h3 class="inner-tittle two">Add Questions</h3>

                                

                                <div class="grid-1">

                                    <div class="col-sm-12">  

                                        <label for="selector1" class="col-sm-3 control-label">Question Type</label>
                                                    <div class="col-sm-8"><select id="selectMe" name="qtype" class="form-control1">
                                                            <option>--Choose paper type--</option>
                                                            <option value="option1">MCQ</option>
                                                            <option value="option2">True/False</option>
                                                            <option value="option3">Multiple Answer Questions</option>
                                                            <option value="option4">Single Answer Questions</option>
                                                        </select></div>

                                    </div>  
                                    <div class="form-body">


                                           <!--<?php echo validation_errors(); ?> -->

                                                

                                            <div id="option1" class="group">

                                                <form method="post" name="form_layout" action="<?php echo site_url ('QuestionBank/AddQuestion'); ?>" class="form-horizontal">

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Question</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="question" id="single" class="form-control1" required></textarea></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Correct Answer</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="answer" id="single" class="form-control1" required></textarea></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Answer 1</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="mcq1" id="single" class="form-control1" required></textarea></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Answer 2</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="mcq2" id="single" class="form-control1" required></textarea></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Answer 3</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="mcq3" id="single" class="form-control1" required></textarea></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Answer 4</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="mcq4" id="single" class="form-control1" required></textarea></div>
                                                    </div>

                                                    
                                                    <input type="hidden" name="qtype" value="1" >

                                                    <button onclick="return doconfirm()" type="submit" class="btn btn-default" style="margin-left: 175px">Submit</button>
                                                </form>

                                            </div>

                                            <div id="option2" class="group">

                                                    <form method="post" name="form_layout" action="<?php echo site_url ('QuestionBank/AddQuestion'); ?>" class="form-horizontal">

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Question</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="question" id="single" class="form-control1" required></textarea></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">True/False</label>
                                                        <div class="col-sm-8">

                                                        <select name="answer" id="single" class="form-control1">
                                                            <option>True</option>
                                                            <option>False</option>
                                                        </select>
                                                        </div>


                                                    </div>

                                                        <input type="hidden" name="qtype" value="2" >
                                                        <input type="hidden" name="mcq1" value="" >
                                                        <input type="hidden" name="mcq2" value="" >
                                                        <input type="hidden" name="mcq3" value="" >
                                                        <input type="hidden" name="mcq4" value="" >


                                                        <button onclick="return doconfirm()" type="submit" class="btn btn-default" style="margin-left: 175px">Submit</button>

                                                </form>
                                            </div>
                                            <div id="option3" class="group">

                                                <form method="post" name="form_layout" action="<?php echo site_url ('QuestionBank/AddMultiQuestion'); ?>" class="form-horizontal">

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Question</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="question" id="single" class="form-control1" required></textarea></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Answer 1</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="answer" id="single" class="form-control1" required></textarea></div><input type="checkbox" name="chk1">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Answer 2</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="mcq1" id="single" class="form-control1" required></textarea></div><input type="checkbox" name="chk2">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Answer 3</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="mcq2" id="single" class="form-control1" required></textarea></div><input type="checkbox" name="chk3">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Answer 4</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="mcq3" id="single" class="form-control1" required></textarea></div>
                                                        <input type="checkbox" name="chk4">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Answer 5</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="mcq4" id="single" class="form-control1" required></textarea></div>
                                                        <input type="checkbox" name="chk5">
                                                    </div>

                                                    
                                                    <input type="hidden" name="qtype" value="3" >

                                                    <button onclick="return doconfirm()" type="submit" class="btn btn-default" style="margin-left: 175px">Submit</button>
                                                </form>

                                            </div>
                                            <div id="option4" class="group">

                                                    <form method="post" name="form_layout" action="<?php echo site_url ('QuestionBank/AddQuestion'); ?>" class="form-horizontal">

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Question</label>
                                                        <div class="col-sm-8">
                                                        <textarea name="question" id="single" class="form-control1" required></textarea></div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="selector1" class="col-sm-2 control-label">Answer</label>
                                                        <div class="col-sm-8">

                                                        <textarea name="answer" id="single" class="form-control1" required></textarea></div>


                                                    </div>

                                                        <input type="hidden" name="qtype" value="4" >
                                                        <input type="hidden" name="mcq1" value="" >
                                                        <input type="hidden" name="mcq2" value="" >
                                                        <input type="hidden" name="mcq3" value="" >
                                                        <input type="hidden" name="mcq4" value="" >


                                                        <button onclick="return doconfirm()" type="submit" class="btn btn-default" style="margin-left: 175px">Submit</button>

                                                </form>
                                            </div>

                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--//set-2-->

                    </div>
                    <!--//forms-inner-->
                </div>
                <!--//forms-->

                <!--footer section start-->
                <footer>
                    <p>&copy 2016 Tryit . All Rights Reserved | Design by SEP_WE_013</a></p>
                </footer>
                <!--footer section end-->
            
            </div>
            <!--//outer-wp-->
            
        </div>

    </div>
    <!--//content-inner-->


</div>

</body>

<?php
    if(isset($_GET['r'])){

        if($_GET['r']=='success'){
    ?>
    <script type="text/javascript">
        alert("Question added successfully");
    </script>
    <?php
        }
        else{
            ?>
                <script type="text/javascript">
                    alert("Fail to add questions");
                </script>
            <?php

        }
    }
?>

    
</body>
</html>
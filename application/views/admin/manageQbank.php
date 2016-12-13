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

    <script type="text/javascript">

        $(document).ready(function(){
         $("#thisTable button").click(function(){

             var $type = $(this).parent().parent().find(".ttype").text();

            if($type == 1){
                 var myModal = $('#myModal');

                 var $id = $(this).parent().parent().find(".tid").text();
                 var $question=$(this).parent().parent().find(".tquestion").text();
                 var $answer=$(this).parent().parent().find(".tanswer").text();
                 var $mcq1=$(this).parent().parent().find(".tmcq1").text();
                 var $mcq2=$(this).parent().parent().find(".tmcq2").text();
                 var $mcq3=$(this).parent().parent().find(".tmcq3").text();
                 var $mcq4=$(this).parent().parent().find(".tmcq4").text();

                 $('#mid', myModal).val($id);
                 $('#mquestion', myModal).val($question);
                 $('#manswer', myModal).val($answer);
                 $('#mmcq1', myModal).val($mcq1);
                 $('#mmcq2', myModal).val($mcq2);
                 $('#mmcq3', myModal).val($mcq3);
                 $('#mmcq4', myModal).val($mcq4);

                 $('#myModal').modal('show');
            
            }else if($type ==2){

                var myModal = $('#myModal2');

                 var $id = $(this).parent().parent().find(".tid").text();
                 var $question=$(this).parent().parent().find(".tquestion").text();
                 var $answer=$(this).parent().parent().find(".tanswer").text();

                 $('#mid', myModal).val($id);
                 $('#mquestion', myModal).val($question);

                 if($answer == "true"){
                 document.getElementById("select").selectedIndex = 0;
                 }
                 else if($answer== "false"){
                 document.getElementById("select").selectedIndex = 1; 
                 } 

                 $('#myModal2').modal('show');
            }else if($type == 3){

                var myModal = $('#myModal3');

                 var $id = $(this).parent().parent().find(".tid").text();
                 var $question=$(this).parent().parent().find(".tquestion").text();
                 var $answer=$(this).parent().parent().find(".tanswer").text();
                 var $mcq1=$(this).parent().parent().find(".tmcq1").text();
                 var $mcq2=$(this).parent().parent().find(".tmcq2").text();
                 var $mcq3=$(this).parent().parent().find(".tmcq3").text();
                 var $mcq4=$(this).parent().parent().find(".tmcq4").text();
                 var $multianw=$(this).parent().parent().find(".tmultianw").text();

                 $('#mid', myModal).val($id);
                 $('#mquestion', myModal).val($question);
                 $('#manswer', myModal).val($answer);
                 $('#mmcq1', myModal).val($mcq1);
                 $('#mmcq2', myModal).val($mcq2);
                 $('#mmcq3', myModal).val($mcq3);
                 $('#mmcq4', myModal).val($mcq4);

                 document.getElementById("checkbox1").checked = false;
                 document.getElementById("checkbox2").checked = false;
                 document.getElementById("checkbox3").checked = false;
                 document.getElementById("checkbox4").checked = false;
                 document.getElementById("checkbox5").checked = false;
                 
                 $x = 0;
                 while($x<5){

                    if($multianw[$x] == 1){
                     document.getElementById("checkbox1").checked = true;
                    }else

                    if($multianw[$x] == 2){
                     document.getElementById("checkbox2").checked = true;
                    }

                    if($multianw[$x] == 3){
                     document.getElementById("checkbox3").checked = true;
                    }

                    if($multianw[$x] == 4){
                     document.getElementById("checkbox4").checked = true;
                    }

                    if($multianw[$x] == 5){
                     document.getElementById("checkbox5").checked = true;
                    }

                    $x = $x+1;
                 }
                 
                 $('#myModal3').modal('show');


            }


         });
         });

        function doconfirmupdate()
        {
            job=confirm("Are you sure to Update this Question?");
            if(job!=true)
            {
                return false;
            }
        }

        function doconfirmdelete()
        {
            job=confirm("Are you sure to delete this Question?");
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
	    <div class="left-content">
        <div class="inner-content">
            <!--//outer-wp-->
            <div class="outter-wp">
                <!--/sub-heard-part-->
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">
                        <li><a href="<?php echo site_url('hello/index'); ?>"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                        <li class="active">ViewQuestions</li>
                    </ol>
                </div>

                <div class="forms-main">

                    <!--/forms-inner-->
                    <div class="forms-inner">
                        <!--/set-2-->
                        <div class="set-1">
                            <div class="graph-2 general">
                                <h3 class="inner-tittle two">Question Bank</h3>
                                <div class="grid-1">
                                    <!-- <div class="col-sm-12">   -->
                                        <table id="thisTable" class="table-striped">
                                            <tr>
                                                <th >Question ID</th>
                                                <th>Question</th><th></th></tr>
                                            <?php 
                                                foreach($questions as $question): ?>
                                            <tr>
                                                <td class="ttype" style="display:none;"><?php echo $question->questiontype_id; ?></td>
                                                <td class="tid"><?php echo $question->id; ?></td>
                                                <td class="tquestion"><?php echo $question->question; ?></td>
                                                <td class="tanswer" style="display:none;"><?php echo $question->answer; ?></td>
                                                <td class="tmcq1" style="display:none;"><?php echo $question->mcq1; ?></td>
                                                <td class="tmcq2" style="display:none;"><?php echo $question->mcq2; ?></td>
                                                <td class="tmcq3" style="display:none;"><?php echo $question->mcq3; ?></td>
                                                <td class="tmcq4" style="display:none;"><?php echo $question->mcq4; ?></td>
                                                <td class="tmultianw" style="display:none;"><?php echo $question->multianw; ?></td>
                                                <td>

                                                     <?php 
                                                    if(($question->questiontype_id) == "1"){ ?>
                                                     <button id="bttHello" type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Edit</button>

                                                    <?php }else  if(($question->questiontype_id) == "2"){ ?>
                                                    <button id="bttHello" type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Edit</button>

                                                    <?php }else if (($question->questiontype_id) == "3"){ ?>
                                                    <button id="bttHello" type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">Edit</button>

                                                    <?php }else if (($question->questiontype_id) == "4"){ ?> 
                                                    <button id="bttHello" type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal4">Edit</button>

                                                    <?php } 
                                                     endforeach; ?>
                                                </td>
                                            </tr>
                                        </table>

                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>   
    </div>



</body>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" >
	<div class="modal-dialog">
                
        <!-- Modal content-->
        <div class="modal-content" style="width: 800px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">MCQ Question</h4>
            </div>
            <div class="modal-body">
            
            <form method="post" name="form_layout" action="<?php echo site_url ('QuestionBank/EditQuestion'); ?>" class="form-horizontal">

                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Question</label>
                    <div class="col-sm-10">
                    <textarea name="question" id="mquestion" class="form-control1" required></textarea></div>
                </div>

                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Correct Answer</label>
                    <div class="col-sm-10">
                    <textarea name="answer" id="manswer" class="form-control1" required></textarea></div>
                </div>

                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Answer 1</label>
                    <div class="col-sm-10">
                    <textarea name="mcq1" id="mmcq1" class="form-control1" required></textarea></div>
                </div>

                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Answer 2</label>
                    <div class="col-sm-10">
                    <textarea name="mcq2" id="mmcq2" class="form-control1" required></textarea></div>
                </div>

                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Answer 3</label>
                    <div class="col-sm-10">
                    <textarea name="mcq3" id="mmcq3" class="form-control1" required></textarea></div>
                </div>

                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Answer 4</label>
                    <div class="col-sm-10">
                    <textarea name="mcq4" id="mmcq4" class="form-control1" required></textarea></div>
                </div>

                
                <input type="hidden" name="qtype" value="1" >
                <input type="hidden" name="id" id="mid" >

                <button onclick="return doconfirmupdate()" type="submit" class="btn btn-default" style="margin-left: 175px" name="update">Update</button>

                <button onclick="return doconfirmdelete()" type="submit" class="btn btn-default" style="margin-left: 10px" name="delete">Delete</button>

            </form>

            </div>
        </div>
    </div>
</div>	

 <!-- Modal2 -->
<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
                
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">True/False Question</h4>
            </div>
            <div class="modal-body">
            
            <form method="post" name="form_layout" action="<?php echo site_url ('QuestionBank/EditQuestion'); ?>" class="form-horizontal">

                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Question</label>
                    <div class="col-sm-8">
                    <textarea name="question" id="mquestion" class="form-control1" required></textarea></div>
                </div>

                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">True/False</label>
                    <div class="col-sm-8">

                    <select name="answer" id="select" class="form-control1">
                        <option>True</option>
                        <option>False</option>
                    </select>
                    </div>


                </div>

                <input type="hidden" name="qtype" value="2" >
                <input type="hidden" name="id" id="mid" >
                <input type="hidden" name="mcq1" value="" >
                <input type="hidden" name="mcq2" value="" >
                <input type="hidden" name="mcq3" value="" >
                <input type="hidden" name="mcq4" value="" >


                <button onclick="return doconfirmupdate()" type="submit" class="btn btn-default" style="margin-left: 175px" name="update">Update</button>

                <button onclick="return doconfirmdelete()" type="submit" class="btn btn-default" style="margin-left: 10px" name="delete">Delete</button>

            </form>


            </div>
        </div>
    </div>
</div>	 


<!-- Modal3 -->
<div class="modal fade" id="myModal3" role="dialog" >
    <div class="modal-dialog">
                
        <!-- Modal content-->
        <div class="modal-content" style="width: 800px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Multiple Choice Question</h4>
            </div>
            <div class="modal-body">
                
                 <form method="post" name="form_layout" action="<?php echo site_url ('QuestionBank/EditMultiQuestion'); ?>" class="form-horizontal">

                    <div class="form-group">
                        <label for="selector1" class="col-sm-2 control-label">Question</label>
                        <div class="col-sm-8">
                        <textarea name="question" id="mquestion" class="form-control1" required></textarea></div>
                    </div>

                    <div class="form-group">
                        <label for="selector1" class="col-sm-2 control-label">Answer 1</label>
                        <div class="col-sm-8">
                        <textarea name="answer" id="manswer" class="form-control1" required></textarea></div><input type="checkbox" name="chk1" id="checkbox1">
                    </div>

                    <div class="form-group">
                        <label for="selector1" class="col-sm-2 control-label">Answer 2</label>
                        <div class="col-sm-8">
                        <textarea name="mcq1" id="mmcq1" class="form-control1" required></textarea></div><input type="checkbox" name="chk2" id="checkbox2">
                    </div>

                    <div class="form-group">
                        <label for="selector1" class="col-sm-2 control-label">Answer 3</label>
                        <div class="col-sm-8">
                        <textarea name="mcq2" id="mmcq2" class="form-control1" required></textarea></div><input type="checkbox" name="chk3" id="checkbox3">
                    </div>

                    <div class="form-group">
                        <label for="selector1" class="col-sm-2 control-label">Answer 4</label>
                        <div class="col-sm-8">
                        <textarea name="mcq3" id="mmcq3" class="form-control1" required></textarea></div>
                        <input type="checkbox" name="chk4" id="checkbox4">
                    </div>

                    <div class="form-group">
                        <label for="selector1" class="col-sm-2 control-label">Answer 5</label>
                        <div class="col-sm-8">
                        <textarea name="mcq4" id="mmcq4" class="form-control1" required></textarea></div>
                        <input type="checkbox" name="chk5" id="checkbox5">
                    </div>

                    
                    <input type="hidden" name="qtype" value="3" >
                    <input type="hidden" name="id" id="mid" >

                    <button onclick="return doconfirmupdate()" type="submit" class="btn btn-default" style="margin-left: 175px" name="update">Update</button>

                    <button onclick="return doconfirmdelete()" type="submit" class="btn btn-default" style="margin-left: 10px" name="delete">Delete</button>
                </form>

                
            </div>
        </div>
    </div>
</div>

<!-- Modal4 -->
<div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">
                
        <!-- Modal content-->
        <div class="modal-content" style="width: 800px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header 4</h4>
            </div>
            <div class="modal-body">
            
            <form method="post" name="form_layout" action="<?php echo site_url ('QuestionBank/AddQuestion'); ?>" class="form-horizontal">

                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Question</label>
                    <div class="col-sm-8">
                    <textarea name="question" id="mquestion" class="form-control1" required></textarea></div>
                </div>

                <div class="form-group">
                    <label for="selector1" class="col-sm-2 control-label">Answer</label>
                    <div class="col-sm-8">
                    <textarea name="answer" id="manswer" class="form-control1" required></textarea></div>
                </div>

                <input type="hidden" name="qtype" value="4" >
                <input type="hidden" name="id" id="mid" >
                <input type="hidden" name="mcq1" value="" >
                <input type="hidden" name="mcq2" value="" >
                <input type="hidden" name="mcq3" value="" >
                <input type="hidden" name="mcq4" value="" >


                <button onclick="return doconfirmupdate()" type="submit" class="btn btn-default" style="margin-left: 175px" name="update">Update</button>

                <button onclick="return doconfirmdelete()" type="submit" class="btn btn-default" style="margin-left: 10px" name="delete">Delete</button>

            </form> 
            </div>
        </div>
    </div>
</div>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Tryit</title>

    <?php
    $this->load->view("admin/references");
    ?>

    <!--Bootstrap for the table-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
    <!-- Load jQuery from Google's CDN -->
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script>
        $(document).ready(

            /* This is the function that will get executed after the DOM is fully loaded */
            function () {
                $( "#datepicker1" ).datepicker({
                    changeMonth: true,//this option for allowing user to select month
                    changeYear: true //this option for allowing user to select from year range
                });
                $( "#datepicker1" ).datepicker( "option", "dateFormat", "yy/mm/dd");
            }

        );

        $(document).ready(

            /* This is the function that will get executed after the DOM is fully loaded */
            function () {
                $( "#datepicker2" ).datepicker({
                    changeMonth: true,//this option for allowing user to select month
                    changeYear: true //this option for allowing user to select from year range
                });
                $( "#datepicker2" ).datepicker( "option", "dateFormat", "yy/mm/dd");
            }

        );

    </script>

    <script>

        $(document).ready(function(){
         $("#thisTable button").click(function(){

             var myModal = $('#myModal');

             var $id = $(this).parent().parent().find(".id").text();
             var $batch=$(this).parent().parent().find(".batch").text();
             var $type = $(this).parent().parent().find(".type").text();
             var $single = $(this).parent().parent().find(".single").text();
             var $multiple = $(this).parent().parent().find(".multiple").text();
             var $short = $(this).parent().parent().find(".short").text();
             var $true = $(this).parent().parent().find(".true").text();
             var $from = $(this).parent().parent().find(".from").text();
             var $to = $(this).parent().parent().find(".to").text();

             $('#paper_id', myModal).val($id);
             $('#batchNo', myModal).val($batch);
             $('#paperType', myModal).val($type);
             $('#single', myModal).val($single);
             $('#multiple', myModal).val($multiple);
             $('#short', myModal).val($short);
             $('#true', myModal).val($true);
             $('#datepicker1', myModal).val($from);
             $('#datepicker2', myModal).val($to);

             $('#myModal').modal('show');

         });
         });

    </script>

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
                        <li><a href="<?php echo site_url('hello/admin'); ?>" style="text-decoration:none"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li class="active">View added layouts</li>
                    </ol>
                </div>
                <!--/sub-heard-part-->

                <table class="table table-hover" id="thisTable">
                    <thead>
                        <tr>
                            <th>Paper Id</th>
                            <th>Batch No</th>
                            <th>Paper Type</th>
                            <th>Added Date</th>
                            <th>Single choice</th>
                            <th>Multiple choice</th>
                            <th>Short answer</th>
                            <th>True or False</th>
                            <th>From date</th>
                            <th>To date</th>
							<th>Option</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($posts as $post){?>
                            <tr>
                                <td class="id"><?php echo $post->paper_id;?></td>
                                <td class="batch"><?php echo $post->batch_no;?></td>
                                <td class="type"><?php echo $post->paper_type;?></td>
                                <td><?php echo $post->added_date;?></td>
                                <td class="single"><?php echo $post->single_choice;?></td>
                                <td class="multiple"><?php echo $post->multiple_choice;?></td>
                                <td class="short"><?php echo $post->short_answer;?></td>
                                <td class="true"><?php echo $post->true_false;?></td>
                                <td class="from"><?php echo $post->from_date;?></td>
                                <td class="to"><?php echo $post->to_date;?></td>
								<td>
									 <button data-toggle="modal" data-target="#myModal"  id="update" type="button" style="font-size:15px;color:black" >
										<span class="glyphicon glyphicon-pencil"></span> Edit
									 </button>
								</td>

								<!-- Modal1 -->
								<div class="modal fade" id="myModal" role="dialog">
									<div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 style="color:blue;font-size:25px"><span class="glyphicon glyphicon-pencil"></span> Update Layouts</h4>
											</div>

                                            <div style="margin-left: 20px;margin-top: 10px" class="container">
                                                <form method="post" onSubmit="window.location.reload()" name="form_layout" action="<?php echo site_url ('Layout_Controller/editLayout'); ?>" class="form-horizontal">

                                                    <div id="type">
                                                        <label style="width: 150px" class="col-sm-2 control-label label-input-lg">Paper Id</label>
                                                        <input style="width: 300px" type="text" class="form-control1 input-lg" name="paper_id" id="paper_id" readonly required>
                                                    </div>

                                                    </br>

                                                    <div id="type">
                                                        <label style="width: 150px" class="col-sm-2 control-label label-input-lg">Batch No</label>
                                                        <select style="width: 300px" class="form-control1" name="batchNo" id="batchNo" required>
                                                            <option value="">--Choose Batch No--</option>
                                                            <option>Batch 1</option>
                                                            <option>Batch 2</option>
                                                            <option>Batch 3</option>
                                                            <option>Batch 4</option>
                                                        </select>
                                                    </div>

                                                    <div id="type">
                                                        <label style="width: 150px" class="col-sm-2 control-label label-input-lg">Paper type</label>
                                                        <select style="width: 300px" class="form-control1" name="paperType" id="paperType" required>
                                                            <option value="">--Choose Paper Type--</option>
                                                            <option>Assignment</option>
                                                            <option>Question Paper</option>
                                                        </select>
                                                    </div>

                                                    </br>

                                                    <div id="type">
                                                        <label style="width: 150px" class="col-sm-2 control-label label-input-lg">Single Choice questions</label>
                                                        <select style="width: 300px" class="form-control1" name="single" id="single" required>
                                                            <option value="">--Choose no of Single questions--</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                        </select>
                                                    </div>

                                                    </br>

                                                    <div id="type">
                                                        <label style="width: 150px" class="col-sm-2 control-label label-input-lg">Multiple Choice questions</label>
                                                        <select style="width: 300px" class="form-control1" name="multiple" id="multiple" required>
                                                            <option value="">--Choose no of multiple choice questions--</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </div>

                                                    </br>

                                                    <div id="type">
                                                        <label style="width: 150px" class="col-sm-2 control-label label-input-lg">Short answer questions</label>
                                                        <select style="width: 300px" class="form-control1" name="short" id="short" required>
                                                            <option value="">--Choose no of short answer questions--</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </div>

                                                    </br>

                                                    <div id="type">
                                                        <label style="width: 150px" class="col-sm-2 control-label label-input-lg">True/false questions</label>
                                                        <select style="width: 300px" class="form-control1" name="true" id="true" required>
                                                            <option value="">--Choose no of true/false questions--</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </div>

                                                    </br>

                                                    <div id="type">
                                                        <label style="width: 150px" class="col-sm-2 control-label label-input-lg">Downloadable date</label>
                                                        <input style="width: 300px" type="text" class="form-control1 input-lg" name="datepicker1" id="datepicker1" placeholder="From date" required>
                                                    </div>

                                                    </br>

                                                    <div id="type">
                                                        <label style="width: 150px" class="col-sm-2 control-label label-input-lg">Downloadable date</label>
                                                        <input style="width: 300px" type="text" class="form-control1 input-lg" name="datepicker2" id="datepicker2" placeholder="To date" required>
                                                    </div>

                                                    </br>

                                                    <button style="margin-left: 150px" type="submit" class="btn btn-info btn-lg">
                                                        <span class="glyphicon glyphicon-pencil"></span> Edit
                                                    </button>

                                                    </br>
                                                    <label></label>

                                                </form>
                                            </div>
										</div>
									</div>
								</div>
                            </tr>
                        <?php }?>

                    </tbody>
                </table>
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
<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        }
        else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }

        toggle = !toggle;
    });
</script>
<!--js -->
<script src="<?php echo base_url(); ?>admin_js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url(); ?>admin_js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>jadmin_js/bootstrap.min.js"></script>
</body>
</html>
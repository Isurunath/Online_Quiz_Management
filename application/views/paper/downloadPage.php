<!-- features -->

<?php
    $this->load->view('header/head1');
?>
<div class="features">
    <div class="container">

        <div class="col-md-5 features-left">
            <img src="<?php echo base_url(); ?>images/f1.jpg" alt=""/>
        </div>
        <div class="col-md-7 features-right errormsg">
            <?php
                if(isset($message))
                {
                    echo $message;
                    echo "<br/>";
                    echo "<br/>";
                }
            ?>
<h4>Submit the Quiz Password and Download Question paper</h4>
            <br>
<!--            <a href="--><?php //echo base_url(); ?><!--paper/paperlayout"> <h4>Download Question paper</h4></a>-->
<!--            <form id="qpwd_form" action="--><?php //echo base_url(); ?><!--paper/paperlayout" method="get">-->

<!--                <input class="form-control" type="password" id="quiz_pwd" name="quiz_pwd" placeholder="Quiz Password">-->

<!--                <button type="submit">Submit</button>-->
                <button type="button" class="btn btn-info btn-fb" data-toggle="modal" data-target="#myModal">Download my paper</button>
<!--            </form>-->

        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!-- //features -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Attempt Comfirmation</h4>
            </div>
            <form id="qpwd_form" action="<?php echo base_url(); ?>paper/paperlayout" method="get">
            <div class="modal-body">
                <p>You can only download the paper once. If you choose Start Attempt the changes can't be reversed </p>

<!--                    <div class="col-xs-5">-->
                        <input class="form-control" type="password" id="quiz_pwd" name="quiz_pwd" placeholder="Enter Quiz Password here" style="margin-left: 153px;width: 235px;">
<!--                    </div>-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="SubForm" >Start Attempt</button>
            </div>
                </form>
        </div>

    </div>
</div>

<?php echo $_SERVER['REQUEST_URI']; ?>

<div style="margin-top:12px">
    <?php
        $this->load->view('footer/footer1');
    ?>
</div>

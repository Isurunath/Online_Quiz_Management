<!-- features -->
<div class="features">
    <div class="container">

        <div class="col-md-5 features-left">
            <img src="<?php echo base_url(); ?>images/f1.jpg" alt=""/>
        </div>
        <div class="col-md-7 features-right">
            <?php
                if(isset($message))
                {
                    echo $message;
                    echo "<br/>";
                    echo "<br/>";
                }
            ?>
<h4>Submit the Quiz Password and Download Question paper</h4>
<!--            <a href="--><?php //echo base_url(); ?><!--paper/paperlayout"> <h4>Download Question paper</h4></a>-->
            <form id="qpwd_form" action="<?php echo base_url(); ?>paper/paperlayout" method="post">
                <input type="password" id="quiz_pwd" name="quiz_pwd" placeholder="Quiz Password">
                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //features -->

<?php echo $_SERVER['REQUEST_URI']; ?>
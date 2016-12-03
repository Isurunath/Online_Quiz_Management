<form method="post" action="<?php echo base_url(); ?>LoginController/resetLogin">
    <div class="form-group nomargin">
        <p>We have sent a code to your email address.</p>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="text" id="FP_password" name="FP_password"  class="form-control" placeholder="Enter the Code">
        </div>
    </div>
    <div><a href="" class="forgot"></a></div>
    <div class="form-group">
        <input type="submit" class="btn btn-success btn-quirk btn-block" value="Submit"/>
    </div>
</form>
<form method="post" onsubmit="loadp(event)">
    <div class="form-group mb10">
        <?php if(isset($message)){?>
            <p><?php echo $message; ?></p>
        <?php }?>
    </div>
    <div class="form-group mb10">
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" name="FP_email" id="FP_email" class="form-control" placeholder="Enter your Tryit email address">
        </div>
        <div><a href="" class="forgot"></a></div>
        <div class="form-group">
            <input type="submit" class="btn btn-success btn-quirk btn-block" value="Next"/>
        </div>
    </div>
</form>
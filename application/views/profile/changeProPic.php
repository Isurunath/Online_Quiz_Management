<div class="panel panel-post-item" style="align-items: center">
    <h3 align="center">Change the profile picture</h3>
    <br>
    <?php if(isset($data)) {
        echo $data;
        if ($data == 0) {
            ?>
            <img style="margin-left: 220px;" class="img-circle img-responsive" src="../Profile_Picture/default.png" width="200px" height="200px" alt="">
        <?php } else if ($data == 1) {
            ?>
            <img style="margin-left: 220px;" class="img-circle img-responsive" src="../Profile_Picture/<?php echo $id ?>.jpg" width="200px" height="200px" alt="">
        <?php }
    }else {
        if (isset($this->session->userdata['profile_data'])) {

            $Pic = ($this->session->userdata['profile_data']['isProPic']);
            $id = ($this->session->userdata['profile_data']['prof_user_id']);
        }

        if ($Pic == 0) {
            ?>
            <img class="img-circle" src="../Profile_Picture/default.png" width="200px" height="200px">
            <?php
        } else if ($Pic == 1) {
            ?>
            <img class="img-circle" src="../Profile_Picture/<?php echo $id ?>.jpg" width="200px" height="200px">
            <?php
        }
    }
    ?>
    <div class="form-group">
    <?php echo form_open_multipart('ProfileController/do_upload');?>
    <?php /*echo "<input type='file' name='userfile' size='20' class='file' style='left: 200px;'/>"; */?>
    <?php echo "<input id='input-2' name='input2[]' type='file' class='file' multiple data-show-upload='false' data-show-caption='true'>"; ?>
    <?php echo "<input type='submit' name='submit' class='btn btn-danger' value='Change' style='padding:10px; float: right;'/> ";?>
    <?php echo "</form>"?>
    </div>
</div>

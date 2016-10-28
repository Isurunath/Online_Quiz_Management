<html>

<head>
    <title>Upload Form</title>
    <?php
    $this->load->view('links/ref');
    ?>

</head>

<body>
<?php echo $error;?>
<?php echo form_open_multipart('upload/do_upload');?>


<div class="panel panel-info">
    <div class="panel-heading">Upload your answers here</div>
    <div class="panel-body">
        <form action = "" method = "">
            <input type = "file" class="btn btn-primary" name = "userfile" size = "20" />
            <br /><br />
            <input type = "submit" class="btn btn-primary" value = "upload" />
        </form></div>
</div>

<div style="margin-top:305px ">
    <?php
    $this->load->view('footer/footer1');
    ?>
</div>


</body>

</html>
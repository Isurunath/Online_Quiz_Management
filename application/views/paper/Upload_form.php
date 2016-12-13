

<head>
    <title>Upload Form</title>
    <?php
    $this->load->view('links/ref');
    ?>



</head>

<body>

<br /><br />
<div style="    text-align: center;
    color: red;
    font-size: 20px;">
<?php echo $error;?>
<?php echo form_open_multipart('upload/do_upload');?>
</div>


<div class="col-md-2"></div>
<div class="col-md-8">
<table class="table table-striped">
    <thead>
      <tr>
        <th>Paper Id</th>
        <th>Downloaded Date</th>
          <th>Downloaded Time</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $layout_id ?></td>
        <td><?php echo $download_date ?></td>
          <td><?php echo $download_time ?></td>
      </tr>

</tbody>
    </table>

</div>

<div class="col-md-2"></div>
<div class="col-md-12">
<div class="panel panel-info" style="margin-left: 8%; margin-right: 8%;">
    <div class="panel-heading">Upload your answers here</div>
    <div class="panel-body">
        <div class="text-center"
        <form action = "" method = "">
             <input type = "file" class="btn btn-primary" name = "userfile" size = "20" />
            <br /><br />
            <input type = "submit" class="btn btn-primary" value = "upload" />
        </form>
</div>

    </div>
</div>
</div>
<!--<form action="--><?php //echo site_url('upload/upload'); ?><!--" class="dropzone"  >-->
<!--</form>-->






<div style="margin-top:305px ">
    <?php
    $this->load->view('footer/footer1');
    ?>
</div>

<!--<script>-->
<!--$(function() {-->
<!--        Dropzone.options.uiDZResume = {-->
<!--            success: function(file, response){-->
<!--                alert(response);-->
<!--            }-->
<!--        };-->
<!--    });-->
<!--    </script>-->
</body>


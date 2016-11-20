
<head>
    <title>Upload Form</title>
    <?php
    $this->load->view('links/ref');
    ?>
</head>

<div class="container">
<div class="col-md-12" style="text-align: center; font-size: 20px;">
<br><br><br><br>

<h3>Your paper was successfully uploaded for grading!</h3>

<br><br>
</div>
<div class="col-md-3"></div>
<div class="col-md-6">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Uploaded Date</th>
            <th>Uploaded Time</th>
        </tr>
        </thead>
        <tbody>
        <tr class="info">
            <td ><?php echo  date("Y-m-d") ?></td>
            <td><?php echo date("h:i:sa") ?></td>
        </tr>

        </tbody>
    </table>

</div>

<div class="col-md-3"></div>
    <div class="col-md-12"><br><br><br></div>
<!--<ul>-->
<!--    --><?php //foreach ($upload_data as $item => $value):?>
<!--        <li>--><?php //echo $item;?><!--: --><?php //echo $value;?><!--</li>-->
<!--    --><?php //endforeach; ?>
<!--</ul>-->

<!--<p>--><?php //echo anchor('upload', 'Upload Another File!'); ?><!--</p>-->
</div>
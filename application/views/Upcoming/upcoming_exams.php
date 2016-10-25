<!Doctype html>
<html>
<head>

</head>

<body>


</body>

    <?php
        $this->load->view('header/head1');
    ?>


    <div class="sub-heard-part">
        <ol class="breadcrumb m-b-0">
            <li><a href="<?php echo site_url('hello/index'); ?>" style="text-decoration:none"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li class="active">Upcoming Exams</li>
        </ol>
    </div>

    <table class="table table-hover" id="thisTable">
        <thead>
        <tr style="font-size: 20px">
            <th>Batch No</th>
            <th>Paper Type</th>
            <th>From date</th>
            <th>To date</th>
        </tr>
        </thead>

       <tbody>
        <?php foreach($posts as $post){?>
            <tr style="font-family: 'Arial';font-size: 15px" class="info">
                <td class="batch"><?php echo $post->batch_no;?></td>
                <td class="type"><?php echo $post->paper_type;?></td>
                <td class="from"><?php echo $post->from_date;?></td>
                <td class="to"><?php echo $post->to_date;?></td>
            </tr>
        <?php }?>
        </tbody>
    </table>


    <div style="margin-top:228px ">
        <?php
             $this->load->view('footer/footer1');
        ?>
    </div>

</html>

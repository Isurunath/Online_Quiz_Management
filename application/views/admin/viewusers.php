<!DOCTYPE HTML>
<html>
<head>
    <title>Tryit</title>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <?php
        $this->load->view("admin/references");
    ?>

    

</head>
<body>
	<div class="page-container">
	    <!--/sidebar-menu-->
	    <div class="sidebar-menu">
	        <?php
	            $this->load->view("admin/sidebar");
	        ?>
	    </div>
	    <div class="left-content">
        <div class="inner-content">
            <!--//outer-wp-->
            <div class="outter-wp">
                <!--/sub-heard-part-->
                <div class="sub-heard-part">
                    <ol class="breadcrumb m-b-0">
                        <li><a href="<?php echo site_url('hello/admin'); ?>">Home</a></li>
                        <li class="active">ViewUsers</li>
                    </ol>
                </div>

                <div class="forms-main">

                    <!--/forms-inner-->
                    <div class="forms-inner">
                        <!--/set-2-->
                        <div class="set-1">
                            <div class="graph-2 general">
                                <h3 class="inner-tittle two">Users</h3>
                                <div class="grid-1">
                                    <!-- <div class="col-sm-12">   -->
                                        <table id="thisTable" class="table-striped">
                                            <tr>
                                                <th >USER ID</th>
                                                <th>USERNAME</th>
                                                <th>EMAIL</th>
                                                <th>USER TYPE</th>
                                                </tr>
                                            <?php 
                                                foreach($users as $user): ?>
                                            <tr>
                                                <td class="ttype"><?php echo $user->user_id; ?></td>
                                                <td class="tid"><?php echo $user->user_name; ?></td>
                                                <td class="tquestion"><?php echo $user->email; ?></td>
                                                <td class="tquestion"><?php echo $user->user_type; ?></td>
                                                <td>
                                                     <button id="bttHello" type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Delete</button><?php
                                                     endforeach; ?>
                                                </td>
                                            </tr>
                                        </table>

                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>   
    </div>
</div>
</div>


</body>
</html>
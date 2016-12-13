<!DOCTYPE HTML>
<html>
<head>
    <title>Tryit admin panel</title>

    <?php
    $this->load->view("admin_1/references");
    ?>

    <!--//skycons-icons-->
</head>
<body>
<div class="page-container">

    <?php
    $this->load->view("admin_1/footer");
    $this->load->View("admin_1/sidebar");
    ?>


    <div class="clearfix"></div>
</div>
<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        }
        else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }

        toggle = !toggle;
    });
</script>
<!--js -->
<link rel="stylesheet" href="<?php echo base_url(); ?>admin_css/vroom.css">
<script type="text/javascript" src="<?php echo base_url(); ?>admin_js/vroom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admin_js/TweenLite.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>admin_js/CSSPlugin.min.js"></script>
<script src="<?php echo base_url(); ?>admin_js/jquery.nicescroll.js"></script>
<script src="<?php echo base_url(); ?>admin_js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>admin_js/bootstrap.min.js"></script>
</body>
</html>
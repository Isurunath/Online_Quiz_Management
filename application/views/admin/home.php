<!DOCTYPE HTML>
<html>
<head>
    <title>Tryit admin panel</title>

    <?php
    $this->load->view("admin/references");
    ?>

    <!--//skycons-icons-->
</head>
<body>
<div class="page-container">

    <?php
        $this->load->view("admin/footer");
    ?>

        <!--/sidebar-menu-->
    <div class="sidebar-menu">
        <header class="logo">
            <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>Tryit</h1></span>
                <!--<img id="logo" src="" alt="Logo"/>-->
            </a>
        </header>
        <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
        <!--/down-->
        <div class="down">
            <a href="index.html"><img src="<?php echo base_url(); ?>images/vph.jpg"></a>
            <a href="index.html"><span class=" name-caret">Viran Pravinda</span></a>
            <p>System Administrator in Company</p>
            <ul>
                <li><a class="tooltips" href="index.html"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
                <li><a class="tooltips" href="index.html"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
                <li><a class="tooltips" href="index.html"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
            </ul>
        </div>
        <!--//down-->
        <div class="menu">
            <ul id="menu" >
                <li><a href="index.html"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
                <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Tabs &amp; Panels</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="tabs.html"> Tabs &amp; Panels</a></li>
                        <li id="menu-academico-boletim" ><a href="widget.html">Widgets</a></li>
                        <li id="menu-academico-avaliacoes" ><a href="calender.html">Calendar</a></li>

                    </ul>
                </li>
                <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Layouts</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="<?php echo site_url('hello/load_layout'); ?>">Create Layout</a></li>
                        <li id="menu-academico-boletim" ><a href="validation.html">Validation Forms</a></li>
                        <li id="menu-academico-boletim" ><a href="table.html">Tables</a></li>
                        <li id="menu-academico-boletim" ><a href="buttons.html">Buttons</a></li>
                    </ul>
                </li>

                <li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Components</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-academico-avaliacoes" ><a href="grids.html">Grids</a></li>
                        <li id="menu-academico-boletim" ><a href="media.html">Media Objects</a></li>

                    </ul>
                </li>
                <li><a href="chart.html"><i class="lnr lnr-chart-bars"></i> <span>Charts</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul>
                        <li><a href="map.html"><i class="lnr lnr-map"></i> Maps</a></li>
                        <li><a href="graph.html"><i class="lnr lnr-apartment"></i> Graph Visualization</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
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
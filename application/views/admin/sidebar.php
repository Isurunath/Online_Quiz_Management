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
        <a href="<?php echo site_url('Layout_Controller/edit_profile'); ?>"><img src="<?php echo base_url(); ?>images/vph.jpg"></a>
        <a href="<?php echo site_url('Layout_Controller/edit_profile'); ?> " style="text-decoration:none"><span class=" name-caret">Viran Pravinda</span></a>
        <p>System Administrator in Company</p>
        <ul>
            <li><a class="tooltips" href="index.html"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
            <li><a class="tooltips" href="index.html"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
            <li><a class="tooltips" href="<?php echo site_url('hello/index'); ?>"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
        </ul>
    </div>
    <!--//down-->
    <div class="menu">
        <ul id="menu" >
            <li><a href="#" style="text-decoration:none"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

            <li id="menu-academico" ><a href="#" style="text-decoration:none"><i class="fa fa-file-text-o"></i> <span>Layouts</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="<?php echo site_url('hello/load_layout'); ?>" style="text-decoration:none">Create Layout</a></li>
                    <li id="menu-academico-boletim" ><a href="<?php echo site_url('Layout_Controller/View_layout'); ?>" style="text-decoration:none">View added layouts</a></li>
                </ul>
            </li>

            <li id="menu-academico" ><a href="<?php echo site_url('Hello/load_qbank'); ?>" style="text-decoration:none"><i class="lnr lnr-layers"></i> <span>Add Questions</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            </li>

        </ul>
    </div>
</div>
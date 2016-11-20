<!--/sidebar-menu-->
<div class="sidebar-menu">
    <header class="logo">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a style="text-decoration: none" href="<?php echo site_url('hello/index'); ?>"> <span id="logo"> <h1>Tryit</h1></span>
            <!--<img id="logo" src="" alt="Logo"/>-->
        </a>
    </header>
    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
    <!--/down-->
    <div class="down">
        <img class="img-circle" src="<?php echo base_url(); ?>images/vph.jpg" width="70px" height="70px"></br></br>

        <?php
            if(isset($lecname))
            {
                echo "<label style=\"font-size: 20px;color: #00AFF0;\">$lecname</label>" ;
            }
        ?>

        <ul>
            <li><a class="tooltips" href="index.html"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
            <li><a class="tooltips" href="<?php echo site_url('LoginController/logout'); ?>"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
        </ul>
        </br>
    </div>
    <!--//down-->
    <div class="menu">
        <ul id="menu" >

            <li id="menu-academico" ><a href="#" style="text-decoration:none"><i class="fa fa-file-text-o"></i> <span>Layouts</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="<?php echo site_url('hello/load_layout'); ?>" style="text-decoration:none">Create Layout</a></li>
                    <li id="menu-academico-boletim" ><a href="<?php echo site_url('Layout_Controller/View_layout'); ?>" style="text-decoration:none">View added layouts</a></li>
                </ul>
            </li>

            <li id="menu-academico" ><a href="#" style="text-decoration:none"><i class="fa fa-file-text-o"></i> <span>Question Bank</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="<?php echo site_url('hello/load_qbank'); ?>" style="text-decoration:none">Add Questions</a></li>
                    <li id="menu-academico-boletim" ><a href="<?php echo site_url('QuestionBank/viewQuestions'); ?>" style="text-decoration:none">View Questions</a></li>
                </ul>
            </li>

            <li id="menu-academico" ><a href="#" style="text-decoration:none"><i class="fa fa-file-text-o"></i> <span>User Control</span> <span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes"><a href="<?php echo site_url('hello/load_addlecturers'); ?>" style="text-decoration:none">Add Lecturers</a></li>
                    <li id="menu-academico-avaliacoes"><a href="<?php echo site_url('LoginController/viewusers'); ?>" style="text-decoration:none">View Users</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!doctype html>
<html>
<head>
    <title>Tryit Registration form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Unique Login Form Widget Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- font files  -->
    <link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <!-- /font files  -->
    <!-- css files -->
    <link href="<?php echo base_url(); ?>new_login_css/animate-custom.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url(); ?>new_login_css/style.css" rel='stylesheet' type='text/css' media="all" />
    <!-- /css files -->

    <!--<script>
        function submitLayout() {
            if(document.getElementById) {
                document.login.reset();
            }
        }
    </script>

    <script>
        function submitLayout() {
            if(document.getElementById) {
                document.register.reset();
            }
        }
    </script>-->

</head>
<body>

<div class="content">
    <section>
        <div id="container_demo" >
            <div id="wrapper">
                <div id="login">

                    <form name="register" action="<?php echo base_url(); ?>LoginController/register" autocomplete="off" method="post">
                        <h2>Sign up</h2>
                        <p>
                            <input id="name" name="name" type="text" placeholder="Username"/>
                        </p>
                        <p>
                            <input id="email" name="email" type="email" placeholder="Email"/>
                        </p>
                        <p>
                            <input type="password" id="password" name="password" placeholder="Password"/>
                        </p>
                        <p>
                            <input id="con_password" name="con_password" type="password" placeholder="Confirm Password"/>
                        </p>
                        <p class="signin button">
                            <input type="submit" value="Sign up"/>
                        </p>
                        <p class="change_link">
                            Already a member ?
                            <a href="<?php echo site_url('hello/login'); ?>">Log in</a>
                        </p>
                    </form>
                </div>
                <div style="color:red; font-size: small; padding-top: 120%"">
                    <?php
                    if(isset($message))
                    {
                        echo $message;
                        echo "<br/>";
                        echo "<br/>";
                    }

                    $CI =& get_instance();
                    $CI->load->library('form_validation');

                    if (validation_errors())
                    {
                        echo '<div id="validation_errors" title="Error:" align="left">';
                        echo '<div class="response-msgs errors ui-corner-all"><span>Errors:</span><br /><ul><li>';
                        echo validation_errors();
                        echo '</li></ul></div>';
                        echo '</div>';
                        echo "<br/>";
                        echo "<br/>";
                    }

                    ?>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
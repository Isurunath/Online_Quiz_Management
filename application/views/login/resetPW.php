<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Tryit Login & Registration</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>login_css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="<?php echo base_url(); ?>login_css/style.css">

    <!--<link rel="stylesheet" href="<?php /*echo base_url(); */?>css/bootstrap.css">-->

</head>

<body>

<div class="form">
    <div class="thumbnail"><img src="<?php echo base_url(); ?>images/hat.svg"/></div>

    <div style="color:red; font-size: small;">
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

    <form class="register-form" action="<?php echo base_url(); ?>LoginController/register" method="post">

        <input type="text" placeholder="name" name="name" id="name" value="<?php echo set_value("name")?>"/>
        <input type="password" placeholder="password" name="password" id="password"/>
        <input type="password" placeholder="Confirm password" name="con_password" id="con_password"/>
        <input type="text" placeholder="email address" name="email" id="email" value="<?php echo set_value("email")?>"/>
        <button type="submit" name="submit" id="submit">create</button>
        <p class="message">Already registered? <a href="<?php echo base_url(); ?>">Sign In</a></p>
    </form>

    <form class="login-form" action="<?php echo base_url(); ?>LoginController/login" method="post">
        <input type="text" placeholder="username" name="email_login" id="email_login" value="<?php echo set_value("email_login")?>"/>
        <input type="password" placeholder="password" name="password_login" id="password_login"/>
        <button type="submit" name="submit_login" id="submit_login">login</button>
        <p><a href="<?php echo base_url(); ?>">
        <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
</div>

<video id="video" autoplay="autoplay" loop="loop" poster="polina.jpg">
    <source src="http://andytran.me/A%20peaceful%20nature%20timelapse%20video.mp4" type="video/mp4"/>
</video>
<script src='<?php echo base_url(); ?>js/jquery.min.js'></script>

<script src="<?php echo base_url(); ?>login_js/index.js"></script>

</body>
</html>


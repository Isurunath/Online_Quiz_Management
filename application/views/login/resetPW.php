<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

    <title>Quirk Responsive Admin Templates</title>

    <link rel="stylesheet" href="../lib/fontawesome/css/font-awesome.css">

    <link rel="stylesheet" href="../css/quirk.css">

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>

    <script src="../lib/modernizr/modernizr.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="../lib/html5shiv/html5shiv.js"></script>
    <script src="../lib/respond/respond.src.js"></script>
    <![endif]-->



    <script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>js/modernizr.custom.js"></script>

    <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

</head>

<body class="signwrapper">

<div class="sign-overlay"></div>
<div class="signpanel"></div>

<div class="panel signin">
    <div class="panel-heading">
        <h1><i class="glyphicon glyphicon-education" aria-hidden="true"></i><span>Try</span>it</h1>
        <h5 class="panel-title">You can access Tryit after these steps.</h5>
    </div>
    <div id="pwChange">

        <form method="post" onsubmit="loadp(event)">

            <div class="form-group mb10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" name="FP_email" id="FP_email" class="form-control" placeholder="Enter your Tryit email address">
                </div>
                <div><a href="" class="forgot"></a></div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-quirk btn-block" value="Next"/>
                </div>
            </div>
        </form>

    </div>
        <hr class="invisible">
        <div class="form-group">

        </div>
    </div>
</div><!-- panel -->


<script type="text/javascript">
    function loadp(e)
    {
        e.preventDefault();
        //get the posted values
        var email = document.getElementById('FP_email').value;
        //alert(email);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('LoginController/passwordResetLoad')?>",
            data: {
                "email":email
            },
            dataType: 'html',
            success: function (data) {
                //location.reload();
                //alert("Successfully Updated.");
                document.getElementById("pwChange").innerHTML = data;
            },
            error: function (err) {
                alert("hi");
            }
        });
    }
</script>

</body>
</html>

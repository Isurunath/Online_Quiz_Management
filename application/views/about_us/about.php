<!Doctype html>
<html>
<head>


</head>
<body>

<?php
    $this->load->view('header/head1');
?>

<div class="sub-heard-part">
    <ol class="breadcrumb m-b-0">
        <li><a style="font-size: 20px" href="<?php echo site_url('hello/index'); ?>"><span class="glyphicon glyphicon-home"></span>Home</a></li>
        <li style="font-size: 20px" class="active">About Us</li>
    </ol>
</div>

   <div>

       <div style="width:1340px;margin-top: 10px;margin-left: 10px" class="container">
           <div class="panel panel-default">
               <div style="height: 400px" class="panel-body">
                   <img width="500" height="350" src="<?php echo base_url(); ?>images/about.png" alt="Cinque Terre">
                   <p style="margin-left: 550px;margin-top: -350px;font-size: 20px">
                       Basically <b>Tryit</b> is an online Quiz Management system which was developed according to the requirements
                       given by <b>Professor Chandimal</b> and under the guidance of <b>lecturer Mr.Udara</b>. The development team was included 5 skillful members
                       who worked as one to achieve this target. Everyone in the team managed to complete their assigned functions successfully and within
                       the time period they were given. However the final product was a very effective one as you can see now. The team is looking forward
                       to do many more successful projects in the future.

                   </p>
               </div>
           </div>
       </div>

       <h1 style="color: blue;margin-left: 20px;margin-top: 10px">Our Team</h1>
        <div style="width:350px;margin-top: 20px;margin-left: 10px" class="container">
            <div class="panel panel-default">
                <div style="height: 300px" class="panel-body">
                    <img class="img-circle" width="285" height="230" src="<?php echo base_url(); ?>images/viran.jpg" alt="Cinque Terre">
                    <h3 style="margin-left: 60px;margin-top: 10px">Viran Pravinda</h3>
                </div>
            </div>
        </div>

       <div style="width:350px;margin-top: -323px;margin-left: 340px" class="container">
           <div class="panel panel-default">
               <div style="height: 300px" class="panel-body">
                   <img class="img-circle" width="285" height="230" src="<?php echo base_url(); ?>images/chameera.jpg" alt="Cinque Terre">
                   <h3 style="margin-left: 40px;margin-top: 10px">Chameera Kavinda</h3>
               </div>
           </div>
       </div>

       <div style="width:350px;margin-top: -323px;margin-left: 670px" class="container">
           <div class="panel panel-default">
               <div style="height: 300px" class="panel-body">
                   <img class="img-circle" width="285" height="230" src="<?php echo base_url(); ?>images/savidya.jpg" alt="Cinque Terre">
                   <h3 style="margin-left: 60px;margin-top: 10px">Savidya Sathyani</h3>
               </div>
           </div>
       </div>

       <div style="width:350px;margin-top: -323px;margin-left: 1000px" class="container">
           <div class="panel panel-default">
               <div style="height: 300px" class="panel-body">
                   <img class="img-circle" width="285" height="230" src="<?php echo base_url(); ?>images/isuru.jpg" alt="Cinque Terre">
                   <h3 style="margin-left: 120px;margin-top: 10px">Isuru</h3>
               </div>
           </div>
       </div>

       <div style="width:350px;margin-top: -323px;margin-left: 1000px" class="container">
           <div class="panel panel-default">
               <div style="height: 300px" class="panel-body">
                   <img class="img-circle" width="285" height="230" src="<?php echo base_url(); ?>images/isuru.jpg" alt="Cinque Terre">
                   <h3 style="margin-left: 120px;margin-top: 10px">Isuru</h3>
               </div>
           </div>
       </div>

       <div style="width:350px;margin-left: 10px" class="container">
           <div class="panel panel-default">
               <div style="height: 300px" class="panel-body">
                   <img class="img-circle" width="285" height="230" src="<?php echo base_url(); ?>images/nipuni.jpg" alt="Cinque Terre">
                   <h3 style="margin-top: 10px">Nipuni Lokuhettiarachchi</h3>
               </div>
           </div>
       </div>

   </div>

    <div>
        <?php
            $this->load->view('footer/footer1');
        ?>
    </div>

</body>
</html>

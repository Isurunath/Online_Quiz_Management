
<?php if(isset($this->session->userdata['profile_data'])) {

        $id = ($this->session->userdata['profile_data']['prof_user_id']);
        $fname = ($this->session->userdata['profile_data']['fname']);
        $lname = ($this->session->userdata['profile_data']['lname']);
        $course = ($this->session->userdata['profile_data']['course']);
        $user_id = ($this->session->userdata['profile_data']['prof_user_id']);
        $pic = ($this->session->userdata['profile_data']['isProPic']);
        $dob = ($this->session->userdata['profile_data']['dob']);
        $about = ($this->session->userdata['profile_data']['about_me']);

        $address1 = ($this->session->userdata['profile_data']['add1']);
        $address2 = ($this->session->userdata['profile_data']['add2']);
        $city = ($this->session->userdata['profile_data']['city']);
        $gender = ($this->session->userdata['profile_data']['gender']);
        $phone = ($this->session->userdata['profile_data']['phone']);
        $email = ($this->session->userdata['profile_data']['email']);
        $graduating_yr = ($this->session->userdata['profile_data']['eYear']);
        $started_yr = ($this->session->userdata['profile_data']['sYear']);

        $batch = ($this->session->userdata['profile_data']['batch']);
        //remove the "Batch"
        $batch = str_replace("Batch ",'',$batch);

        $date = ($this->session->userdata['profile_data']['date']);
        $month = ($this->session->userdata['profile_data']['month']);
        $year = ($this->session->userdata['profile_data']['year']);
        $batch_time = ($this->session->userdata['profile_data']['bt']);


?>
    <div class="panel panel-post-item">
        <h4>Basic Information</h4>
        <br>
        <form method="post" onsubmit="updateBasic(event)">
        <table style="width: 100%;">
            <tr>
                <td style="padding: 10px; width: 25%;"><i class="fa fa-info-circle"></i> Full Name</td>
                <td style="padding: 10px">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname ?>" placeholder="First Name">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname ?>" placeholder="Last Name">
                    </div>
                </div>
                </td>
                <td style="padding: 10px;">
                    <div id="errorName" class="alert alert-danger" style="display: none;">Cannot Contain Numbers.</div>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px;"><i class="fa fa-info-circle"></i> Gender</td>
                <td style="padding: 10px">
                <div class="row">
                    <div class="col-md-6">
                    <select id="gender" name="gender" class="form-control">
                        <?php if($gender != null){ ?>
                            <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                        <?php }?>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px;"><i class="fa fa-info-circle"></i> Birthday</td>
                <td style="padding: 10px">
                    <div class="row">
                        <div class="col-md-3">
                        <select id="day" name="day" class="form-control">
                            <?php if($date != null){ ?>
                                <option value="<?php echo $date ?>"><?php echo $date ?></option>
                            <?php }?>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                        </div>

                        <div class="col-md-5">
                        <select id="month" name="month" class="form-control">
                            <?php if($month != null){ ?>
                                <option value="<?php echo $month ?>">
                                    <?php
                                    if($month == "01")
                                        echo "January";
                                    else if ($month == "02")
                                        echo "February";
                                    else if ($month == "03")
                                        echo "March";
                                    else if ($month == "04")
                                        echo "April";
                                    else if ($month == "05")
                                        echo "May";
                                    else if ($month == "06")
                                        echo "June";
                                    else if ($month == "07")
                                        echo "July";
                                    else if ($month == "08")
                                        echo "August";
                                    else if ($month == "09")
                                        echo "September";
                                    else if ($month == "10")
                                        echo "October";
                                    else if ($month == "11")
                                        echo "November";
                                    else if ($month == "12")
                                        echo "December";
                                    ?>
                                </option>
                            <?php }?>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        </div>

                        <div class="col-md-4">
                        <select id="year" name="year" class="form-control">
                            <?php if($year != null){ ?>
                                <option value="<?php echo $year ?>"><?php echo $year ?></option>
                            <?php }?>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                        </select>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <input type="submit" class="btn btn-danger" style="padding:10px; float: right;" value="Update"/>
        </form>
        <br>
    </div>
    <div class="panel panel-post-item">
        <h4>Contact Information</h4>
        <br>
        <form id="contact" method="post" onsubmit="updateContact(event)">
        <table style="width: 100%;">
            <tr>
                <td style="padding: 10px; width: 25%;"><i class="fa fa-envelope"></i> Email</td>
                <td style="padding: 10px;">
                <div class="row">
                    <div class="col-md-9">
                        <label class="form-control"><?php echo $email; ?></label>
                    </div>
                </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px;"><i class="fa fa-list-alt"></i> Address</td>
                <td style="padding: 10px;">
                <div class="row">
                    <div class="col-md-6">
                            <input type="text" value="<?php echo $address1 ?>" id="Address1" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                            <input type="text" value="<?php echo $address2 ?>" id="Address2" class="form-control"/>
                    </div>
                </div>
                </td>
            </tr>
             <tr>
                <td style="padding: 10px;"><i class="fa fa-list-alt"></i> City</td>
                <td style="padding: 10px;">
                <div class="row">
                    <div class="col-md-6">
                            <input type="text" value="<?php echo $city ?>" id="city" class="form-control"/>
                    </div>
                </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px;"><i class="fa fa-phone"></i> Contact No</td>
                <td style="padding: 10px;">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" value="<?php echo $phone ?>" id="phone" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label class="form-control" id="errorPhone" style="color: red; display: none; font-size: smaller;"></label>
                    </div>
                </div>
                </td>
                <td style="padding: 10px;">
                    <div id="errortel" class="alert alert-danger" style="display: none;">Invalid format.</div>
                </td>
            </tr>
        </table>
        <input type="submit" class="btn btn-danger" style="padding:10px; float: right;" value="Update" />
        </form>
        <br>
    </div>
    <div class="panel panel-post-item">
        <h4>Course Details</h4>
        <br>
        <form method="post" onsubmit="updateCourse(event)">
        <table style="width: 100%;">
            <tr>
                <td style="padding: 10px; width: 25%;"><i class="fa fa-info-circle"></i> Course</td>
                <td style="padding: 10px;">
                <div class="row">
                    <div class="col-md-9">
                    <select id="course" class="form-control">
                        <?php if($course != null){ ?>
                            <option value="<?php echo $course ?>"><?php echo $course ?></option>
                         <?php }?>
                        <option value="Software Engineering">Software Engineering</option>
                        <option value="Information Technology">Information Technology</option>
                        <option value="Cyber Security">Cyber Security</option>
                        <option value="Interactive Media">Interactive Media</option>
                        <option value="Computer System Networking">Computer System Networking</option>
                    </select>
                    </div>
                </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px;"><i class="fa fa-info-circle"></i> Batch</td>
                <td style="padding: 10px;">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" value="<?php echo $batch ?>" id="batch" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <select id="batch_time" class="form-control">
                         <?php if($batch_time != null){ ?>
                            <option value="<?php echo $batch_time ?>"><?php echo $batch_time ?></option>
                         <?php }?>
                        <option value="WD">WD</option>
                        <option value="WE">WE</option>
                    </select>
                    </div>
                </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px;"><i class="fa fa-info-circle"></i> Graduating in</td>
                <td style="padding: 10px;">
                   <div class="row">
                    <div class="col-md-6">
                        <select id="grad_yr" class="form-control">
                        <?php if($graduating_yr != null){ ?>
                            <option value="<?php echo $graduating_yr ?>"><?php echo $graduating_yr ?></option>
                         <?php }?>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                    </select>
                    </div>
                </div>
                </td>
            </tr>
        </table>
        <input type="submit" value="Update" class="btn btn-danger" style="padding:10px; float: right;"/>
        </form>
        <br>
    </div>
    <div class="panel panel-post-item">
        <h4><i class="fa fa-mortar-board"></i> About Me</h4>
        <br>
        <form id="basic" method="post" onsubmit="updateAbout(event)">
        <table style="width: 100%;">
            <tr style="padding: 10px;">
                <textarea rows="4" cols="90" id="about" class="form-control"><?php if($about != null){ echo $about; } ?></textarea>
            </tr>
        </table>
        <br>
        <input value="Update" type="submit" class="btn btn-danger" style="padding:10px; float: right;" />
        </form>
        <br>
    </div>

    <div class="panel panel-post-item">
        <h4><i class="fa fa-mortar-board"></i> Change Password</h4>
        <br>
        <form id="changepw" method="post" onsubmit="changePassword(event)">
            <table style="width: 100%;">
                <tr>
                    <td style="padding: 10px; width: 30%;"><i class="fa fa-info-circle"></i> Current Password</td>
                    <td style="padding: 10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="currentPassword" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control" id="errorCurrentPW" style="color: red; display: none; font-size: smaller;"></label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px;"><i class="fa fa-info-circle"></i> New Password</td>
                    <td style="padding: 10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="newPassword" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control" id="errorNewPW" style="color: red; display: none; font-size: smaller;"></label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px;"><i class="fa fa-info-circle"></i> Confirm Password</td>
                    <td style="padding: 10px;">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="confirmPassword" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label class="form-control" id="errorConfirmPW" style="color: red; display: none; font-size: smaller;"></label>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <br>
            <input value="Update" type="submit" class="btn btn-danger" style="padding:10px; float: right;" />
        </form>
        <br>
    </div>

    <div class="panel panel-post-item">
        <form id="done" method="post" onsubmit="<?php site_url('Hello/load_profile')?>">
            <input value="Finish Editing" type="submit" class="btn btn-danger" style="padding:10px; float: right; margin-right: 200px;" />
        </form>
        <br>
    </div>

<?php
}else
{
?>
    <div class="panel panel-post-item">
        <h4><i class="fa fa-mortar-board" style="color: red;"></i> Error</h4>
        <br>
        <p>Error while load. Please try again.</p>
    </div>
<?php
}
?>




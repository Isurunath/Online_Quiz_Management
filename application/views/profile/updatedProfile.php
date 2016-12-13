<?php if(isset($this->session->userdata['profile_data'])) {

    $id = ($this->session->userdata['profile_data']['prof_user_id']);
    $fname = ($this->session->userdata['profile_data']['fname']);
    $lname = ($this->session->userdata['profile_data']['lname']);
    $course = ($this->session->userdata['profile_data']['course']);
    $pic = ($this->session->userdata['profile_data']['isProPic']);
    $dob = ($this->session->userdata['profile_data']['dob']);
    $about = ($this->session->userdata['profile_data']['about_me']);
    $city = ($this->session->userdata['profile_data']['city']);
    $phone = ($this->session->userdata['profile_data']['phone']);

    //calculate the age
    $age = date('Y-m-d') - $dob;
}
?>

<div class="profile-left-heading">
    <ul class="panel-options">
        <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
    </ul>
    <?php if($pic == 0)
    {
        ?>
        <a href="" class="profile-photo"><img class="img-circle img-responsive" src="../Profile_Pictures/default.png" alt=""></a>
        <?php
    }
    else if($pic == 1)
    {
    ?>
    <a href="" class="profile-photo"><img class="img-circle img-responsive" src="../Profile_Pictures/<?php echo $id ?>.jpg" alt="">
        <?php
        }
        ?>

        <h3 class="profile-name"><?php echo $fname ?> <?php echo $lname ?></h3>
        <h5 class="profile-designation"><?php echo $course ?></h5>

        <ul class="list-group">
            <li class="list-group-item"> <a href="timeline.html"></a></li>
            <li class="list-group-item">Name <a href="people-directory.html"><?php echo $fname ?></a></li>
            <li class="list-group-item">Age <a href="people-directory-grid.html"><?php echo $age ?></a></li>
        </ul>


        <button class="btn btn-danger btn-quirk btn-block profile-btn-follow" onclick="editProfile(<?php echo $id ?>)">Edit Profile</button>
        <button class="btn btn-danger btn-quirk btn-block profile-btn-follow" onclick="changeProfilePicture(<?php echo $id ?>)">Change Profile Picture</button>
</div>
<div class="profile-left-body">
    <h4 class="panel-title">About Me</h4>
    <p><?php echo $about ?></p>

    <hr class="fadeout">

    <h4 class="panel-title">Location</h4>
    <p><i class="glyphicon glyphicon-map-marker mr5"></i> <?php echo $city ?>, Sri Lanka</p>

    <hr class="fadeout">

    <h4 class="panel-title">Course</h4>
    <p><i class="glyphicon glyphicon-briefcase mr5"></i> <?php echo $course ?></p>

    <hr class="fadeout">

    <h4 class="panel-title">Contacts</h4>
    <p><i class="glyphicon glyphicon-phone mr5"></i> <?php echo $phone ?></p>

</div>
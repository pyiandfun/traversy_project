<h2><?php echo $title;?></h2>
<?php echo validation_errors();?>
<?php echo form_open('users/register'); ?>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="zipcode">Zipcode</label>
        <input type="text" class="form-control" name="zipcode" placeholder="Enter zipcode">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Username">
    </div>
    <div class="form-group">
        <label for="name">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Enter Username">
    </div>
    <div class="form-group">
        <label for="name">Password</label>
        <input type="text" class="form-control" name="password" placeholder="Enter Password">
    </div>
    <div class="form-group">
        <label for="name">Confirm Password</label>
        <input type="text" class="form-control" name="confirm_password" placeholder="Enter Confirm Password">
    </div>
    <button type="submit" class="btn btn-secondary">Register</button>
<?php echo form_close();?>




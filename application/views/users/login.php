<?php echo validation_errors();?>
<?php echo form_open('users/login'); ?>
<div class="row">
    <div class="col md-y md-offset-4 ">
        <h1 class="text-center"><?php echo $title;?></h1>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter your name" required autofocus>
        </div>
        <div class="form-group">
            <label for="email">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter your password" required autofocus>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</div>
<?php echo form_close(); ?>
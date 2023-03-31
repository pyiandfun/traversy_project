<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traversy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('home'); ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('/posts'); ?>">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('about'); ?>">About</a>
      </li>
    </ul>
  </div>
  <ul class="collapse navbar-collapse" class="navbarNav navbar-right">
    <?php if($this->session->userdata('logged_in')):?>
      <li class="nav nav-link"><a class="nav-link" href="<?php echo base_url('categories/create');?>">Create Category</a></li>
      <li class="nav nav-link"><a class="nav-link" href="<?php echo base_url('posts/create');?>">Create posts+</a></li>
      <li class="nav nav-link"><a class="nav-link" href="<?php echo base_url('users/logout');?>">Logout</a></li>
    <?php endif;?>
  <?php if(!$this->session->userdata('logged_in')):?>
    <li class="nav nav-link"><a href="<?php echo base_url('users/register');?>">Register</a></li>
    <li class="nav nav-link"><a href="<?php echo base_url('users/login');?>">Login</a></li>
  <?php endif;?>
</ul>
</nav>
<div class="container"> 
  <?php if($this->session->flashdata('user_registered')):?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>' ?>
  <?php endif;?>
  <?php if($this->session->flashdata('post_created')):?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>' ?>
  <?php endif;?>
  <?php if($this->session->flashdata('post_updated')):?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>' ?>
  <?php endif;?>
  <?php if($this->session->flashdata('category_created')):?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>' ?>
  <?php endif;?>
  <?php if($this->session->flashdata('post_deleted')):?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('post_deleted').'</p>' ?>
  <?php endif;?>
  <?php if($this->session->flashdata('login_failed')):?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>' ?>
  <?php endif;?>
  <?php if($this->session->flashdata('logged_in')):?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('logged_in').'</p>' ?>
  <?php endif;?>
  <?php if($this->session->flashdata('user_loggedout')):?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_loggedout').'</p>' ?>
  <?php endif;?>
  <?php if($this->session->flashdata('category_deleted')):?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('category_deleted').'</p>' ?>
  <?php endif;?>



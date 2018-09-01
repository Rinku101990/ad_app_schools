<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/logos11.png');?>">
    <title>Schools :: Web Application</title>
    <link href="<?php echo base_url('assets/css/login.css');?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/css/animate.css');?>" rel="stylesheet" media="screen">
    <link href="<?php echo base_url('assets/fonts/icomoon/icomoon.css');?>" rel="stylesheet">
</head>
<body>
    <form action="<?php echo base_url('welcome/login');?>" method="post" id="wrapper" style="margin-top:50px">
        <div id="box" class="animated bounceIn">
            <div id="top_header">
                <h3><img src="<?php echo base_url('assets/img/logos11.png');?>" alt="Sunrise Admin Logo"></h3>
                <h5>Sign in to your account.</h5></div>
                <?php $error= $this->session->flashdata('error');
                if(!empty($error)) { ?>
                    <center><strong><?=$error?></strong></center>
                <?php } ?>
            <div id="inputs">
                <div class="form-control">
                    <input type="text" name="username" id="username" placeholder="Enter Email Address"> <i class="icon-email"></i></div>
                <div class="form-control">
                    <input type="password" name="userpass" id="userpass" placeholder="Enter Password"> <i class="icon-lock2"></i></div>
                <input type="submit" value="Sign In">
            </div>
            <div id="bottom">
                <div class="squared-check">
                    <input type="checkbox" value="None" id="remember" name="check" checked="">
                    <label for="remember"></label>
                    <div class="cb-label">Remember</div>
                </div><a class="right_a" href="#">Forgot password?</a></div>
        </div>
    </form>
</body>
</html>
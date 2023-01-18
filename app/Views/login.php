<!DOCTYPE html>
<html>
<head>
   <title>Login | Aplikasi Penggajian</title>
   <link href="<?= base_url('css/login.css'); ?>" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <script src="<?php echo base_url(); ?>/js/a81368914c.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
   <div class="container">
      <div class="img">
         <img src="<?php echo base_url('img/payroll.png') ?>">
      </div>
      <div class="login-content">
         <form class="user" method="POST" action="<?= base_url('login/auth') ?>">
         <img src="<?php echo base_url('img/avatar.png');?>">
         <h2 class="title">APLIKASI PENGGAJIAN</h2>
         <?php if(session()->getFlashdata('pesan')): ?>
            <div class="alert alert-info">
               <?= session()->getFlashdata('pesan') ?>
            </div>
            <?php endif; ?>
               <div class="input-div one">
                  <div class="i">
                        <i class="fas fa-user"></i>
                     </div>
                     <div class="div">
                        <h6 for="username">Username </h6>
                        <input type="text" class="input" name="username" id="username">
                     </div>
                  </div>
                  <div class="input-div pass">
                     <div class="i"> 
                        <i class="fas fa-lock"></i>
                     </div>
                     <div class="div">
                        <h6 for="password" >Password</h6>
                        <input type="password" class="input" name="password" id="password">
                     </div>
                  </div>
               <input type="submit" class="btn" value="Login" name="Login">
               </form>
         </div>
      </div>
      <script src="<?= base_url(); ?>/js/main.js"></script>
   </body>
</html>

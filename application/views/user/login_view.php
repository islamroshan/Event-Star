<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Event Star - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/custom-style.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body ">
         <?php echo form_open('user/register_controller/login_user'); ?>
           <div class="form-group">
              <div class="form-label-group">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'useremail',
                      'id' => 'inputEmail',
                      'value' => '',
                      'placeholder' => 'Email address',
                      'autofocus' => 'autofocus'
                    );
                    echo form_input($data);
                    echo form_label('Email address','inputEmail');
                 ?>
              </div>
           </div>
           <div class="form-group">
              <div class="form-label-group">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'userpassword',
                      'value' => '',
                      'id' => 'inputPassword',
                      'placeholder' => 'Password'
                    );
                    echo form_password($data);
                    echo form_label('Password','inputPassword');
                 ?>
              </div>
           </div>
           <p class="display-5 text-center"><em>OR</em></p>
           <div class="form-group">
              <div class="form-label-group">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'pin',
                      'type' => 'number',
                      'id' => 'pin',
                      'placeholder' => 'Pin'
                    );
                    echo form_input($data);
                    echo form_label('Enter Pin','pin');
                 ?>
              </div>
           </div>
           <div class="form-group">
             <?php 
               $data = array(
                 'class' => 'btn btn-primary  btn-block',
                 'name' => 'login_user',
                 'value' => 'Login'
               );
               echo form_submit($data);
              ?>
           </div>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url(); ?>user/register_controller/register_user">Register an Account</a>
          </div>
      </div>
      <ul class="list-group">
        <li class="list-group-item h5"><strong>Email :  admin</strong></li>
        <li class="list-group-item h5"><strong>Password : 12345</strong></li>
        <li class="list-group-item h5"><strong>Use only pin : 1122</strong></li>
      </ul>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>

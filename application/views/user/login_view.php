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
        <div class="card-body pb-0">
          <!-- IF USER NOT FOUND  -->
          <?php if($this->session->flashdata('user_not_found')): ?>
            <div class="alert alert-danger alert-dismissible fade show " role="alert">
                <?php echo $this->session->flashdata('user_not_found'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>    
          <?php endif;?>
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
      </div>
      <div class="row">
        <div class="col-sm-6 pr-0">
          <ul class="list-group">
            <li class="list-group-item h5"><strong>ADMIN</strong></li>
            <li class="list-group-item"><strong>Email :  admin</strong></li>
            <li class="list-group-item"><strong>Password : 12345</strong></li>
            <li class="list-group-item"><strong>you can use only pin to login 1122</strong></li>
          </ul>
        </div>
        <div class="col-sm-6 pl-0">
          <ul class="list-group">
            <li class="list-group-item h5"><strong>USER</strong></li>
            <li class="list-group-item  "><strong>Email :  user</strong></li>
            <li class="list-group-item"><strong>Password : 123456</strong></li>
            <li class="list-group-item"><strong>only admin can have pin</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>

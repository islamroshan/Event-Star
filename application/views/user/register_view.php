<?php if($this->session->userdata('is_logged_in')  && $this->session->userdata('user_role') == 'admin' ): ?>
<div class="row">
  <div class="col-md-12">
    <!-- if add successfully  -->
    <?php if($this->session->flashdata('user_registered')): ?>
      <div class="alert alert-success alert-dismissible fade show " role="alert">
          <?php echo $this->session->flashdata('user_registered'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>    
    <?php endif;?>

     <!-- if not add successfully  -->
    <?php if($this->session->flashdata('not_registered')): ?>
      <div class="alert alert-danger alert-dismissible fade show " role="alert">
          <?php echo $this->session->flashdata('not_registered'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>    
      <?php echo form_error(); ?>
    <?php endif;?>

    <div class="card  mb-3 ">
      <div class="card-header"><i class="fas fa-table"></i> Register User</div>
      <div class="card-body">
        <!-- Form starts -->
         <?php echo form_open('user/register_controller/register_user'); ?>
            <div class="form-group row required">
              <div class="col-md-2 col-form-label">
                 <?php $attributes = array("class" => "control-label"); ?>
                 <?php  echo form_label('First Name','firstname',$attributes); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'firstname',
                      'id' => 'firstname',
                      'placeholder' => 'Enter first name' 
                    );
                    echo form_input($data);    
                 ?>
                 <?php echo form_error('firstname', '<div class="text-danger pt-1 font-italic">', '</div>'); ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Last Name','lastname'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'lastname',
                      'id' => 'lastname',
                      'placeholder' => 'Enter last name' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>
            
            <div class="form-group row required">
              <div class="col-md-2 col-form-label">
                 <?php $attributes = array("class" => "control-label"); ?>
                 <?php  echo form_label('Email','useremail',$attributes); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'useremail',
                      'type' => 'useremail',
                      'id' => 'useremail',
                      'placeholder' => 'Enter email' 
                    );
                    echo form_input($data);    
                 ?>
                 <?php echo form_error('useremail', '<div class="text-danger pt-1 font-italic">', '</div>'); ?>
              </div>
            </div>

            <div class="form-group row required">
              <div class="col-md-2 col-form-label">
                 <?php $attributes = array("class" => "control-label"); ?>
                 <?php  echo form_label('Password','password',$attributes); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'password',
                      'type' => 'password',
                      'id' => 'password',
                      'placeholder' => 'Enter password' 
                    );
                    echo form_input($data);    
                 ?>
                 <?php echo form_error('password', '<div class="text-danger pt-1 font-italic">', '</div>'); ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10"> 
                 <?php 
                    $data = array(
                      'class' => 'btn btn-outline-primary edit_verification',
                      'name' => 'register_user',
                      'value' => 'Register'
                    );
                    echo form_submit($data);    
                 ?>
              </div>
            </div>
         <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
<?php else:  ?>
<?php redirect('login_controller'); ?>
<?php endif; ?>
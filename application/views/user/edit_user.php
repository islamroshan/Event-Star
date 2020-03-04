<?php if($this->session->userdata('is_logged_in')  && $this->session->userdata('user_role') == 'admin' ): ?>
<div class="row">
  <div class="col-md-12">
    <div class="card  mb-3 ">
      <div class="card-header"><i class="fas fa-table"></i> Edit User</div>
      <div class="card-body">
      <?php 
        foreach ($user_info as $user) 
        {
          $user = array(
              'first_name' => $user->first_name,
              'last_name' => $user->last_name,  
              'user_email' => $user->user_email               
          );
        }
      ?>
        <!-- Form starts -->
         <?php echo form_open('user/edit_user_controller/update_user/'.html_escape($this->uri->segment(4))); ?>
            <div class="form-group row required">
              <div class="col-md-2 col-form-label">
                 <?php $attributes = array("class" => "control-label"); ?>
                 <?php  echo form_label('First Name','first_name',$attributes); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'first_name',
                      'value' => $user['first_name'],
                      'id' => 'first_name',
                      'placeholder' => '' 
                    );
                    echo form_input($data);    
                 ?>
                 <?php echo form_error('first_name', '<div class="text-danger pt-1 font-italic">', '</div>'); ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Last Namet','last_name'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'last_name',
                      'value' => $user['last_name'],
                      'id' => 'last_name',
                      'placeholder' => '' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>
            
            <div class="form-group row required">
              <div class="col-md-2 col-form-label">
                 <?php $attributes = array("class" => "control-label"); ?>
                 <?php  echo form_label('Email','user_email',$attributes); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'user_email',
                      'value' => $user['user_email'],
                      'id' => 'user_email',
                      'placeholder' => '' 
                    );
                    echo form_input($data);    
                 ?>
                 <?php echo form_error('user_email', '<div class="text-danger pt-1 font-italic">', '</div>'); ?>
              </div>
            </div>

            <div class="form-group row required">
              <div class="col-md-2 col-form-label">
                 <?php $attributes = array("class" => "control-label"); ?>
                 <?php  echo form_label('Password','user_password',$attributes); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'user_password',
                      'value' => '',
                      'id' => 'user_password',
                      'placeholder' => 'Enter new password' 
                    );
                    echo form_input($data);    
                 ?>
                 <?php echo form_error('user_password', '<div class="text-danger pt-1 font-italic">', '</div>'); ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10"> 
                 <?php 
                    $data = array(
                      'class' => 'btn btn-outline-primary edit_verification',
                      'name' => 'update_user',
                      'value' => 'Update'
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
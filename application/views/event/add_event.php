<?php if($this->session->userdata('is_logged_in')): ?>
<div class="row">
  <div class="col-md-12">
  
  <!-- if add successfully  -->
  <?php if($this->session->flashdata('event_created')): ?>
      <div class="alert alert-success alert-dismissible fade show " role="alert">
          <?php echo $this->session->flashdata('event_created'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>    
    <?php endif;?>

     <!-- if not add successfully  -->
    <?php if($this->session->flashdata('event_not_created')): ?>
      <div class="alert alert-danger alert-dismissible fade show " role="alert">
          <?php echo $this->session->flashdata('event_not_created'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>    
    <?php endif;?>

    <div class="card  mb-3 ">
      <div class="card-header"><i class="fas fa-table"></i> Add New Event</div>
      <div class="card-body">
        <!-- Form starts -->
         <?php echo form_open('event/add_event_controller/add_event'); ?>
            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Event Name','eventname'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'eventname',
                      'id' => 'eventname',
                      'placeholder' => 'Event Name' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Event Date','eventdate'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'eventdate',
                      'id' => 'eventdate',
                      'type' => 'date',
                      'value' => date('Y-m-d'),
                      'placeholder' => '' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10"> 
                 <?php 
                    $data = array(
                      'class' => 'btn btn-outline-primary',
                      'name' => 'add_event',
                      'value' => 'Add Event'
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
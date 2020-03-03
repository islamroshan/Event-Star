<?php if($this->session->userdata('is_logged_in')): ?>
<div class="row">
  <div class="col-md-12">
    <div class="card mb-3 ">
      <div class="card-header"><i class="fas fa-table"></i> Edit Event</div>
      <div class="card-body">
      <?php 
        foreach ($event_detail as $events) 
        {
          $detail = array(
              'name' => $events->event_name,
              'date' => $events->event_date               
          );
        }
      ?>
        <!-- Form starts -->
         <?php echo form_open('event/edit_event_controller/update_event/'.$this->uri->segment(4).' '); ?>
            <div class="form-group row required">
              <div class="col-md-2 col-form-label">
                 <?php $attributes = array("class" => "control-label"); ?>
                 <?php  echo form_label('Event Name','eventname',$attributes); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'eventname',
                      'value' => $detail['name'],
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
                      'value' => $detail['date'],
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
                      'class' => 'btn btn-outline-primary edit_verification',
                      'name' => 'update_event',
                      'value' => 'Edit Event'
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
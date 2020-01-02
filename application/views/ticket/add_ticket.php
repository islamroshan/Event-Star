<?php if($this->session->userdata('is_logged_in')): ?>
<div class="row">
  <div class="col-md-12">
    <div class="card  mb-3 ">
      <div class="card-header"><i class="fas fa-table"></i> Add New Ticket</div>
      <div class="card-body">
        <!-- Form starts -->
         <?php echo form_open('ticket/add_ticket_controller/add_ticket'); ?>
            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Ticket Name','ticketname'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'ticketname',
                      'id' => 'ticketname',
                      'placeholder' => 'Ticket Name' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Price per Unit','price'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'price',
                      'id' => 'price',
                      'placeholder' => 'Price' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>
            
            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Ticket Limit','limit'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'limit',
                      'type' => 'number',
                      'id' => 'limit',
                      'placeholder' => 'Ticket Limit' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label"> 
                <label for="plan">Select Event</label>
              </div>
               <div class="col-md-4 col-md-offset-4">  
                    <select id="plan" name="selectevent" class="form-control">  
                        <option value="">Select</option>
                        <?php   
                          foreach ($events as $event) {
                            echo '<option value="'. html_escape($event->event_id) .'" >'. html_escape($event->event_name) .'</option>';
                          }
                         ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10"> 
                 <?php 
                    $data = array(
                      'class' => 'btn btn-primary',
                      'name' => 'add_ticket',
                      'value' => 'Add Ticket'
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
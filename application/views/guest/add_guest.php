<?php if($this->session->userdata('is_logged_in')): ?>
<div class="row">
  <div class="col-md-12">
    <div class="card  mb-3 ">
      <div class="card-header"><i class="fas fa-table"></i> Add New Guest</div>
      <div class="card-body">
        <!-- Form starts -->
         <?php echo form_open('guest/add_guest_controller/add_guest'); ?>
            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Guest Name','guestname'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'guestname',
                      'id' => 'guestname',
                      'placeholder' => 'Guest Name' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Contact Number','phone'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'phone',
                      'id' => 'phone',
                      'placeholder' => 'Contact Number' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Address','address'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'address',
                      'id' => 'address',
                      'placeholder' => 'Guest Address' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Email','email'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'email',
                      'id' => 'email',
                      'placeholder' => 'Enter Email' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Purchase From ','purchase'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'purchase',
                      'id' => 'purchase',
                      'placeholder' => 'Purchase From' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Purchase Date ','purchasedate'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'purchasedate',
                      'type' => 'date',
                      'readonly' => TRUE,
                      'value' => date('Y-m-d'),
                      'id' => 'purchasedate',
                      'placeholder' =>  ''
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label"> 
                <label for="eventname">Event Name</label>
              </div>
               <div class="col-md-4 col-md-offset-4">  
                    <select id="plan" name="eventname" class="form-control">  
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
              <div class="col-md-2 col-form-label"> 
                <label for="ticketname">Ticket Name</label>
              </div>
               <div class="col-md-4 col-md-offset-4">  
                    <select id="ticketname" name="ticketname" class="form-control">  
                        <option value="">Select</option>
                        <?php   
                          foreach ($tickets as $ticket) {
                            echo '<option value="'. html_escape($ticket->ticket_id) .'" >'. html_escape($ticket->ticket_name) .' ($'.html_escape($ticket->ticket_price).')  Total Tickets : '. html_escape($ticket->ticket_limit) .' </option>';
                          }
                         ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Paid Amount','pamount'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'pamount',
                      'type' => 'number',
                      'id' => 'pamount',
                      'placeholder' => 'Paid Amount' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10"> 
                 <?php 
                    $data = array(
                      'class' => 'btn btn-primary',
                      'name' => 'add_guest',
                      'value' => 'Add Guest'
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
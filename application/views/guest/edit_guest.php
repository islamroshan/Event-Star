<?php if($this->session->userdata('is_logged_in')): ?>
<div class="row">
  <div class="col-md-12">
    <div class="card  mb-3 ">
      <div class="card-header"><i class="fas fa-table"></i> Add New Guest</div>
      <div class="card-body">
      <?php 
        foreach ($guest_detail as $guests) 
        {
          $guest = array(
              'name' => $guests->guest_name,
              'phone' => $guests->guest_number,  
              'address' => $guests->guest_address,
              'email' => $guests->guest_email,
              'purchase_from' => $guests->purchase_from,
              'date' => $guests->purchase_date,  
              'event_name' => $guests->event_name,
              'ticket_name' => $guests->ticket_name, 
              'ticket_id' => $guests->ticket_id,  
              'rate' => $guests->ticket_rate,
              'p_amount' => $guests->paid_amount,                 
          );
        }
      ?>
        <!-- Form starts -->
         <?php echo form_open('guest/edit_guest_controller/update_guest/'.$this->uri->segment(4)); ?>
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
                      'value' => html_escape($guest['name']),
                      'placeholder' => '' 
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
                      'value' => html_escape($guest['phone']),
                      'placeholder' => '' 
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
                      'value' => html_escape($guest['address']),
                      'placeholder' => '' 
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
                      'value' => html_escape($guest['email']),
                      'placeholder' => '' 
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
                      'value' => html_escape($guest['purchase_from']),
                      'placeholder' => '' 
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
                 <?php  echo form_label('Event Name','eventname'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'eventname',
                      'id' => 'eventname',
                      'readonly' => TRUE,
                      'value' => html_escape($guest['event_name']),
                      'placeholder' => '' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>  

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
                      'readonly' => TRUE,
                      'value' => html_escape($guest['ticket_name']),
                      'placeholder' => '' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>  

            <!-- This is a hidden input field -->
            <?php 
                $data = array(
                    'class' => 'form-control',
                    'name' => 'ticketid',
                    'id' => 'ticketid',
                    'hidden' => TRUE,
                    'value' => html_escape($guest['ticket_id']),
                    'placeholder' => '' 
                );
                echo form_input($data);    
            ?>
    
            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Total Amount ','tamount'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'tamount',
                      'id' => 'tamount',
                      'type' => 'number',
                      'readonly' => TRUE,
                      'value' => html_escape($guest['rate']),
                      'placeholder' => '' 
                    );
                    echo form_input($data);    
                 ?>
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
                      'value' => html_escape($guest['p_amount']),
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
                      'name' => 'edit_guest',
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
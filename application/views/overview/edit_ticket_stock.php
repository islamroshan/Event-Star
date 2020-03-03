<?php if($this->session->userdata('is_logged_in')): ?>
<div class="row">
  <div class="col-md-12">
    <div class="card  mb-3 ">
      <div class="card-header"><i class="fas fa-table"></i> Edit Ticket</div>
      <div class="card-body">
      <?php 
        foreach ($ticket_info as $tickets) 
        {
          $ticket = array(
              'name' => $tickets->ticket_name,
              'price' => $tickets->ticket_price,  
              'limit' => $tickets->ticket_limit,
              'event_name' => $tickets->event_name,               
          );
        }
      ?>
        <!-- Form starts -->
         <?php echo form_open('overview/edit_ticket_stock_out/update_ticket/'.html_escape($this->uri->segment(4))); ?>
            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Ticket Name','ticketname'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'ticketname',
                      'value' => $ticket['name'],
                      'id' => 'ticketname',
                      'placeholder' => '' 
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
                      'value' => $ticket['price'],
                      'id' => 'price',
                      'placeholder' => '' 
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
                      'value' => $ticket['limit'],
                      'id' => 'limit',
                      'placeholder' => '' 
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
                        <?php  foreach ($event_list as $event): ?>
                        
                            <option  value="<?php echo  html_escape($event->event_id); ?>" <?php if($ticket['event_name'] == $event->event_id){?> selected="selected"  <?php } ?> > <?php echo  html_escape($event->event_name); ?> 
                            </option>
                        
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10"> 
                 <?php 
                    $data = array(
                      'class' => 'btn btn-outline-primary',
                      'name' => 'edit_ticket',
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
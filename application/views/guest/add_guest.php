<?php if($this->session->userdata('is_logged_in')): ?>
<div class="row">
  <div class="col-md-12">
  <!-- if added successfully  -->
  <?php if($this->session->flashdata('guest_added')): ?>
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        <?php echo $this->session->flashdata('guest_added'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>    
    <?php endif;?>

    <!-- if not added successfully  -->
    <?php if($this->session->flashdata('guest_not_added')): ?>
    <div class="alert alert-danger alert-dismissible fade show " role="alert">
        <?php echo $this->session->flashdata('guest_not_added'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>    
    <?php endif;?>
    <div class="card mb-3 ">
      <div class="card-header"><i class="fas fa-table"></i> Add New Guest</div>
      <div class="card-body">
        <!-- Form starts -->
         <?php echo form_open('guest/add_guest_controller/add_guest'); ?>
            <div class="form-group row required">
              <div class="col-md-2 col-form-label">
                 <?php $attributes = array("class" => "control-label"); ?>
                 <?php  echo form_label('Guest Name','guestname',$attributes); ?>
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
                 <?php echo form_error('guestname', '<div class="text-danger pt-1 font-italic">', '</div>'); ?>
              </div>
            </div>

            <div class="form-group row required">
              <div class="col-md-2 col-form-label">
                 <?php $attributes = array("class" => "control-label"); ?>
                 <?php  echo form_label('Contact Number','phone',$attributes); ?>
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
                 <?php echo form_error('phone', '<div class="text-danger pt-1 font-italic">', '</div>'); ?>
              </div>
            </div>

            <div class="form-group row required">
              <div class="col-md-2 col-form-label">
                 <?php $attributes = array("class" => "control-label"); ?>
                 <?php  echo form_label('Address','address',$attributes); ?>
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
                 <?php echo form_error('address', '<div class="text-danger pt-1 font-italic">', '</div>'); ?>
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
                 <select class="selectpicker form-control" id="event_picker" title="Select event"  name="eventname" data-live-search="true"> 
                        <?php   
                          foreach ($events as $event) {
                            echo '<option data-subtext="(Event on: '.$event->event_date.')" value="'. html_escape($event->event_id) .'" >'. html_escape($event->event_name) .'</option>';
                          }
                         ?>
                    </select>
                </div>
            </div>

            <div class="form-group row" id="tic_hide">
							<div class="col-md-2 col-form-label">
								<label for="eventname">Ticket Name</label>
							</div>
							<div class="col-md-4 col-md-offset-4">
									<select class="form-control" name="ticketname" id="sel_tic">
										 
									</select>
							</div>
						</div>
            
            <div class="form-group row" id="tamount_hide">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Total Amount','tamount'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'tamount',
                      'type' => 'text',
                      'id' => 'tamount',
                      'value' => $currency.' 0',
                      'disabled' => TRUE
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
                      'placeholder' => $currency.' 0'
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
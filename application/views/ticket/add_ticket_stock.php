<?php if($this->session->userdata('is_logged_in')): ?>
<div class="row">
  <div class="col-md-12">
    <!-- if add successfully  -->
    <?php if($this->session->flashdata('ticket_stock_updated')): ?>
      <div class="alert alert-success alert-dismissible fade show " role="alert">
          <?php echo $this->session->flashdata('ticket_stock_updated'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>    
    <?php endif;?>

    <div class="card  mb-3 ">
      <div class="card-header"><i class="fas fa-table"></i> Add Ticket Stock</div>
      <div class="card-body">
        <!-- Form starts -->
         <?php echo form_open('ticket/add_ticket_controller/add_stock'); ?>
            <div class="form-group row required">
                <div class="col-md-2 col-form-label "> 
                 <label for="selectevent" class="control-label">Select Ticket</label>
                </div>
                <div class="col-md-4 col-md-offset-4">  
                    <select class="selectpicker form-control" name="select_ticket" data-live-search="true">  
                        <option value="">Select</option>
                        <?php   
                          foreach ($tickets as $ticket) 
                          {
                            echo '<option data-subtext="In stock : '.$ticket->tickets_available.' tickets" value="'. html_escape($ticket->ticket_id) .'" >'. html_escape($ticket->ticket_name) .'</option>';
                          }
                         ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Add Stock','ticket_stock'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'ticket_stock',
                      'id' => 'ticket_stock',
                      'placeholder' => '5, 10, 20, 30' 
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
                      'name' => 'add_stock',
                      'value' => 'Add Stock'
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
<?php if($this->session->userdata('is_logged_in')): ?>
<div class="row">
  <div class="col-md-12">
      <!-- if updated successfully  -->
      <?php if($this->session->flashdata('guest_updated')): ?>
      <div class="alert alert-success alert-dismissible fade show " role="alert">
          <?php echo $this->session->flashdata('guest_updated'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>    
    <?php endif;?>

     <!-- if deleted successfully  -->
     <?php if($this->session->flashdata('guest_deleted')): ?>
      <div class="alert alert-danger alert-dismissible fade show " role="alert">
          <?php echo $this->session->flashdata('guest_deleted'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>    
    <?php endif;?>
  </div>
</div>
<!-- DataTables -->
<div class="card p-0 mb-3 rounded-0">
 <div class="card-header pl-2">
   <i class="fas fa-table"></i>
        Guest List
  </div>
 <div class="card-body p-2">
    <div class="col-md-8 col-sm-12 p-0">
        <form action="<?php echo base_url('guest/guest_list_controller');?>" method="post">
           <div class="input-group mb-3 input-group">
             <input type="text" name="keyword" class="form-control" placeholder="Search here" aria-label="Search here" aria-describedby="button-addon2">
             <div class="input-group-append">
               <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
             </div>
           </div>
        </form>
    </div>
    <?php if(!empty($guests_list)): ?>
   <div class="table-responsive">
     <table class="table table-bordered mb-0"  cellspacing="0">
       <thead>
         <tr>
          <th>S.No</th>
          <th>Guest Name</th>
          <th>Phone</th>
          <th>Event / Ticket</th>
          <th>Total / Paid</th>
          <th>Payment Date</th>
          <th>Due Amount</th>
          <th>Action</th>
        </tr>
       </thead>
       <tfoot>
         <tr>
          <th>S.No</th>
          <th>Guest Name</th>
          <th>Phone</th>
          <th>Event / Ticket</th>
          <th>Total / Paid</th>
          <th>Payment Date</th>
          <th>Due Amount</th>
          <th>Action</th>
         </tr>
       </tfoot>
       <tbody>
         <?php 
           $i = 0;
           foreach ($guests_list as $guests) 
           {
             $i = ++$i;
             echo '<tr>';
             echo '<td>'. html_escape($i) .'</td>';
             echo '<td>'. html_escape($guests->guest_name).'</td>';
             echo '<td>'. html_escape($guests->guest_number).'</td>';
             echo '<td>'. html_escape($guests->event_name).' / '.html_escape($guests->ticket_name).'</td>';
             echo '<td>'. html_escape($currency).' '.html_escape($guests->ticket_rate).' / '. html_escape($currency).' '. html_escape($guests->paid_amount).' </td>';
             echo '<td>'. html_escape($guests->purchase_date).'</td>';
             echo '<td>'. html_escape($currency).' '. html_escape($guests->remaining_due).'</td>';
             echo '<td>
                    <div class="btn-group btn-group"> 
                       <a href="'.base_url().'guest/edit_guest_controller/edit_guest/'. $guests->guest_id  .'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                       <a href="'.base_url().'guest/edit_guest_controller/delete_guest/'.$guests->guest_id.'" class="btn btn-danger btn-sm deleteitem"><i class="fas fa-trash-alt"></i></a>
                     </div>
                   </td>';
             echo '</tr>';
           }
          ?> 
 
       </tbody>
     </table>
    <?php if($this->session->has_userdata('key')): ?>
    <?php echo $this->pagination->create_links(); ?>
    <?php $this->session->unset_userdata('key'); ?>
    <?php endif; ?>
   </div>
    <?php else: ?>
    <p class="pl-4"> No Data Available</p>
    <?php endif; ?>
 </div>
</div>
<?php else:  ?>
<?php redirect('login_controller'); ?>
<?php endif; ?>
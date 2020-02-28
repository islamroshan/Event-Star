<?php if($this->session->userdata('is_logged_in')): ?>

<!-- DataTables -->
<div class="card mb-3">
 <div class="card-header">
   <i class="fas fa-table"></i>
        Print Invoice
  </div>
 <div class="card-body p-3">
    <div class="col-md-8 col-sm-12 p-0">
        <form action="<?php echo base_url('guest/guest_list_controller');?>" method="post">
           <div class="input-group mb-3 input-group">
             <input type="text" name="keyword" class="form-control" placeholder="Search here" aria-label="Search here" aria-describedby="button-addon2">
             <div class="input-group-append">
               <button class="btn btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
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
          <th>Event / Ticket</th>
          <th>Total / Paid</th>
          <th>Due Amount</th>
          <th>Action</th>
        </tr>
       </thead>
       <tfoot>
         <tr>
          <th>S.No</th>
          <th>Guest Name</th>
          <th>Event / Ticket</th>
          <th>Total / Paid</th>
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
             echo '<td>'. html_escape($guests->event_name).' / '.html_escape($guests->ticket_name).'</td>';
             echo '<td>'.html_escape($currency).' '. html_escape($guests->ticket_rate).' / '.html_escape($currency).' '. html_escape($guests->paid_amount).' </td>';
             echo '<td>'.html_escape($currency).' '. html_escape($guests->remaining_due).'</td>';
             echo '<td>
                     <a href="'.base_url().'print/print_controller/print/'. $guests->guest_id .'" class="btn btn-outline-primary">Print Invoice</a>
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
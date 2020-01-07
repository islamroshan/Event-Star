<?php if($this->session->userdata('is_logged_in')): ?>
<!-- DataTables -->
<div class="card mb-3">
 <div class="card-header">
   <i class="fas fa-table"></i>
        Event This Month
  </div>
 <div class="card-body p-3">
    <div class="col-md-8 col-sm-12 p-0">
        <form action="<?php echo base_url('event/event_list_controller');?>" method="post">
           <div class="input-group mb-3 input-group">
             <input type="text" name="keyword" class="form-control" placeholder="Search here" aria-label="Search here" aria-describedby="button-addon2">
             <div class="input-group-append">
               <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
             </div>
           </div>
        </form>
    </div>
    <?php if(!empty($events_list)): ?>
   <div class="table-responsive">
     <table class="table table-bordered mb-0"  cellspacing="0">
       <thead>
         <tr>
          <th>S.No</th>
          <th>Event id</th>
          <th>Event Name</th>
          <th>Event Date</th>
          <th>Action</th>
        </tr>
       </thead>
       <tfoot>
         <tr>
           <th>S.No</th>
           <th>Event id</th>
           <th>Event Name</th>
           <th>Event Date</th>
           <th>Action</th>
         </tr>
       </tfoot>
       <tbody>
         <?php 
           $i = 0;
           foreach ($events_list as $events) 
           {
             $i = ++$i;
             echo '<tr>';
             echo '<td>'. html_escape($i) .'</td>';
             echo '<td>'. html_escape($events->event_id).'</td>';
             echo '<td>'. html_escape($events->event_name).'</td>';
             echo '<td>'. html_escape($events->event_date).'</td>';
             echo '<td>
                    <div class="btn-group btn-group"> 
                       <a href="'.base_url().'event/edit_event_controller/edit_event/'. $events->event_id  .'" class="btn btn-warning btn-sm">Edit Event</a>
                       <a href="'.base_url().'add_plan_controller/delete_plan/'.$events->event_id.'" class="btn btn-danger btn-sm" onClick="return doconfirm()"> Delete Event</a>
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
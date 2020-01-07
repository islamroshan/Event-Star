<?php if($this->session->userdata('is_logged_in')): ?>
<div class="row">
  <div class="col-md-12">
      <!-- if updated successfully  -->
      <?php if($this->session->flashdata('ticket_updated')): ?>
      <div class="alert alert-success alert-dismissible fade show " role="alert">
          <?php echo $this->session->flashdata('ticket_updated'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>    
    <?php endif;?>

     <!-- if deleted successfully  -->
     <?php if($this->session->flashdata('ticket_deleted')): ?>
      <div class="alert alert-danger alert-dismissible fade show " role="alert">
          <?php echo $this->session->flashdata('ticket_deleted'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>    
    <?php endif;?>
  </div>
</div>
<!-- DataTables -->
<div class="card mb-3">
 <div class="card-header">
   <i class="fas fa-table"></i>
        Ticket List
  </div>
 <div class="card-body p-3">
    <div class="col-md-8 col-sm-12 p-0">
        <form action="<?php echo base_url('ticket/ticket_list_controller');?>" method="post">
           <div class="input-group mb-3 input-group">
             <input type="text" name="keyword" class="form-control" placeholder="Search here" aria-label="Search here" aria-describedby="button-addon2">
             <div class="input-group-append">
               <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
             </div>
           </div>
        </form>
    </div>
    <?php if(!empty($tickets_list)): ?>
   <div class="table-responsive">
     <table class="table table-bordered mb-0"  cellspacing="0">
       <thead>
         <tr>
          <th>S.No</th>
          <th>Ticket Name</th>
          <th>Event Name</th>
          <th>Price</th>
          <th>Ticket Limit</th>
          <th>Action</th>
        </tr>
       </thead>
       <tfoot>
         <tr>
          <th>S.No</th>
          <th>Ticket Name</th>
          <th>Event Name</th>
          <th>Price</th>
          <th>Ticket Limit</th>
          <th>Action</th>
         </tr>
       </tfoot>
       <tbody>
         <?php 
           $i = 0;
           foreach ($tickets_list as $tickets) 
           {
             $i = ++$i;
             echo '<tr>';
             echo '<td>'. html_escape($i) .'</td>';
             echo '<td>'. html_escape($tickets->ticket_name).'</td>';
             echo '<td>'. html_escape($tickets->event_name).'</td>';
             echo '<td>'. html_escape($currency).' '. html_escape($tickets->ticket_price).'</td>';
             echo '<td>'. html_escape($tickets->ticket_limit).'</td>';
             echo '<td>
                    <div class="btn-group btn-group"> 
                       <a href="'.base_url().'ticket/edit_ticket_controller/edit_ticket/'. $tickets->ticket_id  .'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                       <a href="'.base_url().'ticket/edit_ticket_controller/delete_ticket/'.$tickets->ticket_id.'" class="btn btn-danger btn-sm deleteitem"><i class="fas fa-trash-alt"></i></a>
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
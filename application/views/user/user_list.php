<?php if($this->session->userdata('is_logged_in') && $this->session->userdata('user_role') == 'admin' ): ?>
<div class="row">
  <div class="col-md-12">

      <!-- if updated successfully  -->
      <?php if($this->session->flashdata('user_updated')): ?>
      <div class="alert alert-success alert-dismissible fade show " role="alert">
          <?php echo $this->session->flashdata('user_updated'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>    
    <?php endif;?>

     <!-- if not updated successfully  -->
     <?php if($this->session->flashdata('user_not_updated')): ?>
      <div class="alert alert-danger alert-dismissible fade show " role="alert">
          <?php echo $this->session->flashdata('user_not_updated'); ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>    
    <?php endif;?>

  </div>
</div>
<!-- DataTables -->
<div class="card p-0 rounded-0">
 <div class="card-header pl-2">
   <i class="fas fa-table"></i>
        User List
  </div>
 <div class="card-body p-2">
    <div class="col-md-8 col-sm-12 p-0">
        <form action="<?php echo base_url('user/user_list_controller');?>" method="post">
           <div class="input-group mb-3 input-group">
             <input type="text" name="keyword" class="form-control" placeholder="Search here" aria-label="Search here" aria-describedby="button-addon2">
             <div class="input-group-append">
               <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
             </div>
           </div>
        </form>
    </div>
    <?php if(!empty($user_list)): ?>
   <div class="table-responsive">
     <table class="table table-bordered mb-0"  cellspacing="0">
       <thead>
         <tr>
          <th>S.No</th>
          <th>User Name</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email Address</th>
          <th>Action</th>
        </tr>
       </thead>
       <tfoot>
         <tr>
          <th>S.No</th>
          <th>User Name</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email Address</th>
          <th>Action</th>
         </tr>
       </tfoot>
       <tbody>
         <?php 
           $i = 0;
           foreach ($user_list as $users) 
           {
             $i = ++$i;
             echo '<tr id="hide_animate">';
             echo '<td>'. html_escape($i) .'</td>';
             echo '<td>'. html_escape($users->first_name).' '.html_escape($users->last_name).'</td>';
             echo '<td>'. html_escape($users->first_name).'</td>';
             echo '<td>'. html_escape($users->last_name).'</td>';
             echo '<td>'. html_escape($users->user_email).'</td>';
             echo '<td>
                    <div class="btn-group btn-group"> 
                       <a href="'.base_url().'user/edit_user_controller/get_user_info/'. $users->user_id  .'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                       <a href="'.base_url().'user/edit_user_controller/delete_user/'.$users->user_id.'" class="btn btn-danger btn-sm deleteitem"><i class="fas fa-trash-alt"></i></a>
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
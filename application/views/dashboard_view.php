<?php if($this->session->userdata('is_logged_in')): ?>
<?php 
    // Calsulate income per month
    $total = 0;
    if (!empty($income_per_month)) 
    { 
        foreach($income_per_month as $value) 
        {
            $total =  $value->paid_amount +  $total ;
        }
    }
    
  ?>
<!-- Icon Cards-->
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
            <i class="fas fa-fw fa-money-bill-alt"></i> 
        </div>
        <div class="mr-5 font-weight-bold"><?php echo html_escape($currecny); ?> <?php  echo html_escape($total); ?></div>
        <div class="mr-5">Income This Month</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('print/print_invoice_controller'); ?>">
        <span class="float-left">View Details</span>
        <span class="float-right">
            <i class="fas fa-angle-right"></i>
        </span>
        </a>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
            <i class="fas fa-fw fa-calendar-check"></i>
        </div>
        <div class="mr-5 font-weight-bold"><?php  echo html_escape($events_per_month); ?></div>
        <div class="mr-5">Events This Month</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('event/event_month_controller'); ?>">
        <span class="float-left">View Details</span>
        <span class="float-right">
            <i class="fas fa-angle-right"></i>
        </span>
        </a>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
             <i class="fas fa-fw fa-user-tie"></i>
        </div>
        <div class="mr-5 font-weight-bold"><?php  echo html_escape($total_guest); ?></div>
        <div class="mr-5">Total Guests</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('guest/guest_list_controller'); ?>">
        <span class="float-left">View Details</span>
        <span class="float-right">
            <i class="fas fa-angle-right"></i>
        </span>
        </a>
    </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-calendar-alt"></i>
        </div>
        <?php   
            $curr_date = date('d-m-Y');
            $date = date("F d ,Y", strtotime($curr_date));
           ?>
          <div class="mr-5 font-weight-bold"><?php echo  html_escape($date); ?></div>
          <div class="mr-5"><?php echo html_escape(date("l, h:i A")); ?></div>
        </div>
    </div>
    </div>
</div>
<!-- Area Chart-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Over All Statistics
    </div>
    <div class="card-body">
        <canvas id="myChart" width="100%" height="30"></canvas>
    </div>
</div>
<!-- Chart View -->
<?php $this->load->view('charts/charts_view'); ?>
<?php else: ?>
<?php redirect('login_controller'); ?>
<?php endif; ?>
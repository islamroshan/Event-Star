<!-- Icon Cards-->
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
        <div class="card-body">
        <div class="card-body-icon">
            <i class="fas fa-fw fa-calendar-check"></i>
        </div>
        <div class="mr-5">Total Events</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
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
            <i class="fas fa-fw fa-ticket-alt"></i>
        </div>
        <div class="mr-5">Ticket Category</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
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
        <div class="mr-5">Total Guests</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
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
            <i class="fas fa-fw fa-receipt"></i>
        </div>
        <div class="mr-5">Total Invoice</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">View Details</span>
        <span class="float-right">
            <i class="fas fa-angle-right"></i>
        </span>
        </a>
    </div>
    </div>
</div>
<!-- Area Chart Example-->
<div class="card mb-3">
<div class="card-header">
    <i class="fas fa-chart-area"></i>
    Over All Statistics</div>
<div class="card-body">
    <canvas id="myChart" width="100%" height="30"></canvas>
</div>
</div>
<!-- Chart View -->
<?php $this->load->view('charts/charts_view'); ?>
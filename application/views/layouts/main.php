<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Event Star v1.0</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    
    <!-- AJAX select box styles for this template-->
    <link href="<?php echo base_url(); ?>assets/select-box/css/bootstrap-select.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/custom-style.css" rel="stylesheet">


    <!-- Charts  -->
    <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
  <?php 
    $ems_settings = $this->setting_model->get_settings();
      foreach ($ems_settings as $name) 
      {
        $company_name = html_escape($name->company_name);
      }
     ?>
    <a class="navbar-brand mr-1" href="<?php echo base_url('dashboard_controller');?>"><?php echo $company_name;?></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto  ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $this->session->userdata('username'); ?> <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?php echo base_url('admin_profile/edit_profile_controller'); ?>">Edit Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('dashboard_controller'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-calendar-check"></i>
          <span>Event</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url('event/add_event_controller'); ?>">Add Event</a>
          <a class="dropdown-item" href="<?php echo base_url('event/event_list_controller'); ?>">Event List</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-ticket-alt"></i>
          <span>Ticket</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url('ticket/add_ticket_controller'); ?>">Add Ticket</a>
          <a class="dropdown-item" href="<?php echo base_url('ticket/add_ticket_controller/get_all_tickets'); ?>">Add Stock</a>
          <a class="dropdown-item" href="<?php echo base_url('ticket/ticket_list_controller'); ?>">Ticket List</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-tie"></i>
          <span>Guest</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url('guest/add_guest_controller'); ?>">Add Guest</a>
          <a class="dropdown-item" href="<?php echo base_url('guest/guest_list_controller'); ?>">Guest List</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-receipt"></i>
          <span>Invoice</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url('print/print_invoice_controller'); ?>">Print Invoice</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-receipt"></i>
          <span>Overview</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo base_url('overview/expired_events_controller'); ?>">Expired events</a>
          <a class="dropdown-item" href="<?php echo base_url('overview/ticket_stock_out'); ?>">Tickets out of stock</a>
        </div>
      </li>
      <?php if($this->session->userdata('user_role') == 'admin'): ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-receipt"></i>
            <span>Users</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url('user/register_controller'); ?>">Register User</a>
            <a class="dropdown-item" href="<?php echo base_url('user/user_list_controller'); ?>">User List</a>
          </div>
        </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('settings/settings_controller'); ?>">
          <i class="fas fa-cogs"></i>
          <span>Settings</span>
        </a>
      </li>
    </ul>

    <div id="content-wrapper" class="pl-1 pr-1 pt-1">

      <div class="container-fluid p-0 ">

        <!-- view files here -->
        <?php $this->load->view($main_view); ?> 
         
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer ">
        <div class="container my-auto  ">
          <div class="h6 text-center   ">
            <span>Event Management & Administration System</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="<?php echo base_url(); ?>user/register_controller/logout_user">Logout</a>
              </div>
          </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>
    
    <!-- Ajax select box -->
    <script src="<?php echo base_url(); ?>assets/select-box/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/custom_ajax.js"></script>
    
    <!-- LOAD BASE_URL AND SOME POST DATA TO JAVACRIPT    -->
    <?php $this->load->view('charts/post_data'); ?>
     
  </body>
</html>
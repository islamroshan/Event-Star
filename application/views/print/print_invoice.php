<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Event Star v1.0</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet"> 
  <link href="<?php echo base_url(); ?>assets/css/custom-style.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <?php 
    foreach ($guest_detail as $guest) 
    {
      $guests = array(
        'guest_id' => $guest->guest_id,
        'guest_name' => $guest->guest_name,
        'address' => $guest->guest_address,
        'ticket_name' => $guest->ticket_name,
        'event_name' => $guest->event_name,
        'total_amount' => $guest->ticket_rate,
        'paid_amount' => $guest->paid_amount,
        'remaining_due' => $guest->remaining_due,
        'purchase_from' => $guest->purchase_from,
        'guest_number' => $guest->guest_number
      );
    }
  ?>
  <div class="container ">
    <div class="card mx-auto mt-4  border-dark invoice-width">
      <div class="card-header border-dark text-center h5">
        INVOICE # <?php echo html_escape($guests['guest_id']); ?>
      </div>
      <div class="card-body pb-0  border-dark ">
        <div class="row">
          <div class="col-md-12">
          <img src="<?php echo base_url();?>image/logo.png" width="300" class="float-right"  alt="No Preview">
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped" cellspacing="0">
            <thead>
              <tr>
                <th>Guest Name</th>
                <th>Guest Phone</th>
                <th>Guest Address</th>
                <th>Event Name</th>
                <th>Ticket Name</th>
                <th>Purchase From</th>
              </tr>
            </thead>
            <tbody>
               <tr>
                <td><?php echo html_escape($guests['guest_name']); ?></td>
                <td><?php echo html_escape($guests['guest_number']);?></td>
                <td><?php echo html_escape($guests['address']);?></td>
                <td><?php echo html_escape($guests['event_name']); ?></td>
                <td><?php echo html_escape($guests['ticket_name']);?></td>
                <td><?php echo html_escape($guests['purchase_from']); ?></td>
              </tr>
               
            </tbody>
          </table>
        </div>
        <div class="table-responsive border-dark  row">
          <table class="table offset-sm-8 col-md-4 " width="100%" cellspacing="0">
            <tbody>
              <tr>
                <th>Total :</th>
                <td>$<?php echo html_escape($guests['total_amount']); ?></td>
              </tr>
              <tr>
                <th>Paid :</th>
                <td>$<?php echo html_escape($guests['paid_amount']); ?></td>
              </tr>
              <tr>
                <th>Due :</th>
                <td>$<?php echo html_escape($guests['remaining_due']); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <?php echo form_open('print/print_controller/redirect'); ?>
      <div class="btn-group-vertical   btn-block p-0 ">
           <button id="btnPrint" type="button" class="btn btn-primary btn-lg d-print-none">Print</button>
           <button type="submit" class="btn btn-default btn-lg d-print-none">Cancel</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>  
</body>
</html>

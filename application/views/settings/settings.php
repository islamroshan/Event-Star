<?php if($this->session->userdata('is_logged_in')): ?>
<div class="row">
  <div class="col-md-12">
   <?php if(isset($error)): ?>
      <div class="alert alert-danger alert-dismissible fade show pb-0" role="alert">
        <?php echo $error;?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>    
    <?php endif;?>

    <!-- if logo updated successfully  -->
    <?php if($this->session->flashdata('logo_updated')): ?>
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        <?php echo $this->session->flashdata('logo_updated'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>    
    <?php endif;?>

     <!-- if settings updated successfully  -->
     <?php if($this->session->flashdata('settings_updated')): ?>
    <div class="alert alert-success alert-dismissible fade show " role="alert">
        <?php echo $this->session->flashdata('settings_updated'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>    
    <?php endif;?>

    <div class="card mb-3 ">
      <div class="card-header"><i class="fas fa-table"></i> Change Logo</div>
      <div class="card-body">
      
         <?php echo form_open_multipart('settings/settings_controller/update_logo'); ?>
         <div class="form-group row">
           <div class="col-md-2 col-form-label"> 
              <?php  echo form_label('Upload Logo','companylogo'); ?>
           </div>
            <div class="col-md-4 col-md-offset-4">
             <div class="input-group mt-2">
                 <div class="custom-file">  
                   <input type="file" name="companylogo" class="custom-file-input" id="logo">
                   <label class="custom-file-label" for="logo">max size 1MB (460x275)</label>
                 </div>
             </div>
           </div>
         </div>

         <div class="form-group row">
           <div class="col-sm-10"> 
              <?php 
                 $data = array(
                   'class' => 'btn btn-outline-primary',
                   'name' => 'update_logo',
                   'value' => 'Save'
                 );
                 echo form_submit($data);    
              ?>
           </div>
         </div>
         <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <div class="col-md-12">
    <div class="card mb-3 ">
      <div class="card-header"><i class="fas fa-table"></i> Change Company Setting</div>
      <div class="card-body">
        <?php 
            foreach ($ems_settings as $settings) 
            {
              $setting = array(
                'company_name' => $settings->company_name,
                'contact' => $settings->company_contact,
                'address' => $settings->company_address,
                'currency' => $settings->currency,
                'logo' => $settings->company_logo
              );
            }
         ?>
         <?php echo form_open('settings/settings_controller/update_company'); ?>
            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Company Name','companyname'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'companyname',
                      'id' => 'companyname',
                      'value' => html_escape($setting['company_name']),
                      'placeholder' => '' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Address','address'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'address',
                      'id' => 'address',
                      'value' => html_escape($setting['address']),
                      'placeholder' => '' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>


            <div class="form-group row">
              <div class="col-md-2 col-form-label">
                 <?php  echo form_label('Phone','phone'); ?>
              </div>
              <div class="col-md-4 col-md-offset-4">
                <?php 
                    $data = array(
                      'class' => 'form-control',
                      'type' => 'number',
                      'name' => 'phone',
                      'id' => 'phone',
                      'value' => html_escape($setting['contact']),
                      'placeholder' => '' 
                    );
                    echo form_input($data);    
                 ?>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2 col-form-label"> 
                 <?php  echo form_label('Currency','currency'); ?>
              </div>
               <div class="col-md-4 col-md-offset-4">
                <?php 
                    $options = array(
                      html_escape('$')    => html_escape('$ (DOLLAR)'),
                      html_escape('PKR')  => html_escape('PKR (PAK RUPPIES)'),
                      html_escape('INR')  => html_escape('INR (IND RUPPIES)')
                    );
                    $data = array(
                      'class' => 'form-control',
                      'name' => 'currency',
                      'id' => 'currency' 
                    );
                    echo form_dropdown($data,$options,$setting['currency']);    
                 ?>
               </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10"> 
                 <?php 
                    $data = array(
                      'class' => 'btn btn-outline-primary',
                      'name' => 'update_brand',
                      'value' => 'Save Settings'
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
<?php else: ?>
<?php redirect('login_controller'); ?>
<?php endif; ?>
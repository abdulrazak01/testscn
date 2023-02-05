<div class="page">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url('frontend/master_data/list_customer')?>">List Customer</a></li>
    <li class="breadcrumb-item active">Form Update Customer</li>
  </ol>
  <h4 style="text-align: left; color:#0000e6; font-weight: 900;"><b>&emsp; >>Update<< </b></h4>
  <?php if ($this->session->flashdata('success')) { ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button><p><?php echo $this->session->flashdata('success'); ?></p>
  </div>
  <?php }elseif($this->session->flashdata('error')){ ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button><p><?php echo $this->session->flashdata('error'); ?></p>
  </div>
  <?php } ?>
  <div class="page-header" style="text-align: center; padding: 0px;">
    <h1 class="page-title">Form Update Customer</h1>
  </div>
  <div class="page-content" style="padding: 0px;">
    <div class="panel">
      <div class="panel-body container-fluid" style="padding: 0px;">
        <div class="panel">
          <div class="panel-body container-fluid">
            <div class="row row-lg">
              <div class="col-md-12 col-lg-6">
                <div class="example-wrap">
                  <div class="example">
                    <!-- <form class="form-horizontal"> -->
                    <?= form_open(base_url('frontend/master_data/update_customer'),  'id="login_validation" enctype="multipart/form-data"') ?>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Code Customer<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                        <input type="text" required="required" class="form-control" value="<?=$cus->code?>" name="code_type" placeholder="Code Customer" autocomplete="off" id="name" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Name Customer<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                         <input type="text" required="required" class="form-control" value="<?=$cus->name?>" name="name" placeholder="Name Customer" autocomplete="off" id="name" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Customer Category<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                      <select class="form-control" required="required" data-plugin="select2" id="cat_cus" name="cat_cus" data-placeholder="Select Customer Category">
                          <option></option>
                         <!-- <?php foreach ($cat_cus as $val) { ?>
                          <option value="<?php echo $val->code?>">
                            <?php echo "$val->type" ?>
                          </option>
                          <?php } ?> -->

                          <?php foreach ($cat_cus as $val) { ?>
                          <option <?php if($val->code == $cus->code_agent){ echo 'selected="selected"'; } ?> value="<?php echo $val->code?>">
                            <?php echo "$val->type" ?>
                          </option>
                          <?php } ?>

                        </select>
                      </div>
                    </div>
                    <button type="Submit" class="btn btn-success btn-sm">&emsp;&emsp;UPDATE&emsp;&emsp;</button>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6">
                <div class="example-wrap">
                  <div class="example">
              </div>
            
              <?php form_close() ?>
              <!-- Button Action -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">



  
  
</script>
<!-- End Page
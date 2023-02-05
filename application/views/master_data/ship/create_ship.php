<div class="page">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url('frontend/master_data/list_ship')?>">List Ship</a></li>
    <li class="breadcrumb-item active">Form Ship</li>
  </ol>
  <h4 style="text-align: left; color:#0000e6; font-weight: 900;"><b>&emsp; >>Create<< </b></h4>
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
    <h1 class="page-title">Form Create Ship</h1>
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
                    <?= form_open(base_url('frontend/master_data/create_ship'),  'id="login_validation" enctype="multipart/form-data"') ?>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Code<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                        <input type="text" required="required" class="form-control" name="code_type" placeholder="Code" autocomplete="off" id="name" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Name Ship<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                         <input type="text" required="required" class="form-control" name="name_ship" placeholder="Name Ship" autocomplete="off" id="name" />
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Customer<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                      <select class="form-control" required="required" data-plugin="select2" id="cus" name="cus" data-placeholder="Select Customer">
                          <option></option>
                         <?php foreach ($cus as $val) { ?>
                          <option value="<?php echo $val->id_customer?>">
                            <?php echo "$val->name"?> -  <?php echo "$val->code"?>
                          </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-6">
                <div class="example-wrap">
                  <div class="example">

                  <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Gross Ton<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                         <input type="text" required="required" class="form-control" name="gross_ton" placeholder="Gross Ton" autocomplete="off" id="name" />
                      </div>
                    </div>
                    <div class="col-lg-5 form-group form-material">
                <button type="Submit" class="btn btn-success btn-sm">&emsp;&emsp;SAVE&emsp;&emsp;</button>
              </div>
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
<div class="page">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url('frontend/incoming_ship/list_incoming_ship')?>">List Incoming Ship</a></li>
    <li class="breadcrumb-item active">Form Incoming Ship</li>
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
    <h1 class="page-title">Form Create Incoming Ship</h1>
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
                    <?= form_open(base_url('frontend/incoming_ship/create_incoming_ship'),  'id="login_validation" enctype="multipart/form-data"') ?>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Nomor PUK<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                        <input type="text" required="required" class="form-control" name="no_puk" placeholder="Nomor PUK" autocomplete="off" id="no_puk" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Date PUK<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                         <input type="date" required="required" class="form-control" name="date_puk" placeholder="Date PUK" autocomplete="off" id="date_puk" />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Ship<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                      <select class="form-control" required="required" data-plugin="select2" id="ship" name="ship" data-placeholder="Select Ship">
                          <option></option>
                         <?php foreach ($ship as $val) { ?>
                          <option value="<?php echo $val->id_ship?>">
                            <?php echo "$val->name_ship"?> -  <?php echo "$val->code"?>
                          </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Date Forecast<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                         <input type="date" required="required" class="form-control" name="date_forecast" placeholder="Date Forecast" autocomplete="off" id="date_forecast" />
                      </div>
                    </div>
                    <button type="Submit" class="btn btn-success btn-sm">&emsp;&emsp;SAVE&emsp;&emsp;</button>
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
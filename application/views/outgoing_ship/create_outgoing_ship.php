<!-- Page -->
<div class="page">

  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=base_url('backend/admdashboard')?>">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="<?=base_url('frontend/outgoing_ship/list_outgoing_ship')?>">List Outgoing</a></li>
    <li class="breadcrumb-item active">Form Create Outgoing</li>
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
    <h1 class="page-title">Form Create Outgoing</h1>
  </div>
  <div class="page-content" style="padding: 0px;">
    <div class="panel">
      <div class="panel-body container-fluid" style="padding: 0px;">
        <div class="panel">
          <div class="panel-body container-fluid">
            <div class="row row-lg">
              <div class="col-md-12 col-lg-6">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <div class="example">
                    <!-- <form class="form-horizontal"> -->
                    <?= form_open(base_url('frontend/outgoing_ship/create_outgoing_ship'),  'id="login_validation" enctype="multipart/form-data"') ?>
                    
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Choose Incoming Ship<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                      <select class="form-control" required="required" data-plugin="select2" id="incoming" name="incoming" data-placeholder="Select Incoming">
                          <option></option>
                         <?php foreach ($incoming as $val) { ?>
                          <option value="<?php echo $val->id_incoming?>">
                            <?php echo "$val->name_ship"?> -  <?php echo "$val->code_ship"?>
                          </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>No Invoice<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                         <td style="width: 100%;">
                           <input type="text" required="required" class="form-control" name="no_invoice"  style="text-transform: uppercase;" placeholder="No Invoice" autocomplete="off" />
                          </td>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Date Payment<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                         <td style="width: 100%;">
                           <input type="date" required="required" class="form-control" name="date_payment"  style="text-transform: uppercase;"  placeholder="Date Payment" autocomplete="off" />
                          </td>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Labuh<b style="color: red;">*</b> : </b></label>
                      <div class="col-md-9">
                        <!-- <input type="text" class="form-control" name="labuh" placeholder="Labuh" autocomplete="off" required="required"/> -->
                        <input type="text" class="form-control" id="labuh" name="labuh" autocomplete="off" placeholder="Labuh" required="required" oninput="setRibuan()"  />
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 form-control-label"><b>Tambat <b style="color: red;">*</b> :</b></label>
                      <div class="col-md-9">
                      <input type="text" id="tambat" name="tambat" class="form-control" placeholder="Tambat" autocomplete="off" required="required" oninput="setRibuan()">
                      </div>
                    </div>

                  </div>
                </div>
                <!-- End Example Horizontal Form -->
              </div>
               <div class="col-md-12 col-lg-6">
                <!-- Example Horizontal Form -->
                <div class="example-wrap">
                  <div class="example">
                    <!-- <form class="form-horizontal"> -->
                   
                    <div class="form-group row"> 
                      <label class="col-md-3 form-control-label"><b>Bongkar Muat <b style="color: red;">*</b> :</b></label>
                      <div class="col-md-9">
                       <input type="text" id="bongkar_muat" name="bongkar_muat" class="form-control" placeholder="Bongkar Muat" autocomplete="off" required="required" oninput="setRibuan()">
                      </div>
                    </div>

                    <div class="form-group row"> 
                      <label class="col-md-3 form-control-label"><b>Receive Payment<b style="color: red;">*</b> :</b></label>
                      <div class="col-md-9">
                       <input type="text" id="receive_payment" name="receive_payment" class="form-control" placeholder="Auto Fill" autocomplete="off" required="required" oninput="setRibuan()">
                      </div>
                    </div>

                    <div class="form-group row"> 
                      <label class="col-md-3 form-control-label"><b>PT SCN<b style="color: red;">*</b> :</b></label>
                      <div class="col-md-9">
                       <input type="text" id="pt_scn" name="pt_scn" class="form-control" placeholder="PT SCN" placeholder="Auto Fill" autocomplete="off" required="required" oninput="setRibuan()">
                      </div>
                    </div>

                    <div class="form-group row"> 
                      <label class="col-md-3 form-control-label"><b>BP Batam<b style="color: red;">*</b> :</b></label>
                      <div class="col-md-9">
                       <input type="text" id="bp_batam" name="bp_batam" class="form-control" placeholder="BP Batam" placeholder="Auto Fill" autocomplete="off" required="required" oninput="setRibuan()">
                      </div>
                    </div>

                <!-- End Example Horizontal Form -->
              </div>

              <!-- Button Action -->
              <div class="col-lg-5 form-group form-material">
                <!-- <input type="text" class="form-control" placeholder=".col-lg-4"> -->
              </div>
              <div class="col-lg-5 form-group form-material">
                <button type="Submit" class="btn btn-success btn-sm">&emsp;&emsp;SAVE&emsp;&emsp;</button>
              </div>
              <div class="col-lg-2 form-group form-material">
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
<!-- End Page -->
<script>
  
  function setRibuan()
  {

     var labuh = document.getElementById('labuh');
     var tambat = document.getElementById('tambat');
     var bongkar_muat = document.getElementById('bongkar_muat');
     var receive_payment = document.getElementById('receive_payment');
     var pt_scn = document.getElementById('pt_scn');
     var bp_batam = document.getElementById('bp_batam')
     labuh.value = formatRupiah(labuh.value);
     tambat.value = formatRupiah(tambat.value);
     bongkar_muat.value = formatRupiah(bongkar_muat.value);
     bp_batam.value = formatRupiah(bp_batam.value);
     countReceivePayment();
     receive_payment.value = formatRupiah(receive_payment.value);
     countReceiveSCN();
     pt_scn.value = formatRupiah(pt_scn.value);
     countReceiveBP()
     bp_batam.value = formatRupiah(bp_batam.value);


  }

  function countReceivePayment()
{
  var labuh = document.getElementById("labuh").value;
  var replaceLabuh = labuh.replace(".","").replace(".","").replace(".","").replace(".","").replace(".","");
  var tambat = document.getElementById("tambat").value;
  var replaceTambat = tambat.replace(".","").replace(".","").replace(".","").replace(".","").replace(".","");
  var bongkarMuat = document.getElementById("bongkar_muat").value;
  var replaceBongkarmuat = bongkarMuat.replace(".","").replace(".","").replace(".","").replace(".","").replace(".","");
  // console.log(replaceUnit);
  var countTtl = parseFloat(replaceLabuh) + parseFloat(replaceTambat) + parseFloat(replaceBongkarmuat);

  // console.log(countTtl);
  document.getElementById("receive_payment").value = parseFloat(countTtl);

  

}

function countReceiveSCN()
{
  var receive_payment = document.getElementById("receive_payment").value;
  var replaceReceive = receive_payment.replace(".","").replace(".","").replace(".","").replace(".","").replace(".","");
 
  document.getElementById("pt_scn").value = replaceReceive * 0.6;
  // console.log(receive_payment * 0.6);
}

function countReceiveBP()
{
  var receive_payment = document.getElementById("receive_payment").value;
  var replaceReceive = receive_payment.replace(".","").replace(".","").replace(".","").replace(".","").replace(".","");
 
  document.getElementById("bp_batam").value = replaceReceive * 0.4;
}

 function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'IDR. ' + rupiah : '');
  }

</script>
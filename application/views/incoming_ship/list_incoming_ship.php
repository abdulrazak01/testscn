<div class="page">
  <div class="page-header">
    <ol class="breadcrumb">
      <a href="<?php echo base_url('frontend/master_data/menu_master_data'); ?>" type="button" class="btn btn-round btn-info"><i class="icon md-home" aria-hidden="true"></i>Menu Dashboard</a>
        &nbsp;&nbsp;
        <a href="<?php echo base_url('frontend/incoming_ship/create_incoming_ship'); ?>" class="btn btn-round btn-danger"><i class="icon md-plus" aria-hidden="true"></i>&nbsp; Create &nbsp;</a>&emsp;&emsp;
    </ol>
    <br>
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

  </div>
    <h3 class="panel-title" style="text-align: center; padding: 0px;"><b>List Incoming Ship</b></h3>
      <div class="page-content">
        <div class="panel">
          <div class="panel-body">
            <table  id="tbl"class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nomor PUK</th>
                  <th>Date PUK</th>
                  <th>Name Ship</th>
                  <th>Date Forecast</th>
                  <th>Remaining Time Outgoing</th>
                  <th>Create at</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach ($incoming as $val) { ?>
              <tr>
               <td><?= $no++ ?></td>
               <td><?=$val->nomor_puk;?></td>
               <td><?=$val->tanggal_puk;?></td>
               <td><?=$val->name_ship;?></td>
               <td><?=$val->date_forecast;?></td>
               <td>
               <?php
                if (!empty($val->date_forecast)) 
                {
                  $DateNow   = date("Y-m-d");
                  $date1     = strtotime($DateNow);
                  $date2     = strtotime($val->date_forecast);
                  $range     = $date2 - $date1;
                  $days      = $range / 60 / 60 / 24;
                  
                  if($days > 0 && $days <= 1)
                  {
                    echo '<p style="color:red;">'.$days.' Days left</p>';
                  }
                  else if($days < 0){
                    echo '<p style="color:red;">End Date Incoming Days</p>';
                  }
                  else{
                    echo '<p style="color:black;">'.$days.' Days</p>';
                  }

                }
                ?>
               </td>
               <td><?=$val->create_at;?></td>
               <td style="text-align: center;">
                  <button data-bind="<?=$val->id_incoming;?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-success btn-xs change" title="Change"><i class="icon md-edit" aria-hidden="true"></i></button>
                  <button data-bind="<?=$val->id_incoming;?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-danger btn-xs delete" title="delete"><i class="icon md-delete" aria-hidden="true"></i></button>
                </td>
              </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(".change").click(function(){
    var id = $(this).attr("data-bind");
    swal({
      title: "you want to change the data?",
      text: "",
      type: "info",
      showCancelButton: true,
      confirmButtonClass: "btn-info",
      confirmButtonText: "Yes",
      cancelButtonText: "Cancel",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        $.ajax({
          success: function(data) {
              window.location.href = '<?= base_url("frontend/incoming_ship/update_incoming_ship/")?>'+id;
          }
        });
      } else {
        swal("Cancelled", "Your Cancel Action :)", "error");
      }
    });
  });

  $(".delete").click(function(){
    var id = $(this).attr("data-bind");
    swal({
      title: "you want to delete the data?",
      text: "",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes",
      cancelButtonText: "Cancel",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        $.ajax({
          success: function(data) {
              window.location.href = '<?= base_url("frontend/incoming_ship/delete_incoming_ship/")?>'+id;
          }
        });
      } else {
        swal("Cancelled", "Your Cancel Action :)", "error");
      }
    });
  });

</script>
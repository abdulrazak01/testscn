<div class="page">
  <div class="page-header">
    <ol class="breadcrumb">
      <a href="<?php echo base_url('frontend/master_data/menu_master_data'); ?>" type="button" class="btn btn-round btn-info"><i class="icon md-home" aria-hidden="true"></i>Menu Dashboard</a>
        &nbsp;&nbsp;
        <a href="<?php echo base_url('frontend/outgoing_ship/create_outgoing_ship'); ?>" class="btn btn-round btn-danger"><i class="icon md-plus" aria-hidden="true"></i>&nbsp; Create &nbsp;</a>&emsp;&emsp;
        <a href="<?php echo base_url('frontend/outgoing_ship/view_chart'); ?>" class="btn btn-warning"><i class="zmdi zmdi-chart" aria-hidden="true"></i>&nbsp;&nbsp;View Chart</a>
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
    <h3 class="panel-title" style="text-align: center; padding: 0px;"><b>List Outgoing Ship</b></h3>
      <div class="page-content">
        <div class="panel">
          <div class="panel-body">
            <table  id="tbl" class="table table-hover dataTable table-striped w-full">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nomor Invoice</th>
                  <th>Payment Date</th>
                  <th>Nomor PUK</th>
                  <th>Date PUK</th>
                  <th>Name Ship</th>
                  <th>Category Customer</th>
                  <th>Code Customer</th>
                  <th>Labuh</th>
                  <th>Tambat</th>
                  <th>Bongkar Muat</th>
                  <th>Receive Payment</th>
                  <th>PT SCN.</th>
                  <th>BP Batam</th>
                  <!-- <th>Create at</th> -->
                  <!-- <th style="text-align: center;">Action</th> -->
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach ($outgoing as $val) { ?>
              <tr>
               <td><?= $no++ ?></td>
               <td><?=$val->no_invoice;?></td>
               <td><?=$val->date_payment;?></td>
               <td><?=$val->nomor_puk;?></td>
               <td><?=$val->tanggal_puk;?></td>
               <td><?=$val->name_ship;?></td>
               <td><?=$val->cat_cus;?></td>
               <td><?=$val->code_cus;?></td>
               <td><?=$val->labuh;?></td>
               <td><?=$val->tambat;?></td>
               <td><?=$val->bongkar_muat;?></td>
               <td><?=$val->receive_payment;?></td>
               <td><?=$val->pt_scn;?></td>
               <td><?=$val->bp_batam;?></td>
               <!-- <td><?=$val->create_at;?></td> -->
               <!-- <td style="text-align: center;">
                  <button data-bind="<?=$val->id_outgoing;?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-success btn-xs change" title="Change"><i class="icon md-edit" aria-hidden="true"></i></button>
                  <button data-bind="<?=$val->id_outgoing;?>" type="button" data-toggle="tooltip" class="btn btn-floating btn-danger btn-xs delete" title="delete"><i class="icon md-delete" aria-hidden="true"></i></button>
                </td> -->
              </tr>
              <?php } ?>
              </tbody>
            </table>
            <table id="tblSum" class="table table-hover dataTable table-striped w-full">
               <thead>
                <tr>
                <th>#</th>
                  <th>##########</th>
                  <th>##########</th>
                  <th>##########</th>
                  <th>##########</th>
                  <th>##########</th>
                  <th>##########</th>
                  <th>##########</th>
                  <th>##########</th>
                  <th>##########</th>
                  <th>##########</th>
                  <th>##########</th>
                  <th>##########</th>
                  <th>####</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>Total</td>
                  <td><?=$total->ttl_labuh?></td>
                  <td><?=$total->ttl_tambat?></td>
                  <td><?=$total->bongkar_muat?></td>
                  <td><?=$total->ttl_receive?></td>
                  <td><?=$total->ttl_scn?></td>
                  <td><?=$total->ttl_bp_batam?></td>
                </tr>
              </tbody>
            </table>

          </div>
        </div>
    </div>
</div>



<script type="text/javascript">

$( document ).ready(function() {

  $('#tbl').DataTable({
  columnDefs: [    
        {
            targets: 8,
            render: $.fn.dataTable.render.number( '.', ',', 0,'')
        },
        {
            targets: 9,
            render: $.fn.dataTable.render.number( '.', ',', 0,'')
        },
        {
            targets: 10,
            render: $.fn.dataTable.render.number( '.', ',', 0,'')
        },
        {
            targets: 11,
            render: $.fn.dataTable.render.number( '.', ',', 0,'')
        },
        {
            targets: 12,
            render: $.fn.dataTable.render.number( '.', ',', 0,'')
        },
        {
            targets: 13,
            render: $.fn.dataTable.render.number( '.', ',', 0,'')
        },
        
      ],
});

$('#tblSum').DataTable({
  paging: false,
  ordering: false,
  info: false,
  "searching": false,
  columnDefs: [    
        {
            targets: 8,
            render: $.fn.dataTable.render.number( '.', ',', 0,'')
        },
        {
            targets: 9,
            render: $.fn.dataTable.render.number( '.', ',', 0,'')
        },
        {
            targets: 10,
            render: $.fn.dataTable.render.number( '.', ',', 0,'')
        },
        {
            targets: 11,
            render: $.fn.dataTable.render.number( '.', ',', 0,'')
        },
        {
            targets: 12,
            render: $.fn.dataTable.render.number( '.', ',', 0,'')
        },
        {
            targets: 13,
            render: $.fn.dataTable.render.number( '.', ',', 0,'')
        },
        
      ],
});
});


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
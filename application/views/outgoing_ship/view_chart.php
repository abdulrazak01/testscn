<div class="page">
  <div class="page-header" style="padding: 20px 10px;">
    <!-- <ol class="breadcrumb">
      <a href="<?php echo base_url('backend/planner'); ?>" class="btn btn-round btn-info"><i class="icon md-home" aria-hidden="true"></i>Menu Planner</a>&emsp;&emsp;
      <a href="<?php echo base_url('backend/planner/create_target_daily'); ?>" class="btn btn-round btn-danger"><i class="icon md-plus" aria-hidden="true"></i>&nbsp; Create &nbsp;</a>&emsp;&emsp;
    </ol><br> -->
<!--     <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?=base_url('backend/admdashboard')?>">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="<?=base_url('backend/planner')?>">Menu Planner</a></li>
      <li class="breadcrumb-item"><a href="<?=base_url('backend/planner/injection_molding')?>">Menu Injection Molding</a></li>
      <li class="breadcrumb-item active">Daily Production List</li>
    </ol> -->
  </div>

  <h3 class="panel-title" style="text-align: center; padding: 0px;"><b>Penerimaan Jasa Kepelabuhan Chart</b></h3>
  <div class="page-content" style="padding: 0px 0px;">
    <div class="panel"><br>
      <div class="panel-body">
      <div id="myDIV" class="loader" style="display: none;">
      </div>
          <div id="chart" style="display: none;">
              <canvas id="myChart"></canvas>
           <div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->

<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<div class="modal fade" id="loader" aria-hidden="true" aria-labelledby="filterdata" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple modal-center">
    <div class="modal-content">
      <div class="modal-header">
      </div>
       <div class="loader"></div>
        <h4 class="modal-title" style="text-align: center;">Loading...</h4>
  </div>
</div>

<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}



</style>

<!-- END MODAL -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">//On-Progress



  


$( document ).ready(function() {


var x = document.getElementById("myDIV");
var canvaDiv = document.getElementById("chart");

const data = {
  labels: [
    'PT SCN',
    'BP Batam'
  ],
  datasets: [{
    label: 'Penerimaa Jasan Pelabuhan',
    data: [50, 50],
    backgroundColor: [
    'rgb(54, 162, 235)',
      'rgb(255, 99, 132)'
    ],
    hoverOffset: 4
  }]
};

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    data: data,
  });


      $.ajax({
        method: 'POST',
        url: "<?= base_url("frontend/outgoing_ship/get_value_chart")?>",
        cache: false,
        async : true,
        dataType : 'json',
        beforeSend: function() {
            x.style.display = "block";
            chart.clear();
        },
        success: function(data){

            x.style.display = "none";
            canvaDiv.style.display = "block";
            console.log(data.ttl_scn);
            chart.data.datasets[0].data[0] = data.ttl_scn;
            chart.data.datasets[0].data[1] = data.ttl_bp_batam;
            // console.log(data);

        },
        complete:function(res)
        {

            x.style.display = "none";
           
        },
 
      });

   
});

// chart.clear();
      



  


</script>

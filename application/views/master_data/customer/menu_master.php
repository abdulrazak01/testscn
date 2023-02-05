<style>
  .gradient-text {
    /* Fallback: Set a background color. */
    background-color: red;
    /* Create the gradient. */
    background-image: linear-gradient(to right, #360033, #0b8793);
    /* Set the background size and repeat properties. */
    background-size: 73%;
    background-repeat: repeat;
    /* Use the text as a mask for the background. */
    /* This will show the gradient as a text color rather than element bg. */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent; 
    -moz-background-clip: text;
    -moz-text-fill-color: transparent;
  }

  h1 {
    font-family: "Archivo Black", sans-serif;
    font-weight: normal;
    /*font-size: 2em;*/
    text-align: center;
    margin-bottom: 0;
    margin-bottom: -0.25em;
  }

  .bg-card {
    background-color: #f5a700c7;
  }
</style>  
<!-- Page -->
<div class="page">
  <div class="page-content container-fluid">
        <header>
          <h2 class="gradient-text" style="text-align: center;"><b>Menu Master Data</b></h2><br>
        </header>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Dashboard</a></li>
        <li class="breadcrumb-item active">Menu Master Data</li>
        </ol> 
        <div class="row" data-plugin="matchHeight" data-by-row="true">

          <div class="col-xl-4 col-md-6">
            <!-- Widget Linearea Three -->
            <a href="<?php echo base_url('frontend/master_data/list_category_customer');?>">
            <div class="card card-shadow" id="widgetLineareaThree">
              <div class="card-block p-20 pt-10 bg-card">
                <div class="clearfix">
                  <div class="grey-800 float-left py-10">
                    <i class="icon md-square-right grey-600 font-size-24 vertical-align-bottom mr-5"></i><b>Category Customer</b>
                  </div>
                  <!-- <span class="float-right grey-700 font-size-30">1,864</span> -->
                </div>
                <!-- <div class="ct-chart h-50"></div> -->
                <svg height="150px" viewBox="0 -11 512 512" width="350px" xmlns="http://www.w3.org/2000/svg">
                  <path d="m192 213.332031c-58.816406 0-106.667969-47.847656-106.667969-106.664062 0-58.816407 47.851563-106.667969 106.667969-106.667969s106.667969 47.851562 106.667969 106.667969c0 58.816406-47.851563 106.664062-106.667969 106.664062zm0-181.332031c-41.171875 0-74.667969 33.492188-74.667969 74.667969 0 41.171875 33.496094 74.664062 74.667969 74.664062s74.667969-33.492187 74.667969-74.664062c0-41.175781-33.496094-74.667969-74.667969-74.667969zm0 0"/><path d="m474.667969 490.667969h-117.335938c-20.585937 0-37.332031-16.746094-37.332031-37.335938v-74.664062c0-20.589844 16.746094-37.335938 37.332031-37.335938h117.335938c20.585937 0 37.332031 16.746094 37.332031 37.335938v74.664062c0 20.589844-16.746094 37.335938-37.332031 37.335938zm-117.335938-117.335938c-2.941406 0-5.332031 2.390625-5.332031 5.335938v74.664062c0 2.945313 2.390625 5.335938 5.332031 5.335938h117.335938c2.941406 0 5.332031-2.390625 5.332031-5.335938v-74.664062c0-2.945313-2.390625-5.335938-5.332031-5.335938zm0 0"/><path d="m453.332031 373.332031h-74.664062c-8.832031 0-16-7.167969-16-16v-48c0-29.394531 23.933593-53.332031 53.332031-53.332031s53.332031 23.9375 53.332031 53.332031v48c0 8.832031-7.167969 16-16 16zm-58.664062-32h42.664062v-32c0-11.753906-9.578125-21.332031-21.332031-21.332031s-21.332031 9.578125-21.332031 21.332031zm0 0"/><path d="m266.667969 448h-250.667969c-8.832031 0-16-7.167969-16-16v-74.667969c0-55.871093 45.460938-101.332031 101.332031-101.332031h186.667969c17.835938 0 35.390625 4.714844 50.753906 13.652344 7.636719 4.4375 10.214844 14.230468 5.78125 21.867187-4.4375 7.660157-14.230468 10.21875-21.890625 5.78125-10.472656-6.078125-22.464843-9.300781-34.644531-9.300781h-186.667969c-38.226562 0-69.332031 31.105469-69.332031 69.332031v58.667969h234.667969c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/>
                </svg>
              </div>
            </div>
          </a>
          </div>
          
        <div class="col-xl-4 col-md-6">
          <a href="<?php echo base_url('frontend/master_data/list_customer');?>">
            <div class="card card-shadow menu" id="widgetLineareaThree">
              <div class="card-block p-20 pt-10 bg-card">
                <div class="clearfix">
                  <div class="grey-800 float-left py-10">
                    <i class="icon md-square-right grey-600 font-size-24 vertical-align-bottom mr-5"></i><b>Customer</b>
                  </div>
                </div>
                <svg enable-background="new 0 0 24 24" width="310px" height="170" viewBox="0 0 8 28" width="212" xmlns="http://www.w3.org/2000/svg"><path d="M19 3H18V1H16V3H8V1H6V3H5C3.89 3 3 3.89 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.89 20.1 3 19 3M19 19H5V8H19V19M12 17V15H8V12H12V10L16 13.5L12 17Z"/>
                </svg>
              </div>
            </div>
          </a>
        </div>

        <div class="col-xl-4 col-md-6">
          <a href="<?php echo base_url('frontend/master_data/list_ship');?>">
            <div class="card card-shadow menu" id="widgetLineareaThree">
              <div class="card-block p-20 pt-10 bg-card">
                <div class="clearfix">
                  <div class="grey-800 float-left py-10">
                    <i class="icon md-square-right grey-600 font-size-24 vertical-align-bottom mr-5"></i><b>Ship</b>
                  </div>
                </div>
                <svg enable-background="new 0 0 24 24" width="310px" height="170" viewBox="0 0 8 28" width="212" xmlns="http://www.w3.org/2000/svg"><path d="M16.5 11L13 7.5L14.4 6.1L16.5 8.2L20.7 4L22.1 5.4L16.5 11M11 7H2V9H11V7M21 13.4L19.6 12L17 14.6L14.4 12L13 13.4L15.6 16L13 18.6L14.4 20L17 17.4L19.6 20L21 18.6L18.4 16L21 13.4M11 15H2V17H11V15Z"/>
                </svg>
              </div>
            </div>
          </a>
        </div>

        </div>
      </div>
    </div>
    <!-- End Page -->
  
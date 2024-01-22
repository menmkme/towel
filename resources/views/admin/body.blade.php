<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="main-panel">
    <div class="content-wrapper" style="background: rgb(214, 208, 208)">

      <div class="row" >
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card" >
          <div class="card" style="background: #f1959a; border-color: white">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">{{ $total_product }}</h3>

                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success ">
                    <i class='fa fa-product-hunt' style='font-size:36px; color: #f7444e'></i>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal" >Total Products</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card" style="background: white; border-color: #f1959a">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0" style="color: #f1959a">{{ $total_order }}</h3>

                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success">
                    <i class="fa fa-first-order" style="font-size:36px; color: #f7444e"></i>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Total Order</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card" style="background: #f1959a; border-color: white">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">{{ $total_customers }}</h3>

                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success">
                    <i class="fa fa-users" style="font-size:36px; color: #f7444e"></i>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Total Customers</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card" style="background: white; border-color: #f1959a">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0" style="color: #f1959a">{{ $total_revenue }}</h3>

                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success ">
                    <span style='font-size:50px; color: #f7444e'>&#8358;</span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Total Revenue</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card" style="background: white; border-color: #f1959a">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <h3 class="mb-0" style="color: #f1959a">{{ $order_delivered }}</h3>

                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-success ">
                        <i class="fa fa-truck" style="font-size:24px; color: #f7444e"></i>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total Order Delivered</h6>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card" style="background: #f1959a; border-color: white">
              <div class="card-body">
                <div class="row">
                  <div class="col-9">
                    <div class="d-flex align-items-center align-self-start">
                      <h3 class="mb-0">{{ $order_on_process }}</h3>

                    </div>
                  </div>
                  <div class="col-3">
                    <div class="icon icon-box-success ">
                        <i class="fa fa-spinner fa-spin" style="font-size:24px; color: #f7444e"></i>
                    </div>
                  </div>
                </div>
                <h6 class="text-muted font-weight-normal">Total Order on Process</h6>
              </div>
            </div>
          </div>
      </div>




          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
        </div>
      </footer>

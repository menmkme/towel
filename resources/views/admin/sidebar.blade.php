<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background: white">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top" style="background: white">
      <a class="sidebar-brand brand-logo" href="{{ url('/redirect') }}" ><b style="color: #f1959a   ">Towel</b></a>
      <a class="sidebar-brand brand-logo-mini" href="{{ url('/redirect') }}"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="{{ asset('home/images/cm.jpg') }}" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal" style="color: #f1959a">Ahmad Nmk</h5>
              <span >Madaki</span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown" style="background: #f1959a; border-color: white">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content" >
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-calendar-today text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
              </div>
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link" style="color: #f1959a">Navigation</span>
      </li>
      <li class="nav-item menu-items" >
        <a class="nav-link" href="{{ url('/redirect') }}" >
          <span class="menu-icon" >
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title" >Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items" >
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic" >
          <span class="menu-icon">
            <i class="fa fa-product-hunt"></i>
          </span>
          <span class="menu-title" >Product</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic" style="background: rgb(214, 208, 208); border-radius: 30%">
          <ul class="nav flex-column sub-menu" >
            <li class="nav-item"> <a class="nav-link" href="{{ url('/view_product') }}" >Add Product</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{ url('/show_product') }}">Show Product</a></li>
            </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('view_category') }}" >
          <span class="menu-icon">
            <i class="fa fa-list-alt"></i>
          </span>
          <span class="menu-title">Category</span>
        </a>
      </li>


      <li class="nav-item menu-items">
        <a class="nav-link" href="{{ url('view_order') }}" >
          <span class="menu-icon">
            <i class="fa fa-first-order"></i>
          </span>
          <span class="menu-title">Order</span>
        </a>
      </li>

    </ul>
  </nav>

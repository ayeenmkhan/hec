<div class="">
  <?php 
  header("X-XSS-Protection: 1; mode=block");
  header("X-Frame-Options: 1; mode=block");
  header("X-Content-Type-Options: 1; mode=block");
// auto_logout();
// var_dump($this->session->all_userdata());
  ?>
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="<?php echo SURL;?>admin/home" class="navbar-brand d-none d-sm-inline-block">
                  <div class="brand-text d-none d-lg-inline-block"><span>Haris</span><strong> Tech</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>HE</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item"><a href="<?php echo SURL?>admin/logout_user" class="nav-link logout"> <span class="d-none d-sm-inline">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center"><a href="#" data-toggle="modal" data-target="#profileModal">
              <div class="avatar"><img src="<?php echo SURL."assets/img/placeholder.png";  ?>" alt="..." class="img-fluid rounded-circle"></div></a>
        
<!-- echo SURL;?>assets/img/placeholder.png  -->
            <div class="title">
              <h1 class="h4">Ayeen Khan</h1>
              <p>Admin
              </p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
           <?php if($this->session->userdata('user_type')==1 || $this->session->userdata('user_type')==2){?>
            <li class="<?php echo @$_GET['h']?>"><a href="<?php echo SURL?>admin/home?h=active"> <i class="fa fa-users"></i>Users</a></li>
         <!--     <li class="<?php echo @$_GET['u']?>"><a href="<?php echo SURL?>admin/school?u=active"> <i class="icon-home"></i>Corona Test Centers</a></li> -->
          <?php }?>
    
        </nav>
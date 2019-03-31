<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Master Data <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url('crud_users') ?>"><span class="fa fa-user"></span>&nbsp; Data Users</a></li>
            <li><a href="<?php echo base_url('C_mahasiswa') ?>"><span class="fa fa-users"></span>&nbsp; Data Mahasiswa</a></li>
          </ul>
        </li>
      </ul>
       <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Laporan<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url('Report') ?>"><span class="fa fa-book"></span>&nbsp; Report Data Users</a></li>
          </ul>
        </li>
      </ul>
       <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">SMS Getaway<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#"><span class="fa fa-send"></span>&nbsp; Perorangan</a></li>
            <li><a href="#"><span class="fa fa-send"></span>&nbsp; Kebanyak</a></li>
          </ul>
        </li>
      </ul>
       <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">SMS Via Email<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#"><span class="fa fa-send"></span>&nbsp; Ke Mahasiswa</a></li>
          </ul>
        </li>
      </ul>
 
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
        <!-- strtoupper ini di gunakan merubah huruf menjadi huruf besar -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><img style="border-radius: 100%;height: 35px;width: 50px;" src="<?php echo base_url('uploads/'.$this->session->userdata('foto')) ?>" alt=""> <?php echo "Selamat datang ".strtoupper($this->session->userdata('username')); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
           	<li><a href="#"><i class="fa fa-user"></i>  Profil</a></li>
            <li><a href="#"><i class="fa fa-cog"></i> Setting</a></li>
            <li><a onclick="return confirm('yakin Ingin Keluar??')" href="<?php echo base_url('c_user/keluar') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
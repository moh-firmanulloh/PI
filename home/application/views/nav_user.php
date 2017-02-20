<nav class="navbar navbar-custom navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('site') ?>"><i class="fa fa-money" aria-hidden="true"></i> Atur Keuangan</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="<?php echo ($this->uri->segment(1) == 'site' AND $this->uri->segment(2) == '')? 'active' : ''; ?>">
          <a href="<?php echo site_url('site')  ?>">
           <span class="glyphicon glyphicon-home"></span> Home
          </a>
        </li>
        <li class="<?php echo ($this->uri->segment(1) == 'profile')? 'active' : ''; ?> dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('profile/data_pribadi') ?>"><span class="glyphicon glyphicon-user"></span> Informasi Pribadi</a></li>
            <li><a href="<?php echo site_url('user/statistik') ?>"><span class="glyphicon glyphicon-stats"></span> Statistik</a></li>
            <li><a href="<?php echo site_url('user/pengaturan') ?>"><span class="glyphicon glyphicon-wrench"></span> Pengaturan</a></li>
          </ul>
        </li>
        <li class="<?php echo ($this->uri->segment(1) == 'user' OR $this->uri->segment(1) == 'budget' OR $this->uri->segment(1) == 'flow' )? 'active' : ''; ?>">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="Atur Keuangan">
            <i class="fa fa-money" aria-hidden="true"></i> Atur <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li class="<?php echo ($this->uri->segment(2) == 'atur-saldo')? 'active' : ''; ?>"><a href="<?php echo site_url('user/atur-saldo') ?>" title=""><i class="fa fa-balance-scale" aria-hidden="true"></i> Saldo</a></li>
            <li class="<?php echo ($this->uri->segment(2) == 'perencanaan-keuangan')? 'active' : ''; ?>"><a href="<?php echo site_url('budget/perencanaan-keuangan') ?>" title=""><i class="fa fa-list-alt" aria-hidden="true"></i> Perencanaan Keuangan</a></li>
            <li class="<?php echo ($this->uri->segment(2) == 'pengeluaran')? 'active' : ''; ?>"><a href="<?php echo site_url('flow/pengeluaran') ?>" title=""><i class="fa fa-money" aria-hidden="true"> Pengeluaran</i></a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="<?php echo site_url('login/logout') ?>">
            <span class="glyphicon glyphicon-off"></span> 
            Logout 
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
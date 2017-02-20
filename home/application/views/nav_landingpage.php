<nav class="navbar navbar-custom navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('site') ?>"><i class="fa fa-money" aria-hidden="true"></i> Atur Keuangan</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="<?php echo ($this->uri->segment(2) == 'signup')? 'active' : ''; ?>">
          <a href="<?php echo base_url('daftar') ?>">
            <span class="glyphicon glyphicon-globe"></span> 
            Daftar
          </a>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" href="#" data-toggle="dropdown">
            <span class="glyphicon glyphicon-log-in"></span> 
            Login 
            <strong class="caret"></strong>
          </a>
          <div class="dropdown-menu dropdown-custom">
              <?php echo form_open('login/auth'); ?>
                <input class="inputform" type="text" placeholder="Username" id="username" name="username">
                <input class="inputform" type="password" placeholder="Password" id="password" name="password">
                <!-- <input type="checkbox" name="remember-me" id="remember-me" value="1">
                <label class="string optional" for="user_remember_me"> Remember me</label> -->
                <br>
                <input class="btn btn-primary btn-md" type="submit" id="sign-in" value="Sign In">
              <?php echo form_close(); ?>
          </div>
        </li>
      </ul>
      </div>
    </div>
  </div>
</nav>
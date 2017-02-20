<!-- AWAL NAVIGASI -->
	<nav class="navbar navbar-fixed-top navbar-default">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2">
					<img src="<?php echo base_url('assets/img/SHG.png') ?>" class="img-circle" width="25" height="25" style="margin-top: 13px;">
					<a class="navbar-brand" href="<?php echo base_url('site/projectpweb') ?>">Sinar Health Group</a>
				</div>
				<div class="col-md-10" align="right">
					<ul class="nav navbar-nav">
						<li class="<?php echo ($this->uri->segment(2) == 'projectpweb')? 'active' : ''; ?>">
							<!-- <a href="<?php echo base_url('site/projectpweb') ?>" >Home</a> -->
							<?php 
								echo anchor('site/projectpweb', 'Home', array('class' => 'active')); 
							?>
						</li>
						<li class="<?php echo ($this->uri->segment(2) == 'artikel')? 'active' : ''; ?>">
							<!-- <a href="<?php echo base_url('site/artikel') ?>" >Artikel</a> -->
							<?php echo anchor('site/artikel', 'Artikel', array('class' => 'active')); ?>
						</li>
						<li class="dropdown">
          					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Jenis Berdasarkan <span class="caret"></span></a>
          					<ul class="dropdown-menu">
					            <li class="dropdown-header">
					            	Nama Golongan
					            </li>
					            <li>
					            	<a href="<?php echo base_url('site/analgesik') ?>">- Analgesik</a>
					            </li>
					            <li>
					            	<a href="#">- Antialergi</a>
					            </li>
					            <li>
					            	<a href="#">- Antidote</a>
					            </li>
					            <li>
					            	<a href="#">- Anti Infeksi</a>
					            </li>
					       	</ul>
        				</li>
        				<li>
        					<a href="#">Cara Berbelanja</a>
        				</li>
        				<li>
        					<a href="<?php echo base_url('site/konf_pembayaran') ?>">Konfirmasi Pembayaran</a>
        				</li>
        				<li>
        					<input class="cari" type="text" name="search" placeholder="Cari obat disini...">
        					<button type="submit" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        				</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="<?php echo base_url('site/daftar_shg') ?>">
					        	<span class="glyphicon glyphicon-user"></span> 
					            Daftar
					        </a>
						</li>
						<li class="dropdown">
				          <a class="dropdown-toggle" href="#" data-toggle="dropdown">
				            <span class="glyphicon glyphicon-log-in"></span> 
				            Login 
				            <strong class="caret"></strong>
				          </a>
				          <div class="dropdown-menu dropdown-menu-custom">
				              <form method="post" action="login" accept-charset="UTF-8">
				                <input class="forminput" type="text" placeholder="Username" id="username" name="username">
				                <input class="forminput" type="password" placeholder="Password" id="password" name="password">
				                <input style="float: left; margin-left: 15px; margin-top:8 px;" type="checkbox" name="remember-me" id="remember-me" value="1">
				                <label class="string optional" for="user_remember_me"> Remember me</label>
				                <input class="btn btn-primary btn-sm" type="submit" id="sign-in" value="Sign In">
				              </form>
				          </div>
				        </li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- AKHIR NAVIGASI -->
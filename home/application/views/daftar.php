<div class="container" style="padding-bottom: 2%;">
	<div class="row">
		<div class="main-login main-center">
			<?php echo form_open('daftar/validasi_form'); ?>
					<label for="name" class="cols-sm-2 control-label">Nama</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control form-control" name="name" id="name" value="<?php echo $nama ?>" placeholder="Masukkan Nama Lengkap Anda"/>
						</div>
						<?php if (form_error('name') == TRUE)
						{
							echo "<div class=\"alert alert-warning\" style=\"height:45px;\">" .form_error('name'). "</div>";
						} ?>
					</div>
					<label for="email" class="cols-sm-2 control-label">Email</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control form-control" name="email" id="email" value="<?php echo $email ?>" placeholder="Masukkan Email Anda"/>
						</div>
						<?php if (form_error('email') == TRUE)
						{
							echo "<div class=\"alert alert-warning\" style=\"height:45px;\">" .form_error('email'). "</div>";
						} ?>
					</div>
					<label for="username" class="cols-sm-2 control-label">Username</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control form-control" name="username" id="username" value="<?php echo $username ?>" placeholder="Masukkan Username"/>
						</div>
						<?php if (form_error('username') == TRUE)
						{
							echo "<div class=\"alert alert-warning\" style=\"height:45px;\">" .form_error('username'). "</div>";
						} ?>
					</div>
					<label for="password" class="cols-sm-2 control-label">Password</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control form-control" name="password" id="password"  placeholder="Masukkan Password"/>
						</div>
						<?php if (form_error('password') == TRUE)
						{
							echo "<div class=\"alert alert-warning\" style=\"height:45px;\">" .form_error('password'). "</div>";
						} ?>
					</div>
					<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control form-control" name="confirm" id="confirm"  placeholder="Konfirmasi Password"/>
						</div>
						<?php if (form_error('confirm') == TRUE)
						{
							echo "<div class=\"alert alert-warning\" style=\"height:45px;\">" .form_error('confirm'). "</div>";
						} ?>
					</div>
					<br>
					<div class="center-block">
						<button type="submit" class="btn btn-primary btn-md center-block login-button btn-default">
							Daftar
						</button>
					</div>
					<div class="login-register">
						<br>
			            Sudah punya akun ? Silahkan <a href="<?php echo base_url('login') ?>">Login</a>
			        </div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
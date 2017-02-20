<div class="container">
<div class="custom-padding">
	<div class="row">
		<div class="main-login main-center">
			<?php echo form_open('site/validasi_form'); ?>
					<label for="name" class="cols-sm-2 control-label">Nama</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control form-control-custom" name="name" id="name"  placeholder="Masukkan Nama Lengkap Anda"/><?php echo form_error('name') ?>
						</div>
					</div>
					<label for="email" class="cols-sm-2 control-label">Email</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control form-control-custom" name="email" id="email"  placeholder="Masukkan Email Anda"/><?php echo form_error('email') ?>
						</div>
					</div>
					<label for="username" class="cols-sm-2 control-label">Username</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control form-control-custom" name="username" id="username"  placeholder="Masukkan Username"/><?php echo form_error('username') ?>
						</div>
					</div>
					<label for="password" class="cols-sm-2 control-label">Password</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control form-control-custom" name="password" id="password"  placeholder="Masukkan Password"/><?php echo form_error('password') ?>
						</div>
					</div>
					<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control form-control-custom" name="confirm" id="confirm"  placeholder="Konfirmasi Password"/><?php echo form_error('confirm') ?>
						</div>
					</div>
					<br>
						<button type="submit" class="btn btn-primary btn-md btn-block login-button btn-default btn-custom-width">
							Daftar
						</button>
					<div class="login-register">
						<br>
			            Sudah punya akun ? Silahkan <a href="index.php">Login</a>
			        </div>
			<!-- </form> -->
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
</div>
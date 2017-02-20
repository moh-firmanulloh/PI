<div class="container" style="margin-bottom: 10.3%; padding-top:3%">
<div class="custom-padding">
	<div class="alert alert-danger">
		Username yang Anda masukkan sedang digunakan. Harap cek pada perangkat Anda yang lain!
	</div>
	<div class="row" style="padding-top: 5%;">
		<div class="main-login-custom main-center-custom">
			<?php echo form_open('login/authentication_check'); ?>
					<label for="username" class="cols-sm-2 control-label">Username</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control form-ctrl-custom" name="username" id="username" placeholder="Masukkan Username"/>
						</div>
					</div>
					<label for="password" class="cols-sm-2 control-label">Password</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control form-ctrl-customs" name="password" id="password"  placeholder="Masukkan Password"/>
						</div>
					</div>
					<div class="cols-sm-10" align="center">
					<br>
						<input class="btn btn-primary btn-sm" type="submit" id="sign-in" value="Sign In">
					</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
</div>
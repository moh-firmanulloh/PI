<div class="container" style="margin-bottom: 23.3%;">
	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#petunjuk">
    	<i class="fa fa-question"></i> Petunjuk
  	</button><br><br>
	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahKategoriBudget" id="buttonKategoriBudget"><span class="fa fa-arrow-right"></span>Tambah Kategori Perencanaan</button><br><br>

	<ul class="nav nav-pills">
	    <li id="status" class="active"><a href="" id="berjalan">Kategori Berjalan</a></li>
	    <li id="state" class=""><a href="" id="selesai">Kategori Selesai</a></li>
 	</ul>

 	<div id="petunjuk" class="modal fade" role="dialog">
	    <div class="modal-dialog modal-lg">
	    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Petunjuk Perencanaan Keuangan</h4>
		      </div>
		      <div class="modal-body">
		      	Tombol <button class="btn btn-primary btn-sm"><i class="fa fa-info-circle"></i></button> merupakan tombol untuk melihat detail dari perencanaan.<br><br>
		      	Tombol <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> merupakan tombol untuk menghapus kategori perencanaan.<br><br>
		      	Tombol <button class="btn btn-success btn-sm"><i class="fa fa-check-square-o"></i></button> merupakan tombol untuk mengubah status kategori dari berjalan menjadi selesai.
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
	 	</div>
	</div>

	<div id="tambahKategoriBudget" class="modal fade" role="dialog">
	  	<div class="modal-dialog modal-sm">
	    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Tambah Kategori Perencanaan</h4>
		      </div>
		      <div class="modal-body">
		      <?php echo form_open('budget/addKategori'); ?>
	            	<label>Kategori</label><br>
			        <input class="form-control" type="text" name="kategori" id="kategori" placeholder="Masukkan nama kategori"><br>
			       	<label>Debit dari Saldo</label><br>
			        <select id="kategoriSaldo" class="form-control" name="kategoriSaldo">
			        	<option value="" selected disabled>- Pilih Kategori Saldo</option>
			        	<?php foreach ($saldo->result() as $key) { ?>
			        		<option value="<?php echo $key->id."-".$key->nominal ?>"><?php echo $key->kategori; ?></option>
			        	<?php } ?>
			        </select><br>
			        <label>Nominal Target</label><br>
					<div class="panel panel-default">
						<div class="panel-body">
							<input clsas="form-control" id="ex8" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="0" data-slider-step="1000" />
						</div>
					</div>
					<input class="form-control" id="nominal" type="text" name="nominal" value="" placeholder="Masukkan Nominal Target"><br>
					<label>Tempo</label>
			        <div class="input-group">
		        		<span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                    <input type="text" class="form-control" id="datepicker"/>
	                    <input type="hidden" name="tanggal" value="" id="tanggal">
			        </div><br>
		        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
		        <?php echo form_close(); ?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
	  	</div>
	</div><br><br>

	<div id="detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog"> 
			<div class="modal-content"> 

				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
					<h4 class="modal-title">
					<i class="fa fa-info-circle"></i> Detail Perencanaan Budget
					</h4> 
				</div> 

				<div class="modal-body"> 

				<div id="modal-loader" style="display: none; text-align: center;">
					<img src="<?php echo base_url('assets/img/ajax-loader.gif') ?>"> 
				</div>

				<div id="dynamic-content"> <!-- mysql data will load in table -->

					<div class="row"> 
						<div class="col-md-12"> 

							<div class="table-responsive">

							<table class="table table-striped table-bordered">
								<tr>
								<th>Kategori</th>
								<td id="detailKategori"></td>
								</tr>

								<tr>
								<th>Debit Kategori</th>
								<td id="detailDebit"></td>
								</tr>

								<!-- <tr>
								<th>Saldo</th>
								<td id="detailSaldo"></td>
								</tr> -->

								<tr>
								<th>Target</th>
								<td id="detailTarget"></td>
								</tr>

								<tr>
								<th>Progress</th>
								<td id="detailProgress"></td>
								</tr>

								<tr>
								<th>Tempo</th>
								<td id="detailTempo"></td>
								</tr>

								<tr>
								<th>Status</th>
								<td id="detailStatus"></td>
								</tr>

							</table>

							</div>

							</div> 
						</div>

					</div> 

				</div> 

				<div class="modal-footer"> 
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
				</div>  

			</div> 
		</div>
	</div>

	<div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm"> 
			<div class="modal-content"> 

				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
					<h4 class="modal-title">
					<i class="fa fa-trash-o"></i> Hapus Perencanaan Budget
					</h4> 
				</div>
				<div class="modal-body"> 
				Anda ingin menghapus kategori <b id="labelDelete"></b><br><br>
				Apakah anda yakin ?
				<?php echo form_open('budget/deleteBP'); ?>
					<input type="hidden" id="idBP" name="id" value=""><br>
					<button type="submit" class="btn btn-danger">Hapus</button>
				<?php echo form_close(); ?>
				</div>
			</div>

		</div>
	</div>
	
	<div id="done" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm"> 
			<div class="modal-content"> 

				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
					<h4 class="modal-title">
					<i class="fa fa-check-circle"></i> Ubah Status Perencanaan
					</h4> 
				</div>
				<div class="modal-body"> 
				Anda ingin mengubah status kategori <b id="labelDone"></b> menjadi Selesai<br><br>
				Apakah anda yakin ?
				<?php echo form_open('budget/doneBP'); ?>
					<input type="hidden" id="idBPDone" name="id" value=""><br>
					<button type="submit" class="btn btn-success">Selesai</button>
				<?php echo form_close(); ?>
				</div>
			</div>

		</div>
	</div>
	<div id="loader" align="center">
		<img src="<?php echo base_url('assets/img/ajax-loader.gif') ?>" > 
	</div>

<div id="list-bp-wrapper">

	<?php $loop = 1;
	foreach ($progress->result() as $prog){ ?>
	<div class="col-lg-4" style="margin-bottom: 2%;">
		<label id="labelKategori"><?php echo $prog->kategori; ?></label>
		<div class="progress">
			<div id="progress-bar<?php echo $loop; ?>" class="progress-bar" role="progressbar" aria-valuenow="<?php echo $prog->progress; ?>" aria-valuemin="0" aria-valuemax="<?php echo $prog->target; ?>" style="width: 0%;">
			<?php echo ($prog->progress/$prog->target)*100; ?>%
			</div>
		</div>
		<div align="center">
			<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail" data-id="<?php echo $prog->id; ?>" id="getDetail" title="Detail"><i class="fa fa-info-circle"></i></button>
			<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete" data-id="<?php echo $prog->id; ?>" data-kategori="<?php echo $prog->kategori; ?>" id="buttonDelete" title="Hapus"><i class="fa fa-trash-o"></i></button>
			<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#done" data-id="<?php echo $prog->id; ?>" data-kategori="<?php echo $prog->kategori; ?>" id="buttonDone" title="Selesai"><i class="fa fa-check-square-o"></i></button>
		</div>
	</div>
	<?php $loop = $loop+1;
	} ?>
</div>

</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/budgetPlan.js') ?>"></script>	
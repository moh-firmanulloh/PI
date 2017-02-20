<div class="container" style="padding-bottom: 3%; margin-bottom: 20.3%;">
	<div class="alert alert-warning" style="margin-top: 65px;">
			Anda belum membuat Kategori Perencanaan, silahkan buat terlebih dahulu !
	</div>
	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahKategoriBudget"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Kategori Perencanaan</button>

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
			        <input class="form-control" type="text" name="kategori" placeholder="Masukkan nama kategori"><br>
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
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/budgetPlan.js') ?>"></script>
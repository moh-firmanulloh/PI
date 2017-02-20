<div class="content container">
	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#petunjuk">
    	<i class="fa fa-question"></i> Petunjuk
  	</button><br><br>
	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahKategoriSaldo"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Kategori</button>
	<button type="button" class="tambahSaldo btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahNominalSaldo"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Nominal</button>

	<div id="tambahKategoriSaldo" class="modal fade" role="dialog">
	  	<div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Tambah Kategori Saldo</h4>
		      </div>
		      <div class="modal-body">
		      <?php echo form_open('user/addKategori'); ?>
		        <label>Kategori</label><br>
		        	<input class="form-control" type="text" id="inputKategori" name="kategori" placeholder="Masukkan nama kategori">
		        <br>
		        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
		        <?php echo form_close(); ?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
		      </div>
		    </div>
	  	</div>
	</div>

	<div id="tambahNominalSaldo" class="modal fade" role="dialog">
	  	<div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Tambah nominal Saldo</h4>
		      </div>
		      <div class="modal-body">
		      <?php echo form_open('user/addNominalSaldo'); ?>
		        <label>Kategori <span style="color: red">*</span></label><br>
		        <select id="daftarKategori" name="daftarKategori" class="form-control">
		        	<option value="" disabled="disabled" selected>- Pilih Kategori</option>
		        	<?php foreach ($query->result_array() as $row) 
		        	{ ?>
		        		<option value="<?php echo $row['id'] ?>"><?php echo $row['kategori']; ?></option>
		        	<?php } ?>
		        </select><p class="errorDaftarKategori" style="color: red;">Pilih kategori</p><br>
		        <label>Nominal <span style="color: red">*</span></label><br>
		        <div class="input-group">
		        <span class="input-group-addon">Rp</span>
		        	<input class="form-control" type="text" id="nominalSaldo" name="nominalSaldo" value="" placeholder="Masukkan nominal saldo">
		        </div><br>
		        <label>Potong dari Saldo Lain ? <span style="color: red">*</span></label><br>
		        <input class="opsiYa" type="radio" name="potongSaldo" value="ya">Ya
		        <input class="opsiTidak" type="radio" name="potongSaldo" value="tidak" checked>Tidak<br><br>
		        <div class="pilih">
		        <label>Pilih kategori</label><br>
		        <select class="form-control" name="potongKategori" id="potongKategori">
		        	<?php foreach ($query->result_array as $row) 
		        	{ ?>
		        		<option value="<?php echo $row['id']; ?>"><?php echo $row['kategori']; ?></option>}
		        	<?php }  ?>
		        </select><br>
		        </div>
		        <label>Tanggal</label>
		        <div class="input-group">
		        		<span class="input-group-addon">
	                        <span class="glyphicon glyphicon-calendar"></span>
	                    </span>
	                    <input type="text" class="form-control" id="datepicker"/>
	                    <input type="hidden" name="tanggal" value="" id="tanggal">
		        </div>
		        <label>Catatan</label>
		        <div class="input-group">
	        		<span class="input-group-addon">Ket.</span>
	        		<input class="form-control" type="text" name="catatan" value="" placeholder="Keterangan saldo tambahan">
		        </div>
		        <sub><span style="color: red">*</span>Tidak boleh kosong</sub><br><br>
		        <button type="submit" class="btnNominalSaldo btn btn-primary btn-sm">Submit</button>
		        <?php echo form_close(); ?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
		      </div>
		    </div>
	  	</div>
	</div>

	<div id="deleteKategoriSaldo" class="modal fade" role="dialog">
  		<div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Hapus kategori <b id="labelDelete"></b></h4>
		      </div>
		      <div class="modal-body">
		      <?php echo form_open('user/deleteKategori'); ?>
		        <label>Apakah anda yakin ?</label><br>
		        <input type="hidden" name="deleteKategori" id="deleteKategori" value="">
		        <button type="submit" class="btn btn-danger btn-sm" formaction="<?php echo base_url('user/deleteKategori') ?>">Hapus</button>
		        <?php echo form_close(); ?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
		      </div>
	   		</div>
		</div>
	</div>

	<div id="editKategoriSaldo" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
			  <div class="modal-header">
			    <button type="button" class="close" data-dismiss="modal">&times;</button>
			    <h4 class="modal-title">Edit Kategori <b id="labelEdit"></b></h4>
			  </div>
			  <div class="modal-body">
			  <?php echo form_open('user/editKategori'); ?>
			    <label>Kategori</label><br>
			    <input type="hidden" name="prevKategori" id="prevKategori" value="">
			    	<input class="form-control" type="text" name="nextKategori" id="nextKategori" value="">
			    <br>
			    <label>Nominal</label><br>
			    	<input class="form-control" type="text" name="nextNominal" id="nextNominal" value="">
		    	<br>
			    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
			    <?php echo form_close(); ?>
			  </div>
			  <div class="modal-footer">
			    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
			  </div>
			</div>
		</div>
	</div>

	<div id="petunjuk" class="modal fade" role="dialog">
	    <div class="modal-dialog modal-lg">
	    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Saran Manajemen Saldo</h4>
		      </div>
		      <div class="modal-body">
		      <strong>Catatan : </strong>Saran ini tidaklah sepenuhnya harus diikuti karena masing-masing individu memiliki kebebasan dan kreatifitas.<br><br>
		      1. Buatlah setidaknya <strong>3</strong> jenis Kategori seperti <strong>Kas</strong>, <strong>Tabungan</strong>, dan <strong>Investasi</strong>.<br>
		      2. Alokasikan sumber dana 70% pada Kategori Kas untuk kebutuhan sehari hari. 20% pada Tabungan atau (jika terdapat) kebutuhan mendesak. Dan 10% pada Investasi.<br>
		      3. Usahakan pengeluaran tidak melebihi dari perencanaan. Setiap dana lebih dari perencanaan dapat dialokasikan ke Tabungan ataupun kebutuhan dimasa yang akan datang.
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
	 	</div>
	</div>

	<table class="table table-stripped">
		<caption>Saldo</caption>
		<thead>
			<tr>
				<th>Kategori</th>
				<th>Nominal</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $count = 0;
		foreach ($query->result() as $row) { ?>
		<tr>
			<td><?php $data = $row->kategori; 
			echo $data; ?></td>
			<td><?php echo number_format($row->nominal, 0, ",", "."); ?></td>
			<td>
			<button id="deleteButton" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#deleteKategoriSaldo" data-id="<?php echo $row->id; ?>" data-name="<?php echo $row->kategori; ?>">Hapus</button>
		    <button id="editButton" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editKategoriSaldo" data-id="<?php echo $row->id; ?>" data-name="<?php echo $row->kategori; ?>" data-nominal="<?php echo $row->nominal; ?>">Edit</button>
			</td>
		</tr>
		</tbody>
		<?php $count = $count +1;
		} ?>
	</table>
</div>
<script src="<?php echo base_url('assets/js/saldoUser.js') ?>" type="text/javascript"></script>
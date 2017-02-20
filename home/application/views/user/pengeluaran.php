<div class="container">
	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahPengeluaran" id="buttonPengeluaran"><span class="fa fa-credit-card-alt"></span> Tambah Pengeluaran</button><br><br>

	<ul class="nav nav-tabs">
	    <li id="status0" class="active"><a href="" id="hari">Hari Ini</a></li>
	    <li id="status1" class=""><a href="" id="minggu">Minggu Ini</a></li>
	    <li id="status2" class=""><a href="" id="bulan">Bulan Ini</a></li>
	    <li id="status3" class=""><a href="" id="tahun">Tahun Ini</a></li>
 	</ul>

	<div id="tambahPengeluaran" class="modal fade" role="dialog">
	  	<div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Tambah Pengeluaran</h4>
		      </div>
		      <div class="modal-body">
		      <?php echo form_open_multipart('flow/addPengeluaran'); ?>
		        <label>Pilih Kategori Perencanaan</label>
	        	<select class="form-control" name="perencanaan" id="perencanaan">
	        	<option value="" disabled selected>- Pilih Kategori Perencanaan</option>
		        <?php foreach ($query->result() as $row){ ?>
		        		<option value="<?php echo $row->id; ?>"><?php echo $row->kategori; ?></option>
		        <?php } ?>
	        	</select><br>
	        	<label>Nominal <span style="color: red">*</span></label><br>
		        <div class="input-group">
		        <span class="input-group-addon">Rp</span>
		        	<input class="form-control" type="text" id="nominalPengeluaran" name="nominalPengeluaran" value="" placeholder="Masukkan nominal pengeluaran">
		        </div><br>
		        <label>Apakah Anda ingin memasukkan gambar? <span style="color: red">*</span></label><br>
		        <input class="opsiYa" type="radio" name="opsiGambar" value="ya">Ya
		        <input class="opsiTidak" type="radio" name="opsiGambar" value="tidak" checked>Tidak<br><br>
		        <div class="pilih">
		        	<input type="file" name="gambar" id="gambar" value="" placeholder=""><br><br>	
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
		        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
		        <?php echo form_close(); ?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
		      </div>
		    </div>
	  	</div>
	</div>

	<div class="expense-wrapper">
		<table class="table table-stripped">
		<caption>Pengeluaran</caption>
		<thead>
			<tr>
				<th>Tanggal</th>
				<th>Kategori</th>
				<th>Nominal</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $count = 0;
		foreach ($res->result() as $row) { ?>
		<tr>
			<td><?php list($tahun, $bulan, $tanggal) 	= explode("-", $row->tanggal);
			$urut							= array(
												1	=> $tanggal,
												2	=> $bulan,
												3	=> $tahun);
			ksort($urut, SORT_NUMERIC);
			$tanggal				= implode("-", $urut);
			echo $tanggal;?></td>
			<td></td>
			<td><?php echo number_format($row->nominal, 0, ",", "."); ?></td>
		</tr>
		</tbody>
		<?php $count = $count +1;
		} ?>
	</table>
	</div>
</div>

<script type="text/javascript">
$(function(){
	$( "#datepicker" ).datepicker();
	$("#datepicker").datepicker({ 
		dateFormat: 'dd-mm-yy'
	});

	$("#datepicker").datepicker().datepicker("setDate", new Date());

	$("#tambahPengeluaran").click(function ()
	{
		$("#tanggal").val($("#datepicker").val());
	});

	$("#datepicker").change(function ()
	{
		$("#tanggal").val($("#datepicker").val());
	});

	$(".pilih").hide();

	$(".opsiYa").click(function()
	{
		$(".pilih").show();
	});

	$(".opsiTidak").click(function()
	{
		$(".pilih").hide();
	});

	$("#tambahPengeluaran").on("shown.bs.modal", function()
	{
		$("#perencanaan").focus();
	});

	$('#nominalPengeluaran').keyup(function(event) {

	  // skip for arrow keys
	  if(event.which >= 37 && event.which <= 40) return;

	  // format number
	  $(this).val(function(index, value) {
	    return value
	    .replace(/\D/g, "")
	    .replace(/\B(?=(\d{3})+(?!\d))/g, ".")
	    ;
	  });
	});
});
	
</script>
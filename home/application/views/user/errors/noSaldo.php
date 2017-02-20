<div class="container" style="margin-bottom: 18%; padding-bottom: 3%;">
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#petunjuk">
    <i class="fa fa-question"></i> Petunjuk
  </button>
	<div class="alert alert-warning" style="margin-top: 65px;">
			Anda belum membuat Kategori Saldo, silahkan buat terlebih dahulu !
	</div>
	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahKategoriSaldo"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Kategori Saldo</button>

	<div id="tambahKategoriSaldo" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Kategori Saldo</h4>
      </div>
      <div class="modal-body">
      <?php echo form_open('user/addKategori'); ?>
        <label>Kategori</label><br>
        <div class="input-group">
	        <input class="form-control" type="text" name="kategori" placeholder="Masukkan nama kategori">    	
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
</div>	
	
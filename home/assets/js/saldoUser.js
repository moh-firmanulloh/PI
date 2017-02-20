//////////////////// INISIALISASI DATEPICKER
$( function() {
	$( "#datepicker" ).datepicker();
	$("#datepicker").datepicker({ 
		dateFormat: 'dd-mm-yy'
	});

	$("#datepicker").datepicker().datepicker("setDate", new Date());

	$("#tambahNominalSaldo").click(function ()
	{
		$("#tanggal").val($("#datepicker").val());
	});

	$("#datepicker").change(function ()
	{
		$("#tanggal").val($("#datepicker").val());
	});


	///////////////////// AKHIR DARI INISIALISASI

	$("#nominalSaldo").change(function()
	{
		if ($("#daftarKategori").val() == "")
		{
			$(".errorDaftarKategori").show();
		}
	});

	$(".tambahSaldo").click(function()
	{
		$(".pilih").hide();
		$(".errorDaftarKategori").hide();
	});

	$(".opsiYa").click(function()
	{
		$(".pilih").show();
	});

	$(".opsiTidak").click(function()
	{
		$(".pilih").hide();
	})

	$("#tambahKategoriSaldo").on('shown.bs.modal', function()
	{
		$("#inputKategori").focus();
	});

	$(document).on('click', '#deleteButton', function(e)
	{
		var kategori = $(this).data('name');
		var id = $(this).data('id');
		$("#labelDelete").text(kategori);
		$("#deleteKategori").val(id);
	});

	$(document).on('click', '#editButton', function(e)
	{
		var kategori = $(this).data('name');
		var id = $(this).data('id');
		var nominal = $(this).data('nominal');
		$("#prevKategori").val(id);
		$("#labelEdit").text(kategori);
		$("#nextKategori").val(kategori);
		$("#nextNominal").val(nominal);
	});

	$('#nominalSaldo').keyup(function(event) {

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

	$('#nextNominal').keyup(function(event) {

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

  } );

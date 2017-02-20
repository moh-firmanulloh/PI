$( function() {
	$("#loader").hide();
	$(document).on('click', '#getDetail', function()
	{
		var id = $(this).data('id');
		$('#dynamic-content').hide(); // hide dive for loader
		$('#modal-loader').show();  // load ajax loader
		$.ajax({
			type: "POST",
		 	cache: false,
	        url: "getDetailBPbyId", 
	        data: ({'id':id}),
	        dataType: "json",
	        success: function(detail)
	        {
        		$("#modal-loader").hide();
        		$("#dynamic-content").show();
	        	console.log(detail);
	        	$("#detailKategori").html(detail[0].kategori);
	        	$("#detailDebit").html(detail[0].kategori_saldo);
	        	// var saldo = detail[0].nominal.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	        	// $("#detailSaldo").html(saldo);
	        	var target = detail[0].target.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	        	$("#detailTarget").html(target);
	        	var progress = detail[0].progress.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	        	$("#detailProgress").html(progress);
	        	var dbtempo = detail[0].tempo.split('-');
	        	var reverse = dbtempo.reverse();
	        	var tempo = reverse.join('-');
	        	$("#detailTempo").html(tempo);
	        	var dbstatus = detail[0].status;
	        	var status = '';
	        	if (dbstatus == 0) {
	        		status = 'Berjalan';
	        	} else if (dbstatus == 1) {
	        		status = 'Selesai';
	        	} 
	        	$("#detailStatus").html(status);
	        }
		});
	});

	$("#berjalan").click(function (e)
	{
		e.preventDefault();
		$("#list-bp-wrapper").empty();
		$("#loader").show();
		$("#state").attr('class','');
		$("#status").attr('class', 'active');
		$.ajax({
			type: "POST",
			cache: false,
			url: "getRunningBP",
			success: function(data)
			{
				$("#loader").hide();
				$("#list-bp-wrapper").html(data);
			}
		})
	});

	$("#selesai").click(function (e)
	{
		e.preventDefault();
		$("#list-bp-wrapper").empty();
		$("#loader").show();
		$("#status").attr('class', '');
		$("#state").attr('class', 'active');
		$.ajax({
			type: "POST",
			cache: false,
			url: "getDoneBP",
			success: function(data)
			{
				$("#loader").hide();
				console.log(data);
				$("#list-bp-wrapper").html(data);
			}
		});
	});

	$(document).on('click', '#buttonDelete', function()
	{
		var id 		 = $(this).data('id');
		var kategori = $(this).data('kategori');
		$("#labelDelete").text(kategori);
		$("#idBP").val(id);
	});

	$(document).on('click', '#buttonDone', function()
	{
		var id 		 = $(this).data('id');
		var kategori = $(this).data('kategori');
		$("#labelDone").text(kategori);
		$("#idBPDone").val(id);
	});

	$( "#datepicker" ).datepicker();

	$("#datepicker").datepicker({ 
		dateFormat: 'dd-mm-yy'
	});

	$("#datepicker").datepicker().datepicker("setDate", new Date());

	$("#tambahKategoriBudget").click(function ()
	{
		$("#tanggal").val($("#datepicker").val());
	});

	$("#tambahKategoriBudget").on('shown.bs.modal', function(){
        $(this).find('#kategori').focus();
    });

	$("#datepicker").change(function ()
	{
		$("#tanggal").val($("#datepicker").val());
	});


	$("#ex8").slider({
		value : 0
	});

	$("#ex8").on('slide', function(slideEvt)
	{
		$("#nominal").val(slideEvt.value);
	});

	$("#nominal").keyup(function()
	{
		var val = Math.abs(parseInt(this.value), 10);
		$("#ex8").slider('setValue', val);
	});

	$("#kategoriSaldo").change(function(e)
	{
		var opt = this.value.split('-');
		var maxVal = opt[1];
		$("#ex8").slider('setValue', 0);
		$("#ex8").slider('setAttribute', 'max', maxVal);
		$("#nominal").val(0);
	});

	var count = 1;
	$(".progress-bar").each(function ()
	{
		var width = $("#progress-bar" +count).text();
		$("#progress-bar" +count).css("width", width);
		var prog = $(this).attr('aria-valuenow');
		var targ = $(this).attr('aria-valuemax');
		if ((prog/targ)*100 <= 30)
			{
				$(this).addClass("progress-bar-info");
			} else if ((prog/targ)*100 > 30 && (prog/targ)*100 <= 70 ) 
			{
				$(this).addClass("progress-bar-success");
			} else if ((prog/targ)*100 > 70 && (prog/targ)*100 <= 100 ) 
			{
				$(this).addClass("progress-bar-warning");
			} else if (prog > targ) 
			{
				$(this).addClass("progress-bar-danger");
			}
		count++;
	});

  } );

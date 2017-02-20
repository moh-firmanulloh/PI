	<?php $loop = 1;
	foreach ($progress->result() as $prog){ ?>
	<div class="col-lg-4" style="margin-bottom: 2%;">
		<label><?php echo $prog->kategori; ?></label>
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

	<script type="text/javascript">
	$( function ()
	{
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

	});
	</script>
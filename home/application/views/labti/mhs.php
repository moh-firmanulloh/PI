			<h3> Data Mahasiswa 4IA02 : </h3>
			<br>
			<a href="<?php echo site_url(); ?>labti/halaman/add" class="btn btn-primary" role="button">
			Tambah </a>
			<br><br>
			<table class="table table-bordered">
			<thread>
				<tr>
					<th> NPM </th>
					<th> Nama Mahasiswa </th>
					<th> Nilai </th>
					<th> Pilihan </th>
				</tr>
			</thread>
			<tbody>
			<?php foreach($query->result() as $row)
			{ ?>
			<tr>
				<td><?php echo $row->npm; ?></td>
				<td><?php echo $row->nama ?></td>
				<td><?php echo $row->nilai; ?></td>
				<td>
					<a href="#" class="btn btn-success btn-xs" role="button">edit </a>
					<a href="#" class="btn btn-danger btn-xs" role="button">delete</a>
				</td>
			</tr>
			<?php } ?>
			</tbody>
			</table>
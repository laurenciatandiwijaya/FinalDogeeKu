<html>
	<body>
		<?php
		foreach($d as $a){
		?>
		
		<p>Nama Lengkap: <?php echo $a->nama_lengkap;?></p>
		<p>Tanggal Lahir: <?php echo $a->tanggal_lahir;?></p>
		<p>Jenis Kelamin: <?php echo $a->jenis_kelamin;?></p>
		<p>No Hp: <?php echo $a->no_hp;?></p>
		<p>Tanggal Masuk: <?php echo $a->tanggal_masuk;?></p>
		<p>Alamat: <?php echo $a->alamat;?></p>
		<p>Jabatan: <?php echo $a->jabatan;?></p>

		<?php
		}
		?>
	</body>



</html>
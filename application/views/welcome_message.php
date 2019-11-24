<html>
	<head>
		<title>Coba coba</title>
	</head>
	<body>
		<table>
			<tr>
				<td>ID Pengguna</td>
				<td>Email</td>
				<td>Nama Lengkap</td>
				<td>Tanggal Lahir</td>
				<td>Jenis Kelamin</td>
				<td>No Hp</td>
				<td>Status Pengguna</td>
			</tr>
				<?php
					$i=1;
					foreach($pengguna as $list){
				?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $list->email?></td>
			</tr>
				
				<?php
					$i++;
					}
				?>
		</table>
	</body>
</html>
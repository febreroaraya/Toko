<?php
session_start();
include "../connect.php";
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
		<title>Toko Online Sederhana</title>
		<link href="style/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="outline">
			<div id="header">
				<h2>Toko Online Sederhana</h2>
			</div>
			<div id="content">
			<?php 
				if ($_SESSION['id'] == FALSE)
					{
						echo "<meta http-equiv='refresh' content='0;url=index.php' />";
					}
				else
					{
				?>
				<h3>Report Order Product</h3>
				<?php
					$query = mysql_query("SELECT * from order_product");
					$row = mysql_num_rows($query);
					if($row == 0)
						{
							echo "<b>Tidak ada hasil Penjualan</b>";
						}
					else
						{
							?>
								<table border="1">
									<tr>
										<td width="5%">No.</td>
										<td width="15%">ID Barang</td>
										<td width="20%">Nama</td>
										<td width="15%">Email</td>
										<td width="30%">Alamat</td>
										<td width="10%">Nomor HP</td>
										<td width="5%">Status</td>
									</tr>
									<?php
									$i = 0;
									while($data=mysql_fetch_array($query))
										{
										$i++
											?>
												<tr>
													<td><?= $i?></td>
													<td><?=$data['id_product']?></td>
													<td><?=$data['name']?></td>
													<td><?=$data['email']?></td>
													<td><?=$data['address']?></td>
													<td><?=$data['number_phone']?></td>
													<td><?=$data['status']?></td>
												</tr>
											<?php
										}
									?>
								</table>
							<?php
						}
					}
				?>
			</div>
			<?php
				if ($_SESSION['id'] == TRUE)
					{
			?>
			<div id="sidebar">
				<h3>Navigasi Menu</h3>
				<a href="index.php">Dashboard</a><br>
				<a href="add_product.php">Add Product</a><br>
				<a href="add_category.php">Add Category</a><br>
				<a href="report.php">Report</a><br>
				<a href="logout.php">Logout</a>
			</div>
			<?php
					}
			?>
			<div style="clear:both">
			</div>
			<div id="footer">
				<p>©<?php echo date('Y')?> Membuat Toko Online dengan PHP dan MySQL created by <a href="http://tukangbolos.com/">tukangbolos</a></p>
			</div>
		</div>
	</body>
</html>
<?php 
session_start();
include "connect.php";
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
				<h3>Produk Kami</h3>
				<table width="100%">
				<?php
					$query = mysql_query("select * from product order by id desc");
					while($data=mysql_fetch_array($query))
						{
						?>
							<td width="25%">
								<a href="order.php?product=<?=$data['id'];?>"><img src="<?php echo $data['link_image'];?>" height="250" width="150px"></a>
								<?=$data['name']?> <br />IDR <?=$data['price'];?>
							</td>
						<?php
						if($i%4 < 3) 
							{
						  echo "</td>";
							} 
						else 
							{
						  echo "</td><tr>";
							}
						$i++; 
						}
						?>
				</table>
			</div>
			<div id="sidebar">
				<h3>Navigasi Menu</h3>
				<a href="index.php">Home</a><br>
				<a href="admin">Halaman Admin</a><br>
			</div>
			<div style="clear:both">
			</div>
			<div id="footer">
				<p>©<?php echo date('Y')?> Membuat Toko Online dengan PHP dan MySQL created by <a href="http://tukangbolos.com/">tukangbolos</a></p>
			</div>
		</div>
	</body>
</html>
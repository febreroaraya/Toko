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
			?>
				<h3>Login</h3>
				<form method="post" action="index.php">
				<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="user"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="pass"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="login"></td>
				</tr>
				</table>
				</form>
				<?php 
				$user = $_POST['user'];
				$pswd = $_POST['pass'];
				if(isset($user) or isset($pswd))
					{
						if($user == "" or $pswd == "")
							{
								echo "username dan atau password belum terisi";
							}
						else
							{
								$query = mysql_query("select * from user where username = '$user' and password = '$pswd'");
								$row = mysql_num_rows($query);
								if($row == 0)
									{
										echo "Username dan atau password tidak ditemukan";
									}
								else
									{
										$data = mysql_fetch_array($query);
										$_SESSION['id'] = $data['id'];
										echo "<meta http-equiv='refresh' content='0;url=index.php' />";
									}
							}
					}
					}
				else
					{
				?>
				<h3>Welcome Admin</h3>
				<p>Ini adalah halaman admin untuk mengelola toko anda</p>
				<?php
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
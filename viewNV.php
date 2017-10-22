<html>
<head>
	<title> Danh sách nhân viên</title>
	<!-- <meta charset="utf-8" /> -->
	<!-- <meta http-equiv="Content-Type" content="text/html; charset=uft-8" /> -->
</head>
<body>
	<?php 

		//$conn = mysql_connect("127.0.0.1", "root", "1234") or die ("Could not connect: " . mysql_error());//
		$conn = mysql_connect("localhost", "root", "") or die ("Could not connect: " . mysql_error());
		$db = mysql_select_db("th_web", $conn) or die ("Could not select database");
		
		$sql = "SELECT a.*, b.donvi, c.chucvu FROM dai_van_nhanvien as a, dai_van_donvi as b, dai_van_chucvu as c WHERE a.madv = b.madv and a.macv = c.macv";
		$result = mysql_query($sql, $conn) or die("Could not do query");
	?>
	<TABLE  BORDER="1">
		<TR> 
			<TH>MANV</TH>
			<TH>HO TEN</TH>
			<TH>NAM SINH</TH>
			<TH>GIOI TINH</TH>
			<TH>DON VI</TH>
			<TH>CHUC VU</TH>
			<TH>LUONG(Ngan VND)</TH>
			<TH>Hinh</TH>
		</TR>
	<?php
		while($row=mysql_fetch_assoc($result)){
	?>
		<TR>
			<TD> <?php echo $row["manv"] ?></TD>
			<TD> <?php echo $row["hoten"] ?> </TD>
			<TD> <?php echo $row["namsinh"] ?> </TD>
			<TD> <?php echo $row["gioitinh"] ?> </TD>
			<TD> <?php echo $row["donvi"] ?> </TD>
			<TD> <?php echo $row["chucvu"] ?> </TD>
			<TD> <?php echo $row["luong"] ?> </TD>
			<?php
				//header("Content-type:".$row["type"]);
				//header("Content-length:".$row["size"]);
			?>
			<TD> <img src="<?php echo $row['content'] ?>" width='50px' height='100px'></TD>
		</TR>
	<?php
		}
	?>
	</TABLE>
</body>
</html>
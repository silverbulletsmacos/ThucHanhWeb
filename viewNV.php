<html>
	<title> Danh sách nhân viên</title>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=uft-8" />
<body>
	<?php 

		//$conn = mysql_connect("127.0.0.1", "root", "1234") or die ("Could not connect: " . mysql_error());//
		$conn = mysql_connect("localhost", "root", "") or die ("Could not connect: " . mysql_error());
		$db = mysql_select_db("th_web", $conn) or die ("Could not select database");
		
		$sql = "SELECT a.manv, a.hoten, a.namsinh, a.gioitinh, b.donvi, c.chucvu, a.luong
							    FROM dai_van_nhanvien as a, dai_van_donvi as b, dai_van_chucvu as c
							     WHERE a.madv = b.madv and a.macv = c.macv";
		$result = mysql_query($sql, $conn) or die("Could not do query");
		
		echo "<TABLE  BORDER=1>";
		echo "<TR> <TH>MANV</TH> <TH>HO TEN</TH> <TH>NAM SINH</TH> <TH>GIOI TINH</TH> <TH>DON VI</TH> <TH>CHUC VU</TH> <TH>LUONG(Ngan VND)</TH>  <TH>Hinh</TH> </TR>";
		while($row=mysql_fetch_array($result)){
			echo "<TR>";
				echo"<TD> " . $row["manv"]. " </TD>";
				echo"<TD> " . $row["hoten"]. " </TD>";
				echo"<TD> " . $row["namsinh"]. " </TD>";
				echo"<TD> " . $row["gioitinh"]. " </TD>";
				echo"<TD> " . $row["donvi"]. " </TD>";
				echo"<TD> " . $row["chucvu"]. " </TD>";
				echo"<TD> " . $row["luong"]. " </TD>";
				echo"<TD> <img src=viewImg.php?manv=" . $row["manv"] . " width='50px' height='100px'> </TD>";
			echo "</TR>";
		}
	
		echo "</form></TABLE>";
	?>
</body>
</html>
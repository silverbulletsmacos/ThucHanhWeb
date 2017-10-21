<html>
<head>
	<title> Nhập Dữ Liệu Nhân Viên</title>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=uft-8" />
	<link rel="stylesheet" type="text/css" href="buoi4css.css" />
</head>
<body>

	<div id="main">	
		<div id="banner"><b> Nhập Dữ Liệu Nhân Viên</div>
		<div id="center">
			<form enctype="multipart/form-data" action="addprod.php" method="post">
				<br>Mã Nhân Viên: <br> <input type="text" name="manv" size="10"> <br>
				<br>Họ Tên:<br>  <input type="text" name="hoten" size="40"> <br>
				<br>Ngày Sinh: <br> <input type="text" name="namsinh" size="20"> <br>
				<br>Giới Tính:<br>  <select name="gioitinh">
									<option value="Nam">Nam</option>
									<option value="Nu">Nữ</option>
							  </select> <br>
				<br>Đơn Vị:<br>  <select name="donvi">
									<option value="">------Chọn-----</option>
									<?php
										$conn = mysql_connect("localhost", "root", "") or die ("Could not connect: " . mysql_error());
										$db = mysql_select_db("th_web", $conn) or die ("Could not select database");
										mysql_set_charset('utf8',$conn);
										$sql = "select * from dai_van_donvi";
										$result = mysql_query($sql, $conn) or die("Could not do query");
										while($row=mysql_fetch_array($result)){
									?>
									<option value="<?php echo $row['madv']?>"><?php echo $row['donvi']?></option>
									<?php } ?>
							  </select> <br>
				<br>Chức Vụ:<br>  <select name="chucvu">
					
									<option value="">------Chọn-----</option>
									<option value="001">Giám Đốc</option>
									<option value="002">Trưởng Phòng Kế Toán</option>
									<option value="003">Giám Đốc Nhân Sự</option>
									<option value="004">Trưởng Phòng Hành Chánh</option>
									<option value="005">Giám Đốc Kỹ Thuật</option>
									<option value="006">Nhân Viên</option>
							  </select> <br>
				<br>Lương: <br> <input type="text" name="luong" size="20"> <br>
				<br>Hình: <input type="file" name="imgname"> <br>
				<br> <input type="submit" value="Add"> <input type="reset" value="Reset"> 
			</form>
			
			<b>Xem danh sách:
			<form action="viewNV.php">
				<input type="submit" value="View">
			</form>
		</div>

	</div>
	
</body>
</html>
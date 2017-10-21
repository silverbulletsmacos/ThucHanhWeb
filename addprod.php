<html>
    <meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="text/html; charset=uft-8" />
<body>
	<?php 
		$name = $_FILES['imgname']['name'];
		$tmpname = $_FILES['imgname']['tmp_name'];
		$size = $_FILES['imgname']['size'];
		$type = $_FILES['imgname']['type'];
		
		$fp = fopen($tmpname, 'rb'); 
		$content = fread($fp, filesize($tmpname)); 
		fclose($fp); 
		
		$conn = mysql_connect("localhost", "root", "") or die ("Could not connect: " . mysql_error());
		$db = mysql_select_db("th_web", $conn) or die ("Could not select database");
		
		$sql = "Insert into dai_van_nhanvien values('" .
		$_POST["manv"] . "', '".
		$_POST["hoten"] . "', '".
		$_POST["namsinh"] . "', '".
		$_POST["gioitinh"] . "', '".
		$_POST["donvi"] . "', '".
		$_POST["chucvu"] . "', '".
		$_POST["luong"] . "', '".
		$name . "', '". 
		$type . "', '".
		$size . "', '".
		mysql_real_escape_string($content, $conn) ."')";
		
		$result = mysql_query($sql, $conn) or die('Error, query failed');
		echo "<h1> Thành Công";

        $sql2 = "SELECT a.manv, a.hoten, a.namsinh, a.gioitinh, b.donvi, c.chucvu, a.luong, a.content
                                FROM dai_van_nhanvien as a, dai_van_donvi as b, dai_van_chucvu as c
							     WHERE a.madv = b.madv and a.macv = c.macv";
		$result2 = mysql_query($sql2, $conn) or die("Could not do query");

        echo "<TABLE  BORDER=1>";
            echo "<TR> <TH>MANV</TH> <TH>HO TEN</TH> <TH>NAM SINH</TH> <TH>GIOI TINH</TH> <TH>DON VI</TH> <TH>CHUC VU</TH> <TH>LUONG(Ngan VND)</TH>  <TH>Hinh</TH> </TR>";
            while($row=mysql_fetch_array($result2)){
                echo "<TR>";
                    echo"<TD> " . $row["manv"]. " </TD>";
                    echo"<TD> " . $row["hoten"]. " </TD>";
                    echo"<TD> " . $row["namsinh"]. " </TD>";
                    echo"<TD> " . $row["gioitinh"]. " </TD>";
                    echo"<TD> " . $row["donvi"]. " </TD>";
                    echo"<TD> " . $row["chucvu"]. " </TD>";
                    echo"<TD> " . $row["luong"]. " </TD>";
                    //echo"<TD> <img src=data: image/jpg;base64,'. base64_encode($row["content")] . '> </TD>";//
                    echo "<td> <img width='50px' height='50px' src=viewImg.php?manv=". $row["manv"] . "/></td>";
                echo "</TR>";
            }

            echo "</TABLE>";


	?>
</body>
</html>
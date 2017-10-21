	<?php 

		$conn = mysql_connect("localhost", "root", "") or die ("Could not connect: " . mysql_error());
		$db = mysql_select_db("th_web", $conn) or die ("Could not select database");	
		//$conn = mysql_connect("127.0.0.1", "root", "1234") or die ("Could not connect: " . mysql_error());//
		//$db = mysql_select_db("c6", $conn) or die ("Could not select database");//
		
		$sql = "SELECT * FROM dai_van_nhanvien WHERE manv= '" . $_GET["manv"] . "' ";
		$result = mysql_query($sql, $conn) or die ("Could not do query");
		$row = mysql_fetch_assoc($result);
		var_dump($row);
		header("Content-type: " . $row["type"]);
		header("Content-length: " . $row["size"]);
		//echo($row["content"]);
		//echo "<img src=".$row["content"].">";
	?>
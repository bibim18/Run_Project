<?php
	$objConnect = mysql_connect("localhost","root","12345678");
	if($objConnect)
	{
		$sql = "SELECT * from run where id='".$_POST['id']."'";
		$result = mysql_db_query("runproject",$sql);
		    // output data of each row
		    if($rs=mysql_fetch_array($result)) {
		    	if($rs["status"] == 'done'){ 
		    		$ms ="โอนเงินแล้ว";	
		    	}
		    	else {
		    		$ms="ยังไม่ได้โอนเงิน";	
		    	}
		        echo "คุณ " . $rs["name"]." ".$rs["lname"]. " ลงทะเบียนแล้ว "."<br>";
		        echo "สถานะการชำระเงิน ".$ms;
		    }
		    else {echo "ไม่พบการค้นหา กรุณาลงทะเบียน";}
	}
	else
	{
		echo "เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล";
	}

	mysql_close($objConnect);
?>

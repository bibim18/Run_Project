<?
	$id= $_POST['id'];
	$name= $_POST['name'];
	$lname= $_POST['lname'];
	$runType= $_POST['runType'];
	$facebook= $_POST['facebook'];

	$objConnect = mysql_connect("localhost","root","12345678");
	$objDB = mysql_select_db("runProject");
        $sql="insert into run (id,name,lname,runType,facebook,status) values ('".$id."','".$name."','".$lname."','".$runType."','".$facebook."','not')";
        $result = mysql_query($sql);
        if($result) {
			echo "Save Done.";
		}
		else
		{
			echo "Error Save [".$sql."]";
		}
		mysql_close($objConnect);
?>
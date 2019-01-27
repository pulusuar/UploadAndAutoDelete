<?php
	if(isset($_POST['delete']))
	{
		$filename = $_POST['file_name'];
		unlink('/var/www/html/images/'.$filename);
		header('refresh:0; url=list.php');
	}
	else if(isset($_POST['properties'])){
		$filename = $_POST['file_name'];
		$path = "/var/www/html/IMAGES/";
		$filesize = filesize($path."/".$filename);
		$creation = date ("F d Y H:i:s.", filectime($path."/".$filename));
		$modification = date ("F d Y H:i:s.", filemtime($path."/".$filename));
		$data = getimagesize($path."/".$filename);		
		$ax = $data[0];
		$ay = $data[1];
		echo "<script type='text/javascript'>";
		echo 'alert("File Name:   '.$filename.'\nFile Size:   '.$filesize.'Bytes\nCreation Date:   '.$creation.'\nModification Date:   '.$modification.'\nImage Resolution:   '.$ax.'X'.$ay.'");';
		echo "</script>";
		
	}
	else if(isset($_POST['propertiesPdf'])){
		$filename = $_POST['file_name'];
		$path = "/var/www/html/IMAGES/";
		$filesize = filesize($path."/".$filename);
		$creation = date ("F d Y H:i:s.", filectime($path."/".$filename));
		$modification = date ("F d Y H:i:s.", filemtime($path."/".$filename));
		echo "<script type='text/javascript'>";
		echo 'alert("File Name:   '.$filename.'\nFile Size:   '.$filesize.'Bytes \nCreation Date:   '.$creation.'\nModification Date:   '.$modification.'");';
		echo "</script>";
	}
	header('refresh:0; url=list.php');
?>
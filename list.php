
<?php
echo "Here are our files<br />";
$path = "/var/www/html/IMAGES/";
$dh = opendir($path);
$i=1;
$k = 300;
$current_time=time();

echo "<table>";
while (($file = readdir($dh)) !== false) {
    if($file != "." && $file != ".." && $file != "index.php" && $file != ".htaccess" && $file != "error_log" && $file != "cgi-bin") {
		$file_creation_time = filemtime($path."/".$file);
		$difference = $current_time-$file_creation_time;
		if($difference>=$k){
			unlink($path."/".$file);
		}
		else if((strpos($path."/".$file,"jpg")!==false) || (strpos($path."/".$file,"jpeg")!==false) || (strpos($path."/".$file,"png")!==false)){
			$data = getimagesize($path."/".$file);			
			$x = $data[0];
			$y = $data[1];
			echo "<tr><form method='post' action='delete.php'>";
			echo "<td><a href='".$path."/".$file."' target='popup'>".$file."</a> &nbsp;&nbsp;</td>";
			echo "<td><input id='properties' type='submit' value='Properties' name='properties' /><input type='hidden' name='properties' value='".$file."'></td>";
			echo "<td><input id='delete' type='submit' value='Delete' name='delete' /><input type='hidden' name='file_name' value='".$file."'></td>";
			echo "</form></tr>";
		}
		else if(strpos($path."/".$file,"pdf")!==false){			
			echo "<tr><form method='post' action='delete.php'>";
			echo "<td><a href='".$path."/".$file."' target='popup'>".$file."</a> &nbsp;&nbsp;</td>";
			echo "<td><input id='propertiesPdf' type='submit' value='Properties' name='propertiesPdf' /><input type='hidden' name='propertiesPdf' value='".$file."'></td>";
			echo "<td><input id='delete' type='submit' value='Delete' name='delete' /><input type='hidden' name='file_name' value='".$file."'></td>";
			echo "</form></tr>";
		}
		$i++;
    }
}
echo "</table>";
closedir($dh);
header("refresh:10;");
?>
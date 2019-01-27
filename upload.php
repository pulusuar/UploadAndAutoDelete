<?php
	if(isset($_FILES['file'])){
		$_file_size = $_FILES['file']['size'];
		if($_file_size>0){
			if($_file_size<=2097152){
				$target_path = "/var/www/html/images/";
				$target_path = $target_path.basename($_FILES['file']['name']);
				$target_path2 = "/var/www/html/all/";
				$target_path2 = $target_path2.basename($_FILES['file']['name']);
				if(move_uploaded_file($_FILES['file']['tmp_name'],$target_path)){
					copy($target_path,$target_path2);
					//File Uploaded
					?>
					
					<script type="text/javascript">
						parent.document.getElementById("message").innerHTML="Uploaded Successfully.";
						parent.document.getElementById("file").value="";
						window.parent.updatepicture("<?php echo "images/".$_FILES['file']['name']; ?>");
					</script>
					
					<?php
				}else{
					//Upload Failed
					?>
						
					<script type="text/javascript">
						parent.document.getElementById("message").innerHTML="<font color='ff00000'>Error uploading your file. Try again!</font>";
					</script>
					
					<?php
				}
			}
			else{
				//File is too big
				?>
				
				<script type="text/javascript">
					parent.document.getElementById("message").innerHTML="File is larger than 2MB.";
				</script>
				
				<?php
			} 
		}
		else{
			?>
			<script type="text/javascript">
					parent.document.getElementById("message").innerHTML="Choose any file less than 2MB.";
			</script>
			<?php
		}
	}
?>
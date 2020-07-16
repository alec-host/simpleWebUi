<?php
$uploaddir = './uploads';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if(move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadfile)){
	echo('The file is valid, and upload is successful');
}else{
	echo('Sonmething happened, failed to upload');
}
echo('Here some debugging information');

print_r($_FILES);
?>
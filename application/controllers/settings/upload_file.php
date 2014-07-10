<?php
$uploaddir = './uploads/vacancy_advertisement/'; 
$unique_tag='pic';

$filename = $unique_tag.time().'-'. basename($_FILES['uploadfile']['name']);//this is the file name
$file = $uploaddir . $filename;// this is the full path of the uploaded file
 
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
  //echo "success"; 
   echo $filename;die;//return the file name
} else {
	echo "error";
}
?>
<?php

$db_name="imagedb";
$mysql_username="root";
$mysql_password="";
$server_name="localhost";
$conn =mysqli_connect($server_name,$mysql_username,$mysql_password,$db_name);


$target_dir = "/xampp/htdocs/images";
$image = $_POST["image"];
$title  = $_POST["imgtits"];

if(!file_exists($target_dir)){
	mkdir($target_dir,0777,true);

}

$ntarget_dir = $target_dir ."/". $title .".jpeg";


$sql = "insert into Images values(null,'$title','$ntarget_dir')";

if(mysqli_query($conn,$sql))
{

	file_put_contents($ntarget_dir,base64_decode($image));

	echo json_encode([
		"Message" => "The file has been uploaded",
		"Status" => "OK"]);
}
else{
		echo json_encode([
		"Message" => "Sorry",
		"Status" =>"Error"
		]);
	}	
?>
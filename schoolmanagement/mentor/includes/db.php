<?php

$connect = mysqli_connect('localhost','root','','schoolmanagementsystem');
if(!$connect){
	die("Database connection failed" . mysqli_error($connect));
}
else{
	//echo "Databse connected successfully";
}

?>
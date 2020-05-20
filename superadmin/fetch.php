<?php
$connect = mysqli_connect("localhost", "root", "", "schoolmanagementsystem");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM stuff 
	WHERE username LIKE '%".$search."%'
	OR name LIKE '%".$search."%' 
	OR email LIKE '%".$search."%' 
	OR phone LIKE '%".$search."%' 
	
	";
}
else
{
	$query = "
	SELECT * FROM stuff ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th> Name</th>
							<th>USERNAME</th>
							<th>EMAIL</th>
							<th>PHONE</th>
						
						</tr>'
						;
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["name"].'</td>
				<td>'.$row["username"].'</td>
				<td>'.$row["email"].'</td>
				<td>'.$row["phone"].'</td>
			
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
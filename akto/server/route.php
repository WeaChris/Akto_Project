<?php
	
	include "../connect.php";

	$sql = "SELECT port_name FROM ports";
    $query = mysqli_query($link, $sql) or die(mysqli_error($link));
    
	$res = '<option>ΛΙΜΑΝΙΑ</option>';
	while ( $row = mysqli_fetch_assoc($query) ){
		
		$res .= '<option value='.$row['port_name'].'>'.$row['port_name'].'</option>';
	}
	
	
	
    echo $res;
	
?>
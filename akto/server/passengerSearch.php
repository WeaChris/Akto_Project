<?php
	include "../connect.php";
	
	
	$routeID = $_POST['routeiID'];
	$name = $_POST['name2'];
	$surname = $_POST['surname2'];
	
	$sql= "select passengers.pass_name, passengers.pass_surname, passengers.pass_id, passengers.pass_debt from passengers, route, vessel_pass WHERE route.route_id= vessel_pass.ROUTE_ID AND vessel_pass.PASS_ID=passengers.PASS_ID AND passengers.PASS_NAME='".$name."' AND passengers.PASS_SURNAME='".$surname."' AND route.route_id='".$routeID."'";
	$query = mysqli_query($link, $sql) or die(mysqli_error($link));
	
	$row = mysqli_fetch_assoc($query);
	if(mysqli_num_rows($query)!=0){
			
		$out = '		
			
			<div class="table_responsive">  
				<table class="table-bordered" >  
					<tr>  
						<th >Όνομα επιβάτη</th>  
						<th >Επίθετο επιβάτη</th>  
						<th >Κωδικός επιβάτη</th>
						<th >Υπόλοιπο επιβάτη</th>
						
					</tr>
			';

		$out .= '
			 <tr>
				 
				 <td > <id="pass_name" >'.$row['pass_name'].' </td>
				 <td > <id="pass_surname" >'.$row['pass_surname'].' </td>
				 <td > <id="pass_id" >'.$row['pass_id'].' </td>
				 <td > <id="pass_debt" >'.$row['pass_debt'].' </td>
				 
			 </tr>
			 </table>
			</div>
			 <br/>
			';
			
		
	}
	else{
		
		$out = "Ο επιβάτης δεν βρέθηκε";
	}
	
	echo $out;

?>